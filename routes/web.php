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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'Web\HomeController@index');
Route::get('/admin', 'Admin\LoginController@index');
Route::post('admin/login', 'Admin\LoginController@login');
Route::get('admin/logout', 'Admin\LoginController@logout');
Route::get('admin/dashboard', 'Admin\DashboardController@index');
Route::group(['namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('category', 'CategoryController');
    });
});