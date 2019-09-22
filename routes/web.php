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

//test.index
Route::get('/test', 'testController@index')->name('index');
Route::post('/test/upload', 'testController@uploadImage')->name('uploadImage');
Route::get('/perfil', 'testController@perfil')->name('perfil');
Route::post('/perfil/update', 'testController@update')->name('update');

Route::resource('/', 'PortalController')->names('portal');
Route::resource('/mercado', 'AdvertisementController')->names('advertisement');

Auth::routes();

Route::get('login/{provider}', 'Auth\SocialAccountController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');
Route::group(
    [
        'prefix' => 'administracao',
        'as' => 'administrative.',
        'middleware' => ['auth'],
    ],
    function () {
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
        'prefix' => 'painel',
        'as' => 'painel.',
        'middleware' => ['auth'],
    ],
    function () {
        //republic@
        Route::resource('/republica', 'RepublicController')->names('republic');
        //spent@
        Route::resource('/gastos', 'SpentController')->names('spent');
        //assignment@
        Route::resource('/tarefas', 'AssignmentController')->names('assignment');
        //Advertisement@
        Route::resource('/anuncios', 'Painel\AdvertisementController')->names('advertisement');
        //Marketing@
        Route::resource('/marketing', 'Marketing\MarketingController')->names('marketing');

        //painel.spendingResult
        Route::post('/sangria', 'SpentController@spendingResult')->name('spendingResult');
        //painel.Invitation
        Route::post('/email', 'RepublicController@invitation')->name('invitation');
        //painel.invitationAccept
        Route::get('/republica/{id}/aceitar', 'RepublicController@invitationAccept')->name('invitationAccept');
        //painel.debitStore
        Route::post('/debito', 'RepublicController@debitStore')->name('debitStore');
        //painel.spentHistoryStore
        Route::post('/confirma', 'SpentController@spentHistoryStore')->name('spentHistoryStore');
        //painel.listSpents
        Route::post('/gastos/lista', 'SpentController@listSpents')->name('listSpents');
        //painel.extractList
        Route::post('/gastos/extrato', 'SpentController@extractList')->name('extractList');
        //painel.invitationDeny
        Route::post('/republica/{id}/apagar', 'RepublicController@invitationDeny')->name('invitationDeny');
    }
);
Route::group(
    [
        'prefix' => 'portal',
        'as' => 'portal.',
    ],
    function () {
        //ANUNCIOS
        Route::get('/anuncios', 'PortalController@indexAdvertisement')->name('advertisement');
        Route::get('/anuncios/{id}', 'PortalController@showAdvertisement')->name('showAdvertisement');
        Route::get('/anuncios/categoria/{id}', 'PortalController@searchCategory')->name('searchCategory');
        //WELCOME
        Route::resource('/republicas', 'PortalController')->names('republics');
        //PROCURAR
        Route::get('/busca', 'PortalController@indexRepublics')->name('search');
        Route::post('/busca/cidade', 'PortalController@search')->name('republicSearch');
        //portal.ajaxSearch
        Route::post('/busca/cidade/filtrada', 'PortalController@ajaxSearch')->name('ajaxSearch');
        //portal.vote
        Route::post('/votar/{id}', 'PortalController@vote')->name('vote');
    }
);
