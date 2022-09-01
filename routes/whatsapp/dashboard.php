<?php

use App\Http\Controllers\Dashboard\DashboardController;
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

Route::get('/admin', [DashboardController::class, 'home'])->name('admin.home');

Route::controller(DashboardController::class)->prefix('admin')->as('admin.')->group(function () {
    Route::get('home', 'home')->name('home');
    Route::get('bots', 'bots')->name('bots');
    Route::get('users', 'users')->name('users');
    Route::get('user-images/{user}', 'imagesUser')->name('user-images');
    Route::get('user-texts/{user}', 'textsUser')->name('user-texts');

});



