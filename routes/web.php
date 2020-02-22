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

Route::group(['domain' => Config::get('app.url')], function () {
    Route::get('/', 'LandingController@index')->name('landing.home');
});


Route::group(['domain' => Config::get('app.url'), 'middleware' => 'colombia.database'], function () {
    Route::get('colombia', 'LandingController@colombia')->name('landing.colombia');
});

Route::group(['domain' => 'cp.' . Config::get('app.url')], function () {
    Route::get('/', function () {
        return redirect()->route('landing.colombia');
    });
    Route::group(['prefix' => 'admin', 'middleware' => 'colombia.database'], function () {
    Voyager::routes();
    });
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
