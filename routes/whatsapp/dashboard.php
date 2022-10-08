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
Route::get('/admin/bots', [DashboardController::class, 'bots'])->name('admin.bots');
Route::get('/admin/users', [DashboardController::class, 'users'])->name('admin.users');
Route::get('/user-texts/{user}', [DashboardController::class, 'textsUser'])->name('admin.user-texts');
Route::get('user-images/{user}', [DashboardController::class, 'imagesUser'])->name('admin.user-images');
Route::get('bot-templates/{bot}', [DashboardController::class, 'templates'])->name('admin.bot-templates');

