<?php

use App\Http\Controllers\SubscriberController;
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


Route::get('/privacy', function () {
    return true;
    dd('ok privacy');
});

Route::get('/terms', function () {
    return true;
    dd('ok terms');
});
