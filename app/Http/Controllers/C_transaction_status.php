<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\M_transaction_status;

class C_transaction_status extends Controller
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
            $transaction_status = M_transaction_status::orderBy('id', 'desc');
            return DataTables::of($transaction_status)->make(true);
        } else {
            $menus = $this->menuService->getMenus($role_id);
        }

        return view('transaction-status.V-index-transaction-status', compact('menus'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'transaction_status_name' => 'required|string|max:255',
                'description_status'     => 'required|string',
            ]);

            $data = $request->all();
            M_transaction_status::create($data);

            return redirect()->route('transaction-statuses.index')->with('success', 'Data added successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data added failed, please check again.')->withErrors($e->validator)->withInput();
        }
    }

    public function edit(M_transaction_status $transaction_status)
    {
        return response()->json([
            'transaction_status_name' => $transaction_status->transaction_status_name,
            'description_status'     => $transaction_status->description_status,
        ]);
    }

    public function update(Request $request, M_transaction_status $transaction_status)
    {
        try {
            $request->validate([
                'transaction_status_name' => 'required|string|max:255',
                'description_status'     => 'required|string',
            ]);

            $data = $request->all();
            $transaction_status->update($data);

            return redirect()->route('transaction-statuses.index')->with('success', 'Data updated successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data failed to update, please check again.')->withErrors($e->validator)->withInput();
        }
    }

    public function destroy(M_transaction_status $transaction_status)
    {
        try {
            $transaction_status->delete();
            return redirect()->route('transaction-statuses.index')->with('success', 'Data deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('transaction-statuses.index')->with('error', 'Data failed to delete.');
        }
    }
}
