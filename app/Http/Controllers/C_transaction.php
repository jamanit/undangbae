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
use App\Models\M_transaction;
use App\Models\M_transaction_status;
use App\Models\M_template;
use App\Models\M_voucher;
use App\Models\M_payment_method;
use App\Models\M_invitation;

class C_transaction extends Controller
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

        return view('transaction.V-index-template', compact('menus', 'templates'));
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

    public function store_transaction(Request $request)
    {
        $user_id = Auth::user()->id;

        // Cek apakah ada transaksi dengan status 3
        $existingTransactions = M_transaction::where('user_id', $user_id)
            ->where('transaction_status_id', 3)
            ->get();

        // Jika ada transaksi dengan status 3, hentikan proses dan kirim pesan
        if ($existingTransactions->isNotEmpty()) {
            return redirect()->back()->with('error', 'Tidak dapat membuat undangan dikarenakan masih ada transaksi yang sedang ditinjau oleh admin.')->withInput();
        }

        DB::beginTransaction();
        try {
            // Hapus transaction dengan status 2 jika ada
            $existingTransactions = M_transaction::where('user_id', $user_id)
                ->where('transaction_status_id', 2)
                ->get();

            if ($existingTransactions->isNotEmpty()) {
                foreach ($existingTransactions as $transaction) {
                    // Hapus transaction
                    $transaction->delete();
                }
            }

            // Siapkan data transaction baru 
            $template         = M_template::findOrFail($request->template_id);
            $data_transaction = [
                'transaction_code'        => date('ymd-Hi') . '-' . rand(00, 99),
                'price'                   => $template->price,
                'percent_discount'        => $template->percent_discount,
                'total_amount'            => $template->price - ($template->price * ($template->percent_discount / 100)),
                'invitation_expired_date' => Carbon::now()->addMonths(1),
                'transaction_status_id'   => 2,
                'template_id'             => $request->template_id,
                'user_id'                 => $user_id,
            ];
            $transaction = M_transaction::create($data_transaction);

            // Simpan undangan
            $data_invitation = [
                'transaction_id' => $transaction->id,
            ];
            M_invitation::create($data_invitation);

            // Komit transaksi jika semua langkah berhasil
            DB::commit();

            return redirect()->route('transactions.edit-transaction', $transaction->uuid);
        } catch (ValidationException $e) {
            DB::rollBack();  // Rollback jika terjadi error pada validasi
            return redirect()->back()->with('error', 'Gagal validasi data, harap periksa kembali.')->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            DB::rollBack();  // Rollback untuk error lainnya
            return redirect()->back()->with('error', 'Terjadi kesalahan, harap coba lagi.')->withInput();
        }
    }

    public function edit_transaction(string $transaction_uuid)
    {
        $user_id = Auth::user()->id;
        $role_id = Auth::user()->role_id;

        $menus = $this->menuService->getMenus($role_id);

        $transaction        = M_transaction::with('user', 'transaction_status')->where('uuid', $transaction_uuid)->firstOrFail();
        $payment_methods    = M_payment_method::orderBy('id', 'desc')->get();
        $transaction_status = M_transaction_status::whereNotIn('id', [2, 3, 4])->orderBy('id', 'asc')->get();

        return view('transaction.V-edit-transaction', compact('menus', 'transaction', 'payment_methods', 'transaction_status'));
    }

    public function update_transaction(Request $request, string $transaction_uuid)
    {
        DB::beginTransaction();
        try {
            $transaction = M_transaction::with('user', 'transaction_status', 'template.template_type')
                ->where('uuid', $transaction_uuid)
                ->firstOrFail();

            // Jika payment_receipt kosong di database, maka wajib diisi
            if (!$transaction->payment_receipt) {
                $rules['payment_receipt'] = 'required|image|mimes:jpeg,png,jpg,gif|max:5024';
            } else {
                // Jika sudah ada, maka nullable
                $rules['payment_receipt'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:5024';
            }

            $rules = [
                'refund_receipt' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5024',  // Refund receipt tetap nullable
            ];

            // Validasi berdasarkan aturan di atas
            $request->validate($rules);

            // Ambil data request untuk transaksi
            $data_transaction = $request->all();

            // Proses Payment Receipt jika ada file
            if ($request->hasFile('payment_receipt')) {
                if ($transaction->payment_receipt) {
                    Storage::disk('public')->delete($transaction->payment_receipt);
                }

                $filePath                            = $request->file('payment_receipt')->store('transaction/payment', 'public');
                $data_transaction['payment_receipt'] = $filePath;
                // status dalam proses
                $data_transaction['transaction_status_id'] = 4;
            }

            // Proses Refund Receipt jika ada file
            if ($request->hasFile('refund_receipt')) {
                if ($transaction->refund_receipt) {
                    Storage::disk('public')->delete($transaction->refund_receipt);
                }

                $filePath                           = $request->file('refund_receipt')->store('transaction/refund', 'public');
                $data_transaction['refund_receipt'] = $filePath;
                // status pengembalian dana
                $data_transaction['transaction_status_id'] = 2;
            }

            // Update transaksi dengan data yang sudah diperbarui
            $transaction->update($data_transaction);

            // Prepare email details
            $transaction->refresh();
            $user_email       = $transaction->user->email;
            $business_profile = M_business_profile::select('brand_email')->where('id', 1)->first();

            // Send email
            Mail::to([$user_email, $business_profile->brand_email])->send(new paymentTransactionEmail($transaction));

            DB::commit();
            return redirect()->route('transactions.edit-transaction', $transaction->uuid)->with('success', 'Data berhasil diperbarui.');
        } catch (ValidationException $e) {
            DB::rollBack();  // Rollback jika terjadi error pada validasi
            return redirect()->back()->with('error', 'Gagal validasi data, harap periksa kembali.')->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            DB::rollBack();  // Rollback untuk error lainnya
            return redirect()->back()->with('error', 'Terjadi kesalahan, harap coba lagi.')->withInput();
        }
    }

    public function update_percent_discount(Request $request, string $transaction_uuid)
    {
        // Mulai transaksi untuk memastikan semua perubahan atomik
        DB::beginTransaction();

        try {
            // Validasi input
            $request->validate([
                'voucher_code'     => 'required|string|max:255',
                'percent_discount' => 'required|string|max:255',
            ]);

            // Cari transaksi berdasarkan UUID
            $transaction = M_transaction::where('uuid', $transaction_uuid)->firstOrFail();

            // Cek jika transaksi sudah mendapatkan diskon
            if ($transaction->percent_discount > 0) {
                // Rollback transaksi jika ada kesalahan
                DB::rollBack();
                return redirect()->back()->with('error', 'Kode voucher tidak dapat digunakan karena transaksi ini sudah mendapatkan diskon.')->withInput();
            }

            // Cari kode diskon yang valid dan belum kadaluarsa
            $voucher = M_voucher::where('voucher_code', $request->voucher_code)
                ->where('expired_date', '>=', now())
                ->first();

            // Jika kode diskon tidak ditemukan
            if (!$voucher) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Kode voucher tidak valid atau sudah kadaluarsa.')->withInput();
            }

            // Update data transaksi dengan informasi diskon
            $data = [
                'voucher_code'                => $voucher->voucher_code,
                'percent_discount'            => $voucher->percent_discount,
                'affiliate_commission'        => $voucher->affiliate_commission,
                'affiliate_withdrawal_status' => 0,
                'user_affiliate_id'           => $voucher->user_affiliate_id,
            ];

            // Hitung total setelah diskon
            $price                = $transaction->price;
            $total_amount         = $price - ($price * $voucher->percent_discount) / 100;
            $data['total_amount'] = $total_amount;

            // Update transaksi
            $transaction->update($data);

            // Commit transaksi jika tidak ada error
            DB::commit();

            // Kembali ke halaman sebelumnya dengan pesan sukses
            return redirect()->back()->with('success', 'Voucher berhasil diterapkan!');
        } catch (ValidationException $e) {
            DB::rollBack();  // Rollback jika terjadi error pada validasi
            return redirect()->back()->with('error', 'Gagal validasi data, harap periksa kembali.')->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            DB::rollBack();  // Rollback untuk error lainnya
            return redirect()->back()->with('error', 'Terjadi kesalahan, harap coba lagi.')->withInput();
        }
    }

    public function update_transaction_status(Request $request, string $transaction_uuid)
    {
        DB::beginTransaction();  // Memulai transaksi
        try {
            $transaction = M_transaction::with('user', 'transaction_status', 'template.template_type', 'invitation')
                ->where('uuid', $transaction_uuid)
                ->firstOrFail();

            // Update status undangan
            $data['transaction_status_id'] = $request->transaction_status_id;
            $transaction->update($data);

            // Kirim email jika update berhasil
            $transaction->refresh();
            $user_email       = $transaction->user->email;
            $business_profile = M_business_profile::select('brand_email')->where('id', 1)->first();
            Mail::to([$user_email, $business_profile->brand_email])->send(new statusInvitationEmail($transaction));

            DB::commit();  // Komit transaksi jika semua berhasil
            return redirect()->route('transactions.edit-transaction', $transaction->uuid)->with('success', 'Data berhasil diperbarui.');
        } catch (ValidationException $e) {
            DB::rollBack();  // Rollback jika terjadi error pada validasi
            return redirect()->back()->with('error', 'Gagal validasi data, harap periksa kembali.')->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            DB::rollBack();  // Rollback untuk error lainnya
            return redirect()->back()->with('error', 'Terjadi kesalahan, harap coba lagi.')->withInput();
        }
    }
}
