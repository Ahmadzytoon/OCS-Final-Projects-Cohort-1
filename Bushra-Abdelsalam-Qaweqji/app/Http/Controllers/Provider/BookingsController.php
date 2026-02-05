<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function index(Request $request)
    {
        $providerId = auth()->id();
        $status = $request->query('status');

        $bookings = Booking::query()
            ->where('provider_user_id', $providerId)
            ->when($status, fn ($q) => $q->where('status', $status))
            ->with(['customer:id,name', 'category:id,code,name', 'slot:id,start_time,end_time'])
            ->orderByDesc('id')
            ->paginate(10);

        return view('provider.pages.bookings', compact('bookings', 'status'));
    }

    public function show(Booking $booking)
    {
        $this->ensureOwner($booking);

        $booking->load([
            'customer:id,name',
            'category:id,code,name',
            'slot:id,start_time,end_time',
            'payment',
        ]);

        return view('provider.pages.booking-details', compact('booking'));
    }

    public function accept(Booking $booking)
    {
        $this->ensureOwner($booking);
        $booking->update(['status' => 'accepted']);

        return back()->with('success', 'Booking accepted.');
    }

    public function reject(Booking $booking)
    {
        $this->ensureOwner($booking);
        $booking->update(['status' => 'rejected']);

        return back()->with('success', 'Booking rejected.');
    }

    public function complete(Booking $booking)
    {
        $this->ensureOwner($booking);
        $booking->update(['status' => 'completed']);

        return back()->with('success', 'Booking marked as completed.');
    }

    private function ensureOwner(Booking $booking): void
    {
        if ($booking->provider_user_id !== auth()->id()) {
            abort(403);
        }
    }
}
