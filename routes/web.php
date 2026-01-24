<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\Instructor\InstructorController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Visitor\VisitorController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'welcome');

Route::prefix('visitor')->group(function () {
    Route::get('/', [VisitorController::class, 'home'])->name('visitor.home');
    Route::get('/courses', [VisitorController::class, 'courses'])->name('visitor.courses');
    Route::get('/course-details/{course}', [VisitorController::class, 'courseDetails'])->name('visitor.course-details');
    Route::get('/pricing', [VisitorController::class, 'pricing'])->name('visitor.pricing');
});

Volt::route('/instructor-register', 'pages.auth.instructor-register')->name('visitor.instructor-register');
Volt::route('/login', 'pages.auth.login')->name('visitor.login');
Volt::route('/register', 'pages.auth.register')->name('visitor.register');
Volt::route('/forgot-password', 'pages.auth.forgot-password')->name('visitor.forgot-password');
Volt::route('/reset-password', 'pages.auth.reset-password')->name('visitor.reset-password');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [DashboardController::class, 'users'])->name('admin.users');
    Route::get('/student/{student}', [DashboardController::class, 'student'])->name('admin.student');
    Route::get('/instructor/{instructor}', [DashboardController::class, 'instructor'])->name('admin.instructor');
    Route::get('/courses', [DashboardController::class, 'courses'])->name('admin.courses');
    Route::get('/badges', [DashboardController::class, 'badges'])->name('admin.badges');
    Route::get('/badge/edit/{badge}', [DashboardController::class, 'badgeEdit'])->name('admin.badge-edit');
    Route::get('/badge/add', [DashboardController::class, 'badgeEdit'])->name('admin.add-badge');
    Route::get('/badge/{badge}', [DashboardController::class, 'badgeDetails'])->name('admin.badge-details');
    Route::get('/enrollments', [DashboardController::class, 'enrollments'])->name('admin.enrollments');
});

Route::prefix('student')->group(function () {
    Route::get('/', [StudentController::class, 'home'])->name('student.home');
    Route::get('/courses', [StudentController::class, 'courses'])->name('student.courses');
    Route::get('/course-details', [StudentController::class, 'courseDetails'])->name('student.course-details');
    Route::get('/enrolled-course-details', [StudentController::class, 'enrolledCourseDetails'])->name('student.enrolled-course-details');
    Route::get('/my-courses', [StudentController::class, 'myCourses'])->name('student.my-courses');
    Route::get('/my-progress', [StudentController::class, 'myProgress'])->name('student.my-progress');
    Route::get('/profile', [StudentController::class, 'profile'])->name('student.profile');
    Route::get('/project', [StudentController::class, 'project'])->name('student.project');
    Route::get('/topic', [StudentController::class, 'topic'])->name('student.topic');
    Route::post('/enroll', [StudentController::class, 'enroll'])->name('student.enroll');
    Route::post('/profile/update', [StudentController::class, 'updateProfile'])->name('student.profile.update');
});

Route::prefix('instructor')->group(function () {
    Route::get('/', [InstructorController::class, 'home'])->name('instructor.home');
    Route::get('/generate-course', [InstructorController::class, 'generateCourse'])->name('instructor.generate-course');
    Route::get('/edit-course', [InstructorController::class, 'editCourse'])->name('instructor.edit-course');
    Route::post('/store-course', [InstructorController::class, 'storeCourse'])->name('instructor.store-course');
    Route::put('/update-course/{id}', [InstructorController::class, 'updateCourse'])->name('instructor.update-course');
    Route::post('/store-module', [InstructorController::class, 'storeModule'])->name('instructor.store-module');
    Route::put('/update-module/{id}', [InstructorController::class, 'updateModule'])->name('instructor.update-module');
    Route::delete('/delete-module/{id}', [InstructorController::class, 'deleteModule'])->name('instructor.delete-module');
    Route::delete('/delete-topic/{id}', [InstructorController::class, 'deleteTopic'])->name('instructor.delete-topic');
    Route::put('/save-settings/{id}', [InstructorController::class, 'SaveSettings'])->name('instructor.save-settings');
    Route::get('/my-course-details', [InstructorController::class, 'myCourseDetails'])->name('instructor.my-course-details');
    Route::get('/profile', [InstructorController::class, 'profile'])->name('instructor.profile');
    Route::get('/edit-project', [InstructorController::class, 'editProject'])->name('instructor.edit-project');
    Route::get('/edit-topic', [InstructorController::class, 'editTopic'])->name('instructor.edit-topic');
    Route::get('/preview-project', [InstructorController::class, 'previewProject'])->name('instructor.preview-project');
    Route::get('/preview-topic', [InstructorController::class, 'previewTopic'])->name('instructor.preview-topic');
    Route::post('/save-topic', [InstructorController::class, 'saveTopic'])->name('instructor.save-topic');
    Route::post('/profile/update', [InstructorController::class, 'updateProfile'])->name('instructor.profile.update');
});

Route::get('/about', [GeneralController::class, 'about'])->name('about');
Route::get('/contact', [GeneralController::class, 'contact'])->name('contact');
