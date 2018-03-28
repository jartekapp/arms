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

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('home.edit');

Route::put('/admin', 'AdminController@update')->name('home.update');

Route::post('/signup', 'SignupController@store')->name('signup');

Route::get('/{slug?}', 'PageController@show');
