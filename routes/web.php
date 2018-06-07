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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cek', function () {
    return view('layouts.admin');
});

Route::group(['prefix'=>'admin', 'Middleware'=>['auth','role:admin']], function () {
        Route::resource('user','userController');
        Route::resource('perusahaan','perusahaanController');
        Route::resource('member','memberController');
        Route::resource('lowongan','lowonganController');
});
