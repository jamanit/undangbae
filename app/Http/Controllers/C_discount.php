<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\M_discount;

class C_discount extends Controller
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
            $discount = M_discount::SELECT('*')->orderBy('id', 'desc');
            return DataTables::of($discount)->make(true);
        } else {
            $menus = $this->menuService->getMenus($role_id);
        }

        return view('discount.V_index_discount', compact('menus'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'discount_code'    => 'required|string|max:255',
                'expired_date'     => 'required|string',
                'percent_discount' => 'required|string|max:255',
            ]);

            $data = $request->all();
            M_discount::create($data);

            return redirect()->route('discounts.index')->with('success', 'Data added successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data added failed, please check again.')->withErrors($e->validator)->withInput();
        }
    }

    public function edit(M_discount $discount)
    {
        return response()->json([
            'discount_code'    => $discount->discount_code,
            'expired_date'     => $discount->expired_date,
            'percent_discount' => $discount->percent_discount,
        ]);
    }

    public function update(Request $request, M_discount $discount)
    {
        try {
            $request->validate([
                'discount_code'    => 'required|string|max:255',
                'expired_date'     => 'required|string',
                'percent_discount' => 'required|string|max:255',
            ]);

            $data = $request->all();
            $discount->update($data);

            return redirect()->route('discounts.index')->with('success', 'Data updated successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data failed to update, please check again.')->withErrors($e->validator)->withInput();
        }
    }

    public function destroy(M_discount $discount)
    {
        try {
            $discount->delete();
            return redirect()->route('discounts.index')->with('success', 'Data deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('discounts.index')->with('error', 'Data failed to delete.');
        }
    }
}
