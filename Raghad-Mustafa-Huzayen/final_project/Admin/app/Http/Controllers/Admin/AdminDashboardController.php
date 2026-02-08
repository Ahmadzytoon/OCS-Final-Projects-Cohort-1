<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Booking;

class AdminDashboardController extends Controller
{
    public function index()
{
    $upcomingGamesList = Game::orderBy('date', 'asc')->get();
    $recentBookings = Booking::orderBy('created_at', 'desc')->take(5)->get(); // last 5 bookings

    return view('admin.AdminDashboard', compact('upcomingGamesList', 'recentBookings'));
}
}
