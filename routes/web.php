<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\PermissionController;

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
Route::group(['middleware' => 'admin.redirect'], function(){
    Route::get('/admin/login', [AdminAuthController::class, 'LoginPage']) -> name('admin.login.page');
    Route::post('/admin-login', [AdminAuthController::class, 'Login']) -> name('admin.login');    
});

//admin page route

Route::group(['middleware' => 'admin'], function(){
    Route::get('/deshboard', [AdminPageController::class, 'DeshboardShow']) -> name('admin.deshboard.page');
    Route::get('/logout', [AdminAuthController::class, 'LogOut']) -> name('admin.logout');

    //user permisssion route
    Route::resource('/permission', PermissionController::class);
     
    //role permmission route 

    Route::resource('/role', RoleController::class);
    
    //admin user resource route 
    Route::resource('/admin-user', AdminController::class);
    Route::get('/status/update/{id}', [AdminController::class, 'StatusUpdate']) -> name('admin.status.update');
    Route::get('/trash/update/{id}', [AdminController::class, 'TrashUpdate']) -> name('admin.trash.update');
    Route::get('/trash/admin', [AdminController::class, 'UserTrash']) -> name('admin.trash');

});

Route::get('/' , function (){
    return view('comet.pages.home');
});
