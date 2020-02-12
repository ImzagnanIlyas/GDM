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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

//Voyager Routes :
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//Patient Routse :
Route::prefix('patient')->group(function () {
    //put ur routes here
    /*
    Exemple :

    Route::get('toto', function () {
        // Matches The "/pateint/toto" URL
    });
    */
});

//Medecin Routes :
Route::prefix('medecin')->group(function () {
    //put ur routes here
    /*
    Exemple :

    Route::get('toto', function () {
        // Matches The "/medecin/toto" URL
    });
    */
});

//Pharmacie Routes :
Route::prefix('pharmacie')->group(function () {
    //put ur routes here
});

//Examinateur Routes :
Route::prefix('examinateur')->group(function () {
    //put ur routes here
});


