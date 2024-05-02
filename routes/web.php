<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\TelefonoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/indexalumno',[AlumnoController::class, 'index'])->name('alumnos.indexalumno');
Route::resource('alumnos', AlumnoController::class);

/*

Route::get('/indextelefono', [TelefonoController::class, 'index'])->name('telefonos.indextelefono');
Route::resource('clases', TelefonoController::class);

*/