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
    Route::resource('asignaciones', 'AsignacionController');
    Route::resource('reportes', 'ReportesController')->only(['index']);
    Route::get('reportes/academico/{periodo}/{aula}', 'ReportesController@reporteAcademico')->name('reportes.academico');
    Route::resource('import-users', 'InportUserController')->only(['index', 'store']);
    Route::get('notas/cargarPlanilla/salon/{Idsalon}/docente/{Iddocente}/asignatura/{Idasignatura}/periodo/{Idperiodo}',['as'=>'notas.loadplanilla', 'uses' => 'NotaController@cargarPlanilla']);
    Route::post('docentes/addAsignaturas/{id}',['as' => 'docentes.addAsignaturas', 'uses' => 'DocenteController@addAsignaturas']);
    Route::post('logros/findnotes',['as'=>'logros.findnotes', 'uses' => 'LogroController@FindNotes']);
    Route::get('logros/loaddata/{id}',['as'=>'logros.loaddata', 'uses' => 'LogroController@loadDataBuscador']);
    Route::get('estudiantes/municipios/{id}',['as' => 'municipios', 'uses' => 'MunicipioController']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
