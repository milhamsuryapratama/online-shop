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
//Route::get('/admin', 'Admin\LoginController@index')->middleware('auth:web,admin');
//Route::post('admin/login', 'Admin\LoginController@login');
Route::get('admin/logout', 'Admin\LoginController@logout');
Route::get('admin/dashboard', 'Admin\DashboardController@index');

Route::group(['namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'LoginController@index');
        Route::post('/login', 'LoginController@login');

        Route::resource('category', 'CategoryController');
        Route::resource('product', 'ProductController');

        Route::group(['prefix' => 'transaction'], function () {
           Route::get('/', 'TransactionController@index');
           Route::get('/data/{id}', 'TransactionController@detail');
           Route::post('/delivered/{id}', 'TransactionController@delivered');
        });
    });
});

Route::group(['namespace' => 'Web'], function () {
   Route::group(['prefix' => 'product'], function () {
       Route::get('/', 'ProductController@index');
       Route::get('/{slug}', 'ProductController@detail');
   });

   Route::group(['prefix' => 'cart', 'middleware' => 'auth'], function () {
      Route::get('/', 'CartController@index');
      Route::post('/', 'CartController@store');
      Route::get('/delete/{id}', 'CartController@delete');
      Route::post('/change_qty', 'CartController@change_qty');
   });

   Route::group(['prefix' => 'checkout', 'middleware' => 'auth'], function () {
      Route::get('/', 'CheckoutController@index');
      Route::post('/', 'CheckoutController@store');
   });

    Route::group(['prefix' => 'orders', 'middleware' => 'auth'], function () {
        Route::get('/', 'OrderController@index');
        Route::get('/pay', 'OrderController@pay');
        Route::post('/paid', 'OrderController@paid');
    });
});

Auth::routes(['verify' => true]);
Route::get('/', 'Web\ProductController@index');