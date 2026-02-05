@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-0">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.teachers') }}">Teachers</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Teacher</li>
            </ol>
        </nav>

        <div class="mb-4">
            <h2 class="fw-bold">Add New Teacher</h2>
            <p class="text-muted">Create a new teacher account</p>
        </div>

        <div class="card border-0 shadow-sm" style="max-width: 600px;">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('admin.teachers.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. John Doe"
                            value="{{ old('name') }}" required>
                        @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="teacher@example.com"
                            value="{{ old('email') }}" required>
                        @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required autocomplete="new-password">
                        @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.teachers') }}" class="btn btn-light border">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Teacher</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection