<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\Auth\LoginController as TeacherLoginController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// Teacher Routes (LOGIN ONLY - NO REGISTRATION)
Route::prefix('teacher')->name('teacher.')->group(function () {
    // Guest routes (login only)
    Route::middleware('guest:teacher')->group(function () {
        Route::get('login', [TeacherLoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [TeacherLoginController::class, 'login']);
    });

    // Authenticated routes
    Route::middleware('auth:teacher')->group(function () {
        Route::post('logout', [TeacherLoginController::class, 'logout'])->name('logout');
        Route::get('dashboard', fn() => view('teacher.dashboard'))->name('dashboard');
        Route::get('assignments', fn() => view('teacher.assignments'))->name('assignments');
        Route::get('attendance', fn() => view('teacher.attendance'))->name('attendance');
        Route::get('grades', fn() => view('teacher.grades'))->name('grades');
        Route::get('students', fn() => view('teacher.students'))->name('students');
    });
});

// Admin Routes (LOGIN ONLY - NO PUBLIC REGISTRATION)
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest routes (login only - admin created via seeder)
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AdminLoginController::class, 'login']);
    });

    // Authenticated routes
    Route::middleware('auth:admin')->group(function () {
        Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');
        Route::get('dashboard', fn() => view('admin.dashboard'))->name('dashboard');

        Route::controller(\App\Http\Controllers\Admin\ClassController::class)->group(function () {
            Route::get('classes', 'index')->name('classes');
            Route::get('classes/create', 'create')->name('classes.create');
            Route::post('classes', 'store')->name('classes.store');
        });

        Route::controller(\App\Http\Controllers\Admin\SectionController::class)->group(function () {
            Route::get('sections', 'index')->name('sections');
            Route::get('sections/create', 'create')->name('sections.create');
            Route::post('sections', 'store')->name('sections.store');
        });

        Route::controller(\App\Http\Controllers\Admin\SubjectController::class)->group(function () {
            Route::get('subjects', 'index')->name('subjects');
            Route::get('subjects/create', 'create')->name('subjects.create');
            Route::post('subjects', 'store')->name('subjects.store');
        });

        Route::controller(\App\Http\Controllers\Admin\TeacherController::class)->group(function () {
            Route::get('teachers', 'index')->name('teachers');
            Route::get('teachers/create', 'create')->name('teachers.create');
            Route::post('teachers', 'store')->name('teachers.store');
        });

        Route::controller(\App\Http\Controllers\Admin\StudentController::class)->group(function () {
            Route::get('students', 'index')->name('students');
            Route::get('students/create', 'create')->name('students.create');
            Route::post('students', 'store')->name('students.store');
        });
    });
});
