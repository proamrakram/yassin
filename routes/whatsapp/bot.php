<?php

use App\Http\Controllers\Bot\BotController;
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

Route::controller(BotController::class)->prefix('bot')->as('bot.')->group(function () {

    Route::get('sendTo', 'testSending')->name('send-to');

    Route::post('reply-to-message/{wa_user}/{message_id}', 'sendReplyToTextMessage')->name('reply-to-message');
    Route::post('send-text-message/{wa_user}', 'sendTextMessage')->name('send-text-message');

    Route::post('send-new-image-message/{wa_user}', 'sendImageMessage')->name('send-new-image-message');
    Route::post('send-image-message/{wa_user}', 'sendImageMessagebyID')->name('send-image-message');

});









