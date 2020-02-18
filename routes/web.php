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

Route::get('email', function () {
    $data = array(
        "names" => "Manuel José",
        "last_names" => "Ron Bustos",
        "age" => "18 - 25",
        "email" => "ris3two3@gmail.com",
        "city" => "Bogotá",
        "genre" => "Hombre",
        "shoes" => "Adidas",
        "team" => "Provilas Team",
        "distance" => "10K",
        "best_time" => "60 MIN",
        "updated_at" => "2020-02-14 17:56:17",
        "created_at" => "2020-02-14 17:56:17",
        "id" => 3,
    );
    return new App\Mail\RegisteredData($data);
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
