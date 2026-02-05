@extends('provider.layouts.app')
@section('title', 'Cleanova | Bookings')

@section('content')
    <div class="container-fluid">
        <div class="cc-page-head mb-3">
            <h2 class="fw-bold mb-1">Bookings</h2>
            <p class="text-muted mb-0">View requests and manage your schedule.</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card cc-shell-card">
            <div class="card-body p-4">
                <div
                    class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2 mb-3">
                    <form method="GET" class="d-flex gap-2 align-items-center">
                        <span class="text-muted small">Filter:</span>
                        <select class="form-select form-select-sm cc-select-sm" name="status" style="width: 170px;">
                            <option value="" @selected(empty($status))>All</option>
                            <option value="pending" @selected($status === 'pending')>Pending</option>
                            <option value="accepted" @selected($status === 'accepted')>Confirmed</option>
                            <option value="completed" @selected($status === 'completed')>Completed</option>
                            <option value="rejected" @selected($status === 'rejected')>Canceled</option>
                        </select>
                        <button class="btn btn-outline-primary cc-btn-outline btn-sm" type="submit">Apply</button>
                    </form>
                </div>

                @php
                    $statusClass = [
                        'pending' => 'cc-badge-pending',
                        'accepted' => 'cc-badge-confirmed',
                        'completed' => 'cc-badge-upcoming',
                        'rejected' => 'cc-badge-cancel',
                    ];
                @endphp

                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="cc-table-head">
                            <tr>
                                <th>Customer</th>
                                <th>Service</th>
                                <th>Time</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bookings as $booking)
                                <tr>
                                    <td class="fw-semibold">{{ $booking->customer?->name ?? '-' }}</td>
                                    <td class="text-muted">
                                        {{ $booking->category?->name ?? ($booking->category?->code ?? '-') }}</td>
                                    <td class="text-muted">
                                        {{ $booking->slot ? \Carbon\Carbon::parse($booking->slot->start_time)->format('H:i') : '-' }}
                                        -
                                        {{ $booking->slot ? \Carbon\Carbon::parse($booking->slot->end_time)->format('H:i') : '-' }}
                                    </td>
                                    <td class="text-muted">{{ $booking->service_address }}</td>
                                    <td>
                                        <span
                                            class="badge cc-badge {{ $statusClass[$booking->status] ?? 'cc-badge-pending' }}">
                                            {{ $booking->status }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('provider.bookings.show', $booking) }}">
                                            <button type="button" class="btn btn-info">View Details</button>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted p-4">No bookings found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $bookings->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection

