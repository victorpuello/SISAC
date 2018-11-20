<?php
Route::resource('users', 'UserController');
Route::resource('estudiantes', 'EstudianteController');
Route::resource('institucions', 'InstitucionController');
Route::resource('docentes', 'DocenteController');
Route::resource('asignaturas', 'AsignaturaController');
Route::resource('aspectos', 'AspectoController');
Route::resource('anios', 'AnioController');
Route::resource('areas', 'AreaController');
Route::resource('grupos', 'GrupoController');
Route::resource('definitivas', 'DefinitivaController');
Route::resource('grados', 'GradoController');
Route::resource('jornadas', 'JornadaController');
Route::resource('estandars', 'EstandarController');
Route::resource('dbas', 'DBAController');
Route::resource('indicadors', 'IndicadorController');
Route::resource('notas', 'NotaController');
Route::resource('asignacions', 'AsignacionController');
Route::resource('periodos', 'PeriodoController');
Route::resource('planillas', 'PlanillaController')->except(['show']);
Route::resource('reportes', 'ReportesController')->only(['index']);
Route::resource('acudiente', 'AcudienteController')->only(['edit','store','update','destroy']);
Route::get('planillas/getFiltro','PlanillaController@getFiltro')->name('planillas.getfiltro');
Route::middleware(['verifyIndicadores'])->group(function (){
    Route::get('planillas/{planilla}','PlanillaController@show')->name('planillas.show');
});

Route::get('acudiente/{estudiante}', 'AcudienteController@create')->name('acudiente.create');
Route::post('reportes/academico/', 'ReportesController@reporteAcademico')->name('reportes.academico');
Route::post('reportes/academico/sabana', 'ReportesController@sabana')->name('reportes.academico.sabana');
Route::post('reportes/academico/logros', 'ReportesController@reporteLogros')->name('reportes.academico.logros');
Route::resource('import-users', 'InportUserController')->only(['index', 'store']);
Route::resource('import-estudiantes', 'ImportEstudianteController')->only(['index', 'store']);
Route::post('docentes/addAsignaturas/{id}',['as' => 'docentes.addAsignaturas', 'uses' => 'DocenteController@addAsignaturas']);
Route::get('estudiantes/municipios/{id}',['as' => 'municipios', 'uses' => 'MunicipioController']);
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs');


//Route::get('/usersdata/img/users/{file}', function ($file) {
//    return Storage::response("app/usersdata/img/users/$file")->where([
//        'file' => '(.*?)\.(jpg|png|jpeg|gif)$'
//    ]);
//});
Route::get('notas/dataPlanilla/asignacion/{asignacion}/periodo/{periodo}','NotaController@dataPlanilla')->name('notas.dataplanilla');
Route::get('notas/getPlanilla/asignacion/{asignacion}/periodo/{periodo}','NotaController@getPlanilla')->name('notas.getplanilla');
