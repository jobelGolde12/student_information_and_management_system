<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\instructorController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\MyDashboard;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SuperAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [MyDashboard::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/add-student', [StudentController::class, 'addStudent'])->name('add.student');
Route::post('/add-student', [StudentController::class, 'addStudentPost'])->name('add.studentPost');
Route::get('/add-instructor', [instructorController::class, 'addInstructor'])->name('add.instructor');
Route::post('/add-instructor', [instructorController::class, 'addInstructorPost'])->name('add.instructorPost');
Route::post('add-subject', [instructorController::class, 'addSubject'])->name('add.subject');
Route::get('/view-subject', [instructorController::class, 'addSubjectRoute'])->name('add.subjectRoute');
Route::delete('/delete-subject/{id}', [instructorController::class, 'deleteSubject'])->name('delete.subject');


Route::delete('/delete-user/{id}', [MyController::class, 'deleteUser'])->name('user.delete');
Route::put('/edit-user/{user}', [MyController::class, 'update'])->name('edit.user');
Route::get('/create-admin', [SuperAdmin::class, 'createAdmin'])->name('create.admin');
Route::post('/create-admin', [SuperAdmin::class, 'createAdminPost'])->name('create.adminPost');



require __DIR__.'/auth.php';
