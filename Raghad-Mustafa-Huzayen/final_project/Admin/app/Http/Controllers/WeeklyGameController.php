<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeeklyGame;

class WeeklyGameController extends Controller
{
    public function index()
    {
        // Get all active weekly games, ordered by day order
        $games = WeeklyGame::where('is_active', true)
                          ->orderByRaw("FIELD(day, 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday')")
                          ->orderBy('time')
                          ->get();
        
        // Pass data to view
        return view('site.games', compact('games'));
    }
}