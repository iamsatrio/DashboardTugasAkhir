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

Auth::routes();

Route::get('/matkulMengulang','MahasiswaController@matkulMengulang')->name('matkulMengulang');
Route::get('/performa','MahasiswaController@performa')->name('performa');
Route::get('/detailMatkulMengulang','MahasiswaController@detailMatkulMengulang')->name('detailMatkulMengulang');
Route::get('/chart','MahasiswaController@chart')->name('chart');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/importExcel', 'MahasiswaController@importExcel')->name('importExcel');
