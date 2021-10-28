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

//API
Route::get('/API','App\Http\Controllers\API\UsuarioController@index');
Route::get('/API/listar','App\Http\Controllers\API\UsuarioController@listar');
Route::get('/API/ler','App\Http\Controllers\API\UsuarioController@ler');
Route::get('/API/selecionar/{id}','App\Http\Controllers\API\UsuarioController@selecionar');
Route::post('/API/cadastrar/','App\Http\Controllers\API\UsuarioController@cadastrar');
Route::delete('/API/deletar/{id}','App\Http\Controllers\API\UsuarioController@deletar');
Route::patch('/API/alterar/','App\Http\Controllers\API\UsuarioController@alterar');





Route::get('default', 'App\Http\Controllers\DefaultController@index');
Route::get('/formulario', function(){
	return view('formulario');
});
Route::post('/cadastrar', 'App\Http\Controllers\UsuarioController@cadastrar');
Route::get('/listar', 'App\Http\Controllers\UsuarioController@ler');
Route::get('/deletar/{id}', 'App\Http\Controllers\UsuarioController@deletar');

Route::post('/alterar', 'App\Http\Controllers\UsuarioController@alterar');
Route::get('/alterar/{id}', 'App\Http\Controllers\UsuarioController@requisitarAlteracao');
