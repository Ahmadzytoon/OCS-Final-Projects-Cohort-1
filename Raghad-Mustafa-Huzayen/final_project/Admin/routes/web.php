<?php

use App\Http\Controllers\WeeklyGameController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('tables', function () {
    return view('admin.tables');
});

Route::get('/', function () {
    return view('site.index');
})->name('index');

Route::get('test', function () {
    return view('site.test');
})->name('test');

Route::get('private', function () {
    return view('site.private');
})->name('private');

Route::get('contact', function () {
    return view('site.contact');
})->name('contact');


Route::get('/games', [WeeklyGameController::class, 'index'])->name('games.index');

Route::get('/coaches', [CoachController::class, 'index'])->name('coaches.index');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

// Reservation Routes
Route::get('/reservation/{game}', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservation/{game}', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/reservation-confirmation/{id}', [ReservationController::class, 'confirmation'])->name('reservation.confirmation');

// Admin Dashboard Route
Route::get('/dashboard', [AdminDashboardController::class, 'index']);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('games', App\Http\Controllers\Admin\GameController::class);
    Route::resource('bookings', App\Http\Controllers\Admin\BookingController::class);
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class);
    Route::resource('coaches', App\Http\Controllers\Admin\CoachController::class);
});