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
//Check admin
Route::group(['middleware'=>'Check'], function(){
//add user
Route::get('add', 'AdminController@getAdd');
Route::post('add', 'AdminController@postAdd');
//edit
Route::get('/edit/{user_id}', 'AdminController@getEdit');
Route::post('/edit/{user_id}', 'AdminController@postEdit');
//admin
Route::get('/admin', 'AdminController@admin');
//del
Route::get('/del/{user_id}', 'AdminController@del');
});

//Check login
Route::group(['middleware'=>'CheckUser'], function(){
//Login
Route::get('login', 'LoginController@formLogin');
Route::post('login', 'LoginController@login');
});

//Logout
Route::get('logout', 'LoginController@logout');


