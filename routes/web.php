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

Route::get('admin', 'AdminController@index')->name('home.edit');

Route::get('admin/{slug}', 'AdminController@index')->name('page.edit');

Route::put('admin', 'AdminController@update')->name('home.update');

Route::put('admin/{slug}', 'AdminController@update')->name('page.update');

Route::post('signup', 'SignupController@store')->name('signup');

Route::post('contact', 'ContactController@store')->name('contact');

Route::resource('admin/resources', 'ResourceController');

Route::get('{slug?}', 'PageController@show')->name('page');
