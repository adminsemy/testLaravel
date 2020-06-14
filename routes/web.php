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

Route::get('/', function() {
    return view('welcome');
});
Route::get('/weather/{city}', 'WeatherController@show')->name('weather');
Route::get('/orders', 'OrderController@index')->name('listOrders');
Route::get('/order/edit/{order}', 'OrderController@edit')->name('order.edit');
Route::post('/order/update/{order}', 'OrderController@update')->name('order.update');