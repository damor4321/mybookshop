<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::post('books/search', 'Api\BookController@search')->name('books.search');
});
        
Route::group(['middleware' => 'auth:api'], function() {
    Route::resource('books', 'Api\BookController');    
});


Route::group(['middleware' => 'auth:api'], function() {
    Route::post('addresses/search', 'Api\AddressController@search')->name('addresses.search');
    Route::post('addresses', 'Api\AddressController@store')->name('addresses.store');
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::resource('addresses', 'Api\AddressController');
});
        
Route::group(['middleware' => 'auth:api'], function() {
    Route::post('purchases/search', 'Api\PurchaseController@search')->name('purchases.search');
    Route::post('purchases', 'Api\PurchaseController@store')->name('purchases.store');
});
    
Route::group(['middleware' => 'auth:api'], function() {
    Route::resource('purchases', 'Api\PurchaseController');
});
            
    