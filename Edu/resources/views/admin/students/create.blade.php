@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-0">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.students') }}">Students</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Student</li>
            </ol>
        </nav>

        <div class="mb-4">
            <h2 class="fw-bold">Add New Student</h2>
            <p class="text-muted">Enroll a new student</p>
        </div>

        <div class="card border-0 shadow-sm" style="max-width: 600px;">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('admin.students.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Student Name</label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. Alice Johnson"
                            value="{{ old('name') }}" required>
                        @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Class</label>
                        <select name="class_id" id="class-select" class="form-select" required>
                            <option value="" disabled selected>Select Class</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>
                                    {{ $class->name }}</option>
                            @endforeach
                        </select>
                        @error('class_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Section</label>
                        <select name="section_id" id="section-select" class="form-select" required>
                            <option value="" disabled selected>Select Section</option>
                            <!-- Sections will be populated by JS -->
                        </select>
                        @error('section_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.students') }}" class="btn btn-light border">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Simple JS for Class-Section dependency
        const classes = @json($classes);
        const classSelect = document.getElementById('class-select');
        const sectionSelect = document.getElementById('section-select');
        const oldSectionId = "{{ old('section_id') }}";

        function updateSections() {
            const classId = classSelect.value;
            const selectedClass = classes.find(c => c.id == classId);

            sectionSelect.innerHTML = '<option value="" disabled selected>Select Section</option>';

            if (selectedClass && selectedClass.sections) {
                selectedClass.sections.forEach(section => {
                    const option = document.createElement('option');
                    option.value = section.id;
                    option.textContent = section.name;
                    if (section.id == oldSectionId) option.selected = true;
                    sectionSelect.appendChild(option);
                });
            }
        }

        classSelect.addEventListener('change', updateSections);
        if (classSelect.value) updateSections();
    </script>
@endsection