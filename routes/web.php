<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('home'); 
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/send-contact-form', [App\Http\Controllers\HomeController::class, 'send_contact_form'])->name('home.send-contact-form');
Route::get('/load-more-template', [App\Http\Controllers\HomeController::class, 'load_more_template'])->name('home.load-more-template');

// route auth
Auth::routes(['verify' => true, 'reset' => true]);

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (Request $request) {
    $request->user()->markEmailAsVerified();
    return redirect('/dashboard')->with('verified', true);
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'Verification link sent!');
})->middleware(['auth'])->name('verification.send');

Route::get('/email/check-email-verified', function () {
    if (Auth::check()) {
        $user = Auth::user();
        $isVerified = !is_null($user->email_verified_at);
        if ($isVerified) {
            session()->flash('verified', true);
            return response()->json(['verified' => true]);
        }
        return response()->json(['verified' => $isVerified]);
    }
    return response()->json(['error' => 'User not authenticated'], 401);
})->middleware('auth');

// route system
Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware(['notUser', 'notAffiliate'])->group(function () {
        Route::resource('menus', App\Http\Controllers\C_menu::class);

        Route::resource('menu-firsts', App\Http\Controllers\C_menu_first::class)->parameters([
            'menu-firsts' => 'menu_first:uuid'
        ]);

        Route::resource('menu-seconds', App\Http\Controllers\C_menu_second::class)->parameters([
            'menu-seconds' => 'menu_second:uuid'
        ]);

        Route::resource('roles', App\Http\Controllers\C_role::class)->parameters([
            'roles' => 'role:uuid'
        ]);

        Route::resource('settings', App\Http\Controllers\C_setting::class)->parameters([
            'settings' => 'setting:uuid'
        ]);

        Route::resource('menu-accesses', App\Http\Controllers\C_menu_access::class)->parameters([
            'menu-accesses' => 'menu_access:uuid'
        ]);

        Route::resource('users', App\Http\Controllers\C_user::class)->parameters([
            'users' => 'user:uuid'
        ]);

        Route::resource('business-profiles', App\Http\Controllers\C_business_profile::class)->parameters([
            'business-profiles' => 'business_profile:uuid'
        ]);

        Route::resource('contact-forms', App\Http\Controllers\C_contact_form::class)->parameters([
            'contact-forms' => 'contact_form:uuid'
        ]);

        Route::resource('services', App\Http\Controllers\C_service::class)->parameters([
            'services' => 'service:uuid'
        ]);

        Route::resource('vouchers', App\Http\Controllers\C_voucher::class)->parameters([
            'vouchers' => 'voucher:uuid'
        ]);

        Route::resource('templates', App\Http\Controllers\C_template::class)->parameters([
            'templates' => 'template:uuid'
        ]);

        Route::resource('transaction-statuses', App\Http\Controllers\C_transaction_status::class)->parameters([
            'transaction-statuses' => 'transaction_status:uuid'
        ]);

        Route::resource('payment-methods', App\Http\Controllers\C_payment_method::class)->parameters([
            'payment-methods' => 'payment_method:uuid'
        ]);
    });

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('profiles', App\Http\Controllers\C_profile::class)->parameters([
        'profiles' => 'profile:uuid'
    ]);

    Route::get('contact-us', [App\Http\Controllers\C_contact::class, 'show_contact_us'])->name('contacts.show-contact-us');
    Route::resource('contacts', App\Http\Controllers\C_contact::class)->parameters([
        'contacts' => 'contact:uuid'
    ]);

    Route::post('/affiliates/store-affiliate-withdrawal', [App\Http\Controllers\C_affiliate::class, 'store_affiliate_withdrawal'])->name('affiliates.store-affiliate-withdrawal');
    Route::get('/affiliates/edit-affiliate-withdrawal/{affiliate_withdrawal_uuid}', [App\Http\Controllers\C_affiliate::class, 'edit_affiliate_withdrawal'])->name('affiliates.edit-affiliate-withdrawal');
    Route::put('/affiliates/update-affiliate-withdrawal/{affiliate_withdrawal_uuid}', [App\Http\Controllers\C_affiliate::class, 'update_affiliate_withdrawal'])->name('affiliates.update-affiliate-withdrawal');
    Route::resource('affiliates', App\Http\Controllers\C_affiliate::class)->parameters([
        'affiliates' => 'affiliate:uuid'
    ]);

    Route::get('/transactions/load-more-template', [App\Http\Controllers\C_transaction::class, 'load_more_template'])->name('transactions.load-more-template');
    Route::get('/transactions/template', [App\Http\Controllers\C_transaction::class, 'template'])->name('transactions.template');
    Route::post('/transactions/store-transaction', [App\Http\Controllers\C_transaction::class, 'store_transaction'])->name('transactions.store-transaction');
    Route::get('/transactions/edit-transaction/{transaction_uuid}', [App\Http\Controllers\C_transaction::class, 'edit_transaction'])->name('transactions.edit-transaction');
    Route::put('/transactions/update-transaction/{transaction_uuid}', [App\Http\Controllers\C_transaction::class, 'update_transaction'])->name('transactions.update-transaction');
    Route::put('/transactions/update-percent-discount/{transaction_uuid}', [App\Http\Controllers\C_transaction::class, 'update_percent_discount'])->name('transactions.update-percent-discount');
    Route::put('/transactions/update-transaction-status/{transaction_uuid}', [App\Http\Controllers\C_transaction::class, 'update_transaction_status'])->name('transactions.update-transaction-status');

    Route::resource('transactions', App\Http\Controllers\C_transaction::class)->parameters([
        'transactions' => 'transaction:uuid'
    ]);

    Route::resource('invitations', App\Http\Controllers\C_invitation::class)->parameters([
        'invitations' => 'invitation:uuid'
    ]);
});

require __DIR__ . '/invitation.php';

Route::get('/{invitation_id}/{wedding_couple?}/{guest_name?}', [App\Http\Controllers\C_invitation::class, 'show_invitation'])->name('invitations.show-invitation');
