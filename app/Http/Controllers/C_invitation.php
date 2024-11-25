<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\M_invitation;

class C_invitation extends Controller
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
            $query = M_invitation::with('transaction', 'transaction.transaction_status', 'transaction.template.template_type')->select('*')->orderBy('id', 'desc');
            if ($role_id == 4) {
                $query->whereHas('transaction', function ($transactionQuery) use ($user_id) {
                    $transactionQuery->where('user_id', $user_id);
                });
            }
            $invitations = $query->get();

            return DataTables::of($invitations)
                ->addColumn('transaction_status_id', function ($invitation) {
                    return  $invitation->transaction->transaction_status->id ?? 'N/A';
                })
                ->addColumn('transaction_status_name', function ($invitation) {
                    return  $invitation->transaction->transaction_status->transaction_status_name ?? 'N/A';
                })
                ->addColumn('transaction_code', function ($invitation) {
                    return  $invitation->transaction->transaction_code ?? 'N/A';
                })
                ->addColumn('template_type_name', function ($invitation) {
                    return  $invitation->transaction->template->template_type->template_type_name ?? 'N/A';
                })
                ->addColumn('template_name', function ($invitation) {
                    return  $invitation->transaction->template->template_name ?? 'N/A';
                })
                ->addColumn('parameter', function ($invitation) {
                    return  $invitation->transaction->template->parameter ?? 'N/A';
                })
                ->addColumn('transaction_uuid', function ($invitation) {
                    return  $invitation->transaction->uuid ?? 'N/A';
                })
                ->addColumn('invitation_expired_date', function ($invitation) {
                    return  $invitation->transaction->invitation_expired_date ?? 'N/A';
                })
                ->addColumn('show_invitation_url', function ($invitation) {
                    return $invitation->id . '/' . ($invitation->wedding_couple ? $invitation->wedding_couple->bride_nickname . '&' . $invitation->wedding_couple->groom_nickname : '');
                })
                ->make(true);
        } else {
            $menus = $this->menuService->getMenus($role_id);
        }

        return view('invitation.V-index-invitation', compact('menus'));
    }

    public function destroy(M_invitation $invitation)
    {
        try {
            DB::beginTransaction();

            $invitation->delete();

            DB::commit();
            return redirect()->route('invitations.index')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('invitations.index')->with('error', 'Data gagal dihapus.');
        }
    }

    public function show_invitation(string $invitation_id, string $wedding_couple = null, string $guest_name = null)
    {
        $invitation = M_invitation::with([
            'transaction',
            'transaction.template',
            'cover',
            'wedding_couple',
            'quote',
            'event',
            'love_stories',
            'streaming',
            'gifts',
            'galleries',
            'audio',
            'closing',
            'guests',
            'messages',
        ])->where('id', $invitation_id)->first();

        return view('invitation.' . $invitation->transaction->template->parameter . '.V-' . $invitation->transaction->template->template_code, compact('invitation', 'guest_name'));
    }
}
