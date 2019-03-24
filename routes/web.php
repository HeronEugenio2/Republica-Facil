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
    return view('Portal.testeIndex');
})->name('portal');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::group(
//    [
//        'prefix'     => 'administrative',
//        'as'         => 'administrative.',
//        'middleware' => ['auth'],
//    ],
//    function() {
//        //REPUBLIC
//        Route::resource('/republicas', 'RepublicController')->names('republic');
//
//    }
//);
Route::group(
    [
        'prefix'     => 'painel',
        'as'         => 'painel.',
        'middleware' => ['auth'],
    ],
    function() {
        //REPUBLIC
        Route::resource('/republica', 'RepublicController')->names('republic');

    }
);
//Route::group(
//    [
//        'prefix'     => 'portal',
//        'as'         => 'portal.',
//    ],
//    function() {
//        //REPUBLIC
//        Route::resource('/republicas', 'RepublicController')->names('republic');
//
//    }
//);
