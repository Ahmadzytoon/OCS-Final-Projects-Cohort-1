@extends('layouts.student')
@section('title', 'Code Quest | ' . $course->title)
@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Course Details</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('student.home') }}">Home</a></li>
                        <li><a href="{{ route('student.courses') }}">Courses</a></li>
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
                        <div class="course-hero" data-aos="fade-up" data-aos-delay="200">
                            <div class="hero-content">
                                <div class="course-badge">
                                    <span class="category">{{ $course->category->name ?? 'General' }}</span>
                                </div>
                                <h1>{{ $course->title }}</h1>
                                <div class="course-meta d-flex flex-wrap gap-3 mb-3">
                                    <span><i class="bi bi-collection"></i> {{ $course->modules->count() }} modules • {{ $course->projects->count() }} projects</span>
                                    <span><i class="bi bi-tag"></i> {{ $course->price > 0 ? '$' . number_format($course->price, 2) : 'FREE' }}</span>
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

                        <div class="course-nav-tabs" data-aos="fade-up" data-aos-delay="300">
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
                                    <button class="nav-link" id="course-detailsreviews-tab" data-bs-toggle="tab"
                                        data-bs-target="#course-detailsreviews" type="button" role="tab">
                                        <i class="bi bi-star"></i>
                                        Reviews
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

                                </div>

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
                                                        <span class="module-title">Module {{ $module->order }} | {{ $module->title }}</span>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                        @if($course->projects->count() > 0)
                                        <div class="accordion-item curriculum-module">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#projects">
                                                    <div class="module-info">
                                                        <span class="module-title"><i class="bi bi-tools"></i> Projects</span>
                                                        <span class="module-meta">{{ $course->projects->count() }} Projects</span>
                                                    </div>
                                                </button>
                                            </h2>
                                            <div id="projects" class="accordion-collapse collapse"
                                                data-bs-parent="#curriculumAccordion">
                                                <div class="accordion-body">
                                                    <div class="lessons-list">
                                                         @foreach($course->projects as $project)
                                                        <div class="lesson">
                                                            <i class="bi bi-tools"></i>
                                                            <span class="lesson-title">{{ $project->title }}</span>
                                                            <span class="lesson-time">{{ $project->xp_points }} XP</span>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                    </div>

                                </div>

                                <div class="tab-pane fade" id="course-detailsreviews" role="tabpanel">

                                    <div class="reviews-summary">
                                        <div class="rating-overview">
                                            <div class="overall-rating">
                                                <div class="rating-number">{{ number_format($course->reviews_avg_rating, 1) }}</div>
                                                <div class="rating-stars">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        @if($i <= round($course->reviews_avg_rating))
                                                            <i class="bi bi-star-fill"></i>
                                                        @else
                                                            <i class="bi bi-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <div class="rating-text">{{ $course->reviews_count }} reviews</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="reviews-list">
                                        @forelse($course->reviews as $review)
                                        <div class="review-item">
                                            <div class="reviewer-info">
                                                @if($review->user->profile_picture)
                                                    <img src="{{ asset($review->user->profile_picture) }}" alt="Reviewer" class="reviewer-avatar">
                                                @else
                                                     <div class="d-flex align-items-center justify-content-center rounded-circle bg-secondary text-white reviewer-avatar"
                                                        style="width: 40px; height: 40px; font-weight: 600;">
                                                        {{ substr($review->user->name, 0, 1) }}
                                                    </div>
                                                @endif
                                                <div class="reviewer-details">
                                                    <h6>{{ $review->user->name }}</h6>
                                                    <div class="review-rating">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            @if($i <= $review->rating)
                                                                <i class="bi bi-star-fill"></i>
                                                            @else
                                                                <i class="bi bi-star"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                </div>
                                                <span class="review-date">{{ $review->created_at->diffForHumans() }}</span>
                                            </div>
                                            <p class="review-text">{{ $review->comment }}</p>
                                        </div>
                                        @empty
                                        <p class="text-muted">No reviews yet.</p>
                                        @endforelse

                                    </div>

                                </div>>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
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
                                    <span class="detail-label">Modules</span>
                                    <span class="detail-value">{{ $course->modules->count() }}</span>
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
                        <div class="enrollment-card" data-aos="fade-up" data-aos-delay="200">

                            <div class="card-header">
                                <div class="price-display">
                                    <span class="join-course-card">Ready to Start Learning?</span>
                                </div>
                                <div class="enrollment-count">
                                    <span>Join other students and start your journey today.</span>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="course-highlights">
                                    <div class="highlight-item">
                                        <i class="bi bi-trophy"></i>
                                        <span>Certificate included</span>
                                    </div>
                                    <div class="highlight-item">
                                        <i class="bi bi-award"></i>
                                        <span>Xp & Badges</span>
                                    </div>
                                    <div class="highlight-item">
                                        <i class="bi bi-infinity"></i>
                                        <span>Lifetime access</span>
                                    </div>
                                    <div class="highlight-item">
                                        <i class="bi bi-phone"></i>
                                        <span>Mobile access</span>
                                    </div>
                                </div>

                                <div class="action-buttons">
                                    <form action="{{ route('student.enroll', ['id' => $course->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn-primary w-100">Enroll Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
