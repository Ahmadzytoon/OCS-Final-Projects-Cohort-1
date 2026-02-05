@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-0">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.subjects') }}">Subjects</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Subject</li>
            </ol>
        </nav>

        <div class="mb-4">
            <h2 class="fw-bold">Add New Subject</h2>
            <p class="text-muted">Define a subject and assign it to a class</p>
        </div>

        <div class="card border-0 shadow-sm" style="max-width: 600px;">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('admin.subjects.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Subject Name</label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. Mathematics, History"
                            value="{{ old('name') }}" required>
                        @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">For Class</label>
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
                        <label class="form-label">Assign Teacher (Optional)</label>
                        <select name="teacher_id" class="form-select">
                            <option value="" selected>Select a teacher...</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                    {{ $teacher->name }}</option>
                            @endforeach
                        </select>
                        <div class="form-text">You can assign a teacher later.</div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.subjects') }}" class="btn btn-light border">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Subject</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection