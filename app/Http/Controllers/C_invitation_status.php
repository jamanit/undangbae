<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\M_invitation_status;

class C_invitation_status extends Controller
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
            $invitation_status = M_invitation_status::orderBy('id', 'desc');
            return DataTables::of($invitation_status)->make(true);
        } else {
            $menus = $this->menuService->getMenus($role_id);
        }

        return view('invitation_status.V_index_invitation_status', compact('menus'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'invitation_status_name' => 'required|string|max:255',
                'description_status'     => 'required|string',
            ]);

            $data = $request->all();
            M_invitation_status::create($data);

            return redirect()->route('invitation_status.index')->with('success', 'Data added successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data added failed, please check again.')->withErrors($e->validator)->withInput();
        }
    }

    public function edit(M_invitation_status $invitation_status)
    {
        return response()->json([
            'invitation_status_name' => $invitation_status->invitation_status_name,
            'description_status'     => $invitation_status->description_status,
        ]);
    }

    public function update(Request $request, M_invitation_status $invitation_status)
    {
        try {
            $request->validate([
                'invitation_status_name' => 'required|string|max:255',
                'description_status'     => 'required|string',
            ]);

            $data = $request->all();
            $invitation_status->update($data);

            return redirect()->route('invitation_status.index')->with('success', 'Data updated successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data failed to update, please check again.')->withErrors($e->validator)->withInput();
        }
    }

    public function destroy(M_invitation_status $invitation_status)
    {
        try {
            $invitation_status->delete();
            return redirect()->route('invitation_status.index')->with('success', 'Data deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('invitation_status.index')->with('error', 'Data failed to delete.');
        }
    }
}
