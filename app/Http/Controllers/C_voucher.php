<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\M_voucher;

class C_voucher extends Controller
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
            $voucher = M_voucher::with('user')->select('*')->orderBy('id', 'desc');
            return DataTables::of($voucher)
                ->addColumn('affiliate_name', function ($voucher) {
                    return $voucher->user ? $voucher->user->id . ' (' . $voucher->user->full_name . ')' : '';
                })
                ->make(true);
        } else {
            $menus = $this->menuService->getMenus($role_id);
        }

        return view('voucher.V-index-voucher', compact('menus'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'voucher_code'         => 'required|string|max:255|unique:tb_vouchers,voucher_code',
                'expired_date'         => 'required|string',
                'percent_discount'     => 'required|string|max:255',
                'user_affiliate_id'    => 'nullable|integer|unique:tb_vouchers,user_affiliate_id',
                'affiliate_commission' => 'nullable|numeric',
            ]);

            $data = $request->all();
            M_voucher::create($data);

            return redirect()->route('vouchers.index')->with('success', 'Data added successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data added failed, please check again.')->withErrors($e->validator)->withInput();
        }
    }

    public function edit(M_voucher $voucher)
    {
        return response()->json([
            'voucher_code'         => $voucher->voucher_code,
            'expired_date'         => $voucher->expired_date,
            'percent_discount'     => $voucher->percent_discount,
            'user_affiliate_id'    => $voucher->user_affiliate_id,
            'affiliate_commission' => $voucher->affiliate_commission,
        ]);
    }

    public function update(Request $request, M_voucher $voucher)
    {
        try {
            $request->validate([
                'voucher_code'         => 'required|string|max:255|unique:tb_vouchers,voucher_code,' . $voucher->id,
                'expired_date'         => 'required|string',
                'percent_discount'     => 'required|string|max:255',
                'user_affiliate_id'    => 'nullable|integer|unique:tb_vouchers,user_affiliate_id,' . $voucher->id,
                'affiliate_commission' => 'nullable|numeric',
            ]);

            $data = $request->all();
            $voucher->update($data);

            return redirect()->route('vouchers.index')->with('success', 'Data updated successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data failed to update, please check again.')->withErrors($e->validator)->withInput();
        }
    }

    public function destroy(M_voucher $voucher)
    {
        try {
            $voucher->delete();
            return redirect()->route('vouchers.index')->with('success', 'Data deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('vouchers.index')->with('error', 'Data failed to delete.');
        }
    }
}
