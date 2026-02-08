<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeeklyGame;
use App\Models\Reservation;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationConfirmation;

class ReservationController extends Controller
{
    // Show reservation form for a specific game
    public function create($gameId)
    {
        $game = WeeklyGame::findOrFail($gameId);
        $availableSpots = $game->max_players - $game->current_players;
        
        return view('site.reservation', compact('game', 'availableSpots'));
    }

    // Process reservation form submission
    public function store(Request $request, $gameId)
    {
        $game = WeeklyGame::findOrFail($gameId);
        
        // Validate available spots
        $availableSpots = $game->max_players - $game->current_players;
        
        $request->validate([
            'reserved_by_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'number_of_players' => 'required|integer|min:1|max:' . $availableSpots,
            'player_names' => 'nullable|array',
            'player_names.*' => 'string|max:255',
            'payment_method' => 'required|in:cash,clique',
            'special_requests' => 'nullable|string|max:500'
        ]);

        // Prepare player names
        $playerNames = [];
        if ($request->filled('player_names')) {
            foreach ($request->player_names as $name) {
                if (!empty(trim($name))) {
                    $playerNames[] = trim($name);
                }
            }
        }

        // Create reservation
        $reservation = Reservation::create([
            'weekly_game_id' => $gameId,
            'reserved_by_name' => $request->reserved_by_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'number_of_players' => $request->number_of_players,
            'player_names' => $playerNames,
            'payment_method' => $request->payment_method,
            'special_requests' => $request->special_requests,
            'status' => 'pending'
        ]);

        // Update game's current players count
        $game->increment('current_players', $request->number_of_players);

        // Send confirmation email (optional - setup mail first)
        // Mail::to($request->email)->send(new ReservationConfirmation($reservation));

        return redirect()->route('reservation.confirmation', $reservation->id)
                         ->with('success', 'Reservation submitted successfully!');
    }

    // Show confirmation page
    public function confirmation($id)
    {
        $reservation = Reservation::with('weeklyGame')->findOrFail($id);
        return view('site.reservation-confirmation', compact('reservation'));
    }
}