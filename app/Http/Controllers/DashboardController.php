<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\MenuService;
use App\Models\M_template;

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

        $menus = $this->menuService->getMenus($role_id);
        $templates = M_template::orderBy('id', 'desc')->get();

        return view('dashboard.index_dashboard', compact('menus', 'templates'));
    }
}
