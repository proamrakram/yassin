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

require __DIR__ . '/whatsapp/dashboard.php';


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

    Route::get('/send-text-message', 'sendTextMessage')->name('send-text-message');

    Route::get('/send-text-message-with-preview-url/{message_id}', 'sendTextMessagewithPreviewURL')->name('send-text-message-with-preview-url');

    Route::get('/send-reply-to-tex-message/{message_id}','sendReplyToTextMessage')->name('send-reply-to-tex-message');

});
