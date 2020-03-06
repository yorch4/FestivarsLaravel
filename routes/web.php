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
Route::get('/info','CatalogController@info')->name('info');

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth', 'middleware' => 'verified'], function() {
    Route::get('catalog','CatalogController@getIndex');
    Route::get('your_festivals', 'CatalogController@your_festivals');
    Route::post('catalog', 'CatalogController@postCatalog');
    Route::post('your_festivals', 'CatalogController@postYour_festivals');
    Route::get('catalog/details/{id}', 'CatalogController@details');
});

Route::group(['middleware' => 'auth', 'middleware' => 'admin'], function() {
    Route::get('control', 'CatalogController@control');
    Route::post('control/add', 'CatalogController@postAdd');
    Route::get('control/delete/{id}', 'CatalogController@delete');
    Route::get('control/add', 'CatalogController@add');
    Route::get('control/update/{id}', 'CatalogController@update');
    Route::post('control/update', 'CatalogController@postUpdate');
});

Route::get('/','HomeController@index')->name('home')->middleware('verified');;


Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');;
