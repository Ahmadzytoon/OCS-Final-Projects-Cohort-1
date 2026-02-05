@extends('seeker.layouts.app')

@section('title', 'Cleanova | Find Trusted Cleaners')

@section('content')

    {{-- HERO --}}
    <header class="cc-hero d-flex align-items-center" id="find">
        <div class="cc-hero-overlay"></div>

        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9 text-center text-white">
                    <h1 class="display-5 fw-bold mb-3">Find Trusted Cleaners Near You</h1>
                    <p class="lead mb-4 cc-hero-subtext">
                        Book verified cleaning professionals for your home or car. It’s easy, safe, and reliable.
                    </p>

                    <div class="cc-search-wrap mx-auto">
                        <form class="row g-2 align-items-center" onsubmit="return false;">
                            <div class="col-12 col-md">
                                <div class="input-group input-group-lg cc-input-group">
                                    <span class="input-group-text bg-transparent border-0 ps-3">
                                        <!-- Bootstrap icon-like SVG (no external libs) -->
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                            aria-hidden="true">
                                            <path d="M10.5 18.5a8 8 0 1 1 0-16 8 8 0 0 1 0 16Z" stroke="currentColor"
                                                stroke-width="2" />
                                            <path d="M21 21l-4.3-4.3" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" />
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control border-0 cc-search-input"
                                        placeholder="Enter your location..." aria-label="Enter your location">
                                </div>
                            </div>
                            <div class="col-12 col-md-auto">
                                <a href="{{ route('seeker.providers-list') }}">
                                    <button class="btn btn-primary btn-lg w-100 cc-btn-primary cc-find-btn" type="button">
                                        Find a Cleaner <span class="ms-1">→</span>
                                    </button>
                                </a>
                            </div>
                        </form>

                        <div class="d-flex flex-wrap justify-content-center gap-2 gap-md-3 mt-3">
                            <span class="cc-pill">
                                <span class="cc-pill-dot"></span> Background Checked
                            </span>
                            <span class="cc-pill">
                                <span class="cc-pill-dot"></span> 4.9 Average Rating
                            </span>
                            <span class="cc-pill">
                                <span class="cc-pill-dot"></span> 10,000+ Happy Customers
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>

    {{-- SERVICES --}}
    <section class="cc-section cc-section-soft" id="services">
        <div class="container">
            <div class="text-center mb-4 mb-lg-5">
                <h2 class="fw-bold">Our Services</h2>
                <p class="text-muted mb-0">Choose from our professional cleaning services tailored to your needs</p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="card cc-card h-100">
                        <div class="cc-card-img">
                            <img src="{{ asset('seeker/img/images.jpg') }}" alt="Home cleaning"
                                class="w-100 h-100 object-fit-cover">
                            <span class="badge cc-badge-price">From $50</span>
                        </div>

                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold mb-2">Home Cleaning</h5>
                            <p class="card-text text-muted mb-3">
                                From regular tidying to deep clean, our verified professionals will make your home sparkle.
                            </p>
                            <a href="#" class="btn btn-outline-primary cc-btn-outline">
                                Learn More <span class="ms-1">→</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5">
                    <div class="card cc-card h-100">
                        <div class="cc-card-img">
                            <img src="{{ asset('seeker/img/images.jpg') }}" alt="Car cleaning"
                                class="w-100 h-100 object-fit-cover">
                            <span class="badge cc-badge-price">From $35</span>
                        </div>

                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold mb-2">Car Cleaning</h5>
                            <p class="card-text text-muted mb-3">
                                Interior and exterior detailing to keep your vehicle looking showroom-ready.
                            </p>
                            <a href="#" class="btn btn-outline-primary cc-btn-outline">
                                Learn More <span class="ms-1">→</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- HOW IT WORKS --}}
    <section class="cc-section">
        <div class="container">
            <div class="text-center mb-4 mb-lg-5">
                <h2 class="fw-bold">How It Works</h2>
                <p class="text-muted mb-0">Getting your space cleaned has never been easier</p>
            </div>

            <div class="row g-4 align-items-stretch">
                <div class="col-12 col-md-4">
                    <div class="cc-step h-100">
                        <div class="cc-step-top">
                            <span class="cc-step-num">1</span>
                            <span class="cc-step-line d-none d-md-inline-block"></span>
                        </div>
                        <h5 class="fw-bold mt-3">Search</h5>
                        <p class="text-muted mb-0">Enter your location and browse verified cleaners in your area.</p>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="cc-step h-100">
                        <div class="cc-step-top">
                            <span class="cc-step-num">2</span>
                            <span class="cc-step-line d-none d-md-inline-block"></span>
                        </div>
                        <h5 class="fw-bold mt-3">Book</h5>
                        <p class="text-muted mb-0">Choose your cleaner, select a date and time that works for you.</p>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="cc-step h-100">
                        <div class="cc-step-top">
                            <span class="cc-step-num">3</span>
                        </div>
                        <h5 class="fw-bold mt-3">Relax</h5>
                        <p class="text-muted mb-0">Sit back while your trusted cleaner takes care of everything.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- WHY CHOOSE --}}
    <section class="cc-section cc-section-soft">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-12 col-lg-6">
                    <h2 class="fw-bold mb-2">Why Choose Cleanova?</h2>
                    <p class="text-muted mb-4">
                        We’re committed to making your life easier with trusted, reliable cleaning services that fit your
                        schedule and budget.
                    </p>

                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <div class="cc-mini-card h-100">
                                <div class="cc-mini-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        aria-hidden="true">
                                        <path d="M12 2l7 4v6c0 5-3 9-7 10C8 21 5 17 5 12V6l7-4Z" stroke="currentColor"
                                            stroke-width="2" />
                                    </svg>
                                </div>
                                <h6 class="fw-bold mb-1">Verified Professionals</h6>
                                <p class="text-muted mb-0 small">Every cleaner is background-checked and verified for your
                                    peace of mind.</p>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="cc-mini-card h-100">
                                <div class="cc-mini-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        aria-hidden="true">
                                        <path d="M12 8v5l3 2" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" />
                                        <path d="M12 22a10 10 0 1 0-10-10 10 10 0 0 0 10 10Z" stroke="currentColor"
                                            stroke-width="2" />
                                    </svg>
                                </div>
                                <h6 class="fw-bold mb-1">Flexible Scheduling</h6>
                                <p class="text-muted mb-0 small">Book cleanings that fit your routine—one-time or recurring
                                    services.</p>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="cc-mini-card h-100">
                                <div class="cc-mini-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        aria-hidden="true">
                                        <path d="M12 20l7-7-2-2-5 5-2-2-2 2 4 4Z" stroke="currentColor"
                                            stroke-width="2" />
                                    </svg>
                                </div>
                                <h6 class="fw-bold mb-1">Quality Guaranteed</h6>
                                <p class="text-muted mb-0 small">If you’re not satisfied, we’ll make it right. Your
                                    happiness is our priority.</p>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="cc-mini-card h-100">
                                <div class="cc-mini-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        aria-hidden="true">
                                        <path d="M8 12h8" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" />
                                        <path d="M12 8v8" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" />
                                        <path d="M12 22a10 10 0 1 0-10-10 10 10 0 0 0 10 10Z" stroke="currentColor"
                                            stroke-width="2" />
                                    </svg>
                                </div>
                                <h6 class="fw-bold mb-1">Easy Booking</h6>
                                <p class="text-muted mb-0 small">Find, compare, and book your perfect cleaner in just a few
                                    clicks.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="cc-illustration-card">
                        <img src="{{ asset('seeker/img/images.jpg') }}" alt="Trust illustration"
                            class="w-100 rounded-4 object-fit-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- TESTIMONIALS --}}
    <section class="cc-section">
        <div class="container">
            <div class="text-center mb-4 mb-lg-5">
                <h2 class="fw-bold">What Our Customers Say</h2>
                <p class="text-muted mb-0">Don’t just take our word for it — hear from people who’ve experienced the
                    Cleanova difference</p>
            </div>

            <div class="row g-4">
                <div class="col-12 col-md-4">
                    <div class="card cc-test-card h-100">
                        <div class="card-body p-4">
                            <div class="cc-stars mb-2" aria-label="5 stars">★★★★★</div>
                            <p class="text-muted mb-4">
                                “Cleanova made finding a reliable house cleaner so easy! Maria has been cleaning our
                                home for 3 months now and she’s absolutely wonderful.”
                            </p>
                            <div class="d-flex align-items-center gap-3">
                                <div class="cc-avatar">SM</div>
                                <div>
                                    <div class="fw-semibold">Sarah M.</div>
                                    <div class="text-muted small">Home Cleaning</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card cc-test-card h-100">
                        <div class="card-body p-4">
                            <div class="cc-stars mb-2" aria-label="5 stars">★★★★★</div>
                            <p class="text-muted mb-4">
                                “I was hesitant at first, but the verification process gave me confidence. My car has never
                                looked better! Highly recommend their car detailing service.”
                            </p>
                            <div class="d-flex align-items-center gap-3">
                                <div class="cc-avatar">JR</div>
                                <div>
                                    <div class="fw-semibold">James R.</div>
                                    <div class="text-muted small">Car Cleaning</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card cc-test-card h-100">
                        <div class="card-body p-4">
                            <div class="cc-stars mb-2" aria-label="5 stars">★★★★★</div>
                            <p class="text-muted mb-4">
                                “As a busy mom, I don’t have time to clean. The cleaners here are professional, punctual,
                                and trustworthy. A lifesaver!”
                            </p>
                            <div class="d-flex align-items-center gap-3">
                                <div class="cc-avatar">EL</div>
                                <div>
                                    <div class="fw-semibold">Emily L.</div>
                                    <div class="text-muted small">Home Cleaning</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="cc-cta">
        <div class="container">
            <div class="cc-cta-card text-center text-white">
                <img class="cc-cta-img mb-3" src="{{ asset('seeker/img/images.jpg') }}" alt="CTA illustration">
                <h2 class="fw-bold mb-2">Ready to Get Started?</h2>
                <p class="mb-4 opacity-75">
                    Join thousands of happy customers who’ve found their perfect cleaning match. Your first booking is just
                    a click away.
                </p>
                <div class="d-flex flex-column flex-sm-row justify-content-center gap-2">
                    <a href="{{ route('seeker.providers-list') }}" class="btn btn-light cc-btn-light">
                        Find a Cleaner <span class="ms-1">→</span>
                    </a>
                    <a href="#" class="btn btn-outline-light cc-btn-outline-light">
                        Become a Provider
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="cc-footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-lg-4">
                    <div class="d-flex align-items-center gap-2 fw-semibold mb-2">
                        <span class="cc-logo d-inline-flex align-items-center justify-content-center">C</span>
                        <span>Cleanova</span>
                    </div>
                    <p class="text-white-50 mb-3">
                        Connecting you with trusted cleaning professionals in your area. Your clean home is just a click
                        away.
                    </p>
                    <div class="d-flex gap-2">
                        <a class="cc-social" href="#" aria-label="Facebook">f</a>
                        <a class="cc-social" href="#" aria-label="Twitter">t</a>
                        <a class="cc-social" href="#" aria-label="Instagram">ig</a>
                    </div>
                </div>

                <div class="col-6 col-lg-2">
                    <h6 class="text-white fw-semibold">Services</h6>
                    <ul class="list-unstyled cc-footer-links">
                        <li><a href="#services">Home Cleaning</a></li>
                        <li><a href="#services">Car Cleaning</a></li>
                        <li><a href="#find">Find a Cleaner</a></li>
                    </ul>
                </div>

                <div class="col-6 col-lg-2">
                    <h6 class="text-white fw-semibold">Company</h6>
                    <ul class="list-unstyled cc-footer-links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Become a Provider</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>

                <div class="col-12 col-lg-4">
                    <h6 class="text-white fw-semibold">Contact Us</h6>
                    <ul class="list-unstyled cc-footer-links">
                        <li><a href="#">hello@cleanova.com</a></li>
                        <li><a href="#">1-800-CLEAN-NOW</a></li>
                        <li><a href="#">Nationwide Service</a></li>
                    </ul>
                </div>
            </div>

            <hr class="cc-footer-hr my-4">

            <div class="text-center text-white-50 small">
                © {{ date('Y') }} Cleanova. All rights reserved.
            </div>
        </div>
    </footer>

@endsection

