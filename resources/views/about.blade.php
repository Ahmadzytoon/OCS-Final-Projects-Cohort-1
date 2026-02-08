@extends('layouts.visitor')

@section('title', 'Code Quest | Home')

@section('content')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">About</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('visitor.home') }}">Home</a></li>
                        <li class="current">About</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row align-items-center">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <img src="{{ asset('general/img/education/education-square-2.webp') }}" alt="About CodeQuest"
                            class="img-fluid rounded-4">
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="about-content">
                            <span class="subtitle">About CodeQuest</span>
                            <h2>Learning to Code Through Practice, Not Just Videos</h2>
                            <p>
                                CodeQuest is an interactive learning platform designed to help students and aspiring
                                developers
                                build real skills through structured content, hands-on challenges, and guided projects.
                                We focus on learning by doing — turning concepts into practical experience.
                            </p>
                            <div class="stats-row">
                                <div class="stats-item">
                                    <span class="count">{{ $coursesCount }}+</span>
                                    <p>Structured Courses</p>
                                </div>
                                <div class="stats-item">
                                    <span class="count">{{ $challengesCount }}+</span>
                                    <p>Practice Challenges</p>
                                </div>
                                <div class="stats-item">
                                    <span class="count">{{ $studentsCount }}+</span>
                                    <p>Learners Growing Daily</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 pt-4">
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="mission-card">
                            <div class="icon-box">
                                <i class="bi bi-bullseye"></i>
                            </div>
                            <h3>Our Mission</h3>
                            <p>
                                To make learning programming clear, practical, and accessible by combining structured
                                lessons
                                with real-world coding challenges.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="mission-card">
                            <div class="icon-box">
                                <i class="bi bi-eye"></i>
                            </div>
                            <h3>Our Vision</h3>
                            <p>
                                To become a trusted platform where learners build confidence, skills, and career-ready
                                experience
                                through continuous practice.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="mission-card">
                            <div class="icon-box">
                                <i class="bi bi-award"></i>
                            </div>
                            <h3>Our Values</h3>
                            <p>
                                Clarity, consistency, hands-on learning, and empowering learners to grow at their own pace.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 pt-3 align-items-center">
                    <div class="col-lg-6 order-lg-2" data-aos="fade-up" data-aos-delay="300">
                        <div class="achievements">
                            <span class="subtitle">Why Choose CodeQuest</span>
                            <h2>Build Skills That Actually Matter</h2>
                            <p>
                                CodeQuest focuses on real understanding, not memorization. Every course is designed to help
                                you
                                apply what you learn through exercises, challenges, and projects.
                            </p>
                            <ul class="achievements-list">
                                <li><i class="bi bi-check-circle-fill"></i> Text-based, focused learning content</li>
                                <li><i class="bi bi-check-circle-fill"></i> Practice-driven challenges and quizzes</li>
                                <li><i class="bi bi-check-circle-fill"></i> Structured learning paths per course</li>
                                <li><i class="bi bi-check-circle-fill"></i> Progress tracking and achievements</li>
                                <li><i class="bi bi-check-circle-fill"></i> Designed for students and self-learners</li>
                            </ul>
                            <a href="{{route('visitor.courses')}}" class="btn-explore">Explore Courses <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                        <div class="about-gallery">
                            <div class="row g-3">
                                <div class="col-6">
                                    <img src="{{ asset('general/img/education/students-3.webp') }}" alt="Learning Modules"
                                        class="img-fluid rounded-3">
                                </div>
                                <div class="col-6">
                                    <img src="{{ asset('general/img/education/students-3.webp') }}" alt="Coding Practice"
                                        class="img-fluid rounded-3">
                                </div>
                                <div class="col-12 mt-3">
                                    <img src="{{ asset('general/img/education/campus-8.webp') }}" alt="Online Learning Platform"
                                        class="img-fluid rounded-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /About Section -->

    </main>


@endsection
