<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Página de inicio
Route::get('/', function () {
    return view('welcome');
});

// Rutas de registro
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Rutas de inicio de sesión
Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Ruta para cerrar sesión
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Ruta principal protegida por autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('students', StudentController::class);
    
    Route::post('students/{student}/upload-documents', [StudentController::class, 'uploadDocuments'])->name('students.upload_documents');
    Route::get('students/{student}/view-document/{id}', [StudentController::class, 'viewDocument'])->name('students.view_document');
    Route::get('students/{student}/citas', [StudentController::class, 'citas'])->name('students.citas');
    Route::post('students/{student}/add-cita', [StudentController::class, 'addCita'])->name('students.add_cita');
});
