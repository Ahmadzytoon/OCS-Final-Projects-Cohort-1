@extends('layouts.visitor')

@section('title', 'Code Quest | Home')

@section('content')

    <main class="main">
        <!-- Courses Hero Section -->
        <section id="courses-hero" class="courses-hero section light-background">
            <div class="hero-content">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="hero-text">
                                <h1>Your Path to Coding Mastery<span style="color: var(--accent-color);"> Begins</span> Here
                                </h1>
                                <p>Learn coding concepts clearly, practice them immediately, and level up with every topic.
                                </p>
                                <div class="hero-stats">
                                    <div class="stat-item">
                                        <span class="number purecounter" data-purecounter-start="0"
                                            data-purecounter-end="{{ $totalStudents }}"
                                            data-purecounter-duration="1"></span>
                                        <span class="label">Students Enrolled</span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="number purecounter" data-purecounter-start="0"
                                            data-purecounter-end="{{ $totalCourses }}" data-purecounter-duration="1"></span>
                                        <span class="label">Expert Courses</span>
                                    </div>
                                </div>

                                <div class="hero-buttons">
                                    <a href="{{ route('register') }}" class="btn btn-primary">Get Started</a>
                                    <a href="{{ route('visitor.courses') }}" class="btn btn-outline">Browse Course</a>
                                </div>

                                <div class="hero-features">
                                    <div class="feature">
                                        <i class="bi bi-shield-check"></i>
                                        <span>Certified Programs</span>
                                    </div>
                                    <div class="feature">
                                        <i class="bi bi-clock"></i>
                                        <span>Lifetime Access</span>
                                    </div>
                                    <div class="feature">
                                        <i class="bi bi-people"></i>
                                        <span>Expert Instructors</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="hero-image">
                                <div class="main-image">
                                    <img src="{{ asset('general/img/education/study.jpg') }}" alt="Online Learning"
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero-background">
                <div class="bg-shapes">
                    <div class="shape shape-1"></div>
                    <div class="shape shape-2"></div>
                    <div class="shape shape-3"></div>
                </div>
            </div>

        </section><!-- /Courses Hero Section -->

        <!-- About Section -->
        <section id="how-it-works" class="about section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <h2>How Code Quest Works?</h2>
                <div class="row mt-5 pt-4">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="mission-card">
                            <div class="icon-box">
                                <i class="bi bi-book-half"></i>
                            </div>
                            <h3>Choose a Course</h3>
                            <p>Browse our catalog and pick a course that matches your goals and skill level.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="mission-card">
                            <div class="icon-box">
                                <i class="bi bi-pencil-square"></i>
                            </div>
                            <h3>Learn Through Modules</h3>
                            <p>Read clear, focused lessons organized into logical modules and topics.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="mission-card">
                            <div class="icon-box">
                                <i class="bi bi-code-slash"></i>
                            </div>
                            <h3>Practice & Apply</h3>
                            <p>Answer questions and complete challenges after each topic to reinforce learning.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="mission-card">
                            <div class="icon-box">
                                <i class="bi bi-bar-chart"></i>
                            </div>
                            <h3>Track Your Progress</h3>
                            <p>Watch your progress grow with visual indicators and completion badges.</p>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /About Section -->

        <!-- Featured Courses Section -->
        <section id="featured-courses" class="featured-courses section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Featured Courses</h2>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    @foreach ($topCourses as $course)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="course-card">
                                <div class="course-image">
                                    <img src="{{ asset('general/img/courses/' . $course->thumbnail) }}"
                                        alt="{{ $course->title }} Image" class="img-fluid">
                                    <div class="price-badge">
                                        @if ($course->pricing == 'paid')
                                            ${{ $course->price }}
                                        @else
                                            Free
                                        @endif
                                    </div>
                                </div>
                                <div class="course-content">
                                    <div class="course-meta">
                                        <span class="beginner">{{ ucfirst($course->difficulty) }}</span>
                                        <span class="duration">{{ $course->modules_count }} Modules •
                                            {{ $course->projects_count }} Projects</span>
                                    </div>
                                    <h3><a
                                            href="{{ route('visitor.course-details', $course->id) }}">{{ $course->title }}</a>
                                    </h3>
                                    <p>{{ $course->short_description }}</p>

                                    <div class="instructor">
                                        <img src="{{ asset('general/img/person/person-m-2.webp') }}" alt="Instructor"
                                            class="instructor-img">
                                        <div class="instructor-info">
                                            <h6>{{ $course->instructor->name }}</h6>
                                            <span><span>{{ $course->instructor->headline ?? '' }}</span>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="course-stats">
                                        <div class="rating">
                                            @php
                                                $avgRating = round($course->reviews_avg_rating ?? 0, 1);
                                                $fullStars = floor($avgRating);
                                                $halfStar = $avgRating - $fullStars >= 0.5;
                                            @endphp

                                            @for ($i = 0; $i < $fullStars; $i++)
                                                <i class="bi bi-star-fill"></i>
                                            @endfor
                                            @if ($halfStar)
                                                <i class="bi bi-star-half"></i>
                                            @endif
                                            @for ($i = $fullStars + ($halfStar ? 1 : 0); $i < 5; $i++)
                                                <i class="bi bi-star"></i>
                                            @endfor
                                            <span>({{ $avgRating }})</span>
                                        </div>

                                        <div class="students">
                                            <i class="bi bi-people-fill"></i>
                                            <span>{{ $course->enrollments_count }} students</span>
                                        </div>
                                    </div>

                                    <a href="{{ route('visitor.course-details', $course->id) }}" class="btn-course">View
                                        Course</a>
                                </div>
                            </div>
                        </div><!-- End Course Item -->
                    @endforeach
                </div>


                <div class="more-courses text-center" data-aos="fade-up" data-aos-delay="500">
                    <a href="{{ route('visitor.courses') }}" class="btn-more">View All Courses</a>
                </div>

            </div>

        </section><!-- /Featured Courses Section -->

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>What Learners Say</h2>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row">
                    <div class="col-12">
                        <div class="critic-reviews" data-aos="fade-up" data-aos-delay="300">
                            <div class="row">

                                <!-- Testimonial 1 -->
                                <div class="col-md-4">
                                    <div class="critic-review">
                                        <div class="review-quote">"</div>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i>
                                        </div>
                                        <p>
                                            "Code Quest completely changed my approach to learning programming. The modules
                                            are clear and the exercises really help reinforce concepts."
                                        </p>
                                        <div class="critic-info d-flex align-items-center gap-3">
                                            <img src="{{ asset('general/img/person/person-f-1.webp') }}" alt="Reviewer"
                                                class="rounded-circle" width="48" height="48">
                                            <div>
                                                <div class="critic-name">Sara Ahmed</div>
                                                <div class="critic-role">Frontend Developer</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Testimonial 2 -->
                                <div class="col-md-4">
                                    <div class="critic-review">
                                        <div class="review-quote">"</div>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                        <p>
                                            "I was able to finish a project I never thought I could do before joining
                                            Code Quest. The instructor guidance and exercises were excellent."
                                        </p>
                                        <div class="critic-info d-flex align-items-center gap-3">
                                            <img src="{{ asset('general/img/person/person-m-3.webp') }}" alt="Reviewer"
                                                class="rounded-circle" width="48" height="48">
                                            <div>
                                                <div class="critic-name">Omar Khaled</div>
                                                <div class="critic-role">Backend Developer</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Testimonial 3 -->
                                <div class="col-md-4">
                                    <div class="critic-review">
                                        <div class="review-quote">"</div>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i>
                                        </div>
                                        <p>
                                            "The learning experience on Code Quest is very interactive. The challenges and
                                            feedback make you feel like you are actually improving every day."
                                        </p>
                                        <div class="critic-info d-flex align-items-center gap-3">
                                            <img src="{{ asset('general/img/person/person-f-3.webp') }}" alt="Reviewer"
                                                class="rounded-circle" width="48" height="48">
                                            <div>
                                                <div class="critic-name">Lina Samir</div>
                                                <div class="critic-role">Full Stack Developer</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Testimonials Section -->


        <!-- Cta Section -->
        <section id="cta" class="cta section light-background">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row align-items-center">

                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                        <div class="cta-content">
                            <h2>Ready to Start Your Coding Quest?</h2>
                            <p>Join thousands of learners mastering programming through focused, structured learning.</p>

                            <div class="features-list">
                                <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>20+ Expert instructors with industry experience</span>
                                </div>
                                <div class="feature-item" data-aos="fade-up" data-aos-delay="350">
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>Certificate of completion for every course</span>
                                </div>
                                <div class="feature-item" data-aos="fade-up" data-aos-delay="400">
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>24/7 access to course materials and resources</span>
                                </div>
                                <div class="feature-item" data-aos="fade-up" data-aos-delay="450">
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>Interactive assignments and real-world projects</span>
                                </div>
                            </div>

                            <div class="cta-actions" data-aos="fade-up" data-aos-delay="500">
                                <a href="{{ route('register') }}" class="btn btn-primary">Create Free Account
                                </a>
                                <a href="{{ route('visitor.courses') }}" class="btn btn-outline">Browse Courses</a>
                            </div>

                            <div class="stats-row" data-aos="fade-up" data-aos-delay="400">

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                        <div class="cta-image">
                            <img src="{{ asset('general/img/education/courses-4.webp') }}" alt="Online Learning Platform"
                                class="img-fluid">
                            <div class="floating-element student-card" data-aos="zoom-in" data-aos-delay="600">
                                <div class="card-content">
                                    <i class="bi bi-person-check-fill"></i>
                                    <div class="text">
                                        <span class="number">{{ $totalStudents }}</span>
                                        <span class="label">Total Students</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Cta Section -->
    </main>

@endsection
