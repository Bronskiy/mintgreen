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

//Route::get('api/get-country-list','AddressController@getCountriesList');
Route::get('/get-state-list','AddressController@getStateList');
Route::get('/get-city-list','AddressController@getCityList');
Route::get('/get-product-list','RequestsController@getProductList');
