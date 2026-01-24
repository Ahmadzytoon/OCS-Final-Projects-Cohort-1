@extends('layouts.visitor')

@section('title', 'Code Quest | ' . $course->title)

@section('content')

    <main class="main">
        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Course Details</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('visitor.home') }}">Home</a></li>
                        <li><a href="{{ route('visitor.courses') }}">Courses</a></li>
                        <li class="current">{{ $course->title }}</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <section id="course-details" class="course-details section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="course-badge">
                            <span class="category">{{ $course->category->name ?? 'Uncategorized' }}</span>
                        </div>
                        <h1>{{ $course->title }}</h1>
                        <div class="course-meta d-flex flex-wrap gap-3 mb-3">
                            <span><i class="bi bi-collection"></i> {{ $course->modules->count() }} modules •
                                {{ $course->projects->count() }} projects</span>
                            <span><i class="bi bi-tag"></i>
                                {{ $course->pricing === 'paid' ? '$' . number_format($course->price, 2) : 'FREE' }}</span>
                            @if($averageRating > 0)
                                <span><i class="bi bi-star-fill"></i> {{ $averageRating }} ({{ $course->reviews->count() }} reviews)</span>
                            @endif
                        </div>
                        <p class="course-subtitle">{{ $course->short_description }}</p>

                        <div class="instructor-card mt-4">
                            <img src="{{ asset('general/img/person/' . ($course->instructor->profile_picture ?? 'person-m-1.webp')) }}"
                                alt="{{ $course->instructor->name }}" class="instructor-image">
                            <div class="instructor-details">
                                <h5>Created by {{ $course->instructor->name }}</h5>
                                <span>{{ $course->instructor->headline ?? 'Instructor' }}</span>
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
                                        Reviews ({{ $course->reviews->count() }})
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="course-detailsCourseTabContent">

                                <div class="tab-pane fade show active" id="course-detailsoverview" role="tabpanel">
                                    <div class="overview-section">
                                        <h3>Course Description</h3>
                                        <div>{!! nl2br(e($course->full_description)) !!}</div>
                                    </div>

                                    <div style="display: flex; flex-direction: column;gap: 20px;">
                                        @if($course->learningOutcomes->count() > 0)
                                            <div class="requirements-section">
                                                <h3>What You'll Learn</h3>
                                                <ul class="requirements-list">
                                                    @foreach($course->learningOutcomes->sortBy('order') as $outcome)
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
                                                <i class="bi bi-lock"></i>
                                                <span>Sign up to unlock all content</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @if($course->modules->count() > 0)
                                        <div class="accordion" id="curriculumAccordion">
                                            @foreach($course->modules->sortBy('order') as $index => $module)
                                                <div class="accordion-item curriculum-module">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" 
                                                                type="button" 
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#module{{ $module->id }}" 
                                                                disabled>
                                                            <div class="module-info">
                                                                <span class="module-title">
                                                                    @if($index > 0)<i class="bi bi-lock"></i>@endif
                                                                    Module {{ $index + 1 }} | {{ $module->title }}
                                                                </span>
                                                                <span class="module-meta">{{ $module->topics->count() }} Topics</span>
                                                            </div>
                                                        </button>
                                                    </h2>
                                                    <div id="module{{ $module->id }}" 
                                                         class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                                         data-bs-parent="#curriculumAccordion">
                                                        <div class="accordion-body">
                                                            <div class="lessons-list">
                                                                @foreach($module->topics->sortBy('order') as $topicIndex => $topic)
                                                                    <div class="lesson">
                                                                        <i class="bi bi-{{ $topicIndex === 0 && $index === 0 ? 'file-earmark-text' : 'lock lesson-time' }}"></i>
                                                                        <span class="lesson-title {{ $topicIndex > 0 || $index > 0 ? 'lesson-time' : '' }}">
                                                                            {{ $topic->title }}
                                                                        </span>
                                                                        <span class="lesson-time">{{ $topic->xp_points }} XP</span>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                            @foreach($course->projects->sortBy('order') as $project)
                                                <div class="accordion-item curriculum-module">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" 
                                                                type="button"
                                                                data-bs-toggle="collapse" 
                                                                data-bs-target="#project{{ $project->id }}" 
                                                                disabled>
                                                            <div class="module-info">
                                                                <span class="module-title">
                                                                    <i class="bi bi-lock"></i> 
                                                                    Project | {{ $project->title }}
                                                                </span>
                                                                <span class="module-meta">
                                                                    {{ $project->xp_points }} XP
                                                                    @if($project->estimated_hours)
                                                                        • {{ $project->estimated_hours }}h estimated
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </button>
                                                    </h2>
                                                    <div id="project{{ $project->id }}" 
                                                         class="accordion-collapse collapse"
                                                         data-bs-parent="#curriculumAccordion">
                                                        <div class="accordion-body">
                                                            <p>{{ $project->description }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="text-center py-4">No curriculum available yet.</p>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="course-detailsreviews" role="tabpanel">
                                    @if($course->reviews->count() > 0)
                                        <div class="reviews-summary">
                                            <div class="rating-overview">
                                                <div class="overall-rating">
                                                    <div class="rating-number">{{ $averageRating }}</div>
                                                    <div class="rating-stars">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            @if($i <= floor($averageRating))
                                                                <i class="bi bi-star-fill"></i>
                                                            @elseif($i - 0.5 <= $averageRating)
                                                                <i class="bi bi-star-half"></i>
                                                            @else
                                                                <i class="bi bi-star"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <div class="rating-text">{{ $course->reviews->count() }} reviews</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="reviews-list">
                                            @foreach($course->reviews->sortByDesc('created_at') as $review)
                                                <div class="review-item">
                                                    <div class="reviewer-info">
                                                        <img src="{{ asset('general/img/person/' . ($review->user->profile_picture ?? 'person-m-1.webp')) }}" 
                                                             alt="{{ $review->user->name }}"
                                                             class="reviewer-avatar">
                                                        <div class="reviewer-details">
                                                            <h6>{{ $review->user->name }}</h6>
                                                            <div class="review-rating">
                                                                @for($i = 1; $i <= 5; $i++)
                                                                    <i class="bi bi-star{{ $i <= $review->rating ? '-fill' : '' }}"></i>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                        <span class="review-date">{{ $review->created_at->diffForHumans() }}</span>
                                                    </div>
                                                    @if($review->review_text)
                                                        <p class="review-text">{{ $review->review_text }}</p>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="text-center py-4">No reviews yet. Be the first to review this course!</p>
                                    @endif
                                </div>

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
                                    <span class="detail-value">{{ $course->language }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Students</span>
                                    <span class="detail-value">{{ $studentCount }} enrolled</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Modules</span>
                                    <span class="detail-value">{{ $course->modules->count() }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Projects</span>
                                    <span class="detail-value">{{ $course->projects->count() }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Updated</span>
                                    <span class="detail-value">{{ $course->updated_at->format('F Y') }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="enrollment-card" data-aos="fade-up" data-aos-delay="200">
                            <div class="card-header">
                                <div class="price-display">
                                    @if($course->pricing === 'paid')
                                        <span class="current-price">${{ number_format($course->price, 2) }}</span>
                                    @else
                                        <span class="join-course-card">FREE Course</span>
                                    @endif
                                </div>
                                <div class="enrollment-count">
                                    <span>{{ $course->pricing === 'paid' ? 'One-time payment' : 'Create a free account to unlock this course and track your progress.' }}</span>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="course-highlights">
                                    <div class="highlight-item">
                                        <i class="bi bi-trophy"></i>
                                        <span>Certificate included</span>
                                    </div>
                                    <div class="highlight-item">
                                        <i class="bi bi-collection"></i>
                                        <span>{{ $course->modules->count() }} modules</span>
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
                                    <a class="btn-primary" href="{{ route('register') }}">Sign Up to Enroll</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection