<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\M_message;

class C_message extends Controller
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
            $messages = M_message::SELECT('*')->orderBy('id', 'desc');
            return DataTables::of($messages)->make(true);
        } else {
            $menus = $this->menuService->getMenus($role_id);
        }

        return view('message.V_index_message', compact('menus'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name'    => 'required|string|max:255',
                'email'   => 'required|string|max:255',
                'message' => 'required|string',
            ]);

            $data = $request->all();
            M_message::create($data);

            return redirect()->route('messages.index')->with('success', 'Data added successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data added failed, please check again.')->withErrors($e->validator)->withInput();
        }
    }

    public function show(M_message $message)
    {
        $user_id = Auth::user()->id;
        $role_id = Auth::user()->role_id;

        $menus = $this->menuService->getMenus($role_id);

        return view('message.V_show_message', compact('menus', 'message'));
    }

    public function edit(M_message $message)
    {
        return response()->json([
            'platform'        => $message->platform,
            'username_number' => $message->username_number,
            'icon'            => $message->icon,
            'url'             => $message->url,
        ]);
    }

    public function update(Request $request, M_message $message)
    {
        try {
            $request->validate([
                'name'    => 'required|string|max:255',
                'email'   => 'required|string|max:255',
                'message' => 'required|string',
            ]);

            $data = $request->all();
            $message->update($data);

            return redirect()->route('messages.index')->with('success', 'Data updated successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data failed to update, please check again.')->withErrors($e->validator)->withInput();
        }
    }

    public function destroy(M_message $message)
    {
        try {
            $message->delete();
            return redirect()->route('messages.index')->with('success', 'Data deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('messages.index')->with('error', 'Data failed to delete.');
        }
    }

    public function notification(Request $request)
    {
        if ($request->ajax()) {
            $messages          = M_message::latest()->take(10)->get();
            $formattedMessages = $messages->map(function ($notification) {
                return [
                    'uuid'    => $notification->uuid,
                    'name'    => $notification->name,
                    'email'   => $notification->email,
                    'timeAgo' => $notification->created_at->diffForHumans(),
                ];
            });

            return response()->json(['messages' => $formattedMessages]);
        }
    }
}
