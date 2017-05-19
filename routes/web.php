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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/clientes', 'Clientes\ClientesController@index')->name('clientes');

Route::get('/clientes/cliente', 'Clientes\ClientesController@cliente')->name('clientes/cliente');

Route::get('/clientes/cliente/editar/{id}', 'Clientes\ClientesController@editar')->name('clientes/cliente/editar');

Route::get('/clientes/cliente/excluir/{id}', 'Clientes\ClientesController@excluir')->name('clientes/cliente/excluir');

Route::get('/clientes/busca', 'Clientes\ClientesController@busca')->name('clientes/busca');

Route::post('/clientes/criar', 'Clientes\ClientesController@criar')->name('clientes/criar');

Route::post('/clientes/atualizar/{id}', 'Clientes\ClientesController@atualizar')->name('clientes/atualizar');