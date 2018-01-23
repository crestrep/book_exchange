<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web'], 'prefix' => '/'] , function () {

    Route::auth();

});

Route::group(['middleware' => ['auth'], 'prefix' => '/'] , function () {

    Route::get('/', [
        'uses'  => 'HomeController@index',
        'as'    => 'app.index',
    ] );

    /*
    *  Libros CRUD
    */
    Route::group(['middleware' => 'auth', 'prefix' => '/libros'], function()
    {
        // Vista listar libros
        Route::get('/', [
            'uses' => 'BooksController@index',
            'as'   => 'app.books.index'
        ]);

        // Vista crear libros
        Route::get('/crear', [
            'uses' => 'BooksController@create',
            'as'   => 'app.books.create'
        ]);

        // Guardar libros
        Route::post('store', [
            'uses' => 'BooksController@store',
            'as'   => 'app.books.store'
        ]);

        // Vista editar libros
        Route::get('editar/{id}', [
            'uses' => 'BooksController@edit',
            'as'   => 'app.books.edit'
        ]);

        // Actualizar libros
        Route::put('update/{id}', [
            'uses' => 'BooksController@update',
            'as'   => 'app.books.update'
        ]);

        // Consulta ajax
        Route::get('detail', [
            'uses' => 'BooksController@detail',
            'as'   => 'app.books.detail'
        ]);

    });

    /*
    *  intercambio CRUD
    */
    Route::group(['middleware' => 'auth', 'prefix' => '/pedir-libros'], function()
    {
        // Vista listar libros
        Route::get('/', [
            'uses' => 'ExchangeController@index',
            'as'   => 'app.exchange.index'
        ]);

        // Vista crear libros
        Route::get('/crear', [
            'uses' => 'BooksController@create',
            'as'   => 'app.books.create'
        ]);

        // Guardar libros
        Route::post('store', [
            'uses' => 'ExchangeController@store',
            'as'   => 'app.exchange.store'
        ]);

        // Vista editar libros
        Route::get('editar/{id}', [
            'uses' => 'BooksController@edit',
            'as'   => 'app.books.edit'
        ]);

        // Actualizar libros
        Route::put('update/{id}', [
            'uses' => 'BooksController@update',
            'as'   => 'app.books.update'
        ]);

    });

    /*
    *  Solicitudes CRUD
    */
    Route::group(['middleware' => 'auth', 'prefix' => '/solicitudes'], function()
    {

        Route::get('/', [
            'uses' => 'ExchangeController@listado',
            'as'   => 'app.exchange.listado'
        ]);

        Route::get('received/{id}', [
            'uses' => 'ExchangeController@received',
            'as'   => 'app.exchange.received'
        ]);

        Route::get('canceled/{id}', [
            'uses' => 'ExchangeController@canceled',
            'as'   => 'app.exchange.canceled'
        ]);

        Route::get('editar/{id}', [
            'uses' => 'BooksController@edit',
            'as'   => 'app.books.edit'
        ]);

        Route::put('update/{id}', [
            'uses' => 'BooksController@update',
            'as'   => 'app.books.update'
        ]);

    });
});