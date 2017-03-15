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

Route::get('/home', 'HomeController@index');
Route::resource('/cliente','clientes');
Route::resource('/agente','agenteController');
Route::resource('/expediente','filesController');
Route::resource('/sort','sortController');
Route::resource('/formality','formalitiesController');
Route::resource('/insurers','insurersController');
Route::resource('/processor','processorController');
Route::resource('/roles','rolesController');
Route::resource('/invoices','invoicesController');
Route::resource('/professionals','professionalController');


//Consultas

Route::get('/getformality/{id}','formalitiesController@getformality');
Route::get('/getprocessor/{id}','processorController@getprocessor');
