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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/serials', 'SerialController@index')->name('serials.index');
Route::get('/serials/import', 'SerialController@importForm')->name('serials.import.form');
Route::post('/serials/import', 'SerialController@import')->name('serials.import.post');

Route::get('/reports', 'ReportController@index')->name('reports.index');
Route::get('/reports/import', 'ReportController@importForm')->name('reports.import.form');
Route::post('/reports/import', 'ReportController@import')->name('reports.import.post');

Route::get('/regates', 'RegateController@index')->name('regates.index');

Route::get('/brands', 'BrandController@index')->name('brands.index');

Route::get('/products', 'ProductController@index')->name('products.index');