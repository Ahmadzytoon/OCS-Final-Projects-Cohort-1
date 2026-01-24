@extends('layouts.student')

@section('title', 'Code Quest | My Courses')

@section('content')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">My Courses</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('student.home') }}">Home</a></li>
                        <li class="current">My Courses</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- My Courses Section -->
        <section id="my-courses" class="courses-2 section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="content-tabs" data-aos="fade-up" data-aos-delay="150">

                    <ul class="nav nav-tabs custom-tabs" id="courseTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="in-progress-tab" data-bs-toggle="tab"
                                data-bs-target="#in-progress" type="button" role="tab" aria-controls="in-progress"
                                aria-selected="true">
                                <i class="bi bi-play-circle"></i> In Progress
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="not-started-tab" data-bs-toggle="tab" data-bs-target="#not-started"
                                type="button" role="tab" aria-controls="not-started" aria-selected="false">
                                <i class="bi bi-bookmark"></i> Not Started
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed"
                                type="button" role="tab" aria-controls="completed" aria-selected="false">
                                <i class="bi bi-check-circle"></i> Completed
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content custom-tab-content" id="courseTabsContent">

                        <div class="tab-pane fade show active" id="in-progress" role="tabpanel"
                            aria-labelledby="in-progress-tab">

                            <div class="course-card mb-3" data-aos="fade-up" data-aos-delay="200">
                                <div class="row g-0">
                                    <div class="col-md-2">
                                        <div class="course-image">
                                            <img src="../assets/img/education/courses-12.webp" alt="Course"
                                                class="img-fluid" style="height: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="course-content p-4">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <div>
                                                    <h3 class="mb-2">Python Programming Mastery</h3>
                                                    <div class="course-meta mb-2">
                                                        <span class="intermediate">Intermediate</span>
                                                        <span class="text-muted ms-3"><i
                                                                class="bi bi-calendar3 me-1"></i>Enrolled: Jan 15,
                                                            2026</span>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="progress-info mt-3">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span class="progress-text"><strong>Progress:</strong> 67%
                                                        Complete</span>
                                                    <span class="progress-details">16 of 24 modules</span>
                                                </div>
                                                <div class="progress" style="height: 8px;">
                                                    <div class="progress-fill" role="progressbar"
                                                        style="width: 67%; background: linear-gradient(90deg, var(--accent-color) 0%, color-mix(in srgb, var(--accent-color), #fff 20%) 100%);"
                                                        aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-center justify-content-center p-3">
                                        <a href="{{ route('student.enrolled-course-details') }}"
                                            class="btn-course">Continue</a>
                                    </div>
                                </div>
                            </div>

                            <div class="course-card mb-3" data-aos="fade-up" data-aos-delay="250">
                                <div class="row g-0">
                                    <div class="col-md-2">
                                        <div class="course-image">
                                            <img src="../assets/img/education/courses-12.webp" alt="Course"
                                                class="img-fluid" style="height: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="course-content p-4">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <div>
                                                    <h3 class="mb-2">Web Development Fundamentals</h3>
                                                    <div class="course-meta mb-2">
                                                        <span class="beginner">Beginner</span>
                                                        <span class="text-muted ms-3"><i
                                                                class="bi bi-calendar3 me-1"></i>Enrolled: Jan 10,
                                                            2026</span>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="progress-info mt-3">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span class="progress-text"><strong>Progress:</strong> 45%
                                                        Complete</span>
                                                    <span class="progress-details">12 of 18 modules</span>
                                                </div>
                                                <div class="progress" style="height: 8px;">
                                                    <div class="progress-fill" role="progressbar"
                                                        style="width: 45%; background: linear-gradient(90deg, var(--accent-color) 0%, color-mix(in srgb, var(--accent-color), #fff 20%) 100%);"
                                                        aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-center justify-content-center p-3">
                                        <a href="{{ route('student.enrolled-course-details') }}" class="btn-course">Continue</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="not-started" role="tabpanel" aria-labelledby="not-started-tab">

                            <div class="course-card mb-3" data-aos="fade-up" data-aos-delay="200">
                                <div class="row g-0">
                                    <div class="col-md-2">
                                        <div class="course-image">
                                            <img src="../assets/img/education/courses-12.webp" alt="Course"
                                                class="img-fluid" style="height: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="course-content p-4">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <div>
                                                    <h3 class="mb-2">React & Modern JavaScript</h3>
                                                    <div class="course-meta mb-2">
                                                        <span class="intermediate">Intermediate</span>
                                                        <span class="text-muted ms-3"><i
                                                                class="bi bi-calendar3 me-1"></i>Enrolled: Jan 20,
                                                            2026</span>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="progress-info mt-3">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span class="progress-text"><strong>Progress:</strong> 0%
                                                        Complete</span>
                                                    <span class="progress-details">0 of 20 modules</span>
                                                </div>
                                                <div class="progress" style="height: 8px;">
                                                    <div class="progress-fill" role="progressbar"
                                                        style="width: 0%; background: linear-gradient(90deg, var(--accent-color) 0%, color-mix(in srgb, var(--accent-color), #fff 20%) 100%);"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-center justify-content-center p-3">
                                        <a href="{{ route('student.enrolled-course-details') }}" class="btn-course">Start</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">

                            <div class="course-card mb-3" data-aos="fade-up" data-aos-delay="200">
                                <div class="row g-0">
                                    <div class="col-md-2">
                                        <div class="course-image">
                                            <img src="../assets/img/education/courses-12.webp" alt="Course"
                                                class="img-fluid" style="height: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="course-content p-4">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <div>
                                                    <h3 class="mb-2">Digital Marketing Strategies</h3>
                                                    <div class="course-meta mb-2">
                                                        <span class="beginner">Beginner</span>
                                                        <span class="text-muted ms-3"><i
                                                                class="bi bi-calendar3 me-1"></i>Enrolled: Dec 20,
                                                            2025</span>
                                                        <span class="text-muted ms-3"><i
                                                                class="bi bi-check-circle-fill text-success me-1"></i>Completed:
                                                            Jan 18, 2026</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="progress-info mt-3">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span class="progress-text"><strong>Progress:</strong> 100%
                                                        Complete</span>
                                                    <span class="progress-details">15 of 15 modules</span>
                                                </div>
                                                <div class="progress" style="height: 8px;">
                                                    <div class="progress-fill" role="progressbar"
                                                        style="width: 100%; background: linear-gradient(90deg, #28a745 0%, #20c997 100%);"
                                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-center justify-content-center p-3">
                                        <a href="{{ route('student.enrolled-course-details') }}" class="btn-course">Review</a>
                                    </div>
                                </div>
                            </div>

         

                        </div>
                    </div>
                </div>
        </section><!-- /My Courses Section -->

    </main>
@endsection
