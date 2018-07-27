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
Route::get('/','Auth\LoginController@showLoginForm')->name('login');
Route::group(['prefix' => 'admin'], function () {
    Route::resource('users', 'UserController');
    Route::resource('estudiantes', 'EstudianteController');
    Route::resource('docentes', 'DocenteController');
    Route::resource('asignaturas', 'AsignaturaController');
    Route::resource('aulas', 'SalonController');
    Route::resource('logros', 'LogroController');
    Route::resource('notas', 'NotaController');
    Route::post('notas/actualizar/{id}',['as'=>'notas.actualizar','uses'=>'NotaController@actualizar']);
    Route::get('notas/script/',['as'=>'notas.script','uses'=>'NotaController@getscript']);
    Route::post('docentes/addAsignaturas/{id}',['as' => 'docentes.addAsignaturas', 'uses' => 'DocenteController@addAsignaturas']);
    Route::post('logros/findnotes',['as'=>'logros.findnotes', 'uses' => 'LogroController@FindNotes']);
    Route::get('logros/loaddata/{id}',['as'=>'logros.loaddata', 'uses' => 'LogroController@loadDataBuscador']);
    Route::get('notas/cargarPlanilla/salon/{Idsalon}/docente/{Iddocente}/asignatura/{Idasignatura}/periodo/{Idperiodo}',['as'=>'notas.loadplanilla', 'uses' => 'NotaController@cargarPlanilla']);
    Route::get('estudiantes/municipios/{id}',['as' => 'municipios', 'uses' => 'MunicipioController']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
