<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false, 'password.request' => false, 'reset' => false]);


Route::get('/', 'HomeController@index')->name('home');

Route::get('/serials', 'SerialController@index')->name('serials.index');
Route::get('/serials/import', 'SerialController@importForm')->name('serials.import.form');
Route::get('/serials/{serial}', 'SerialController@show')->name('serials.show');
Route::post('/serials/import', 'SerialController@import')->name('serials.import.post');

Route::get('/reports', 'ReportController@index')->name('reports.index');
Route::get('/reports/import', 'ReportController@importForm')->name('reports.import.form');
Route::get('/reports/export', 'ReportController@export')->name('reports.export');
Route::post('/reports', 'ReportController@store')->name('reports.store');
Route::post('/reports/import', 'ReportController@import')->name('reports.import.post');

Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/users/create', 'UserController@create')->name('users.create');
Route::get('/users/import', 'UserController@importForm')->name('users.import.form');
Route::get('/users/{user}/reports/export', 'UserController@export')->name('users.reports.export');
Route::post('/users/import', 'UserController@import')->name('users.import.post');

Route::get('/regates', 'RegateController@index')->name('regates.index');
Route::get('/regates/{code}', 'RegateController@show')->name('regates.show');
Route::get('/regates/{code}/reports/export', 'RegateController@export')->name('regates.reports.export');

Route::get('/brands', 'BrandController@index')->name('brands.index');

Route::get('/products', 'ProductController@index')->name('products.index');