<?php

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'IndexController@index');

Route::get('/clientes', 'ClientesController@clientes');
Route::post('/clientes/delete', 'ABMController@delete');

Route::get('/agregar', 'ABMController@agregar');
Route::post('/agregar/cargar', 'ABMController@cargar');

Route::get('/editar-cliente', 'ABMController@vistaeditar');
Route::post('/editar-cliente', 'ABMController@editar');
Route::post('/editar-cliente/update', 'ABMController@update');






