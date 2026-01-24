@extends('layouts.instructor')

@section('title', 'Code Quest | Home')

@section('content')
    <main class="main">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12" data-aos="fade-up">
                        <h1 id="greeting">Welcome, {{ $user->name }}!</h1>
                        <p>Ready to inspire the next generation of learners?</p>
                    </div>
                </div>
            </div>
        </div><!-- End Welcome Section -->

        <!-- My Courses Overview Section -->
        <section class="section light-background">
            <div class="container">
                <div class="section-header" data-aos="fade-up">
                    <h2>Your Courses</h2>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-plus-circle me-2"></i>Create Course
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('instructor.edit-course') }}">Add Manually</a></li>
                            <li><a class="dropdown-item" href="automatic-course-insert.html"></i>Add Structure Format</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Course Status Tabs -->
                <div class="row mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-12">
                        <div class="content-tabs">
                            <ul class="nav nav-tabs custom-tabs course-filter-tabs" id="instructorCourseTabs"
                                role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="all-courses-tab" data-bs-toggle="tab"
                                        data-bs-target="#all-courses" type="button" role="tab"
                                        aria-controls="all-courses" aria-selected="true">
                                        <i class="bi bi-grid"></i>
                                        All Courses
                                    </button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="published-tab" data-bs-toggle="tab"
                                        data-bs-target="#published" type="button" role="tab" aria-controls="published"
                                        aria-selected="false">
                                        <i class="bi bi-check-circle"></i>
                                        Published
                                    </button>
                                </li>



                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="under-review-tab" data-bs-toggle="tab"
                                        data-bs-target="#under-review" type="button" role="tab"
                                        aria-controls="under-review" aria-selected="false">
                                        <i class="bi bi-eye"></i>
                                        Draft
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Tab Content -->
                <div class="tab-content custom-tab-content" id="instructorCourseTabsContent">

                    <div class="tab-pane fade show active" id="all-courses" role="tabpanel"
                        aria-labelledby="all-courses-tab">
                        <div class="row gy-4">
                            @forelse($courses as $course)
                            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="course-card">
                                    <div class="course-image">
                                        <img src="{{ asset('general/img/education/' . ($course->thumbnail ?? 'courses-12.webp')) }}" alt="{{ $course->title }}" class="img-fluid">
                                        <span class="badge {{ $course->is_private ? 'bg-secondary' : 'bg-success' }} position-absolute top-0 end-0 m-2">
                                            {{ $course->is_private ? 'Draft' : 'Published' }}
                                        </span>
                                    </div>

                                    <div class="course-content">
                                        <h3>{{ $course->title }}</h3>

                                        <div class="course-stats mb-3">
                                            <div><i class="bi bi-people me-1"></i>{{ $course->enrollments_count }} students</div>
                                            <div><i class="bi bi-collection me-1"></i>{{ $course->modules->count() }} modules</div>
                                            <div><i class="bi bi-star-fill text-warning me-1"></i>{{ number_format($course->reviews_avg_rating ?? 0, 1) }} rating</div>
                                        </div>

                                        <a href="{{ route('instructor.edit-course', ['id' => $course->id]) }}"
                                            class="btn-course btn-course-primary">
                                            Edit Course
                                        </a>

                                        <a href="{{ route('instructor.my-course-details', ['id' => $course->id]) }}"
                                            class="btn-course btn-course-outline">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12 text-center py-5">
                                <p class="lead text-muted">You haven't created any courses yet.</p>
                            </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="tab-pane fade" id="published" role="tabpanel" aria-labelledby="published-tab">
                        <div class="row gy-4">
                            @forelse($publishedCourses as $course)
                            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="course-card">
                                    <div class="course-image">
                                        <img src="{{ asset('general/img/education/' . ($course->thumbnail ?? 'courses-12.webp')) }}" alt="{{ $course->title }}" class="img-fluid">
                                        <span class="badge bg-success position-absolute top-0 end-0 m-2">Published</span>
                                    </div>

                                    <div class="course-content">
                                        <h3>{{ $course->title }}</h3>

                                        <div class="course-stats mb-3">
                                            <div><i class="bi bi-people me-1"></i>{{ $course->enrollments_count }} students</div>
                                            <div><i class="bi bi-collection me-1"></i>{{ $course->modules->count() }} modules</div>
                                            <div><i class="bi bi-star-fill text-warning me-1"></i>{{ number_format($course->reviews_avg_rating ?? 0, 1) }} rating</div>
                                        </div>

                                        <a href="{{ route('instructor.edit-course', ['id' => $course->id]) }}"
                                            class="btn-course btn-course-primary">
                                            Edit Course
                                        </a>

                                        <a href="{{ route('instructor.my-course-details', ['id' => $course->id]) }}"
                                            class="btn-course btn-course-outline">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12 text-center py-5">
                                <p class="lead text-muted">No published courses yet.</p>
                            </div>
                            @endforelse
                        </div>
                    </div>

               

                    <div class="tab-pane fade" id="under-review" role="tabpanel" aria-labelledby="under-review-tab">
                        <div class="row gy-4">
                             @forelse($draftCourses as $course)
                            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="course-card">
                                    <div class="course-image">
                                        <img src="{{ asset('general/img/education/' . ($course->thumbnail ?? 'courses-12.webp')) }}" alt="{{ $course->title }}" class="img-fluid">
                                        <span class="badge bg-secondary position-absolute top-0 end-0 m-2">Draft</span>
                                    </div>

                                    <div class="course-content">
                                        <h3>{{ $course->title }}</h3>

                                        <div class="course-stats mb-3">
                                            <div><i class="bi bi-people me-1"></i>{{ $course->enrollments_count }} students</div>
                                            <div><i class="bi bi-collection me-1"></i>{{ $course->modules->count() }} modules</div>
                                            <div><i class="bi bi-star-fill text-warning me-1"></i>{{ number_format($course->reviews_avg_rating ?? 0, 1) }} rating</div>
                                        </div>

                                        <a href="{{ route('instructor.edit-course', ['id' => $course->id]) }}"
                                            class="btn-course btn-course-primary">
                                            Edit Course
                                        </a>

                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12 text-center py-5">
                                <p class="lead text-muted mt-3">No courses in draft mode.</p>
                            </div>
                            @endforelse
                        </div>
                    </div>

                </div>
        </section>
        <!-- End My Courses Overview Section -->
    </main>
@endsection

@push('scripts')
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

                const instructorName = @json($user->name);
                greetingElement.innerHTML = `${timeGreeting}, ${instructorName}! 👋`;
            }
        });
    </script>
@endpush
