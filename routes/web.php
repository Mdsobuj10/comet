<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//admin auth route

Route::get('/admin/login', [AdminAuthController::class, 'LoginPage']) -> name('admin.login.page');
Route::post('/admin-login', [AdminAuthController::class, 'Login']) -> name('admin.login');

//admin page route
Route::get('/deshboard', [AdminPageController::class, 'DeshboardShow']) -> name('admin.deshboard.page');