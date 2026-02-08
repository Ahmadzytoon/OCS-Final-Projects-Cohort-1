@extends('admin.layout.master')
@section('title', 'Add Game')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Add Game</h1>
    <form action="{{ route('admin.games.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="type">Game Type</label>
            <input type="text" class="form-control" name="type" id="type" required>
        </div>
        <div class="mb-3">
            <label for="date">Date</label>
            <input type="date" class="form-control" name="date" id="date" required>
        </div>
        <div class="mb-3">
            <label for="time">Time</label>
            <input type="time" class="form-control" name="time" id="time" required>
        </div>
        <div class="mb-3">
            <label for="max_players">Max Players</label>
            <input type="number" class="form-control" name="max_players" id="max_players" required>
        </div>
        <div class="mb-3">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Game</button>
    </form>
</div>
@endsection
