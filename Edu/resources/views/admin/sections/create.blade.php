@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-0">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.sections') }}">Sections</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Section</li>
            </ol>
        </nav>

        <div class="mb-4">
            <h2 class="fw-bold">Add New Section</h2>
            <p class="text-muted">Divide a class into manageable groups</p>
        </div>

        <div class="card border-0 shadow-sm" style="max-width: 600px;">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('admin.sections.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Select Class</label>
                        <select name="class_id" class="form-select" required>
                            <option value="" disabled selected>Select a class...</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>
                                    {{ $class->name }}</option>
                            @endforeach
                        </select>
                        @error('class_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Section Name</label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. A, B, Red, Blue"
                            value="{{ old('name') }}" required>
                        @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        <div class="form-text">Usually a single letter (A, B, C) or name.</div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.sections') }}" class="btn btn-light border">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Section</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection