<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\M_service;

class C_service extends Controller
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
            $service = M_service::SELECT('*')->orderBy('id', 'desc');
            return DataTables::of($service)->make(true);
        } else {
            $menus = $this->menuService->getMenus($role_id);
        }

        return view('service.V-index-service', compact('menus'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'icon'        => 'required|string|max:255',
                'title'       => 'required|string|max:255',
                'description' => 'required|string',
            ]);

            $data = $request->all();
            M_service::create($data);

            return redirect()->route('services.index')->with('success', 'Data added successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data added failed, please check again.')->withErrors($e->validator)->withInput();
        }
    }

    public function edit(M_service $service)
    {
        return response()->json([
            'icon'        => $service->icon,
            'title'       => $service->title,
            'description' => $service->description,
        ]);
    }

    public function update(Request $request, M_service $service)
    {
        try {
            $request->validate([
                'icon'        => 'required|string|max:255',
                'title'       => 'required|string|max:255',
                'description' => 'required|string',
            ]);

            $data = $request->all();
            $service->update($data);

            return redirect()->route('services.index')->with('success', 'Data updated successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data failed to update, please check again.')->withErrors($e->validator)->withInput();
        }
    }

    public function destroy(M_service $service)
    {
        try {
            $service->delete();
            return redirect()->route('services.index')->with('success', 'Data deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('services.index')->with('error', 'Data failed to delete.');
        }
    }
}
