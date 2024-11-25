<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\MenuService;
use App\Models\M_transaction;

class DashboardController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index()
    {
        $role_id = Auth::user()->role_id;
        $user_id = Auth::user()->id;

        $menus = $this->menuService->getMenus($role_id);

        return view('dashboard.V-index-dashboard', compact('menus'));
    }
}
