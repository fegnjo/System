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

Route::get('/', 'MainController@home')->name('home');

Route::get('/create', 'MainController@create')->name('create');

Route::post('/create/new', 'MainController@create_new')->name('create_new');

Route::get('/update/{id}', 'MainController@update')->name('update');

Route::get('/delete/{id}', 'MainController@delete')->name('delete');

Route::post('/update/{id}/new', 'MainController@update_new')->name('update_new');

Route::get('/client/{id}', 'MainController@client')->name('client');

Route::get('/client/updateCar/{id}', 'MainController@updateCar')->name('updateCar');

Route::post('/client/updateCarNew/{id}', 'MainController@updateCarNew')->name('updateCarNew');

Route::get('/client/deleteCar/{id}', 'MainController@deleteCar')->name('deleteCar');

Route::get('/createAuto/{id}', 'MainController@createAuto')->name('createAuto');

Route::post('/createAuto/{id}/new', 'MainController@createAutoNew')->name('createAutoNew');

Route::get('/parking', 'MainController@parking')->name('parking');

Route::post('/parking/create', 'MainController@parking_create')->name('parking_create');

Route::post('/content', 'MainController@content')->name('content');

Route::post('/contentTwo', 'MainController@contentTwo')->name('contentTwo');

Route::post('/status', 'MainController@status')->name('status');



