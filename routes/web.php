<?php

use App\Http\Controllers\ClassesModelsController;
use App\Http\Controllers\SiswaModelsController;
use App\Http\Controllers\StudentsModelsController;
use App\Http\Controllers\TeachersModelsController;
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
    return view('pages.homepage.index');
});
Route::get('/guru', [ClassesModelsController::class, 'index']) -> name('ListClass');

Route::get('/kelas', [ClassesModelsController::class, 'index']) -> name('ListClass');
Route::post('/kelas', [ClassesModelsController::class, 'store']) -> name('storeClass');
Route::delete('/kelas/min/{id}', [ClassesModelsController::class, 'destroy'])->name('delClass');

Route::get('/pendidik', [TeachersModelsController::class, 'index']) -> name('ListTeachers');
Route::post('/pendidik', [TeachersModelsController::class, 'store']) -> name('storeTeachers');
Route::delete('/kelas/min/{id}', [TeachersModelsController::class, 'destroy'])->name('delTeachers');

Route::get('/kelas/siswa', [StudentsModelsController::class, 'index']) -> name('ListStudents');

Route::view('/testing', 'pages.students.index');
Route::view('/siswa', 'pages.students.index');

// Route::get('/kelasAjax', [ClassesModelsController::class, 'index']) -> name('ListClass');
// Route::post('/kelasAjax/add/', [ClassesModelsController::class, 'store']) -> name('storeClass');
Route::get('/login', function () {
    return view('pages.login.login.index');
});
