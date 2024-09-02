<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\HealthProfessionalController;
use Illuminate\Support\Facades\Route;

// Página de inicio
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Rutas de registro
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Rutas de inicio de sesión
Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Ruta para cerrar sesión
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {

    // Ruta principal después de iniciar sesión
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Rutas para estudiantes (solo vista y documentos)
    Route::middleware(['role:student'])->group(function () {
        Route::get('/students', [StudentController::class, 'index'])->name('students.index');
        Route::get('/students/show', [StudentController::class, 'show'])->name('students.show');
        Route::post('/students/upload-documents', [StudentController::class, 'uploadDocuments'])->name('students.upload_documents');
        Route::get('/students/view-document/{id}', [StudentController::class, 'viewDocument'])->name('students.view_document');
    });

    // Rutas para profesionales de la salud
    Route::middleware(['role:health_professional'])->group(function () {
        Route::resource('healthprofessional', HealthProfessionalController::class)->names([
            'index' => 'healthprofessional.index',
            'create' => 'healthprofessional.create',
            'store' => 'healthprofessional.store',
            'show' => 'healthprofessional.show',
            'edit' => 'healthprofessional.edit',
            'update' => 'healthprofessional.update',
            'destroy' => 'healthprofessional.destroy',
        ]);
        Route::post('healthprofessional/{student}/upload-documents', [HealthProfessionalController::class, 'uploadDocuments'])->name('healthprofessional.upload_documents');
        Route::get('healthprofessional/{student}/view-document/{id}', [HealthProfessionalController::class, 'viewDocument'])->name('healthprofessional.view_document');
        Route::get('healthprofessional/{student}/citas', [HealthProfessionalController::class, 'citas'])->name('healthprofessional.citas');
        Route::post('healthprofessional/{student}/add-cita', [HealthProfessionalController::class, 'addCita'])->name('healthprofessional.add_cita');
    });

    // Rutas para docentes
    Route::middleware(['role:docent'])->group(function () {
        Route::resource('teachers', TeacherController::class)->names([
            'index' => 'teachers.index',
            'create' => 'teachers.create',
            'store' => 'teachers.store',
            'show' => 'teachers.show',
            'edit' => 'teachers.edit',
            'update' => 'teachers.update',
            'destroy' => 'teachers.destroy',
        ]);
    });
});
