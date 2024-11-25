<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Models\M_voucher;
use App\Models\M_transaction;
use App\Models\M_affiliate_withdrawal;

class C_affiliate extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $role_id = Auth::user()->role_id;

        if ($request->ajax()) {
            $affiliate_withdrawals = M_affiliate_withdrawal::orderBy('id', 'desc');
            if ($role_id == 4 || $role_id == 5) {
                $affiliate_withdrawals->where('user_affiliate_id', $user_id);
            }

            return DataTables::of($affiliate_withdrawals)->make(true);
        } else {
            $menus = $this->menuService->getMenus($role_id);

            $affiliate_voucher = M_voucher::where('user_affiliate_id', $user_id)->first();

            $total_commission = 0;
            $total_commission = M_transaction::select('affiliate_commission')
                ->where('user_affiliate_id', $user_id)
                ->where('transaction_status_id', 1)
                ->where('affiliate_withdrawal_status', 0)
                ->sum('affiliate_commission');
        }

        return view('affiliate.V-index-affiliate', compact('menus', 'affiliate_voucher', 'total_commission'));
    }

    public function store_affiliate_withdrawal(Request $request)
    {
        // Mulai transaksi database untuk memastikan operasi atomik
        DB::beginTransaction();

        try {
            // Validasi input
            $request->validate([
                'account_name'   => 'required|string|max:255',
                'account_number' => 'required|string|max:255',
                'account_holder' => 'required|string|max:255',
            ]);

            // Ambil ID user yang sedang login
            $user_id = Auth::user()->id;

            $transaction = M_transaction::select('id', 'affiliate_commission')
                ->where('user_affiliate_id', $user_id)
                ->where('transaction_status_id', 1)        // 1 berarti transaksi sukses
                ->where('affiliate_withdrawal_status', 0)  // 0 berarti belum diproses untuk penarikan
                ->get();

            // Jika tidak ada transaksi yang memenuhi syarat, kembalikan dengan error
            if ($transaction->isEmpty()) {
                DB::rollBack();  // Rollback transaksi karena tidak ada transaksi yang memenuhi syarat
                return redirect()->back()->with('error', 'Tidak ada transaksi yang memenuhi syarat untuk penarikan.');
            }

            if ($transaction) {
                // Ambil ID transaksi untuk diproses lebih lanjut
                $transaction_ids = $transaction->pluck('id')->toArray();

                // Konversi ID transaksi menjadi JSON untuk penyimpanan
                $transaction_id_list = json_encode($transaction_ids);
            }

            // Pastikan total komisi lebih dari 50.000
            $total_commission = $transaction->sum('affiliate_commission');
            if ($total_commission < 50000) {
                DB::rollBack();  // Rollback transaksi jika komisi kurang dari 50.000
                return redirect()->back()->with('error', 'Total komisi Anda belum mencapai Rp. 50.000.');
            }

            // Siapkan data untuk penarikan
            $data = [
                'withdrawal_code'     => date('ymd-Hi') . '-' . rand(00, 99),
                'commission_amount'   => $total_commission,
                'status'              => 'Proses',
                'transaction_id_list' => $transaction_id_list,
                'account_name'        => $request->account_name,
                'account_number'      => $request->account_number,
                'account_holder'      => $request->account_holder,
                'user_affiliate_id'   => $user_id,
            ];

            // Simpan data penarikan ke database
            M_affiliate_withdrawal::create($data);

            // Update status transaksi menjadi sudah diproses untuk penarikan
            M_transaction::whereIn('id', $transaction_ids)
                ->update(['affiliate_withdrawal_status' => 1]);

            // Jika semua langkah berhasil, commit transaksi ke database
            DB::commit();

            // Kembalikan pesan sukses
            return redirect()->route('affiliates.index')->with('success', 'Data berhasil ditambahkan.');
        } catch (ValidationException $e) {
            DB::rollBack();  // Rollback jika terjadi error pada validasi
            return redirect()->back()->with('error', 'Gagal validasi data, harap periksa kembali.')->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            DB::rollBack();  // Rollback untuk error lainnya
            return redirect()->back()->with('error', 'Terjadi kesalahan, harap coba lagi.')->withInput();
        }
    }

    public function edit_affiliate_withdrawal(string $affiliate_withdrawal_uuid)
    {
        $user_id = Auth::user()->id;
        $role_id = Auth::user()->role_id;

        $menus = $this->menuService->getMenus($role_id);

        $affiliate_withdrawal = M_affiliate_withdrawal::with('user')->where('uuid', $affiliate_withdrawal_uuid)->first();

        return view('affiliate.V-edit-affiliate-withdrawal', compact('menus', 'affiliate_withdrawal'));
    }

    public function update_affiliate_withdrawal(Request $request, string $affiliate_withdrawal_uuid)
    {
        // Mulai transaksi
        DB::beginTransaction();

        try {
            // Validasi input
            $request->validate([
                'payment_receipt' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
                'remark'          => 'nullable|string',
            ]);

            // Ambil data penarikan affiliate berdasarkan UUID
            $affiliate_withdrawal = M_affiliate_withdrawal::with('user')->where('uuid', $affiliate_withdrawal_uuid)->first();

            // Ambil semua data input request
            $data = $request->all();

            // Proses upload file jika ada
            if ($request->hasFile('payment_receipt')) {
                if ($affiliate_withdrawal->payment_receipt) {
                    // Hapus file lama jika ada
                    Storage::disk('public')->delete($affiliate_withdrawal->payment_receipt);
                }

                // Simpan file baru dan update path
                $filePath                = $request->file('payment_receipt')->store('affiliate-withdrawal', 'public');
                $data['payment_receipt'] = $filePath;
            }

            // Update status dan data lainnya
            $data['status'] = 'Berhasil';
            $affiliate_withdrawal->update($data);

            // Commit transaksi jika semua sukses
            DB::commit();

            // Kembali ke halaman dengan pesan sukses
            return redirect()->route('affiliates.index')->with('success', 'Data berhasil diperbarui.');
        } catch (ValidationException $e) {
            DB::rollBack();  // Rollback jika terjadi error pada validasi
            return redirect()->back()->with('error', 'Gagal validasi data, harap periksa kembali.')->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            DB::rollBack();  // Rollback untuk error lainnya
            return redirect()->back()->with('error', 'Terjadi kesalahan, harap coba lagi.')->withInput();
        }
    }
}
