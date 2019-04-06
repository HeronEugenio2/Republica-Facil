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

//Route::get('/', function() {
//    return view('Portal.Template.index');
//})->name('portal');
Route::resource('/', 'PortalController')->names('portal');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(
    [
        'prefix'     => 'administrative',
        'as'         => 'administrative.',
        'middleware' => ['auth'],
    ],
    function() {
        //REPUBLIC
        Route::resource('/republicas', 'Administrative\RepublicAdmController')->names('republics');
    }
);
Route::group(
    [
        'prefix'     => 'painel',
        'as'         => 'painel.',
        'middleware' => ['auth'],
    ],
    function() {
        //REPUBLIC
        Route::resource('/republica', 'RepublicController')->names('republic');
        //SPENT
        Route::resource('/gastos', 'SpentController')->names('spent');
        //Assignment
        Route::resource('/tarefas', 'AssignmentController')->names('assignment');
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
