@extends('layouts.visitor')

@section('title', 'Code Quest | Pricing')

@section('content')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">CodeQuest Plans</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('visitor.home') }}">Home</a></li>
                        <li class="current">Pricing</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Pricing Section -->
        <section id="pricing" class="pricing section">

            <div class="container pricing-toggle-container" data-aos="fade-up" data-aos-delay="100">

                <!-- Pricing Toggle -->
                <div class="pricing-toggle d-flex align-items-center justify-content-center text-center mb-5">
                    <span class="monthly active">Monthly</span>
                    <div class="form-check form-switch d-inline-block mx-3">
                        <input class="form-check-input" type="checkbox" id="pricingSwitch">
                        <label class="form-check-label" for="pricingSwitch"></label>
                    </div>
                    <span class="yearly">Yearly <span class="badge">20% OFF</span></span>
                </div>

                <!-- Pricing Plans -->
                <div class="row gy-4 justify-content-center">

                    <!-- Basic Plan -->
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="pricing-item">
                            <div class="pricing-header">
                                <h6 class="pricing-category">Explorer</h6>
                                <div class="price-wrap">
                                    <h2 class="price">Free</h2>
                                </div>
                                <p class="pricing-description">Start your coding journey</p>
                            </div>

                            <div class="pricing-cta">
                                <a href="#" class="btn btn-primary w-100">Start Learning</a>
                            </div>

                            <div class="pricing-features">
                                <h6>Explorer Includes:</h6>
                                <ul class="feature-list">
                                    <li><i class="bi bi-check"></i> Access to free coding courses</li>
                                    <li><i class="bi bi-check"></i> Text-based lessons</li>
                                    <li><i class="bi bi-check"></i> Practice questions</li>
                                    <li><i class="bi bi-check"></i> Basic progress tracking</li>
                                    <li><i class="bi bi-check"></i> Community discussions</li>
                                    <li><i class="bi bi-check"></i> Limited challenges</li>
                                    <li><i class="bi bi-check"></i> Course previews</li>
                                    <li><i class="bi bi-check"></i> Learning roadmap access</li>
                                    <li><i class="bi bi-check"></i> Email support</li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- End Basic Plan -->

                    <!-- Plus Plan -->
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="pricing-item">
                            <div class="pricing-header">
                                <h6 class="pricing-category">Adventurer</h6>
                                <div class="price-wrap">
                                    <div class="price monthly">
                                        <sup>$</sup>25<span>/m</span>
                                    </div>
                                    <div class="price yearly">
                                        <sup>$</sup>20<span>/m</span>
                                    </div>
                                </div>
                                <p class="pricing-description">Build real coding skills</p>
                            </div>

                            <div class="pricing-cta">
                                <a href="#" class="btn btn-primary w-100">Upgrade Now</a>
                            </div>

                            <div class="pricing-features">
                                <h6>Everything in <strong>Explorer</strong>, plus:</h6>
                                <ul class="feature-list">
                                    <li><i class="bi bi-check"></i> Full access to paid courses</li>
                                    <li><i class="bi bi-check"></i> Hands-on coding challenges</li>
                                    <li><i class="bi bi-check"></i> Course completion certificates</li>
                                    <li><i class="bi bi-check"></i> Project-based learning</li>
                                    <li><i class="bi bi-check"></i> Skill-level progression</li>
                                    <li><i class="bi bi-check"></i> Instructor Q&A access</li>
                                    <li><i class="bi bi-check"></i> Saved learning history</li>
                                    <li><i class="bi bi-check"></i> Priority email support</li>
                                    <li><i class="bi bi-check"></i> Early access to new courses</li>
                                    <li><i class="bi bi-check"></i> Personal learning dashboard</li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- End Plus Plan -->

                    <!-- Business Plan -->
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="pricing-item popular">
                            <div class="popular-badge">Most Popular</div>
                            <div class="pricing-header">
                                <h6 class="pricing-category">Master</h6>
                                <div class="price-wrap">
                                    <div class="price monthly">
                                        <sup>$</sup>45<span>/m</span>
                                    </div>
                                    <div class="price yearly">
                                        <sup>$</sup>36<span>/m</span>
                                    </div>
                                </div>
                                <p class="pricing-description">Advance to professional level</p>
                            </div>

                            <div class="pricing-cta">
                                <a href="#" class="btn btn-primary w-100">Go Pro</a>
                            </div>

                            <div class="pricing-features">
                                <h6>Everything in <strong>Adventurer</strong>, plus:</h6>
                                <ul class="feature-list">
                                    <li><i class="bi bi-check"></i> <span class="feature-highlight">Advanced learning
                                            paths</span></li>
                                    <li><i class="bi bi-check"></i> Real-world projects</li>
                                    <li><i class="bi bi-check"></i> Portfolio-ready work</li>
                                    <li><i class="bi bi-check"></i> Skill assessments</li>
                                    <li><i class="bi bi-check"></i> AI-assisted recommendations</li>
                                    <li><i class="bi bi-check"></i> Personalized course tracking</li>
                                    <li><i class="bi bi-check"></i> Advanced analytics</li>
                                    <li><i class="bi bi-check"></i> Career-focused content</li>
                                    <li><i class="bi bi-check"></i> Instructor feedback</li>
                                    <li><i class="bi bi-check"></i> Priority feature access</li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- End Business Plan -->

                    <!-- Enterprise Plan -->
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="pricing-item">
                            <div class="pricing-header">
                                <h6 class="pricing-category">Institution</h6>
                                <div class="price-wrap">
                                    <h2 class="price">Custom</h2>
                                </div>
                                <p class="pricing-description">For teams, schools, and organizations</p>
                            </div>

                            <div class="pricing-cta">
                                <a href="#" class="btn btn-primary w-100">Contact Us</a>
                            </div>

                            <div class="pricing-features">
                                <h6>Everything in <strong>Master</strong>, plus:</h6>
                                <ul class="feature-list">
                                    <li><i class="bi bi-check"></i> Team management</li>
                                    <li><i class="bi bi-check"></i> Custom learning paths</li>
                                    <li><i class="bi bi-check"></i> Student performance analytics</li>
                                    <li><i class="bi bi-check"></i> Instructor dashboards</li>
                                    <li><i class="bi bi-check"></i> Bulk user enrollment</li>
                                    <li><i class="bi bi-check"></i> Dedicated support</li>
                                    <li><i class="bi bi-check"></i> Custom integrations</li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- End Enterprise Plan -->

                </div>

            </div>

        </section><!-- /Pricing Section -->

    </main>


@endsection
