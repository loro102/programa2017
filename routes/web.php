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

    use App\Http\Controllers\permisosController;

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
Route::resource('/filepro','file_professionalController');
Route::resource('/note','noteController');
Route::resource('/opponent','opponentController');
Route::resource('/generator','generator');
Route::resource('/documentos','documentController');

//Pantalla de Administración
Route::resource('/usuario','userController');
Route::resource('/role','rolesController');
Route::resource('/permisos', 'permisosController');
Route::post('revoke','permisosController@revoke');
Route::post('assign','permisosController@assign');
Route::post('revokerol','rolesController@revoke');
Route::post('assignrol','rolesController@assign');



//Consultas

Route::get('/getformality/{id}','formalitiesController@getformality');
Route::get('/getprocessor/{id}','processorController@getprocessor');
Route::get('/getprofessional/{id}','professionalController@getprofessional');

//Rutas de procesamiento de plantillas
Route::get('/hojanuevocliente/{id}','generator@hoja_nueva_consulta');
Route::get('/cartaagradecimientoagente/{id}/{cliente}','generator@carta_agracedimiento_agente');
Route::get('/contratoprestacionservicios/{file_id}','generator@contrato_prestacion_servicios');
Route::get('/contratoprestacionserviciosrepresentado/{file_id}','generator@contrato_prestacion_servicios_representados');
Route::get('/asunciondirecciontecnica/{file_id}/{profesional_id}','generator@contrato_asuncion_direccion_tecnica');
Route::get('/autorizacionycompromisodepago/{file_id}/{profesional_id}','generator@autorización_servicio_profesionales');
Route::get('/designacionabogado/{file_id}/{profesional_id}','generator@designacion_abogado');
Route::get('/reciboasistenciajuridica/{file_id}/{profesional_id}','generator@reciboasisteciajuridica');
