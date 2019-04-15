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
//Pagina de inicio
Route::get('/', function () {
    return view('welcome');
});

//Autenticación de usuarios de laravel
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Gestión de los alumnos
Route::get('/alumnos', 'alumnosController@index')->name("alumnos");
Route::post('/alumnos/new', 'alumnosController@create')->name('newAlumno');
Route::get('/alumnos/{id}', 'alumnosController@dataAlumnos');
Route::post('/alumnos/{id}/edit', 'alumnosController@edit');
Route::get('/alumnos/{id}/delete', 'alumnosController@destroy');

//Gestión de las asignaturas
Route::get('/asignaturas', 'asignaturasController@index')->name("asignaturas");
Route::post('/asignaturas/new', 'asignaturasController@create')->name('newLesson');
Route::get('/asignaturas/{id}', 'asignaturasController@listar');
Route::post('/asignaturas/{id}/edit', 'asignaturasController@edit');
Route::get('/asignaturas/{id}/delete', 'asignaturasController@destroy');