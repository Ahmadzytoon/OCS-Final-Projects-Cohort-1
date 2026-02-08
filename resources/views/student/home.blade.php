@extends('layouts.student')

@section('title', 'Code Quest | Home')

@section('content')

    <main class="main">
        <div class="welcome-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12" data-aos="fade-up">
                        <h1 id="greeting">Hey There, {{ $user->name }}! 👋</h1>
                        <p>Ready to continue your quest?</p>
                    </div>
                </div>
            </div>
        </div>

   
        @if($recentEnrollment)
        <section class="section" style="padding-top: 0;">
            <div class="container">
                <div class="section-header" data-aos="fade-up">
                    <h2>Continue Where You Left Off</h2>
                </div>

                <div class="continue-learning-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <div class="card-image">
                                <img src="{{ $recentEnrollment->course->thumbnail ? asset('general/img/education/'.$recentEnrollment->course->thumbnail) : asset('assets/img/course-placeholder.jpg') }}" alt="Course">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h3>{{ $recentEnrollment->course->title }}</h3>
                                <p class="course-meta">
                                    <i class="bi bi-book"></i> 
                                    @if($nextModule && $nextTopic)
                                        Module {{ $nextModule->order }}: {{ $nextModule->title }} - {{ $nextTopic->title }}
                                    @else
                                        Continue your learning journey
                                    @endif
                                </p>
                                <div class="progress-bar-custom">
                                    <div class="progress-fill" style="width: {{ $recentEnrollment->progress_percentage }}%;"></div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span style="color: #666;">{{ $recentEnrollment->progress_percentage }}% Complete</span>
                                    <span style="color: #999; font-size: 0.9rem;">
                                    </span>
                                </div>
                                <a href="{{ route('student.enrolled-course-details', ['id' => $recentEnrollment->course_id]) }}" class="btn-continue">Continue Learning</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

        <section class="section light-background">
            <div class="container">
                <div class="section-header" data-aos="fade-up">
                    <h2>My Courses</h2>
                    <a href="{{ route('student.my-courses') }}" class="view-all-link">View all →</a>
                </div>

                <div class="row gy-4">
                    @forelse($enrollments->take(3) as $enrollment)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 * ($loop->index + 1) }}">
                        <div class="course-card">
                            <div class="course-image">
                                <img src="{{ $enrollment->course->thumbnail ? asset('general/img/education/'.$enrollment->course->thumbnail) : asset('assets/img/course-placeholder.jpg') }}" alt="Course"
                                    class="img-fluid">
                            </div>
                            <div class="course-content">

                                <h3>{{ $enrollment->course->title }}</h3>
                                <div class="progress-info">
                                    <div class="progress-text">
                                        <span>Progress</span>
                                        <span class="percentage">{{ $enrollment->progress_percentage }}%</span>
                                    </div>
                                    <div class="progress-bar-custom">
                                        <div class="progress-fill" style="width: {{ $enrollment->progress_percentage }}%;"></div>
                                    </div>
                                </div>
                                <a href="{{ route('student.enrolled-course-details', ['id' => $enrollment->course_id]) }}" class="btn-course">Continue</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12" data-aos="fade-up">
                         <div class="empty-state text-center py-5">
                            <div class="icon mb-3"><i class="bi bi-book-half display-4 text-muted"></i></div>
                            <h3 class="h4">You haven't enrolled in any courses yet</h3>
                            <p class="text-muted">Start your learning journey today by browsing our course catalog</p>
                            <a href="{{ route('student.courses') }}" class="btn btn-primary mt-3">Browse Courses</a>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <section id="progress-overview" class="about section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <h2>Your Progress at a Glance</h2>

                <div class="row mt-5 pt-4">

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="mission-card">
                            <div class="icon-box">
                                <i class="bi bi-check-circle"></i>
                            </div>
                            <h3>Courses Completed</h3>
                            <p><strong>{{ $coursesCompleted }}</strong> courses successfully finished.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="mission-card">
                            <div class="icon-box">
                                <i class="bi bi-file-earmark-text"></i>
                            </div>
                            <h3>Topics Completed</h3>
                            <p><strong>{{ $topicsCompleted }}</strong> topics mastered so far.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="mission-card">
                            <div class="icon-box">
                                <i class="bi bi-fire"></i>
                            </div>
                            <h3>Active Days</h3>
                            <p><strong>{{ $streak }} days</strong> of learning in the last 30 days.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="mission-card">
                            <div class="icon-box">
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <h3>Experience Points</h3>
                            <p><strong>{{ number_format($totalXp) }} XP</strong> earned across courses.</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const greetingElement = document.getElementById('greeting');
            if (greetingElement) {
                const hour = new Date().getHours();
                let timeGreeting = 'Good evening';

                if (hour < 12) {
                    timeGreeting = 'Good morning';
                } else if (hour < 18) {
                    timeGreeting = 'Good afternoon';
                }

                const studentName = "{{ $user->name }}";
                greetingElement.innerHTML = `${timeGreeting}, ${studentName}! 👋`;
            }
        });
    </script>
@endpush
