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


Route::group(['middleware' => 'auth'], function() {
    Route::get('catalog','CatalogController@getIndex');
    Route::get('your_festivals', 'CatalogController@your_festivals');
    Route::post('catalog', 'CatalogController@postCatalog');
    Route::post('your_festivals', 'CatalogController@postYour_festivals');

});

Route::group(['middleware' => 'auth', 'middleware' => 'admin'], function() {
    Route::get('control', 'CatalogController@control');
    Route::post('control/add', 'CatalogController@postAdd');
    Route::get('control/delete/{id}', 'CatalogController@delete');
    Route::get('control/add', 'CatalogController@add');
    Route::get('control/update/{id}', 'CatalogController@update');
    Route::post('control/update', 'CatalogController@postUpdate');
});

Route::get('/','HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
