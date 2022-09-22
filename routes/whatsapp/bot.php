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

    //Messages Text
    Route::post('reply-to-message/{wa_user}/{message_id}', 'sendReplyToTextMessage')->name('reply-to-message');
    Route::post('send-text-message/{wa_user}', 'sendTextMessage')->name('send-text-message');

    //Images
    Route::post('send-new-image-message/{wa_user}', 'sendImageMessage')->name('send-new-image-message');
    Route::post('send-image-message/{wa_user}', 'sendImageMessagebyID')->name('send-image-message');
    Route::get('send-imag-message-by-id/{wa_user}/{wa_image_id}', 'sendImageMessagebyID')->name('send-imag-message-by-id');

    //Templates
    Route::get('/send-template-message-with-header-image', 'sendTemplateMessagewithHeaderImage');
    Route::get('/send-template-message-with-header-document', 'sendTemplateMessageWithHeaderDocument');


    Route::post('create-template', 'createTemplateMessage')->name('create-template');
    Route::get('send-template-test', 'sendTemplateMessageTest');
});
