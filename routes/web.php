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
        //
        Route::post('/addMenu','addMenu')->name('Admin.addMenu');
        //
        Route::get('/delete_menu/{id}','delete_menu')->name('Admin.delete_menu');
         //
         Route::get('/count_add/{id}','count_add')->name('Admin.count_add');
          //
          Route::get('/count_sub/{id}','count_sub')->name('Admin.count_sub');
    });

    Route::controller(categoryController::class)->group(function(){
       //
       Route::get('/view_category','view_category')->name('Admin.view_category');
       //
       Route::get('/add_category','add_category')->name('Admin.add_category');
    });

    Route::controller(MenuController::class)->group(function(){
       //
       Route::get('/view_menu','view_menu')->name('Admin.view_menu');
       //
       Route::get('/add_menu','add_menu')->name('Admin.add_menu');
    });
});

Route::view('/invoice', 'invoice.invoice');