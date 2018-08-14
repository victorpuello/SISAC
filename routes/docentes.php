<?php
Route::resource('logros', 'LogroController');
Route::resource('notas', 'NotaController');
Route::resource('asignaciones', 'AsignacionController');
Route::resource('estudiantes', 'EstudianteController')->only(['update','edit']);;
Route::resource('reportes', 'ReportesController')->only(['index']);
Route::post('reportes/academico/sabana', 'ReportesController@sabana')->name('reportes.academico.sabana');
Route::post('reportes/academico/logros', 'ReportesController@reporteLogros')->name('reportes.academico.logros');
Route::get('logros/loaddata/{id}',['as'=>'logros.loaddata', 'uses' => 'LogroController@loadDataBuscador']);
Route::post('logros/findnotes',['as'=>'logros.findnotes', 'uses' => 'LogroController@FindNotes']);
Route::get('notas/cargarPlanilla/salon/{Idsalon}/docente/{Iddocente}/asignatura/{Idasignatura}/periodo/{Idperiodo}',['as'=>'notas.loadplanilla', 'uses' => 'NotaController@cargarPlanilla']);
Route::get('/direccion', 'DireccionController@index')->name('direccion.index');
Route::get('/direccion/getacudiente/{estudiante}', 'DireccionController@getAcudiente')->name('direccion.getacudiente');
Route::get('/direccion/getmatricula/{estudiante}', 'DireccionController@getMatricula')->name('direccion.getmatricula');
Route::resource('acudiente', 'AcudienteController')->only(['edit','store','update','destroy']);
Route::get('acudiente/{estudiante}', 'AcudienteController@create')->name('acudiente.create');
Route::get('estudiantes/municipios/{id}',['as' => 'municipios', 'uses' => 'MunicipioController']);
