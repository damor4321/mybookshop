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

use GuzzleHttp\Client;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/books', 'BookController@search');
Route::get('/books', 'BookController@index');
Route::get('/books/{id}', 'BookController@show');

Route::group(['middleware' => 'auth:web'], function() {

    Route::get('/addresses/create', 'AddressController@create');
    Route::get('/addresses/{id}/delete', 'AddressController@destroy');
    Route::get('/addresses', 'AddressController@index')->name('addresses');
    Route::get('/addresses/{id}', 'AddressController@show');
    Route::post('/addresses', 'AddressController@add');
    Route::post('/addresses/update', 'AddressController@update');

    Route::get('/purchases', 'PurchaseController@index');
    Route::get('/purchases/{id}', 'PurchaseController@show');    
    Route::post('/purchases/create', 'PurchaseController@create');
    Route::post('/purchases', 'PurchaseController@add');
    
});

    

//Auth::routes();
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/home', 'HomeController@index')->name('home');
