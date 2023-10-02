<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TableController;

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

Route::controller(AdminController::class)->group(function(){
    //
    Route::get('/', 'Login')->name('Admin.login');
    //
    Route::post('/login_check', 'login_check')->name('Admin.login_check');
    //
    Route::get('/logout','Logout')->name('Admin.Logout');
    
});

Route::middleware('isLogin')->group(function(){
    Route::controller(AdminController::class)->group(function(){
       
    });
    Route::controller(TableController::class)->group(function(){
         //
         Route::get('/Dashbroad','Dashbroad')->name('Admin.Dashbroad');
        //
        Route::get('/Billing/{id}','Billing')->name('Admin.Billing');
    });

    Route::controller(categoryController::class)->group(function(){
       //
       Route::get('/view_category','view_category')->name('Admin.view_category');
    });

    Route::controller(MenuController::class)->group(function(){
       //
       Route::get('/view_menu','view_menu')->name('Admin.view_menu');
    });
});

Route::view('/bill', 'bill.bill');