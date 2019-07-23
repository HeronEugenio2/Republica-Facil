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

Route::resource('/', 'PortalController')->names('portal');
Route::resource('/mercado', 'AdvertisementController')->names('advertisement');

Auth::routes();

Route::get('login/{provider}', 'Auth\SocialAccountController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');
Route::group(
    [
        'prefix'     => 'administracao',
        'as'         => 'administrative.',
        'middleware' => ['auth'],
    ],
    function() {
        //REPUBLIC
        Route::resource('republicas', 'Administrative\RepublicAdmController')
             ->names('republics');
        //ADVERTISEMENT
        Route::resource('anuncios', 'Administrative\AdvertisementAdmController')
             ->names('advertisements');
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
        //Advertisement
        Route::resource('/anuncios', 'Painel\AdvertisementController')->names('advertisement');
        //Invitations
        Route::post('/email', 'RepublicController@invitation')->name('invitation');
        //Invitation accept
        Route::get('/republica/{id}/aceitar', 'RepublicController@invitationAccept')->name('invitationAccept');
    }
);
Route::group(
    [
        'prefix' => 'portal',
        'as'     => 'portal.',
    ],
    function() {
        //ANUNCIOS
        Route::get('/anuncios', 'PortalController@indexAdvertisement')->name('advertisement');
        Route::get('/anuncios/{id}', 'PortalController@showAdvertisement')->name('showAdvertisement');
        Route::get('/anuncios/categoria/{id}', 'PortalController@searchCategory')->name('searchCategory');
        //WELCOME
        Route::resource('/republicas', 'PortalController')->names('republics');
        //PROCURAR
        Route::get('/busca', 'PortalController@indexRepublics')->name('search');
        Route::post('/busca/cidade', 'PortalController@search')->name('republicSearch');
        Route::post('/busca/cidade/filtrada', 'PortalController@ajaxSearch')->name('ajaxSearch');
    }
);
