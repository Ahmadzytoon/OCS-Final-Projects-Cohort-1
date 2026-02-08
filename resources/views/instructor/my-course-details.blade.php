@extends('layouts.instructor')
@section('title', 'Code Quest | ' . $course->title)
@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Course Overview</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('instructor.home') }}">Home</a></li>
                        <li><a href="{{ route('instructor.home') }}">My Courses</a></li>
                        <li class="current">{{ $course->title }}</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Course Details Section -->
        <section id="course-details" class="course-details section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row">

                    <div class="col-lg-12">

                        <!-- Course Hero -->
                        <div class="course-hero" data-aos="fade-up" data-aos-delay="300">
                            <div class="hero-content">

                                <h1>{{ $course->title }}</h1>

                                <div class="course-meta d-flex flex-wrap gap-3 mb-3">
                                    <span><i class="bi bi-collection"></i> {{ $course->modules->count() }} modules • {{ $course->projects->count() }} projects</span>
                                    <span><i class="bi bi-people"></i> {{ $course->enrollments->count() }} students</span>
                                    <span><i class="bi bi-star-fill text-warning"></i> {{ number_format($course->reviews_avg_rating, 1) ?? 'N/A' }} ({{ $course->reviews_count ?? 0 }} reviews)</span>
                                </div>

                                <p class="course-subtitle">
                                    {{ $course->short_description }}
                                </p>

                                <div class="d-flex gap-2 mt-3">
                                    <a href="{{ route('instructor.edit-course', ['id' => $course->id]) }}" class="btn btn-primary">
                                        <i class="bi bi-pencil me-1"></i> Edit Course
                                    </a>
                                </div>

                            </div>
                        </div><!-- End Course Hero -->

                        <div class="course-nav-tabs" data-aos="fade-up" data-aos-delay="400">
                            <ul class="nav nav-tabs" id="course-detailsCourseTab" role="tablist">
                                <li class="nav-item">
                                    <button class="nav-link active" id="course-detailsoverview-tab" data-bs-toggle="tab"
                                        data-bs-target="#course-detailsoverview" type="button" role="tab">
                                        <i class="bi bi-layout-text-window-reverse"></i>
                                        Overview
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="course-detailscurriculum-tab" data-bs-toggle="tab"
                                        data-bs-target="#course-detailscurriculum" type="button" role="tab">
                                        <i class="bi bi-list-ul"></i>
                                        Curriculum
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="course-detailsleaderboard-tab" data-bs-toggle="tab"
                                        data-bs-target="#course-detailsleaderboard" type="button" role="tab">
                                        <i class="bi bi-trophy"></i>
                                        Leaderboard
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="course-detailssubmissions-tab" data-bs-toggle="tab"
                                        data-bs-target="#course-detailssubmissions" type="button" role="tab">
                                        <i class="bi bi-folder-check"></i>
                                        Project Submissions
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content" id="course-detailsCourseTabContent">

                                <div class="tab-pane fade show active" id="course-detailsoverview" role="tabpanel">

                                    <div class="overview-section">
                                        <h3>Course Description</h3>
                                        <p>{!! nl2br(e($course->full_description)) !!}</p>
                                    </div>

                                    <div style="display: flex; flex-direction: column;gap: 20px;">
                                        @if($course->learningOutcomes->count() > 0)
                                        <div class="requirements-section">
                                            <h3>Skills You'll Gain</h3>
                                            <ul class="requirements-list">
                                                @foreach($course->learningOutcomes as $outcome)
                                                <li><i class="bi bi-check2"></i>{{ $outcome->outcome_text }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                    </div>

                                </div><!-- End Overview Tab -->
                                
                                <div class="tab-pane fade" id="course-detailscurriculum" role="tabpanel">

                                    <div class="curriculum-overview">
                                        <div class="curriculum-stats">
                                            <div class="stat">
                                                <i class="bi bi-journals"></i>
                                                <span>{{ $course->modules->count() }} Sections</span>
                                            </div>
                                            <div class="stat">
                                                <i class="bi bi-tools"></i>
                                                <span>{{ $course->projects->count() }} Projects</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion" id="curriculumAccordion">

                                        @foreach($course->modules as $index => $module)
                                        <div class="accordion-item curriculum-module">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#module{{ $module->id }}">
                                                    <div class="module-info">
                                                        <span class="module-title">Module {{ $index + 1 }} | {{ $module->title }}</span>
                                                        <span class="module-meta">{{ $module->topics->count() }} Topics</span>
                                                    </div>
                                                </button>
                                            </h2>
                                            <div id="module{{ $module->id }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                                data-bs-parent="#curriculumAccordion">
                                                <div class="accordion-body">
                                                    <div class="lessons-list">
                                                        @foreach($module->topics as $topic)
                                                        <div class="lesson">
                                                            <i class="bi bi-file-earmark-text"></i>
                                                            <span class="lesson-title">{{ $topic->title }}</span>
                                                            <span class="lesson-time">{{ $topic->xp_points }} XP</span>
                                                        </div>
                                                        @endforeach
                                                        
                                                        @if($module->topics->count() == 0)
                                                            <p class="text-muted small ms-4">No topics in this module yet.</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                        @if($course->projects->count() > 0)
                                        <div class="mt-4 mb-2">
                                            <h4>Projects</h4>
                                        </div>
                                        @foreach($course->projects as $project)
                                        <div class="card mb-3 border-0 shadow-sm">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h5 class="mb-1"><i class="bi bi-code-square me-2 text-primary"></i>{{ $project->title }}</h5>
                                                    <p class="text-muted small mb-0">{{ $project->short_description ?? 'No description' }}</p>
                                                </div>
                                                <span class="badge bg-light text-dark">{{ $project->xp_points }} XP</span>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif

                                    </div>

                                </div>
                                
                                <div class="tab-pane fade" id="course-detailsleaderboard" role="tabpanel">
                                    <div class="overview-section">
                                        <h3>Top Performers</h3>
                                        <p class="mb-4">Top 10 students enrolled in this course by total XP.</p>
                                    </div>

                                    <div class="leaderboard-list">
                                        @forelse($leaderboard as $index => $user)
                                        <div class="leaderboard-item" @if($user->id == Auth::id()) style="border: 2px solid var(--accent-color); background: color-mix(in srgb, var(--accent-color), transparent 95%);" @endif>
                                            <div class="leaderboard-rank">{{ $index + 1 }}</div>
                                            
                                            @if($user->profile_picture)
                                                <img src="{{ asset($user->profile_picture) }}" alt="Student" class="leaderboard-avatar">
                                            @else
                                                <div class="d-flex align-items-center justify-content-center rounded-circle bg-secondary text-white leaderboard-avatar"
                                                    style="font-weight: 600; font-size: 1.2rem; width: 50px; height: 50px;">
                                                    {{ substr($user->name, 0, 2) }}
                                                </div>
                                            @endif
                                            
                                            <div class="leaderboard-info">
                                                <div class="leaderboard-name">{{ $user->name }}</div>
                                                <div class="leaderboard-progress">{{ $user->email }}</div> 
                                            </div>
                                            <div class="leaderboard-xp">{{ $user->student->total_xp ?? 0 }} XP</div>
                                        </div>
                                        @empty
                                        <div class="text-center py-5">
                                            <i class="bi bi-people text-muted" style="font-size: 3rem;"></i>
                                            <p class="text-muted mt-3">No students enrolled yet.</p>
                                        </div>
                                        @endforelse
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="course-detailssubmissions" role="tabpanel">
                                    <div class="overview-section">
                                        <h3>Project Submissions</h3>
                                        <p class="mb-4">Review and approve student project submissions.</p>
                                    </div>

                                    <div class="leaderboard-list">
                                        @forelse($submissions as $submission)
                                        <div class="leaderboard-item">
                                            <div class="leaderboard-rank {{ $submission->status == 'approved' ? 'text-success' : 'text-secondary' }}" id="status-icon-{{ $submission->id }}">
                                                <i class="bi {{ $submission->status == 'approved' ? 'bi-check-circle-fill' : 'bi-circle' }}"></i>
                                            </div>
                                            
                                            @if($submission->user->profile_picture)
                                                <img src="{{ asset($submission->user->profile_picture) }}" alt="Student" class="leaderboard-avatar">
                                            @else
                                                <div class="d-flex align-items-center justify-content-center rounded-circle bg-secondary text-white leaderboard-avatar"
                                                    style="font-weight: 600; font-size: 1.2rem; width: 50px; height: 50px;">
                                                    {{ substr($submission->user->name, 0, 2) }}
                                                </div>
                                            @endif
                                            
                                            <div class="leaderboard-info">
                                                <div class="leaderboard-name">{{ $submission->user->name }}</div>
                                                <div class="leaderboard-progress">Project: {{ $submission->project_title }}</div>
                                            </div>
                                            
                                            <div class="d-flex gap-2">
                                                @if($submission->status != 'approved')
                                                <button class="btn btn-primary btn-sm"
                                                    onclick="showSubmissionDetails('{{ $submission->github_url }}', '{{ $submission->id }}')">
                                                    Review
                                                </button>
                                                @else
                                                <button class="btn btn-outline-secondary btn-sm"
                                                    onclick="window.open('{{ $submission->github_url }}', '_blank')">
                                                    View
                                                </button>
                                                @endif
                                            </div>
                                        </div>
                                        @empty
                                        <div class="text-center py-5">
                                            <i class="bi bi-folder2-open text-muted" style="font-size: 3rem;"></i>
                                            <p class="text-muted mt-3">No project submissions yet.</p>
                                        </div>
                                        @endforelse
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Course Details Section -->

    </main>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
       function showSubmissionDetails(githubLink, submissionId) {
            Swal.fire({
                title: 'Project Submission',
                html: `
                    <div class="text-start">
                        <p class="mb-3"><strong>Github Repository:</strong></p>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="${githubLink}" readonly>
                            <a href="${githubLink}" target="_blank" class="btn btn-outline-secondary">
                                <i class="bi bi-box-arrow-up-right"></i>
                            </a>
                        </div>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonText: 'Approve',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#059652',
                cancelButtonColor: '#d33',
                focusConfirm: false,
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    
                    const statusEl = document.getElementById('status-icon-' + submissionId);
                    if (statusEl) {
                        statusEl.className = 'leaderboard-rank text-success';
                        statusEl.innerHTML = '<i class="bi bi-check-circle-fill"></i>';
                    }
                    
                    Swal.fire(
                        'Approved!',
                        'The project has been marked as approved.',
                        'success'
                    );
                }
            })
        }
    </script>
@endpush
