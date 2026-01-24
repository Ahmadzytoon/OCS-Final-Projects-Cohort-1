<?php
namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Request as ApartmentRequest; // Alias to avoid confusion with the Request class
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRequestController extends Controller
{
    public function store(Apartment $apartment)
    {
        // 1. Check if the user is the owner (Owner shouldn't request their own apartment)
        if (Auth::id() === $apartment->owner_id) {
            return back()->with('error', 'You cannot request your own apartment.');
        }

        if (Auth::id() === $apartment->owner_id) {
            return back()->with('error', 'You cannot request your own apartment.');
        }

        // 2. Prevent duplicate requests
        $exists = ApartmentRequest::where('student_id', Auth::id())
            ->where('apartment_id', $apartment->id)
            ->exists();

        if ($exists) {
            return back()->with('info', 'You have already sent a request for this apartment.');
        }

        // 3. Create the request
        ApartmentRequest::create([
            'student_id' => Auth::id(),
            'apartment_id' => $apartment->id,
            'status' => 'pending', // Default status
        ]);

        return back()->with('success', 'Your request has been sent to the owner!');
    }
}