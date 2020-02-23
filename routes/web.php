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

Route::get('/', 'LandingController@index')->name('landing.home');
Route::get('/argentina', 'LandingController@colombia')->name('landing.argentina');
Route::get('/brasil', 'LandingController@brasil')->name('landing.brasil');
Route::get('/colombia', 'LandingController@colombia')->name('landing.colombia');
Route::get('/chile', 'LandingController@chile')->name('landing.chile');
Route::get('/mexico', 'LandingController@mexico')->name('landing.mexico');
Route::get('/panama', 'LandingController@panama')->name('landing.panama');
Route::get('/peru', 'LandingController@peru')->name('landing.peru');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    // Exports routes
    Route::get('export-global', 'RegistrationExport@export_global')->name('export.global');
    Route::get('export-colombia', 'RegistrationExport@export_colombia')->name('export.colombia');
    Route::get('export-chile', 'RegistrationExport@export_chile')->name('export.chile');
    Route::get('export-brasil', 'RegistrationExport@export_brasil')->name('export.brasil');
    Route::get('export-mexico', 'RegistrationExport@export_mexico')->name('export.mexico');
    Route::get('export-peru', 'RegistrationExport@export_peru')->name('export.peru');
    Route::get('export-panama', 'RegistrationExport@export_panama')->name('export.panama');
    Route::get('export-argentina', 'RegistrationExport@export_argentina')->name('export.argentina');
});
