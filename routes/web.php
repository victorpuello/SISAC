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
    Route::resource('docentes', 'DocenteController');
    Route::resource('asignaturas', 'AsignaturaController');
    Route::resource('aulas', 'SalonController');
    Route::post('docentes/addAsignaturas/{id}',['as' => 'docentes.addAsignaturas', 'uses' => 'DocenteController@addAsignaturas']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
