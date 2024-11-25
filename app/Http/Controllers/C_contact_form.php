<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\M_contact_form;

class C_contact_form extends Controller
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
            $contact_forms = M_contact_form::SELECT('*')->orderBy('id', 'desc');
            return DataTables::of($contact_forms)->make(true);
        } else {
            $menus = $this->menuService->getMenus($role_id);
        }

        return view('contact-form.V-index-contact-form', compact('menus'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name'         => 'required|string|max:255',
                'email'        => 'required|string|max:255',
                'contact_form' => 'required|string',
            ]);

            $data = $request->all();
            M_contact_form::create($data);

            return redirect()->route('contact-forms.index')->with('success', 'Data added successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data added failed, please check again.')->withErrors($e->validator)->withInput();
        }
    }

    public function show(M_contact_form $contact_form)
    {
        $role_id = Auth::user()->role_id;

        $menus = $this->menuService->getMenus($role_id);

        return view('contact-form.V-show-contact-form', compact('menus', 'contact_form'));
    }

    public function edit(M_contact_form $contact_form)
    {
        return response()->json([
            'platform'        => $contact_form->platform,
            'username_number' => $contact_form->username_number,
            'icon'            => $contact_form->icon,
            'url'             => $contact_form->url,
        ]);
    }

    public function update(Request $request, M_contact_form $contact_form)
    {
        try {
            $request->validate([
                'name'         => 'required|string|max:255',
                'email'        => 'required|string|max:255',
                'contact_form' => 'required|string',
            ]);

            $data = $request->all();
            $contact_form->update($data);

            return redirect()->route('contact-forms.index')->with('success', 'Data updated successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data failed to update, please check again.')->withErrors($e->validator)->withInput();
        }
    }

    public function destroy(M_contact_form $contact_form)
    {
        try {
            $contact_form->delete();
            return redirect()->route('contact-forms.index')->with('success', 'Data deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('contact-forms.index')->with('error', 'Data failed to delete.');
        }
    }
}
