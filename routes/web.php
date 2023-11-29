<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\ClassesModelsController;
use App\Http\Controllers\OsisModelsController;
use App\Http\Controllers\ProfileModelsController;
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

// Route Teachers
Route::get('/guru', [ClassesModelsController::class, 'index']) -> name('ListClass');

// Route Classes
Route::get('/kelas', [ClassesModelsController::class, 'index']) -> name('ListClass');
Route::post('/kelas', [ClassesModelsController::class, 'store']) -> name('storeClass');
Route::delete('/kelas/{id}', [ClassesModelsController::class, 'destroy'])->name('delClass');

// Route Staff
Route::get('/pendidik', [TeachersModelsController::class, 'index']) -> name('ListTeachers');
Route::post('/pendidik', [TeachersModelsController::class, 'store']) -> name('storeTeachers');
Route::delete('/kelas/min/{id}', [TeachersModelsController::class, 'destroy'])->name('delTeachers');

// Route Students
Route::get('/kelas/siswa', [StudentsModelsController::class, 'index']) -> name('ListStudents');

// Route profile
Route::get('/profil', [ProfileModelsController::class,'index']);
Route::get('/osis', [OsisModelsController::class,'index']);

Route::view('/testing', 'pages.students.index');
Route::view('/siswa', 'pages.classes.index');
Route::view('/tenpendidik', 'pages.tenpendidik.index');
Route::view('/ekstrakurikuler', 'pages.ekstrakurikuler.index');

// Route::get('/kelasAjax', [ClassesModelsController::class, 'index']) -> name('ListClass');
// Route::post('/kelasAjax/add/', [ClassesModelsController::class, 'store']) -> name('storeClass');
Route::get('/login', function () {
    return view('pages.login.login.index');
});

Route::get('/register', function () {
    return view('pages.login.register.email.index');
});

Route::POST('/register/data', function () {
    return view('pages.login.register.dataUser.index');
});

Route::get('/login/error', function () {
    return view('pages.login.exception.sameNisNip.index');
});

Route::get('/login/error/email', function () {
    return view('pages.login.exception.sameEmail.index');
});

Route::get('/login/resetPass', function () {
    return view('pages.login.resetPass.resetPass.index');
});

Route::get('/newPass', function () {
    return view('pages.login.resetPass.newPass.index');
});

Route::get('/register/waitSignUp', function () {
    return view('pages.login.register.waitSignUp.index');
});
Route::view('/temp/newPass', 'pages.test.testNewPass');

Route::get('/chart', [ChartController::class, 'index']);

Route::view('/temp', 'pages.test.index');
Route::view('/slideshow', 'pages.test.slideShow');
