@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-0">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.classes') }}">Classes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Class</li>
            </ol>
        </nav>

        <div class="mb-4">
            <h2 class="fw-bold">Add New Class</h2>
            <p class="text-muted">Create a new grade level for the school</p>
        </div>

        <div class="card border-0 shadow-sm" style="max-width: 600px;">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('admin.classes.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label">Class Name</label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. Grade 10"
                            value="{{ old('name') }}" required>
                        @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        <div class="form-text">Enter the name of the grade or class level.</div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.classes') }}" class="btn btn-light border">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Class</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection