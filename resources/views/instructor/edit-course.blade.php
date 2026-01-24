@extends('layouts.instructor')
@section('title', 'Code Quest | Edit Course')


@section('content')
    <main class="main">

        <!-- Page Header -->
        <div class="page-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-3">
                            <input type="text" class="module-title-input"
                                value="{{ $course->title ?? 'Create New Course' }}"
                                style="font-size: 2rem; padding: 0.5rem 0;" readonly>
                            @if ($course)
                                <span class="status-badge {{ $course->is_private ? 'status-draft' : 'status-published' }}">
                                    <i
                                        class="bi {{ $course->is_private ? 'bi-file-earmark' : 'bi-check-circle' }} me-1"></i>
                                    {{ $course->is_private ? 'Draft' : 'Published' }}
                                </span>
                            @endif
                        </div>
                        @if ($course)
                            <p class="text-muted mb-0">Last updated: {{ $course->updated_at->diffForHumans() }} •
                                {{ $course->enrollments_count ?? 0 }} students enrolled</p>
                        @endif
                    </div>
                    <div class="col-lg-4">
                        <div class="action-buttons justify-content-lg-end">
                            @if ($course)
                                <div class="student-action-buttons">
                                    <a class="btn-primary"
                                        href="{{ route('instructor.my-course-details', ['id' => $course->id]) }}"
                                        target="_blank" style="max-width: 300px; margin: 0 auto;">
                                        <i class="bi bi-play-circle me-2"></i>Preview
                                    </a>
                                </div>
                            @endif
                            <button form="courseInfoForm" type="submit" class="btn btn-outline">
                                <i class="bi bi-save me-2"></i>{{ $course ? 'Save Changes' : 'Create Course' }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs Navigation -->
        <section class="section">
            <div class="container">
                <div class="content-tabs" data-aos="fade-up">
                    <ul class="nav nav-tabs custom-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#info" type="button"
                                role="tab">
                                <i class="bi bi-info-circle"></i>
                                Course Info
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#curriculum" type="button"
                                role="tab">
                                <i class="bi bi-list-ul"></i>
                                Curriculum
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#settings" type="button"
                                role="tab">
                                <i class="bi bi-gear"></i>
                                Settings
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#analytics" type="button"
                                role="tab">
                                <i class="bi bi-graph-up"></i>
                                Analytics
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content custom-tab-content">

                        <!-- TAB 1: COURSE INFO -->
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="row">
                                <div class="col-12">
                                    <form id="courseInfoForm" method="POST"
                                        action="{{ $course ? route('instructor.update-course', $course->id) : route('instructor.store-course') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @if ($course)
                                            @method('PUT')
                                        @endif

                                        <div class="mb-5">
                                            <div class="section-title">
                                                <span class="section-number">1</span>
                                                <h3>Course Basics</h3>
                                            </div>

                                            <div class="mb-4">
                                                <label for="courseTitle" class="form-label fw-semibold">
                                                    Course Title *
                                                </label>
                                                <input type="text" id="courseTitle" name="courseTitle"
                                                    class="form-control form-control-lg" required minlength="10"
                                                    value="{{ old('title', $course->title ?? '') }}">
                                            </div>

                                            <div class="mb-4">
                                                <label for="shortDescription" class="form-label fw-semibold">
                                                    Short Description *
                                                </label>
                                                <textarea id="shortDescription" name="short_description" class="form-control" rows="3" required maxlength="160">{{ old('short_description', $course->short_description ?? '') }}</textarea>
                                                <div class="d-flex justify-content-between align-items-center mt-2">
                                                    <small class="text-muted">This appears on course cards</small>
                                                    <small class="text-muted"><span id="charCount">108</span>/160</small>
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <label for="fullDescription" class="form-label fw-semibold">
                                                    Full Description *
                                                </label>
                                                <textarea id="fullDescription" name="full_description" class="form-control" rows="8" required>{{ old('full_description', $course->full_description ?? '') }}</textarea>
                                                <small class="text-muted d-block mt-2">Detailed overview shown on
                                                    the course page</small>
                                            </div>

                                            <div class="mb-4">
                                                <label for="courseThumbnail" class="form-label fw-semibold">
                                                    Course Thumbnail
                                                </label>
                                                @if (isset($course->thumbnail))
                                                    <div class="mb-2">
                                                        <img src="{{ asset('general/img/education/' . $course->thumbnail) }}"
                                                            alt="Current Thumbnail"
                                                            style="max-height: 200px; border-radius: 8px;">
                                                    </div>
                                                @endif
                                                <div class="border rounded p-4 text-center bg-light">
                                                    <p class="mb-2 mt-3">Upload course thumbnail</p>
                                                    <input type="file" id="courseThumbnail" name="courseThumbnail"
                                                        class="form-control mt-3" accept="image/*">
                                                    <small class="text-muted d-block mt-2">Recommended:
                                                        1200x675px</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-5">
                                            <div class="section-title">
                                                <span class="section-number">2</span>
                                                <h3>Course Details</h3>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-md-6 mb-3">
                                                    <label for="category" class="form-label fw-semibold">
                                                        Category *
                                                    </label>
                                                    <select id="category" name="category_id"
                                                        class="form-control form-control-lg" required>
                                                        <option value="">Choose a category</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                {{ old('category_id', $course->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="difficulty" class="form-label fw-semibold">
                                                        Difficulty Level *
                                                    </label>
                                                    <select id="difficulty" name="difficulty"
                                                        class="form-control form-control-lg" required>
                                                        <option value="">Choose difficulty level</option>
                                                        <option value="beginner"
                                                            {{ old('difficulty', $course->difficulty ?? '') == 'beginner' ? 'selected' : '' }}>
                                                            Beginner</option>
                                                        <option value="intermediate"
                                                            {{ old('difficulty', $course->difficulty ?? '') == 'intermediate' ? 'selected' : '' }}>
                                                            Intermediate</option>
                                                        <option value="advanced"
                                                            {{ old('difficulty', $course->difficulty ?? '') == 'advanced' ? 'selected' : '' }}>
                                                            Advanced</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <label for="pricing" class="form-label fw-semibold">
                                                    Pricing *
                                                </label>
                                                <div class="d-flex gap-2">
                                                    <select id="pricing" name="pricing"
                                                        class="form-control form-control-lg" required style="flex: 1;">
                                                        <option value="free"
                                                            {{ old('pricing', $course->pricing ?? '') == 'free' ? 'selected' : '' }}>
                                                            Free</option>
                                                        <option value="paid"
                                                            {{ old('pricing', $course->pricing ?? '') == 'paid' ? 'selected' : '' }}>
                                                            Paid</option>
                                                    </select>
                                                    <div id="priceInput"
                                                        style="display: {{ old('pricing', $course->pricing ?? '') == 'paid' ? 'block' : 'none' }}; flex: 1;">
                                                        <div class="input-group input-group-lg">
                                                            <span class="input-group-text">$</span>
                                                            <input type="number" id="price" name="price"
                                                                class="form-control" min="0" step="0.01"
                                                                value="{{ old('price', $course->price ?? '') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-5">
                                            <div class="section-title">
                                                <span class="section-number">3</span>
                                                <h3>Learning Outcomes</h3>
                                            </div>

                                            <div class="alert alert-primary border-0"
                                                style="background-color: color-mix(in srgb, var(--accent-color), transparent 90%);">
                                                <strong>What will students learn?</strong> List the key skills and
                                                knowledge
                                                students will gain from your course.
                                            </div>

                                            <div id="learningOutcomes" class="mb-4">
                                                @if (isset($course) && $course->learningOutcomes->count() > 0)
                                                    @foreach ($course->learningOutcomes as $outcome)
                                                        <div class="row mb-3 outcome-item">
                                                            <div class="col-md-12">
                                                                <div class="input-group input-group-lg">
                                                                    <span class="input-group-text bg-white border-end-0">
                                                                        <i class="bi bi-check"></i>
                                                                    </span>
                                                                    <input type="text" name="outcomes[]"
                                                                        class="form-control border-start-0 rounded-end"
                                                                        required value="{{ $outcome->outcome_text }}">
                                                                    <button type="button"
                                                                        class="btn bg-white border border-start-0 text-danger remove-outcome"
                                                                        style="display: none; z-index: 0;">
                                                                        <i class="bi bi-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    @for ($i = 0; $i < 3; $i++)
                                                        <div class="row mb-3 outcome-item">
                                                            <div class="col-md-12">
                                                                <div class="input-group input-group-lg">
                                                                    <span class="input-group-text bg-white border-end-0">
                                                                        <i class="bi bi-check"></i>
                                                                    </span>
                                                                    <input type="text" name="outcomes[]"
                                                                        class="form-control border-start-0 rounded-end"
                                                                        required placeholder="e.g. Master HTML5 concepts">
                                                                    <button type="button"
                                                                        class="btn bg-white border border-start-0 text-danger remove-outcome"
                                                                        style="display: none; z-index: 0;">
                                                                        <i class="bi bi-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endfor
                                                @endif
                                            </div>

                                            <button type="button" id="addOutcome" class="btn btn-primary btn-lg mb-3">
                                                <i class="bi bi-plus-circle me-2"></i>Add Another Outcome
                                            </button>
                                            <div class="text-muted small">
                                                Minimum 3 outcomes required
                                            </div>
                                        </div>

                                        <div class="text-end mt-5">
                                            <button type="submit" class="btn btn-primary btn-lg">
                                                <i
                                                    class="bi bi-save me-2"></i>{{ $course ? 'Save Changes' : 'Create Course' }}
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="curriculum" role="tabpanel">
                            @if (isset($course))
                                <livewire:instructor.course-curriculum :course="$course" />
                            @else
                                <div class="alert alert-info py-4 text-center">
                                    <i class="bi bi-info-circle-fill me-2"></i> Please create/save the course details first
                                    to access the curriculum builder.
                                </div>
                            @endif
                        </div>

                        <div class="tab-pane fade" id="settings" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-10 mx-auto">
                                    @if (isset($course))
                                        <form action="{{ route('instructor.save-settings', $course->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="settings-group">
                                                <h4>Visibility</h4>
                                                <div class="setting-item">
                                                    <div class="setting-info">
                                                        <h5>Course Visibility</h5>
                                                        <p>Make this course public or private</p>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="isPrivate"
                                                            name="is_private" {{ $course->is_private ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="isPrivate">
                                                            Private (Draft)
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="invitationUrlField"
                                                    style="display: {{ $course->is_private ? 'block' : 'none' }}">
                                                    <label for="invitationUrl" class="form-label fw-semibold">
                                                        Invitation URL *
                                                    </label>
                                                    <input type="text" id="invitationUrl" name="invitation_url"
                                                        class="form-control"
                                                        placeholder="Enter invitation URL for private access"
                                                        value="{{ $course->invitation_url }}">
                                                    <small class="text-muted">Students will need this URL to access the
                                                        course</small>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <button type="submit"
                                                    class="btn btn-lg {{ $course->is_private ? 'btn-primary' : 'btn-success' }}">
                                                    @if ($course->is_private)
                                                        <i class="bi bi-save me-2"></i>Save Draft
                                                    @else
                                                        <i class="bi bi-check-circle-fill me-2"></i>Publish Course
                                                    @endif
                                                </button>

                                            </div>
                                        </form>
                                    @else
                                        <div class="alert alert-info">Please save the course first to manage settings.
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="analytics" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-10 mx-auto">
                                    @if (isset($course))
                                        <div class="analytics-card">
                                            <h4>Course Performance</h4>
                                            <div class="stat-row">
                                                <span class="stat-label">Total Enrollments</span>
                                                <span class="stat-value">{{ $course->enrollments_count ?? 0 }}</span>
                                            </div>
                                            <div class="stat-row">
                                                <span class="stat-label">Active Students</span>
                                                <span class="stat-value">{{ $course->enrollments_count ?? 0 }}</span>
                                            </div>
                                            <div class="stat-row">
                                                <span class="stat-label">Completion Rate</span>
                                                <span class="stat-value">N/A</span>
                                            </div>
                                            <div class="stat-row">
                                                <span class="stat-label">Average Time Spent</span>
                                                <span class="stat-value">N/A</span>
                                            </div>
                                            <div class="stat-row">
                                                <span class="stat-label">Average Rating</span>
                                                <span
                                                    class="stat-value">{{ number_format($course->reviews_avg_rating ?? 0, 1) }}
                                                    ⭐</span>
                                            </div>
                                        </div>

                                        <div class="analytics-card">
                                            <h4>Enrollment Over Time</h4>
                                            <div class="chart-placeholder">
                                                <i class="bi bi-graph-up" style="font-size: 3rem; opacity: 0.3;"></i>
                                                <p class="mt-3">Chart visualization would appear here</p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="alert alert-info">Analytics data will be available after the course is
                                            created.</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </main>
    <!-- End Main -->

    <!-- Add Module Modal -->
    <div class="modal fade" id="addModuleModal" tabindex="-1" aria-labelledby="addModuleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModuleModalLabel">Add New Module</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addModuleFormContent">
                        <div class="mb-3">
                            <label for="moduleTitle" class="form-label">Module Title *</label>
                            <input type="text" class="form-control" id="moduleTitle" name="title" required
                                form="addModuleForm">
                        </div>
                        <div class="mb-3">
                            <label for="moduleDescription" class="form-label">Module Description</label>
                            <textarea class="form-control" id="moduleDescription" name="description" rows="3" form="addModuleForm"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    @if (isset($course))
                        <button type="submit" form="addModuleForm" class="btn btn-primary">Add Module</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if (isset($course))
        <form id="addModuleForm" action="{{ route('instructor.store-module') }}" method="POST">
            @csrf
            <input type="hidden" name="course_id" value="{{ $course->id }}">
        </form>
    @endif

    <div class="modal fade" id="editModuleModal" tabindex="-1" aria-labelledby="editModuleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModuleModalLabel">Edit Module</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editModuleFormContent">
                        <div class="mb-3">
                            <label for="editModuleTitle" class="form-label">Module Title *</label>
                            <input type="text" class="form-control" id="editModuleTitle" name="title" required
                                form="editModuleForm">
                        </div>
                        <div class="mb-3">
                            <label for="editModuleDescription" class="form-label">Module Description</label>
                            <textarea class="form-control" id="editModuleDescription" name="description" rows="3" form="editModuleForm"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="editModuleForm" class="btn btn-primary">Save Changes</button>
                </div>
                <form id="editModuleForm" method="POST">
                    @csrf
                    @method('PUT')
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('shortDescription').addEventListener('input', function(e) {
            document.getElementById('charCount').textContent = e.target.value.length;
        });

        document.getElementById('pricing').addEventListener('change', function() {
            const priceInput = document.getElementById('priceInput');
            if (this.value === 'paid') {
                priceInput.style.display = 'block';
                document.getElementById('price').required = true;
            } else {
                priceInput.style.display = 'none';
                document.getElementById('price').required = false;
            }
        });

        document.getElementById('isPrivate').addEventListener('change', function() {
            const invitationField = document.getElementById('invitationUrlField');
            const invitationInput = document.getElementById('invitationUrl');
            if (this.checked) {
                invitationField.style.display = 'block';
                invitationInput.required = true;
            } else {
                invitationField.style.display = 'none';
                invitationInput.required = false;
            }
        });

        document.getElementById('addOutcome').addEventListener('click', function() {
            const container = document.getElementById('learningOutcomes');
            const newOutcome = document.createElement('div');
            newOutcome.className = 'row mb-3 outcome-item';
            newOutcome.innerHTML = `
                <div class="col-md-12">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="bi bi-check"></i>
                        </span>
                        <input type="text" name="outcome[]" class="form-control border-start-0" required>
                        <button type="button" class="btn bg-white border border-start-0 text-danger remove-outcome" style="z-index: 0;">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            `;
            container.appendChild(newOutcome);
            updateRemoveButtons();
        });

        document.addEventListener('click', function(e) {
            if (e.target.closest('.remove-outcome')) {
                const outcomes = document.querySelectorAll('.outcome-item');
                if (outcomes.length > 3) {
                    e.target.closest('.outcome-item').remove();
                    updateRemoveButtons();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Cannot Remove',
                        text: 'Minimum 3 outcomes required'
                    });
                }
            }
        });

        function updateRemoveButtons() {
            const outcomes = document.querySelectorAll('.outcome-item');
            outcomes.forEach((outcome) => {
                const removeBtn = outcome.querySelector('.remove-outcome');
                const input = outcome.querySelector('input');

                if (outcomes.length > 3) {
                    removeBtn.style.display = 'block';
                    input.classList.add('border-end-0');
                    input.classList.remove('rounded-end');
                } else {
                    removeBtn.style.display = 'none';
                    input.classList.remove('border-end-0');
                    input.classList.add('rounded-end');
                }
            });
        }

        function editModule(id, title, description) {
            document.getElementById('editModuleTitle').value = title;
            document.getElementById('editModuleDescription').value = description;

            const form = document.getElementById('editModuleForm');
            form.action = "{{ route('instructor.update-module', ':id') }}".replace(':id', id);

            const editModal = new bootstrap.Modal(document.getElementById('editModuleModal'));
            editModal.show();
        }

        function deleteModule(id) {
            Swal.fire({
                title: 'Delete Module?',
                text: "This will delete all topics and content in this module!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Deleted!', 'Module has been deleted.', 'success');
                }
            });
        }

        function deleteTopic(id) {
            Swal.fire({
                title: 'Delete Topic?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Deleted!', 'Topic has been deleted.', 'success');
                }
            });
        }

        function deleteProject(id) {
            Swal.fire({
                title: 'Delete Project?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Deleted!', 'Project has been deleted.', 'success');
                }
            });
        }

        updateRemoveButtons();
    </script>
@endpush
