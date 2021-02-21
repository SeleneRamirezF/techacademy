<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsignaturaController;
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
//ruta a la vista welcome para redireccionar al boton Principal
Route::view('welcome','welcome');

Route::resource('alumnos', AlumnoController::class);

Route::resource('asignaturas', AsignaturaController::class);

//asignaturas de cada alumno
Route::get('matriculas/{alumno}', 'App\Http\Controllers\AlumnoController@asignaturasAlumno')
    ->name('matriculas.asignaturasalumno');

//alumnos de cada asignatura
Route::get('matriculas1/{asignatura}', 'App\Http\Controllers\AsignaturaController@alumnosAsignatura')
    ->name('matriculas.alumnosasignatura');

//borrar matricula
Route::delete('matriculas/{alumno}{asignatura}', 'App\Http\Controllers\AlumnoController@borrarMatricula')
    ->name('matriculas.borrar');

//crear matricula formulario
Route::get('matriculas/{alumno}{asignatura}{token}/edit', 'App\Http\Controllers\AlumnoController@editarMatricula')
    ->name('matriculas.edit');
//modificar matricula formulario
Route::put('matriculas/{alumno}{asignatura}{token}', 'App\Http\Controllers\AlumnoController@updateMatricula')
    ->name('matriculas.update');

//formulario matriculas alumnos
Route::get('matriculas/{alumno}/create', 'App\Http\Controllers\AlumnoController@createMatricula')
    ->name('matriculas.create');
//action
Route::post('matriculas', 'App\Http\Controllers\AlumnoController@storeMatricula')
    ->name('matriculas.store');

//formulario matriculas asignaturas
Route::get('matriculas1/{asignatura}/create', 'App\Http\Controllers\AsignaturaController@createMatricula')
    ->name('matriculas1.create');
//action
Route::post('matriculas1', 'App\Http\Controllers\AsignaturaController@storeMatricula')
    ->name('matriculas1.store');

