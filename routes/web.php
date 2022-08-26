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
    return view('index');
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
    Route::get('/reply-to-message/{message_id}', 'replyToMessage')->name('reply-to-message');
    Route::get('/send-text-message', 'sendTextMessage')->name('send-text-message');
    Route::get('/send-file-message/{file_id}', 'sendFileUsingCloudAPIID')->name('send-file-message');
    Route::get('/send-file-message-url', 'sendFileUsingURL')->name('send-file-message-url');
});
