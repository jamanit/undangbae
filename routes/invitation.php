<?php

use Illuminate\Support\Facades\Route;

// show invitation
Route::get('/{invitation_id}/{wedding_couple?}/{guest_name?}', [App\Http\Controllers\C_invitation::class, 'show_invitation'])->name('invitations.show-invitation');

// calm template
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/invitations/calm-template/edit/{invitation_uuid}', [App\Http\Controllers\Template\C_calm_template::class, 'edit'])->name('invitations.calm-template.edit');
    Route::match(['post', 'put'], '/invitations/calm-template/action-wedding-couple/{uuid?}', [App\Http\Controllers\Template\C_calm_template::class, 'action_wedding_couple'])->name('invitations.calm-template.action-wedding-couple');
    Route::match(['post', 'put'], '/invitations/calm-template/action-quote/{uuid?}', [App\Http\Controllers\Template\C_calm_template::class, 'action_quote'])->name('invitations.calm-template.action-quote');
    Route::match(['post', 'put'], '/invitations/calm-template/action-event/{uuid?}', [App\Http\Controllers\Template\C_calm_template::class, 'action_event'])->name('invitations.calm-template.action-event');
    Route::match(['post', 'delete'], '/invitations/calm-template/action-love-story/{uuid?}', [App\Http\Controllers\Template\C_calm_template::class, 'action_love_story'])->name('invitations.calm-template.action-love-story');
    Route::match(['post', 'put'], '/invitations/calm-template/action-streaming/{uuid?}', [App\Http\Controllers\Template\C_calm_template::class, 'action_streaming'])->name('invitations.calm-template.action-streaming');
    Route::match(['post', 'delete'], '/invitations/calm-template/action-gift/{uuid?}', [App\Http\Controllers\Template\C_calm_template::class, 'action_gift'])->name('invitations.calm-template.action-gift');
    Route::match(['post', 'delete'], '/invitations/calm-template/action-gallery/{uuid?}', [App\Http\Controllers\Template\C_calm_template::class, 'action_gallery'])->name('invitations.calm-template.action-gallery');
    Route::match(['post', 'put'], '/invitations/calm-template/action-audio/{uuid?}', [App\Http\Controllers\Template\C_calm_template::class, 'action_audio'])->name('invitations.calm-template.action-audio');
    Route::match(['post', 'put'], '/invitations/calm-template/action-closing/{uuid?}', [App\Http\Controllers\Template\C_calm_template::class, 'action_closing'])->name('invitations.calm-template.action-closing');
    Route::match(['post', 'delete'], '/invitations/calm-template/action-guest/{uuid?}', [App\Http\Controllers\Template\C_calm_template::class, 'action_guest'])->name('invitations.calm-template.action-guest');
});

Route::get('/invitations/calm-template/play-audio/{directory}/{filename}', [App\Http\Controllers\Template\C_calm_template::class, 'play_audio'])->name('invitations.calm-template.play-audio');
Route::post('/invitations/calm-template/send-message', [App\Http\Controllers\Template\C_calm_template::class, 'send_message'])->name('invitations.calm-template.send-message');
Route::get('/invitations/calm-template/get-message/{invitation_id}', [App\Http\Controllers\Template\C_calm_template::class, 'get_message'])->name('invitations.calm-template.get-message');
Route::match(['delete'], '/invitations/calm-template/action-message/{uuid?}', [App\Http\Controllers\Template\C_calm_template::class, 'action_message'])->name('invitations.calm-template.action-message');

// sideright template
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/invitations/sideright-template/edit/{invitation_uuid}', [App\Http\Controllers\Template\C_sideright_template::class, 'edit'])->name('invitations.sideright-template.edit');
    Route::match(['post', 'put'], '/invitations/sideright-template/action-cover/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_cover'])->name('invitations.sideright-template.action-cover');
    Route::match(['post', 'put'], '/invitations/sideright-template/action-wedding-couple/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_wedding_couple'])->name('invitations.sideright-template.action-wedding-couple');
    Route::match(['post', 'put'], '/invitations/sideright-template/action-quote/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_quote'])->name('invitations.sideright-template.action-quote');
    Route::match(['post', 'put'], '/invitations/sideright-template/action-event/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_event'])->name('invitations.sideright-template.action-event');
    Route::match(['post', 'delete'], '/invitations/sideright-template/action-love-story/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_love_story'])->name('invitations.sideright-template.action-love-story');
    Route::match(['post', 'put'], '/invitations/sideright-template/action-streaming/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_streaming'])->name('invitations.sideright-template.action-streaming');
    Route::match(['post', 'delete'], '/invitations/sideright-template/action-gift/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_gift'])->name('invitations.sideright-template.action-gift');
    Route::match(['post', 'delete'], '/invitations/sideright-template/action-gallery/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_gallery'])->name('invitations.sideright-template.action-gallery');
    Route::match(['post', 'put'], '/invitations/sideright-template/action-audio/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_audio'])->name('invitations.sideright-template.action-audio');
    Route::match(['post', 'put'], '/invitations/sideright-template/action-closing/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_closing'])->name('invitations.sideright-template.action-closing');
    Route::match(['post', 'delete'], '/invitations/sideright-template/action-guest/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_guest'])->name('invitations.sideright-template.action-guest');
});

Route::get('/invitations/sideright-template/play-audio/{directory}/{filename}', [App\Http\Controllers\Template\C_sideright_template::class, 'play_audio'])->name('invitations.sideright-template.play-audio');
Route::post('/invitations/sideright-template/send-message', [App\Http\Controllers\Template\C_sideright_template::class, 'send_message'])->name('invitations.sideright-template.send-message');
Route::get('/invitations/sideright-template/get-message/{invitation_id}', [App\Http\Controllers\Template\C_sideright_template::class, 'get_message'])->name('invitations.sideright-template.get-message');
Route::match(['delete'], '/invitations/sideright-template/action-message/{uuid?}', [App\Http\Controllers\Template\C_sideright_template::class, 'action_message'])->name('invitations.sideright-template.action-message');


// floral template
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/invitations/floral-template/edit/{invitation_uuid}', [App\Http\Controllers\Template\C_floral_template::class, 'edit'])->name('invitations.floral-template.edit');
    Route::match(['post', 'put'], '/invitations/floral-template/action-wedding-couple/{uuid?}', [App\Http\Controllers\Template\C_floral_template::class, 'action_wedding_couple'])->name('invitations.floral-template.action-wedding-couple');
    Route::match(['post', 'put'], '/invitations/floral-template/action-quote/{uuid?}', [App\Http\Controllers\Template\C_floral_template::class, 'action_quote'])->name('invitations.floral-template.action-quote');
    Route::match(['post', 'put'], '/invitations/floral-template/action-event/{uuid?}', [App\Http\Controllers\Template\C_floral_template::class, 'action_event'])->name('invitations.floral-template.action-event');
    Route::match(['post', 'delete'], '/invitations/floral-template/action-love-story/{uuid?}', [App\Http\Controllers\Template\C_floral_template::class, 'action_love_story'])->name('invitations.floral-template.action-love-story');
    Route::match(['post', 'put'], '/invitations/floral-template/action-streaming/{uuid?}', [App\Http\Controllers\Template\C_floral_template::class, 'action_streaming'])->name('invitations.floral-template.action-streaming');
    Route::match(['post', 'delete'], '/invitations/floral-template/action-gift/{uuid?}', [App\Http\Controllers\Template\C_floral_template::class, 'action_gift'])->name('invitations.floral-template.action-gift');
    Route::match(['post', 'delete'], '/invitations/floral-template/action-gallery/{uuid?}', [App\Http\Controllers\Template\C_floral_template::class, 'action_gallery'])->name('invitations.floral-template.action-gallery');
    Route::match(['post', 'put'], '/invitations/floral-template/action-audio/{uuid?}', [App\Http\Controllers\Template\C_floral_template::class, 'action_audio'])->name('invitations.floral-template.action-audio');
    Route::match(['post', 'put'], '/invitations/floral-template/action-closing/{uuid?}', [App\Http\Controllers\Template\C_floral_template::class, 'action_closing'])->name('invitations.floral-template.action-closing');
    Route::match(['post', 'delete'], '/invitations/floral-template/action-guest/{uuid?}', [App\Http\Controllers\Template\C_floral_template::class, 'action_guest'])->name('invitations.floral-template.action-guest');
});

Route::get('/invitations/floral-template/play-audio/{directory}/{filename}', [App\Http\Controllers\Template\C_floral_template::class, 'play_audio'])->name('invitations.floral-template.play-audio');
Route::post('/invitations/floral-template/send-message', [App\Http\Controllers\Template\C_floral_template::class, 'send_message'])->name('invitations.floral-template.send-message');
Route::get('/invitations/floral-template/get-message/{invitation_id}', [App\Http\Controllers\Template\C_floral_template::class, 'get_message'])->name('invitations.floral-template.get-message');
Route::match(['delete'], '/invitations/floral-template/action-message/{uuid?}', [App\Http\Controllers\Template\C_floral_template::class, 'action_message'])->name('invitations.floral-template.action-message');
