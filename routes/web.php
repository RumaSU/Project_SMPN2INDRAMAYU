<?php

use App\Http\Controllers\ClassesModelsController;
use App\Http\Controllers\SiswaModelsController;
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
Route::get('/kelas', [ClassesModelsController::class, 'index']) -> name('ListClass');
Route::post('/kelas/add/', [ClassesModelsController::class, 'store']) -> name('storeClass');
Route::delete('/kelas/min/{id}', [ClassesModelsController::class, 'destroy'])->name('delClass');

Route::get('/kelas/testing/siswa', [SiswaModelsController::class, 'index']) -> name('ListStudents');

Route::view('/testing', 'pages.test.index');

Route::get('/kelasAjax', [ClassesModelsController::class, 'index']) -> name('ListClass');
Route::post('/kelasAjax/add/', [ClassesModelsController::class, 'store']) -> name('storeClass');

Route::get('/siswa/testing', function () {
    return view('pages.students.testing');
});

Route::get('/login', function () {
    return view('pages.login.login.index');
});
