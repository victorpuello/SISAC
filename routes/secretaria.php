<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 5/08/2018
 * Time: 10:04 PM
 */
Route::resource('estudiantes', 'EstudianteController');
Route::resource('reportes', 'ReportesController')->only(['index']);
Route::post('reportes/academico/', 'ReportesController@reporteAcademico')->name('reportes.academico');
Route::post('reportes/academico/sabana', 'ReportesController@sabana')->name('reportes.academico.sabana');
Route::post('reportes/academico/logros', 'ReportesController@reporteLogros')->name('reportes.academico.logros');