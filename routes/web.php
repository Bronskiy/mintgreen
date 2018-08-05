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

View::share('сommonData', App\CommonData::get());
View::share('mainMenu', App\MainMenu::get());
View::share('footerMenu', App\FooterMenu::get());

Route::get('/', 'OnePageController@getHome');
Route::get('/about', 'OnePageController@getAbout');
Route::get('/thank-you', 'OnePageController@getThankYou');
Route::get('/invest', 'OnePageController@getInvest');
//Route::get('/products', 'ProductsController@getProductsData');
//Route::get('/product/{name?}', 'ProductsController@getProduct');
Route::get('/product', 'ProductsController@getProductCaddy');
Route::get('/team', 'TeamController@getTeamData');

Route::post('/requests/store', 'RequestsController@requestStore');
Route::post('/subscribe/store', 'RequestsController@subscriberStore');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
  Route::post('/spatie/media/upload', 'Admin\SpatieMediaController@create')->name('media.upload');
  Route::post('/spatie/media/remove', 'Admin\SpatieMediaController@destroy')->name('media.remove');
});

//Route::get('api/get-city-list/{province_id}','AddressController@getCityList');
