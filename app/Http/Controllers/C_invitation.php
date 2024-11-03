<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Support\Facades\Mail;
use App\Mail\paymentTransactionEmail;
use App\Mail\statusInvitationEmail;

use App\Models\M_business_profile;
use App\Models\M_template;
use App\Models\M_invitation;
use App\Models\M_transaction;
use App\Models\M_invitation_status;
use App\Models\M_discount;
use App\Models\M_payment_method;

class C_invitation extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function template(Request $request)
    {
        $user_id = Auth::user()->id;
        $role_id = Auth::user()->role_id;

        $menus = $this->menuService->getMenus($role_id);

        $templates = M_template::where('publication_status', 'Yes')->orderBy('id', 'desc')->limit(4)->get();

        return view('invitation.V_index_template', compact('menus', 'templates'));
    }

    public function load_more_template(Request $request)
    {
        if ($request->ajax()) {
            $offset    = $request->input('offset', 0);
            $templates = M_template::orderBy('id', 'desc')->skip($offset)->take(6)->get();

            foreach ($templates as $template) {
                $template->id                 = $template->id;
                $template->image              = Storage::url($template->image);
                $template->template_name      = $template->template_name;
                $template->template_type_name = $template->template_type->template_type_name;
                $template->price              = number_format($template->price);
                $template->percent_discount   = number_format($template->percent_discount);
                $template->total_amount       = number_format($template->total_amount);
                $template->example_url        = $template->example_url;
            }

            return response()->json($templates);
        }

        return response()->json([], 404);
    }

    public function store_invitation(Request $request)
    {
        $user_id = Auth::user()->id;

        // Cek apakah ada undangan dengan status 2
        $existingInvitations = M_invitation::where('user_id', $user_id)
            ->where('invitation_status_id', 2)
            ->get();

        // Jika ada undangan dengan status 2, hentikan proses dan kirim pesan
        if ($existingInvitations->isNotEmpty()) {
            return redirect()->back()->with('error', 'Tidak dapat membuat undangan dikarenakan masih ada transaksi yang sedang ditinjau oleh admin.')->withInput();
        }

        DB::beginTransaction();
        try {
            // Hapus undangan dengan status 1 jika ada
            $existingInvitations = M_invitation::where('user_id', $user_id)
                ->where('invitation_status_id', 1)
                ->get();

            if ($existingInvitations->isNotEmpty()) {
                foreach ($existingInvitations as $invitation) {
                    // Hapus transaksi terkait
                    if ($invitation->transaction) {
                        $invitation->transaction->delete();
                    }
                    // Hapus undangan
                    $invitation->delete();
                }
            }

            // Siapkan data undangan baru
            $data_invitation = [
                'template_id' => $request->template_id,
                'invitation_code' => date('ymd-Hi') . '-' . rand(00, 99),
                'user_id' => $user_id,
                'expired_date' => Carbon::now()->addMonths(6),
                'invitation_status_id' => 1,
            ];

            // Simpan undangan
            $invitation = M_invitation::create($data_invitation);

            // Ambil template untuk transaksi
            $template = M_template::findOrFail($invitation->template_id);

            $data_transaction = [
                'invitation_id' => $invitation->id,
                'transaction_code' => date('ymd-Hi') . '-' . rand(00, 99),
                'price' => $template->price,
                'percent_discount' => $template->percent_discount,
                'total_amount' => $template->price - ($template->price * ($template->percent_discount / 100)),
            ];

            // Simpan transaksi
            $transaction = M_transaction::create($data_transaction);

            // Komit transaksi jika semua langkah berhasil
            DB::commit();

            return redirect()->route('invitations.edit_transaction', $transaction->uuid);
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menambahkan data, harap periksa kembali.')->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan, harap coba lagi.')->withInput();
        }
    }

    public function edit_transaction(string $transaction_uuid)
    {
        $user_id = Auth::user()->id;
        $role_id = Auth::user()->role_id;

        $menus = $this->menuService->getMenus($role_id);

        $transaction       = M_transaction::with('invitation.user', 'invitation.invitation_status')->where('uuid', $transaction_uuid)->firstOrFail();
        $payment_methods   = M_payment_method::orderBy('id', 'desc')->get();
        $invitation_status = M_invitation_status::whereNotIn('id', [1, 2])->orderBy('id', 'asc')->get();

        return view('invitation.V_edit_transaction', compact('menus', 'transaction', 'payment_methods', 'invitation_status'));
    }

    public function update_transaction(Request $request, string $transaction_uuid)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'payment_receipt' => 'required|image|mimes:jpeg,png,jpg,gif|max:5024',
            ]);

            $transaction = M_transaction::with('invitation.user', 'invitation.template.template_type', 'invitation.invitation_status')
                ->where('uuid', $transaction_uuid)
                ->firstOrFail();

            $data_transaction = $request->all();
            if ($request->hasFile('payment_receipt')) {
                if ($transaction->payment_receipt) {
                    Storage::disk('public')->delete($transaction->payment_receipt);
                }

                $filePath                            = $request->file('payment_receipt')->store('transaction', 'public');
                $data_transaction['payment_receipt'] = $filePath;
            }
            $transaction->update($data_transaction);

            $invitation = M_invitation::with('invitation_status')->where('id', $transaction->invitation_id)->firstOrFail();
            $invitation->update(['invitation_status_id' => 2]);

            // Prepare email details
            $transaction->refresh();
            $invitation->refresh();
            $user_email       = $transaction->invitation->user->email;
            $business_profile = M_business_profile::select('brand_email')->where('id', 1)->first();

            // Send email
            Mail::to([$user_email, $business_profile->brand_email])->send(new paymentTransactionEmail($transaction));

            DB::commit();
            return redirect()->route('invitations.index')->with('success', 'Pembayaran diproses. Harap tunggu pembayaran Anda sedang ditinjau oleh admin.');
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Data gagal diperbarui, harap periksa kembali.')->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan, harap coba lagi.')->withInput();
        }
    }


    public function update_percent_discount(Request $request, string $transaction_uuid)
    {
        try {
            $request->validate([
                'discount_code'    => 'required|string|max:255',
                'percent_discount' => 'required|string|max:255',
            ]);

            $transaction = M_transaction::where('uuid', $transaction_uuid)->firstOrFail();

            if ($transaction->percent_discount > 0) {
                return redirect()->back()->with('error', 'Kode diskon tidak dapat digunakan karena transaksi ini sudah mendapatkan diskon.')->withInput();
            } else {
                $discount = M_discount::where('discount_code', $request->discount_code)
                    ->where('expired_date', '>=', now())
                    ->first();

                if (!$discount) {
                    return redirect()->back()->with('error', 'Kode diskon tidak valid atau sudah kadaluarsa.')->withInput();
                }

                $data['discount_code']    = $discount->discount_code;
                $data['percent_discount'] = $discount->percent_discount;

                $price                = $transaction->price;
                $total_amount         = $price - ($price * $discount->percent_discount) / 100;
                $data['total_amount'] = $total_amount;
                $transaction->update($data);
                return redirect()->back()->with('success', 'Diskon berhasil diterapkan!');
            }

            return redirect()->route('invitations.index')->with('success', 'Pembayaran berhasil. Harap tunggu pembayaran Anda sedang ditinjau oleh admin.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data gagal diperbarui, harap periksa kembali.')->withErrors($e->validator)->withInput();
        }
    }

    public function update_invitation_status(Request $request, string $invitation_id)
    {
        DB::beginTransaction(); // Memulai transaksi
        try {
            $invitation = M_invitation::with('user', 'transaction', 'template.template_type', 'invitation_status')
                ->where('id', $invitation_id)
                ->firstOrFail();

            // Update status undangan
            $data['invitation_status_id'] = $request->invitation_status_id;
            $invitation->update($data);

            // Kirim email jika update berhasil
            $invitation->refresh();
            $user_email = $invitation->user->email;
            $business_profile = M_business_profile::select('brand_email')->where('id', 1)->first();
            Mail::to([$user_email, $business_profile->brand_email])->send(new statusInvitationEmail($invitation));

            DB::commit(); // Komit transaksi jika semua berhasil
            return redirect()->route('invitations.index')->with('success', 'Data berhasil diperbarui.');
        } catch (ValidationException $e) {
            DB::rollBack(); // Rollback jika terjadi error pada validasi
            return redirect()->back()->with('error', 'Data gagal diperbarui, harap periksa kembali.')->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback untuk error lainnya
            return redirect()->back()->with('error', 'Terjadi kesalahan, harap coba lagi.')->withInput();
        }
    }


    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $role_id = Auth::user()->role_id;

        if ($request->ajax()) {
            $query = M_invitation::with('template.template_type', 'transaction', 'invitation_status')->select('*')->orderBy('id', 'desc');
            if ($role_id === 4) {
                $query->where('user_id', $user_id);
            }
            $invitations = $query->get();

            return DataTables::of($invitations)
                ->addColumn('template_type_name', function ($invitation) {
                    return  $invitation->template->template_type->template_type_name ?? 'N/A';
                })
                ->addColumn('template_name', function ($invitation) {
                    return  $invitation->template->template_name ?? 'N/A';
                })
                ->addColumn('invitation_status_name', function ($invitation) {
                    return  $invitation->invitation_status->invitation_status_name ?? 'N/A';
                })
                ->addColumn('created_at', function ($invitation) {
                    return  date('d-m-Y H:i', strtotime($invitation->created_at)) ?? 'N/A';
                })
                ->addColumn('parameter', function ($invitation) {
                    return  $invitation->template->parameter ?? 'N/A';
                })
                ->addColumn('transaction_uuid', function ($invitation) {
                    return  $invitation->transaction->uuid ?? 'N/A';
                })
                ->make(true);
        } else {
            $menus = $this->menuService->getMenus($role_id);
        }

        return view('invitation.V_index_invitation', compact('menus'));
    }

    public function destroy(M_invitation $invitation)
    {
        try {
            DB::beginTransaction();

            foreach (['transaction', 'cover', 'wedding_couple', 'quote', 'event', 'love_stories', 'galleries', 'streaming', 'gifts', 'audio', 'closing', 'guests', 'messages'] as $relation) {
                if ($invitation->$relation) {
                    $invitation->$relation()->delete();
                }
            }
            $invitation->delete();

            DB::commit();
            return redirect()->route('invitations.index')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('invitations.index')->with('error', 'Data gagal dihapus.');
        }
    }

    public function show_invitation(string $invitation_id, string $wedding_couple = null, string $guest_name = null)
    {
        $invitation = M_invitation::with([
            'template',
            'transaction',
            'cover',
            'wedding_couple',
            'quote',
            'event',
            'love_stories',
            'streaming',
            'gifts',
            'galleries',
            'audio',
            'closing',
            'guests',
            'messages',
        ])->where('id', $invitation_id)->first();

        return view('invitation.' . $invitation->template->parameter . '.V_' . $invitation->template->template_code, compact('invitation', 'guest_name'));
    }
}
