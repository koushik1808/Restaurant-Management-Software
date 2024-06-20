<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SattingController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;

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

Route::controller(UserController::class)->group(function () {
    //
    Route::get('/User_Login', 'User_Login')->name('User.login');
    //
    Route::post('/User_login_check', 'login_check')->name('User.login_check');
    //
    Route::get('/User_logout', 'Logout')->name('User.Logout');
    //
    Route::get('/User_register', 'User_register')->name('User.register');
    //
    Route::post('/User_register_check', 'User_register_check')->name('User.register_check');

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

    Route::controller(UserController::class)->group(function () {
        //
        Route::get('/User_details', 'User_details')->name('User.details');
        //
        Route::get('/user_lock_account1/{id}', 'user_lock_account1')->name('User.lock_account1');
        //
        Route::get('/user_unlock_account/{id}', 'user_unlock_account')->name('User.unlock_account');
         //
         Route::get('/user_Degrade_account1/{id}', 'user_Degrade_account1')->name('User.Degrade_account1');
         //
         Route::get('/user_Upgrade_account/{id}', 'user_Upgrade_account')->name('User.Upgrade_account');
         //
            Route::get('/User_Profile', 'User_Profile')->name('User.Profile');

    });

    Route::controller(TableController::class)->group(function () {
        //
        Route::get('/Dashbroad', 'Dashbroad')->name('Admin.Dashbroad');
        //
        Route::get('/User_Dashbroad', 'User_Dashbroad')->name('User.Dashbroad');
        //
        Route::get('/Billing/{id}', 'Billing')->name('Admin.Billing');
        //
        Route::get('/User_Billing/{id}', 'User_Billing')->name('User.Billing');
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
        Route::get('/Billing_print2/{id}', 'Billing_print2')->name('Admin.Billing_print2');
        //
        Route::get('/cancelBilling/{id}', 'cancelBilling')->name('Admin.cancelBilling');
        //
        Route::get('/Kitchen/{id}', 'Kitchen')->name('Admin.Kitchen');
        //
        Route::post('/search_menu', 'search_menu')->name('Admin.search_menu');
         //
         Route::post('/count_add_item', 'count_add_item')->name('Admin.count_add_item');
        //
        Route::get('/todeyreport', 'todeyreport')->name('Admin.todeyreport');
        //
        Route::get('/monthreport', 'monthreport')->name('Admin.monthreport');
        //
        Route::post('/customdate', 'customdate')->name('Admin.customdate');
        //
        Route::get('/customreport', 'customreport')->name('Admin.customreport');
        //
        Route::get('/MenuRepoet/{id}', 'MenuRepoet')->name('Admin.MenuRepoet');
        //
        Route::post('/Add_Client', 'Add_Client')->name('Admin.Add_Client');
        //
        Route::get('/Add_table', 'Add_table')->name('Admin.Add_table');
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
        // route for delete public menu
        Route::get('/public_menu_delete/{id}', 'public_menu_delete')->name('Admin.public_menu_delete');
    });
    Route::controller(SattingController::class)->group(function () {
        //
        Route::get('/setting_view', 'setting_view')->name('Admin.setting_view');
        //
        Route::post('/gstUpdate', 'gstUpdate')->name('Admin.gstUpdate');
        //
        Route::post('/discountUpdate', 'discountUpdate')->name('Admin.discountUpdate');
        //
        Route::get('/gstUpdate1/{id}', 'gstUpdate1')->name('Admin.gstUpdate1');
        //
        Route::get('/discountUpdate1/{id}', 'discountUpdate1')->name('Admin.discountUpdate1');
        //
        Route::get('/lock_account', 'lock_account')->name('Admin.lock_account');
        //
        Route::get('/lock_account1/{id}', 'lock_account1')->name('Admin.lock_account1');
        //
        Route::get('/unlock_account/{id}', 'unlock_account')->name('Admin.unlock_account');
    });
});
Route::get('/menus', [MenuController::class, 'view_public_menu']);
Route::view('/register', 'auth.register');
