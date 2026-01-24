@extends('layouts.student')
@section('title', 'Code Quest | ' . $course->title)
@section('content')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Course Overview</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('student.home') }}">Home</a></li>
                        <li><a href="{{ route('student.my-courses') }}">My Courses</a></li>
                        <li class="current">{{ $course->title }}</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Course Details Section -->
        <section id="course-details" class="course-details section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row">

                    <div class="col-lg-8">

                        <div class="progress-bar-container" data-aos="fade-up" data-aos-delay="200">
                            <h4>Your Progress:</h4>
                            <div class="progress-bar-wrapper">
                                <div class="progress-bar-fill" style="width: {{ $enrollment->progress_percentage }}%;">
                                    {{ $enrollment->progress_percentage }}%
                                </div>
                            </div>
                            <div class="student-action-buttons">
                                @if($nextTopic)
                                <a class="btn-primary" href="{{ route('student.topic', ['id' => $nextTopic->id]) }}" style="max-width: 300px; margin: 0 auto;">
                                    <i class="bi bi-play-circle me-2"></i>Continue Learning
                                </a>
                                @elseif($enrollment->progress_percentage == 100)
                                <div class="btn-success text-center py-2" style="max-width: 300px; margin: 0 auto; border-radius: 5px;">
                                    <i class="bi bi-check-circle-fill me-2"></i>Course Completed!
                                </div>
                                @else
                                <a class="btn-primary" href="#" style="max-width: 300px; margin: 0 auto;">
                                    <i class="bi bi-play-circle me-2"></i>Start Learning
                                </a>
                                @endif
                            </div>
                        </div>

                        <div class="course-hero" data-aos="fade-up" data-aos-delay="300">
                            <div class="hero-content">

                                <h1>{{ $course->title }}</h1>

                                <div class="course-meta d-flex flex-wrap gap-3 mb-3">
                                    <span><i class="bi bi-collection"></i> {{ $course->modules->count() }} modules • {{ $course->projects->count() }} projects</span>
                                </div>

                                <p class="course-subtitle">
                                    {{ $course->short_description }}
                                </p>

                                <div class="instructor-card mt-4">
                                    @if($course->instructor->profile_picture)
                                        <img src="{{ asset($course->instructor->profile_picture) }}" alt="Instructor" class="instructor-image">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center rounded-circle bg-secondary text-white instructor-image"
                                            style="width: 60px; height: 60px; font-weight: 700; font-size: 1.2rem;">
                                            {{ substr($course->instructor->name, 0, 2) }}
                                        </div>
                                    @endif
                                    
                                    <div class="instructor-details">
                                        <h5>Created by {{ $course->instructor->name }}</h5>
                                        <span>{{ $course->instructor->headline ?? 'Instructor' }}</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="course-nav-tabs" data-aos="fade-up" data-aos-delay="400">
                            <ul class="nav nav-tabs" id="course-detailsCourseTab" role="tablist">
                                <li class="nav-item">
                                    <button class="nav-link" id="course-detailsoverview-tab" data-bs-toggle="tab"
                                        data-bs-target="#course-detailsoverview" type="button" role="tab">
                                        <i class="bi bi-layout-text-window-reverse"></i>
                                        Overview
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link active" id="course-detailscurriculum-tab" data-bs-toggle="tab"
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
                            </ul>

                            <div class="tab-content" id="course-detailsCourseTabContent">

                                <div class="tab-pane fade" id="course-detailsoverview" role="tabpanel">

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

                                </div>

                                <div class="tab-pane fade show active" id="course-detailscurriculum" role="tabpanel">

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
                                                        <span class="module-title">Module {{ $module->order }} | {{ $module->title }}</span>
                                                        <div class="module-progress">
                                                            @php
                                                                $completedTopicsInModule = $module->topics->filter(function($topic) use ($completedTopicIds) {
                                                                    return in_array($topic->id, $completedTopicIds);
                                                                })->count();
                                                                $totalTopicsInModule = $module->topics->count();
                                                                $moduleProgress = $totalTopicsInModule > 0 ? ($completedTopicsInModule / $totalTopicsInModule) * 100 : 0;
                                                            @endphp
                                                            {{ $completedTopicsInModule }} of {{ $totalTopicsInModule }} topics complete
                                                            <div class="module-progress-bar">
                                                                <div class="module-progress-fill" style="width: {{ $moduleProgress }}%;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </button>
                                            </h2>
                                            <div id="module{{ $module->id }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                                data-bs-parent="#curriculumAccordion">
                                                <div class="accordion-body">
                                                    <div class="lessons-list">
                                                        @foreach($module->topics as $topic)
                                                            @php
                                                                $isCompleted = in_array($topic->id, $completedTopicIds);
                                                                $isNext = ($nextTopic && $nextTopic->id == $topic->id);
                                                            @endphp
                                                            
                                                            <a class="lesson {{ $isCompleted ? 'completed' : ($isNext ? 'current' : '') }}"
                                                                href="{{ route('student.topic', ['id' => $topic->id]) }}">
                                                                @if($isCompleted)
                                                                    <i class="bi bi-check-circle-fill"></i>
                                                                @elseif($isNext)
                                                                    <i class="bi bi-arrow-right-circle"></i>
                                                                @else
                                                                    <i class="bi bi-circle"></i>
                                                                @endif
                                                                
                                                                <span class="lesson-title">{{ $topic->title }}</span>
                                                                <span class="lesson-time">{{ $topic->xp_points }} XP</span>
                                                                
                                                                @if($isCompleted)
                                                                    <span class="lesson-status-badge completed">Completed</span>
                                                                @elseif($isNext)
                                                                    <span class="lesson-status-badge current">Continue</span>
                                                                @endif
                                                            </a>
                                                        @endforeach
                                                        
                                                        @if($module->topics->count() == 0)
                                                            <p class="text-muted small ms-4">No topics yet.</p>
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
                                            @php
                                                $isProjectCompleted = in_array($project->id, $completedProjectIds);
                                            @endphp
                                            <div class="accordion-item curriculum-module">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#project{{ $project->id }}">
                                                        <div class="module-info">
                                                            <span class="module-title">
                                                                <i class="bi bi-tools text-primary"></i> 🛠️ {{ $project->title }}
                                                            </span>
                                                        </div>
                                                    </button>
                                                </h2>
                                                <div id="project{{ $project->id }}" class="accordion-collapse collapse"
                                                    data-bs-parent="#curriculumAccordion">
                                                    <div class="accordion-body">
                                                        <div class="lessons-list">
                                                            <div class="lesson {{ $isProjectCompleted ? 'completed' : '' }}">
                                                                <i class="bi bi-tools"></i>
                                                                <span class="lesson-title">{{ $project->title }}</span>
                                                                <span class="lesson-time">{{ $project->xp_points }} XP</span>
                                                                <a href="{{ route('student.project', ['id' => $project->id]) }}" class="btn btn-sm btn-outline-primary ms-auto">
                                                                    {{ $isProjectCompleted ? 'Review' : 'Start Project' }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @endif

                                    </div>

                                </div>

                                <div class="tab-pane fade" id="course-detailsleaderboard" role="tabpanel">
                                    <div class="overview-section">
                                        <h3>Top Performers</h3>
                                        <p class="mb-4">See how you rank against other students in this course</p>
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
                                                <div class="leaderboard-name">{{ $user->name }} @if($user->id == Auth::id()) (You) @endif</div>
                                                <div class="leaderboard-progress">{{ $user->student->total_xp ?? 0 }} Total XP</div>
                                            </div>
                                            <div class="leaderboard-xp">{{ $user->student->total_xp ?? 0 }} XP</div>
                                        </div>
                                        @empty
                                        <p class="text-muted text-center">No students on the leaderboard yet.</p>
                                        @endforelse
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="progress-stats-box" data-aos="fade-up" data-aos-delay="200">
                            <h4><i class="bi bi-bar-chart-fill me-2"></i>Progress Statistics</h4>
                            <div class="stat-row">
                                <span class="stat-label">Total Topics</span>
                                <span class="stat-value">{{ $totalTopics }}</span>
                            </div>
                            <div class="stat-row">
                                <span class="stat-label">Completed</span>
                                <span class="stat-value" style="color: #22c55e;">{{ count($completedTopicIds) }}</span>
                            </div>
                            <div class="stat-row">
                                <span class="stat-label">Remaining</span>
                                <span class="stat-value" style="color: #f59e0b;">{{ $totalTopics - count($completedTopicIds) }}</span>
                            </div>
                            <div class="stat-row">
                                <span class="stat-label">Your XP</span>
                                <span class="stat-value" style="color: var(--accent-color);">{{ Auth::user()->student->total_xp ?? 0 }} XP</span>
                            </div>
                        </div>

                        <div class="spacing-gap"></div>
                        <div class="course-details-card" data-aos="fade-up" data-aos-delay="300">
                            <h4>Course Details</h4>

                            <div class="detail-grid">
                                <div class="detail-row">
                                    <span class="detail-label">Skill Level</span>
                                    <span class="detail-value">{{ ucfirst($course->difficulty) }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Language</span>
                                    <span class="detail-value">{{ $course->language ?? 'English' }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Quizzes</span>
                                    <span class="detail-value">{{ $totalTopics }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Assignments</span>
                                    <span class="detail-value">{{ $course->projects->count() }} projects</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Updated</span>
                                    <span class="detail-value">{{ $course->updated_at->format('M Y') }}</span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </section>
    </main>

@endsection
