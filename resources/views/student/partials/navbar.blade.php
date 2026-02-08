    <nav id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="{{ route('student.home') }}" class="logo d-flex align-items-center me-auto">
                <img src="{{ asset('general/img/logo_2.png') }}" alt="CodeQuest">
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li>
                        <a href="{{ route('student.home') }}" class="active">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('student.my-courses') }}">My Courses</a>
                    </li>
                    <li>
                        <a href="{{ route('student.courses') }}">Browse Courses</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}">About</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div class="d-flex align-items-center gap-3 ms-4">

                <div class="dropdown">
                    <a href="#" class="position-relative" data-bs-toggle="dropdown" aria-expanded="false"
                        style="text-decoration: none; color: inherit;">
                        <i class="bi bi-cart3" style="font-size: 1.5rem;"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                            style="font-size: 0.65rem;">
                            3
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end p-3" style="min-width: 320px;">
                        <li
                            class="dropdown-header d-flex justify-content-between align-items-center pb-2 border-bottom">
                            <h6 class="mb-0">My Cart</h6>
                        </li>
                        <li>
                            <div class="d-flex align-items-center py-2 border-bottom">
                                <img src="../../assets/img/education/courses-8.webp" alt="Course"
                                    style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                <div class="ms-2 flex-grow-1">
                                    <div class="small fw-semibold">Web Development</div>
                                    <div class="small text-muted">$29.99</div>
                                </div>
                                <button class="btn btn-sm btn-link text-danger p-0">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center py-2 border-bottom">
                                <img src="../../assets/img/education/courses-8.webp" alt="Course"
                                    style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                <div class="ms-2 flex-grow-1">
                                    <div class="small fw-semibold">React Masterclass</div>
                                    <div class="small text-muted">$49.99</div>
                                </div>
                                <button class="btn btn-sm btn-link text-danger p-0">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center py-2 border-bottom">
                                <img src="{{ asset('assets/img/education/courses-8.webp') }}" alt="Course"
                                    style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                <div class="ms-2 flex-grow-1">
                                    <div class="small fw-semibold">Node.js Complete</div>
                                    <div class="small text-muted">$39.99</div>
                                </div>
                                <button class="btn btn-sm btn-link text-danger p-0">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                        </li>
                        <li class="pt-3">
                            <div class="d-flex justify-content-between mb-2">
                                <strong>Total:</strong>
                                <strong>$119.97</strong>
                            </div>
                            <a class="btn btn-primary w-100 btn-sm">Checkout</a>
                        </li>
                    </ul>
                </div>

                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false"
                        style="text-decoration: none; color: inherit;">
                        @if(Auth::user()->profile_picture)
                             <img src="{{ asset(Auth::user()->profile_picture) }}" alt="Profile" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                        @else
                            <div class="d-flex align-items-center justify-content-center rounded-circle bg-primary text-white"
                                style="width: 40px; height: 40px; font-weight: 600;">
                                {{ substr(Auth::user()->name, 0, 2) }}
                            </div>
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li class="dropdown-header">
                            <div class="fw-semibold">{{ Auth::user()->name }}</div>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('student.profile') }}">
                                <i class="bi bi-person me-2"></i>Profile
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </nav>
