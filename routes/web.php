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

Route::get('/home', 'HomeController@index');
Route::get('/admin', 'Admin\LoginController@index')->middleware('auth:web,admin');
Route::post('admin/login', 'Admin\LoginController@login');
Route::get('admin/logout', 'Admin\LoginController@logout');
Route::get('admin/dashboard', 'Admin\DashboardController@index');

Route::group(['namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('category', 'CategoryController');
        Route::resource('product', 'ProductController');
    });
});

Route::group(['namespace' => 'Web'], function () {
   Route::group(['prefix' => 'product'], function () {
       Route::get('/', 'ProductController@index');
       Route::get('/{slug}', 'ProductController@detail');
   });

   Route::group(['prefix' => 'cart'], function () {
      Route::get('/', 'CartController@index');
      Route::post('/', 'CartController@store');
      Route::get('/delete/{id}', 'CartController@delete');
      Route::post('/change_qty', 'CartController@change_qty');
   });

   Route::group(['prefix' => 'checkout'], function () {
      Route::get('/', 'CheckoutController@index');
      Route::post('/', 'CheckoutController@store');
   });

    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', 'OrderController@index');
        Route::get('/pay', 'OrderController@pay');
        Route::post('/paid', 'OrderController@paid');
    });
});

Auth::routes(['verify' => true]);
Route::get('/', 'Web\ProductController@index');