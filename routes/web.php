<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\ClassesModelsController;
use App\Http\Controllers\OsisModelsController;
use App\Http\Controllers\ProfileModelsController;
use App\Http\Controllers\SiswaModelsController;
use App\Http\Controllers\StudentsModelsController;
use App\Http\Controllers\TeachersModelsController;
use App\Http\Controllers\UsersModelsController;
use App\Http\Controllers\TexteditorController;
use App\Models\UsersModels;
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

Route::controller(ClassesModelsController::class)->group(function() {
    Route::get('/kelas', 'index') -> name('viewClass');
    Route::post('/kelas/get', 'getDataClass') -> name('viewClass');
    Route::get('/kelas/list', 'getListClass') -> name('viewClass');
    Route::get('/kelas/tag', 'tagClass')->name('ajaxClassTag');
    Route::get('/kelas/pendidik', 'listTeacher')->name('ajaxClassGetTeachers');
    Route::get('/kelas/pendidik/image', 'teacherImage')->name('ajaxClassGetTeachersImages');
    Route::post('/kelas', 'store') -> name('storeClass');
    Route::delete('/kelas/{id}', 'destroy')->name('delClass');
});

Route::controller(StudentsModelsController::class)->group(function() {
    Route::get('/kelas/siswa/{classGrade}/{classTag}', 'index')->name('student');
    Route::post('/kelas/siswa/get', 'siswaData')->name('siswaData');
    Route::post('/kelas/siswa/{classGrade}/{classTag}', 'index')->name('storeStudents');
});

// Route::get('/kelas', [ClassesModelsController::class, 'index']) -> name('viewClass');
// Route::post('/kelas/get', [ClassesModelsController::class, 'getDataClass']) -> name('viewClass');
// Route::get('/kelas/list', [ClassesModelsController::class, 'getListClass']) -> name('viewClass');
// Route::get('/kelas/tag', [ClassesModelsController::class, 'tagClass'])->name('ajaxClassTag');
// Route::get('/kelas/pendidik', [ClassesModelsController::class, 'listTeacher'])->name('ajaxClassGetTeachers');
// Route::get('/kelas/pendidik/image', [ClassesModelsController::class, 'teacherImage'])->name('ajaxClassGetTeachersImages');
// Route::post('/kelas', [ClassesModelsController::class, 'store']) -> name('storeClass');
// Route::delete('/kelas/{id}', [ClassesModelsController::class, 'destroy'])->name('delClass');


// Route::get('/kelas/{classGrade}/{classTag}', [StudentsModelsController::class, 'index'])->name('student');
// Route::post('/kelas/siswa/get', [StudentsModelsController::class, 'siswaData'])->name('siswaData');
// Route::post('/kelas/{classGrade}/{classTag}', [StudentsModelsController::class, 'index'])->name('storeStudents');

// Route Teachers and Staff Teachers
Route::controller(TeachersModelsController::class)->group(function() {
    Route::get('/pendidik', 'index')->name('pendidik.index');
    Route::get('/pendidik/getCount', 'getCount')->name('pendidik.count');
    Route::get('/pendidik/{teacherName}/{teacherId}', 'show')->name('pendidik.show');
    Route::post('/pendidik', 'store') -> name('pendidik.store');
    Route::post('/pendidik/edit/{teacherName}/{teacherId}', 'update')->name('pendidik.update');
    Route::delete('/pendidik/delete', 'destroy')->name('pendidik.delete');
    
    Route::get('/tenpendidik', 'index')->name('tenpendidik.index');
    Route::get('/tenpendidik/getCount', 'getCount')->name('tenpendidik.count');
    Route::get('/tenpendidik/{teacherName}/{teacherId}', 'show')->name('tenpendidik.popup');
    Route::post('/tenpendidik', 'store') -> name('tenpendidik.store');
    Route::post('/tenpendidik/edit/{teacherName}/{teacherId}', 'update')->name('tenpendidik.update');
    Route::delete('/tenpendidik/delete', 'destroy')->name('tenpendidik.delete');
});


// Route Students
Route::get('/kelas/siswa', [StudentsModelsController::class, 'index']) -> name('ListStudents');

// Route profile
Route::get('/profil', [ProfileModelsController::class,'index']);
Route::get('/osis', [OsisModelsController::class,'index']);

Route::view('/testing', 'pages.students.index');
Route::view('/siswa', 'pages.classes.index');
// Route::view('/tenpendidik', 'pages.tenpendidik.index');
Route::view('/testingpendidik', 'pages.tenpendidik.testing');
Route::view('/ekstrakurikuler', 'pages.ekstrakurikuler.index');
Route::view('/ekstrakurikuler/testing', 'pages.ekstrakurikuler.ekskulOpen.index');
Route::view('/galeri', 'pages.galery.index');
Route::view('/galeri/kegiatan', 'pages.galery.galeryActivities.index');
Route::view('/galeri/sarpras', 'pages.galery.galeryInsfra.index');
Route::view('/galeri/prestasi', 'pages.galery.galeryAchiev.index');
Route::view('/galeri/karya', 'pages.galery.galeryCrea.index');
Route::view('/berita', 'pages.news.index');
Route::view('/berita/testing', 'pages.news.newsOpen.index');

// Route::get('/kelasAjax', [ClassesModelsController::class, 'index']) -> name('ListClass');
// Route::post('/kelasAjax/add/', [ClassesModelsController::class, 'store']) -> name('storeClass');
Route::get('/login', [UsersModelsController::class,"index"]);
Route::get('/register', [UsersModelsController::class,"createEmail"]);
Route::post('/register/{hashToken}', [UsersModelsController::class,"validateEmail"]);
Route::get('/register/{hashToken}/data', [UsersModelsController::class, 'createData'])->name('register.data');
Route::post('/register/{hashToken}/data/{validateToken}', [UsersModelsController::class, 'store'])->name('register.store');

Route::POST('/register', function () {
    return view('pages.login.register.email.index');
});

Route::POST('/register/data', function () {
    return view('pages.login.register.dataUser.index');
});

Route::POST('/login/error', function () {
    return view('pages.login.exception.sameNisNip.index');
});

Route::POST('/login/error/email', function () {
    return view('pages.login.exception.sameEmail.index');
});

Route::POST('/login/resetPass', function () {
    return view('pages.login.resetPass.resetPass.index');
});

Route::POST('/newPass', function () {
    return view('pages.login.resetPass.newPass.index');
});

Route::POST('/register/waitSignUp', function () {
    return view('pages.login.register.waitSignUp.index');
});
Route::view('/temp/newPass', 'pages.test.testNewPass');

Route::get('/chart', [ChartController::class, 'index']);

Route::view('/temp', 'pages.test.index');
Route::view('/slideshow', 'pages.test.slideShow');
Route::get('/texteditor/show', [TexteditorController::class, 'index']);
Route::post('/texteditor/upload', [TexteditorController::class, 'upload'])->name('ckEditor.upload');
Route::post('upload_image','TexteditorController@uploadImage')->name('upload');
Route::post('image-upload', [TexteditorController::class, 'storeImage'])->name('image.upload');
Route::get('/texteditor/create', [TexteditorController::class, 'create']);
Route::post('/texteditor', [TexteditorController::class, 'store']);
Route::post('/upload-image', 'EditorController@uploadImage')->name('upload.image');