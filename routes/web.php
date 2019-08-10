<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','PagesController@index')->middleware('auth')->name('home');
Route::get('/kasir','PagesController@kasir')->name('kasir');
Route::get('/report','PagesController@report')->name('report');
Route::get('/transaction/struk','PagesController@invoice')->name('invoice');
Route::get('/transaction/struk/{id}','PagesController@struk')->name('print-invoice');
Route::get('/report/delete/{id}','PagesController@deleteReport')->name('delete-report');
Route::get('/report/search','PagesController@searchReport')->name('search-report');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('homes');

Route::post('/add/to/cart','CartController@store')->name('add-to-cart');
Route::get('/delete/item/{id}','CartController@delete')->name('delete-cart');
Route::post('/update/Tjumlah/{id}','CartController@updatejumlah')->name('update-jumlah');
Route::post('/cart/transaksi','CartController@addToOrder')->name('add-to-order');

    Route::middleware('admin')->group(function(){
        
        Route::middleware('admin')->get('/admin','PagesController@admin')->name('dashboard');
        
        Route::get('/admin/type-laundry','TypeLaundryController@index')->name('type');
        Route::get('/admin/create/type','TypeLaundryController@create')->name('create-type');
        Route::post('/admin/create_type','TypeLaundryController@store')->name('store-type');
        Route::get('/   admin/delete/type/{id}','TypeLaundryController@delete')->name('delete-type');
        Route::get('/admin/edit/type/{id}','TypeLaundryController@edit')->name('edit-type');
        Route::post('/admin/update/type/{id}','TypeLaundryController@update')->name('update-type');

        Route::get('/admin/laundry','LaundryController@index')->name('laundry');
        Route::get('/admin/create/laundry','LaundryController@create')->name('create-laundry');
        Route::post('/admin/create_laundry','LaundryController@store')->name('store-laundry');
        Route::get('/admin/delete/laundry/{id}','LaundryController@delete')->name('delete-laundry');
        Route::get('/admin/edit/laundry/{id}','LaundryController@edit')->name('edit-laundry');
        Route::post('/admin/update/laundry/{id}','LaundryController@update')->name('update-laundry');
        
        Route::get('/admin/report','PagesController@adminReport')->name('admin-report');
        Route::get('/admin/report/search','PagesController@searchAdminReport')->name('search-admin-report');
        
    });