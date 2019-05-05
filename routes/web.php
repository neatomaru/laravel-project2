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
Route::get('/', 'HomeController@index')->name('homepage');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/updateform', 'HomeController@form');

Route::put('/edit', 'HomeController@edit');
Route::resource('homecontroller', 'HomeController');

Route::get('/profile/{id}', 'HomeController@show')->name('username');

Route::get('/addfriend', 'friendsController@add');

Route::get('/removefriend', 'friendsController@delete');

Route::get('/messages', 'MessageController@list');
Route::get('message/{id}', 'MessageController@read');


Route::get('/messageform', 'MessageController@form');

Route::post('/sendmessage', 'MessageController@send');