<?php

use App\Http\Controllers\BotController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\WhatsAppController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::post('/subscribe', [SubscriberController::class, 'newSubscribtion'])->name('subscribe');

Route::get('tester', [WhatsAppController::class, 'tester']);

Route::get('/privacy', function () {
    return true;
    dd('ok privacy');
});

Route::get('/terms', function () {
    return true;
    dd('ok terms');
});


Route::controller(BotController::class)->group(function () {

    Route::get('/send-message', 'sendTextMessage')->name('send-message');
    Route::get('/send-reply-to-text-message', 'sendReplyToTextMessage')->name('send-reply-to-text-message');
    Route::get('/send-text-message-with-preview-url', 'sendRTextMessageWithPreviewUrl')->name('send-text-message-with-preview-url');
    Route::get('/send-image-message-by-id', 'sendImageMessageById')->name('send-image-message-by-id');
    Route::get('/send-reply-to-image-message-by-id', 'sendReplyToImageMessageById')->name('send-reply-to-image-message-by-id');
    Route::get('send-image-message-by-url', 'sendImageMessageByURL')->name('send-image-message-by-url');
});
