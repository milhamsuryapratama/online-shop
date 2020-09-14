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

Route::get('/admin', 'Admin\LoginController@index');
Route::get('/home', 'HomeController@index');
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
});

Auth::routes(['verify' => true]);
Route::get('/', 'Web\ProductController@index');