@extends('provider.layouts.app')
@section('title', 'Cleanova | Provider Dashboard')

@section('content')
    <div class="container-fluid">

        <div class="cc-greeting mb-4">
            <h2 class="fw-bold mb-1">Welcome, {{ auth()->user()->name }}!</h2>
            <p class="text-muted mb-0">Here is a quick look at your business.</p>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card cc-stat-card h-100">
                    <div class="card-body">
                        <div class="cc-stat-value mt-3">{{ number_format((float) $totalEarnings, 2) }} JOD</div>
                        <div class="text-muted">Total Earnings</div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-4">
                <div class="card cc-stat-card h-100">
                    <div class="card-body">
                        <div class="cc-stat-value mt-3">{{ $completedCount }}</div>
                        <div class="text-muted">Completed Jobs</div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-4">
                <div class="card cc-stat-card h-100">
                    <div class="card-body">
                        <div class="cc-stat-value mt-3">{{ number_format((float) $avgRating, 2) }}</div>
                        <div class="text-muted">Average Rating</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-12">
                <div class="card cc-shell-card">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold mb-0">Upcoming Bookings</h5>
                            <a href="{{ route('provider.bookings') }}" class="cc-link">View all</a>
                        </div>

                        @php
                            $statusClass = [
                                'pending' => 'cc-badge-pending',
                                'accepted' => 'cc-badge-confirmed',
                                'completed' => 'cc-badge-upcoming',
                                'rejected' => 'cc-badge-cancel',
                            ];
                        @endphp

                        @forelse ($upcomingBookings as $booking)
                            <div class="cc-booking-item">
                                <div class="cc-book-ico">??</div>
                                <div class="flex-grow-1">
                                    <div class="fw-bold">{{ $booking->customer?->name ?? '-' }}</div>
                                    <div class="text-muted small">
                                        {{ $booking->category?->name ?? $booking->category?->code ?? '-' }}
                                    </div>
                                </div>
                                <div class="text-end">
                                    <div class="fw-semibold">
                                        {{ $booking->slot ? \Carbon\Carbon::parse($booking->slot->start_time)->format('H:i') : '-' }}
                                        -
                                        {{ $booking->slot ? \Carbon\Carbon::parse($booking->slot->end_time)->format('H:i') : '-' }}
                                    </div>
                                    <span class="badge cc-badge {{ $statusClass[$booking->status] ?? 'cc-badge-pending' }}">
                                        {{ $booking->status }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <div class="text-muted">No upcoming bookings.</div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

