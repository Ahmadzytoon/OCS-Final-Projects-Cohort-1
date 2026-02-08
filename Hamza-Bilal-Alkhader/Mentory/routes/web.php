<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\AdminTeacherProfileController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\AdminTeacherController;
use App\Http\Controllers\AdminReviewController;
use App\Http\Controllers\AdminSubjectBranchController;
use App\Http\Controllers\TeacherListController;
use App\Http\Controllers\TeacherDetailsController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\StudentReviewController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminDashboardController;






/*Route::get('/', function () {
    return view('student.home');
})->name('pages.home');

Route::get('/teachers', function () {
    return view('student.teachers');
})->name('pages.teachers');

Route::get('/teacher-details', function () {
    return view('student.teacher-details');
})->name('student.teacher-details');

Route::get('/account', function () {
    return view('pages.account');
})->name('pages.account');

Route::get('/requests', function () {
    return view('student.requests');
})->name('student.requests');

Route::get('/favorites', function () {
    return view('student.favorites');
})->name('student.favorites');

Route::get('/teacher/dashboard', function () {
    return view('teacher.dashboard');
})->name('teacher.dashboard');


Route::prefix('admin')->group(function () {
    Route::get('/teacher-profiles', function () {
        return view('admin.teacher-profiles');
    })->name('admin.teacher-profiles');

    Route::get('/students', function () {
        return view('admin.students');
    })->name('admin.students');

    Route::get('/teachers', function () {
        return view('admin.teachers');
    })->name('admin.teachers');

    Route::get('/reviews', function () {
        return view('admin.reviews');
    })->name('admin.reviews');
    Route::get('/subjects-branches', function () {
        return view('admin.subjects-branches');
    })->name('admin.subjects-branches');
    Route::get('/teacher-profile/show', function () {
        return view('admin.teacher-profile-show');
    })->name('admin.teacher-profile.show');
});*/


/*
|--------------------------------------------------------------------------
| Public (Guest) - متاح للجميع
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('pages.home');


Route::get('/teachers', [TeacherListController::class, 'index'])
    ->name('pages.teachers');

Route::get('/teachers/{teacherProfile}', [TeacherDetailsController::class, 'show'])
    ->name('student.teacher-details');


/*
|--------------------------------------------------------------------------
| Authenticated (أي حد عامل login) - My Account + Profile Breeze
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

Route::get('/account', [AccountController::class, 'edit'])->name('pages.account');

Route::patch('/account', [AccountController::class, 'updateProfile'])
    ->name('account.update');

Route::put('/account/password', [AccountController::class, 'updatePassword'])
    ->name('account.password.update');

Route::delete('/account', [AccountController::class, 'destroy'])
    ->name('account.destroy');
    

    // Breeze profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| Student Only
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','role:student'])->group(function () {
   Route::get('/requests', [ServiceRequestController::class, 'index'])
    ->name('student.requests');

Route::post('/teachers/{teacherProfile}/requests', [ServiceRequestController::class, 'store'])
    ->name('student.requests.store');

 Route::post('/requests/{serviceRequest}/reviews', [StudentReviewController::class, 'store'])
    ->name('student.reviews.store');

    
Route::delete('/reviews/{review}', [StudentReviewController::class, 'destroy'])
    ->name('student.reviews.destroy');


Route::get('/favorites', [FavoriteController::class, 'index'])
     ->name('student.favorites');

 Route::post('/teachers/{teacherProfile}/favorite', [FavoriteController::class, 'toggle'])
     ->name('student.favorites.toggle');

 Route::delete('/favorites/{favorite}', [FavoriteController::class, 'destroy'])
    ->name('student.favorites.destroy');


});


/*
|--------------------------------------------------------------------------
| Teacher Only
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:teacher'])->group(function () {
     Route::get('/teacher/dashboard', [TeacherDashboardController::class, 'index'])
        ->name('teacher.dashboard');

    Route::post('/teacher/profile', [TeacherDashboardController::class, 'saveProfile'])
        ->name('teacher.profile.save');

    Route::delete('/teacher/profile', [TeacherDashboardController::class, 'deleteProfile'])
        ->name('teacher.profile.delete');

        
          Route::patch('/teacher/requests/{serviceRequest}/accept', [TeacherDashboardController::class, 'acceptRequest'])
        ->name('teacher.requests.accept');

    Route::patch('/teacher/requests/{serviceRequest}/reject', [TeacherDashboardController::class, 'rejectRequest'])
        ->name('teacher.requests.reject');

    Route::patch('/teacher/requests/{serviceRequest}/complete', [TeacherDashboardController::class, 'completeRequest'])
        ->name('teacher.requests.complete');


});


/*
|--------------------------------------------------------------------------
| Admin Only
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth','role:admin'])->group(function () {

 Route::get('/dashboard', [AdminDashboardController::class, 'index'])
    ->name('admin.dashboard');


  Route::get('/teacher-profiles', [AdminTeacherProfileController::class, 'index'])
    ->name('admin.teacher-profiles');

Route::get('/teacher-profiles/{profile}', [AdminTeacherProfileController::class, 'show'])
    ->name('admin.teacher-profiles.show');

Route::patch('/teacher-profiles/{profile}/approve', [AdminTeacherProfileController::class, 'approve'])
    ->name('admin.teacher-profiles.approve');

Route::patch('/teacher-profiles/{profile}/reject', [AdminTeacherProfileController::class, 'reject'])
    ->name('admin.teacher-profiles.reject');

Route::patch('/teacher-profiles/{profile}/toggle-featured', [AdminTeacherProfileController::class, 'toggleFeatured'])
    ->name('admin.teacher-profiles.toggleFeatured');

Route::get('/students', [AdminStudentController::class, 'index'])
    ->name('admin.students');

Route::delete('/students/{student}', [AdminStudentController::class, 'destroy'])
    ->name('admin.students.destroy');

Route::get('/teachers', [AdminTeacherController::class, 'index'])
    ->name('admin.teachers');

Route::delete('/teachers/{teacher}', [AdminTeacherController::class, 'destroy'])
    ->name('admin.teachers.destroy');

Route::get('/reviews', [AdminReviewController::class, 'index'])
    ->name('admin.reviews');

Route::delete('/reviews/{review}', [AdminReviewController::class, 'destroy'])
    ->name('admin.reviews.destroy');

Route::get('/subjects-branches', [AdminSubjectBranchController::class, 'index'])
    ->name('admin.subjects-branches');

Route::post('/subjects', [AdminSubjectBranchController::class, 'storeSubject'])
    ->name('admin.subjects.store');

Route::post('/branches', [AdminSubjectBranchController::class, 'storeBranch'])
    ->name('admin.branches.store');
});

/*Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/
require __DIR__.'/auth.php';
