<?php

use Illuminate\Support\Facades\Route;

// calm template
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/invitations/calm_template/edit/{invitation_uuid}', [App\Http\Controllers\Template\C_calm_template::class, 'edit'])->name('invitations.calm_template.edit');
    Route::match(['post', 'put'], '/invitations/calm_template/action_wedding_couple/{uuid?}', [App\Http\Controllers\Template\C_calm_template::class, 'action_wedding_couple'])->name('invitations.calm_template.action_wedding_couple');
    Route::match(['post', 'put'], '/invitations/calm_template/action_quote/{uuid?}', [App\Http\Controllers\Template\C_calm_template::class, 'action_quote'])->name('invitations.calm_template.action_quote');
    Route::match(['post', 'put'], '/invitations/calm_template/action_event/{uuid?}', [App\Http\Controllers\Template\C_calm_template::class, 'action_event'])->name('invitations.calm_template.action_event');
    Route::match(['post', 'delete'], '/invitations/calm_template/action_love_story/{uuid?}', [App\Http\Controllers\Template\C_calm_template::class, 'action_love_story'])->name('invitations.calm_template.action_love_story');
    Route::match(['post', 'put'], '/invitations/calm_template/action_streaming/{uuid?}', [App\Http\Controllers\Template\C_calm_template::class, 'action_streaming'])->name('invitations.calm_template.action_streaming');
    Route::match(['post', 'delete'], '/invitations/calm_template/action_gift/{uuid?}', [App\Http\Controllers\Template\C_calm_template::class, 'action_gift'])->name('invitations.calm_template.action_gift');
    Route::match(['post', 'delete'], '/invitations/calm_template/action_gallery/{uuid?}', [App\Http\Controllers\Template\C_calm_template::class, 'action_gallery'])->name('invitations.calm_template.action_gallery');
    Route::match(['post', 'put'], '/invitations/calm_template/action_audio/{uuid?}', [App\Http\Controllers\Template\C_calm_template::class, 'action_audio'])->name('invitations.calm_template.action_audio');
    Route::match(['post', 'put'], '/invitations/calm_template/action_closing/{uuid?}', [App\Http\Controllers\Template\C_calm_template::class, 'action_closing'])->name('invitations.calm_template.action_closing');
    Route::match(['post', 'delete'], '/invitations/calm_template/action_guest/{uuid?}', [App\Http\Controllers\Template\C_calm_template::class, 'action_guest'])->name('invitations.calm_template.action_guest');
});

Route::get('/invitations/calm_template/play_audio/{directory}/{filename}', [App\Http\Controllers\Template\C_calm_template::class, 'play_audio'])->name('invitations.calm_template.play_audio');
Route::post('/invitations/calm_template/send_message', [App\Http\Controllers\Template\C_calm_template::class, 'send_message'])->name('invitations.calm_template.send_message');
Route::get('/invitations/calm_template/get_message/{invitation_id}', [App\Http\Controllers\Template\C_calm_template::class, 'get_message'])->name('invitations.calm_template.get_message');
Route::match(['delete'], '/invitations/calm_template/action_message/{uuid?}', [App\Http\Controllers\Template\C_calm_template::class, 'action_message'])->name('invitations.calm_template.action_message');

// sideright template
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/invitations/sideright_template/edit/{invitation_uuid}', [App\Http\Controllers\Template\C_sideright_template::class, 'edit'])->name('invitations.sideright_template.edit');
    Route::match(['post', 'put'], '/invitations/sideright_template/action_cover/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_cover'])->name('invitations.sideright_template.action_cover');
    Route::match(['post', 'put'], '/invitations/sideright_template/action_wedding_couple/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_wedding_couple'])->name('invitations.sideright_template.action_wedding_couple');
    Route::match(['post', 'put'], '/invitations/sideright_template/action_quote/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_quote'])->name('invitations.sideright_template.action_quote');
    Route::match(['post', 'put'], '/invitations/sideright_template/action_event/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_event'])->name('invitations.sideright_template.action_event');
    Route::match(['post', 'delete'], '/invitations/sideright_template/action_love_story/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_love_story'])->name('invitations.sideright_template.action_love_story');
    Route::match(['post', 'put'], '/invitations/sideright_template/action_streaming/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_streaming'])->name('invitations.sideright_template.action_streaming');
    Route::match(['post', 'delete'], '/invitations/sideright_template/action_gift/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_gift'])->name('invitations.sideright_template.action_gift');
    Route::match(['post', 'delete'], '/invitations/sideright_template/action_gallery/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_gallery'])->name('invitations.sideright_template.action_gallery');
    Route::match(['post', 'put'], '/invitations/sideright_template/action_audio/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_audio'])->name('invitations.sideright_template.action_audio');
    Route::match(['post', 'put'], '/invitations/sideright_template/action_closing/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_closing'])->name('invitations.sideright_template.action_closing');
    Route::match(['post', 'delete'], '/invitations/sideright_template/action_guest/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_guest'])->name('invitations.sideright_template.action_guest');
});

Route::get('/invitations/sideright_template/play_audio/{directory}/{filename}', [App\Http\Controllers\Template\C_sideright_template::class, 'play_audio'])->name('invitations.sideright_template.play_audio');
Route::post('/invitations/sideright_template/send_message', [App\Http\Controllers\Template\C_sideright_template::class, 'send_message'])->name('invitations.sideright_template.send_message');
Route::get('/invitations/sideright_template/get_message/{invitation_id}', [App\Http\Controllers\Template\C_sideright_template::class, 'get_message'])->name('invitations.sideright_template.get_message');
Route::match(['delete'], '/invitations/sideright_template/action_message/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_message'])->name('invitations.sideright_template.action_message');
