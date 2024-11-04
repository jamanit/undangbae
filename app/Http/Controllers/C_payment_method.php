<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\M_payment_method;

class C_payment_method extends Controller
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
            $payment_methods = M_payment_method::SELECT('*')->orderBy('id', 'desc');
            return DataTables::of($payment_methods)->make(true);
        } else {
            $menus = $this->menuService->getMenus($role_id);
        }

        return view('payment-method.V-index-payment-method', compact('menus'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'account_name'   => 'required|string|max:255',
                'account_number' => 'required|string|max:255',
                'account_holder' => 'required|string|max:255',
            ]);

            $data = $request->all();
            M_payment_method::create($data);

            return redirect()->route('payment-methods.index')->with('success', 'Data added successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data added failed, please check again.')->withErrors($e->validator)->withInput();
        }
    }

    public function edit(M_payment_method $payment_method)
    {
        return response()->json([
            'account_name'   => $payment_method->account_name,
            'account_number' => $payment_method->account_number,
            'account_holder' => $payment_method->account_holder,
        ]);
    }

    public function update(Request $request, M_payment_method $payment_method)
    {
        try {
            $request->validate([
                'account_name'   => 'required|string|max:255',
                'account_number' => 'required|string|max:255',
                'account_holder' => 'required|string|max:255',
            ]);

            $data = $request->all();
            $payment_method->update($data);

            return redirect()->route('payment-methods.index')->with('success', 'Data updated successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data failed to update, please check again.')->withErrors($e->validator)->withInput();
        }
    }

    public function destroy(M_payment_method $payment_method)
    {
        try {
            $payment_method->delete();
            return redirect()->route('payment-methods.index')->with('success', 'Data deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('payment-methods.index')->with('error', 'Data failed to delete.');
        }
    }
}
