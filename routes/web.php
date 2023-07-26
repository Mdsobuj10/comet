<?php

use App\Models\Admin;
use App\Models\Slider;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Frontend\FrontendPagesController;

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
    
    //slider resource  route 
    Route::resource('/slider', SliderController::class);
    Route::get('/slider/status/update/{id}', [SliderController::class, 'StatusUpdateSlider']) -> name('slider.status.update');
    //testimonials resource route
    Route::resource('/testimonial', TestimonialController::class);
    Route::get('/testimonia/status/update/{id}', [TestimonialController::class, 'StatusUpdatetesTimonial']) -> name('testimonial.status.update');
    //clients route 
    Route::resource('/client', ClientsController::class);
    Route::get('/client/status/update/{id}', [ClientsController::class, 'StatusUpdatetesClient']) -> name('client.status.update');
    //contact route
    Route::resource('/contacts', ContactsController::class);
    //category route 
    Route::resource('/categorys', CategoryController::class);
    Route::get('/categorys/status/update/{id}', [CategoryController::class, 'CategoryUpdatetesClient']) -> name('cetagory.status.update');
    
    //protfolio route 
    Route::resource('/portflio', PortfolioController::class);

});

//frontend page controllers 
Route::get('/', [FrontendPagesController::class, 'HomePages']) -> name('home.page');
Route::get('/contact', [FrontendPagesController::class, 'ContactPages']) -> name('contact.page');