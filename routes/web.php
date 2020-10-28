<?php

/* Route::get('/', function () {
  return view('welcome');
  }); */

Route::get('/', 'FrontEndController@index');
Route::get('/home', 'FrontEndController@index');
Route::get('/gallery', 'FrontEndController@gallery');
Route::get('/showLogin', 'FrontEndController@showLogin');
Route::get('/showRegistration', 'FrontEndController@showRegistration');
Route::get('/author', 'FrontEndController@author');
Route::get('/download', 'FrontEndController@download');
Route::get('/sitemap', 'FrontEndController@sitemap');

Route::get('/showContact/', 'FrontEndController@contact');
Route::get('/contact/{param?}', 'AnketaController@mejl');
Route::post('/anketa', 'AnketaController@anketa');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');
Route::post('/registration', 'LoginController@registration');
Route::get('/listazelja', 'FrontEndController@wishlist');


Route::get('/products/{param?}', 'ProductsController@products');

//zastita ruta preko middleware-a
Route::group(['middleware' => ['admin']], function () {


    Route::get('/admin', 'FrontEndController@admin');

//upavljanje ulogama
    Route::group(['prefix' => '/admin/uloge'], function() {
        Route::get('/{id?}', 'UpravljanjeUlogamaController@show');
        Route::post('/store', 'UpravljanjeUlogamaController@store');
        Route::post('/update/{id}', 'UpravljanjeUlogamaController@update');
        Route::get('/destroy/{id}', 'UpravljanjeUlogamaController@destroy');
    });
//upravljanje menijem
    Route::group(['prefix' => '/admin/meni'], function() {
        Route::get('/{id?}', 'UpravljanjeMenijemController@show');
        Route::post('/store', 'UpravljanjeMenijemController@store');
        Route::post('/update/{id}', 'UpravljanjeMenijemController@update');
        Route::get('/destroy/{id}', 'UpravljanjeMenijemController@destroy');
    });
//upravljanje korisnicima
    Route::group(['prefix' => '/admin/korisnici'], function() {
        Route::get('/{id?}', 'UpravljanjeKorisnicimaController@show');
        Route::post('/store', 'UpravljanjeKorisnicimaController@store');
        Route::post('/update/{id}', 'UpravljanjeKorisnicimaController@update');
        Route::get('/destroy/{id}', 'UpravljanjeKorisnicimaController@destroy');
    });

    //upravljanje galerijom
    Route::group(['prefix' => '/admin/slike'], function() {
        Route::get('/{id?}', 'UpravljanjeGalerijomController@show');
        Route::post('/store', 'UpravljanjeGalerijomController@store');
        Route::post('/update/{id}', 'UpravljanjeGalerijomController@update');
        Route::get('/destroy/{id}', 'UpravljanjeGalerijomController@destroy');
    });

    //upravljanje proizvodima
    Route::group(['prefix' => '/admin/proizvodi'], function() {
        Route::get('/{id?}', 'UpravljanjeProizvodimaController@show');
        Route::post('/store', 'UpravljanjeProizvodimaController@store');
        Route::post('/update/{id}', 'UpravljanjeProizvodimaController@update');
        Route::get('/destroy/{id}', 'UpravljanjeProizvodimaController@destroy');
    });
    //upravljanje anketom
    Route::group(['prefix' => '/admin/ankete'], function() {
        Route::get('/{id?}', 'UpravljanjeAnketamaController@show');
        Route::post('/store', 'UpravljanjeAnketamaController@store');
        Route::post('/update/{id}', 'UpravljanjeAnketamaController@update');
        Route::get('/destroy/{id}', 'UpravljanjeAnketamaController@destroy');
    });

    //poruzbine
});

