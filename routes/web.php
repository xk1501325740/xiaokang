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

Route::get('/index', 'TextController@profile');

Route::group(['namespace' => 'admin'], function () {

    Route::get('admin/user','UserController@index');
    Route::get('admin/ceshi','UserController@ceshi');
    Route::any('admin/add','UserController@create');
    Route::any('admin/up','UserController@up');
    Route::get('admin/del','UserController@del');
    Route::any('admin/phone','UserController@file');

});








