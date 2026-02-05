<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AllApartments;
use App\Http\Controllers\AllUniversities;
use App\Http\Controllers\ApartmentAdminController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\OwnerProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UniversitiesController;
use App\Http\Controllers\UserRequestController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;



Route::get('', [IndexController::class, 'index'])->name('index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




//admin
Route::resource('admin', AdminController::class)->middleware(['auth', 'AdminAuth']);

Route::resource('universities', UniversitiesController::class)->middleware(['auth', 'AdminAuth']);

Route::resource('users', UsersController::class)->middleware(['auth', 'AdminAuth']);

Route::resource('apartments', ApartmentAdminController::class)->middleware(['auth', 'AdminAuth']);

Route::resource('admins', AdminsController::class)->middleware(['auth', 'AdminAuth']);

Route::resource('admin_profile', AdminProfileController::class)->middleware(['auth', 'AdminAuth']);






//owner
Route::resource('owner', OwnerController::class)->middleware(['auth', 'OwnerAuth']);

Route::resource('owner_apartments', ApartmentController::class)->middleware(['auth', 'OwnerAuth']);


Route::resource('request', RequestController::class)->middleware(['auth', 'OwnerAuth']);


// Route::resource('messages', MessagesController::class)->middleware(['auth', 'OwnerAuth']);

Route::resource('ownerprofile', OwnerProfileController::class)->middleware(['auth', 'OwnerAuth']);




Route::get('university', [AllUniversities::class, 'index'])->name('universitiesPage');


Route::get('apartment', [AllApartments::class, 'index'])->name('apartmentspage');

// Route for submitting a request
Route::post('/apartment/{apartment}/request', [UserRequestController::class, 'store'])
    ->name('apartment.request');

// Route for starting a chat
Route::get('/chat/{apartment}/{user}', [ChatController::class, 'show'])
    ->name('chat.index');


// Update request status (Approve/Reject)
Route::patch('/owner/requests/{request}/{status}', [RequestController::class, 'updateStatus'])->name('owner.request.status');



Route::get('apartment-deatails/{apartment}', [AllApartments::class, 'show'])->name('apartments_d');


// Route::get('messages_page', function () {

//     return view('messages');

// })->name('messages_page');


// // Student Route
// Route::get('/messages/{id}', [MessagesController::class, 'show'])->name('messages.show');
// // If you have a general index for students
// Route::get('/messages', [MessagesController::class, 'index'])->name('messages.index');



// Unified Messages Routes (Accessible by both Owner and Student)
Route::middleware(['auth'])->group(function () {
    Route::get('/messages', [MessagesController::class, 'index'])->name('messages.index');
    Route::get('/messages/{id}', [MessagesController::class, 'show'])->name('messages.show');
    Route::post('/messages', [MessagesController::class, 'store'])->name('messages.store');
});




require __DIR__ . '/auth.php';
