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

Route::controller(AdminController::class)->group(function () {
    //
    Route::get('/', 'Login')->name('Admin.login');
    //
    Route::post('/login_check', 'login_check')->name('Admin.login_check');
    //
    Route::get('/logout', 'Logout')->name('Admin.Logout');

});

Route::middleware('isLogin')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        //
        Route::get('/Profile', 'Profile')->name('Admin.Profile');
        //
        Route::get('/Change_Password', 'Change_Password')->name('Admin.Change_Password');
        //
        Route::post('/Changed_Password', 'Changed_Password')->name('Admin.Changed_Password');
    });
    Route::controller(TableController::class)->group(function () {
        //
        Route::get('/Dashbroad', 'Dashbroad')->name('Admin.Dashbroad');
        //
        Route::get('/Billing/{id}', 'Billing')->name('Admin.Billing');
        //
        Route::get('/Billing2/{id}', 'Billing2')->name('Admin.Billing2');
        //
        Route::post('/addMenu2', 'addMenu2')->name('Admin.addMenu2');
        //
        Route::post('/addMenu', 'addMenu')->name('Admin.addMenu');
        //
        Route::get('/delete_menu/{id}', 'delete_menu')->name('Admin.delete_menu');
        //
        Route::get('/count_add/{id}', 'count_add')->name('Admin.count_add');
        //
        Route::get('/count_sub/{id}', 'count_sub')->name('Admin.count_sub');
        //
        Route::get('/Billing_print/{id}', 'Billing_print')->name('Admin.Billing_print');
        //
        Route::get('/Kitchen/{id}', 'Kitchen')->name('Admin.Kitchen');
        //
        Route::post('/search_menu', 'search_menu')->name('Admin.search_menu');
        //
        Route::get('/todeyreport', 'todeyreport')->name('Admin.todeyreport');

    });

    Route::controller(categoryController::class)->group(function () {
        //
        Route::get('/view_category', 'view_category')->name('Admin.view_category');
        //
        Route::get('/add_category', 'add_category')->name('Admin.add_category');
        //
        Route::post('/added_category', 'added_category')->name('Admin.added_category');
         //
         Route::get('/delete_category/{id}', 'delete_category')->name('Admin.delete_category');
    });

    Route::controller(MenuController::class)->group(function () {
        //
        Route::get('/addNewMenu', 'addNewMenu')->name('Admin.addNewMenu');
        //
        Route::get('/add_menu', 'add_menu')->name('Admin.add_menu');
        // route for public menu
        Route::get('/public_menu', 'public_menu')->name('Admin.public_menu');
        //
        Route::post('/added_menu', 'added_menu')->name('Admin.added_menu');
    });
});
Route::get('/menus', [MenuController::class, 'view_public_menu']);