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

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');


Route::group([
    'middleware'    => 'auth'
], function () {
    Route::get('/', 'Passport\ClientController@index');
    Route::get('/client/create', 'Passport\ClientController@create');
    Route::post('/client', 'Passport\ClientController@store');
});
