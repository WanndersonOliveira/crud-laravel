<?php

use Illuminate\Support\Facades\Route;

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

Route::get('default', 'App\Http\Controllers\DefaultController@index');
Route::get('/formulario', function(){
	return view('formulario');
});
Route::post('/cadastrar', 'App\Http\Controllers\UsuarioController@cadastrar');
Route::get('/listar', 'App\Http\Controllers\UsuarioController@ler');
Route::get('/deletar/{id}', 'App\Http\Controllers\UsuarioController@deletar');

Route::post('/alterar', 'App\Http\Controllers\UsuarioController@alterar');
Route::get('/alterar/{id}', 'App\Http\Controllers\UsuarioController@requisitarAlteracao');
