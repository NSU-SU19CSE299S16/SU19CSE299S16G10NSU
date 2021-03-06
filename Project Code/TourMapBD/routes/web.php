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

Route::group(['middleware'=>'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/profile/{id}', 'UserController@show')->where('id','[0-9]+');

    Route::get('users', 'UserController@index');

    Route::get('payment', 'PaymentController@create');
    Route::post('stripe/charge','PaymentController@pay');
});


