@extends('layouts.instructor')

@section('title', 'Code Quest | Instructor Profile')

@section('content')


    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Instructor Profile</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('instructor.home') }}">Home</a></li>
                        <li class="current">Profile</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Instructor Profile Section -->
        <section id="instructor-profile" class="instructor-profile section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row">

                    <div class="col-lg-12">
                        <div class="instructor-hero-banner" data-aos="zoom-out" data-aos-delay="200">
                            <div class="hero-background">
                                <img src="{{ asset('general/img/education/showcase-4.webp') }}" alt="Background"
                                    class="img-fluid">
                                <div class="hero-overlay"></div>
                            </div>
                            <div class="hero-content">
                                <div class="instructor-avatar">
                                    @if($user->profile_picture)
                                        <img src="{{ asset($user->profile_picture) }}" alt="Profile" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover; border: 4px solid white;">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center rounded-circle bg-primary text-white"
                                            style="width: 120px; height: 120px; font-weight: 700; font-size: 3rem;">
                                            {{ substr($user->name, 0, 2) }}
                                        </div>
                                    @endif
                                </div>
                                <div class="instructor-info">
                                    <h2>{{ $user->name }}</h2>
                                    <p class="title">{{ $user->headline ?? 'Instructor' }}</p>
                                    <div class="credentials">
                                        <span class="credential">Joining since {{ $user->created_at->format('Y') }}</span>
                                        <span class="credential">{{ $courses->count() }} Courses Created</span>
                                        <span class="credential">{{ number_format($instructorRating, 1) }} Instructor Rating</span>
                                        <span class="credential">{{ $user->instructor->experience ?? 'N/A' }} experience</span>
                                        <span class="credential">{{ $totalStudents }} Students</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row gy-5 mt-4">

                    <div class="col-lg-12">
                        <div class="content-tabs" data-aos="fade-right" data-aos-delay="300">

                            <ul class="nav nav-tabs custom-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#instructor-profile-view" type="button" role="tab">
                                        <i class="bi bi-person"></i>
                                        Profile
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#instructor-profile-edit"
                                        type="button" role="tab">
                                        <i class="bi bi-pencil"></i>
                                        Edit Profile
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#instructor-profile-courses" type="button" role="tab">
                                        <i class="bi bi-book"></i>
                                        My Courses
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#instructor-profile-reviews" type="button" role="tab">
                                        <i class="bi bi-star"></i>
                                        Reviews
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content custom-tab-content">

                                <div class="tab-pane fade show active" id="instructor-profile-view" role="tabpanel">
                                    <div class="about-content">

                                        <div class="bio-section"
                                            style="background-color: var(--surface-color); padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px color-mix(in srgb, var(--default-color), transparent 90%); margin-bottom: 25px;">
                                            <h4>About Me</h4>
                                            <p>{{ $user->instructor->teaching_experience ?? 'No bio available.' }}</p>
                                        </div>

                                        @if($user->instructor && $user->instructor->expertise_areas)
                                        <div class="bio-section"
                                            style="background-color: var(--surface-color); padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px color-mix(in srgb, var(--default-color), transparent 90%); margin-bottom: 25px;">
                                            <h4>Expertise & Skills</h4>
                                            <div class="d-flex flex-wrap gap-2 mt-3">
                                                @php
                                                    $expertiseBy = $user->instructor->expertise_areas ?? [];
                                                    $skills = is_string($expertiseBy) ? json_decode($expertiseBy, true) : $expertiseBy;
                                                    $skills = is_array($skills) ? $skills : [];
                                                @endphp
                                                @foreach($skills as $skill)
                                                    <span class="badge bg-light text-dark border p-2">{{ $skill }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif

                                        <div class="bio-section"
                                            style="background-color: var(--surface-color); padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px color-mix(in srgb, var(--default-color), transparent 90%);">
                                            <h4>Account Information</h4>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <strong>Name:</strong> {{ $user->name }}
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <strong>Email:</strong> {{ $user->email }}
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <strong>Role:</strong> {{ ucfirst($user->role) }}
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <strong>Account Status:</strong> <span
                                                        class="badge bg-success">Verified</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="instructor-profile-edit" role="tabpanel">
                                    <div class="about-content">
                                        <form action="{{ route('instructor.profile.update') }}" method="POST" enctype="multipart/form-data"> 
                                            @csrf
                                            <div class="bio-section"
                                                style="background-color: var(--surface-color); padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px color-mix(in srgb, var(--default-color), transparent 90%); margin-bottom: 25px;">
                                                <h4>Profile Picture</h4>
                                                <div class="d-flex align-items-center gap-4">
                                                    <div class="d-flex align-items-center justify-content-center rounded-circle bg-primary text-white"
                                                        style="width: 100px; height: 100px; font-weight: 700; font-size: 2.5rem; overflow: hidden;">
                                                        @if($user->profile_picture)
                                                            <img src="{{ asset($user->profile_picture) }}" alt="Profile" style="width: 100%; height: 100%; object-fit: cover;">
                                                        @else
                                                            {{ substr($user->name, 0, 2) }}
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <input type="file" class="form-control mb-2"
                                                            name="profile_picture" id="profilePicture" accept="image/*">
                                                        <small class="text-muted">Upload a new profile picture (JPG,
                                                            PNG, max 5MB)</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="bio-section"
                                                style="background-color: var(--surface-color); padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px color-mix(in srgb, var(--default-color), transparent 90%); margin-bottom: 25px;">
                                                <h4>Basic Information</h4>

                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Full Name</label>
                                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                                            placeholder="Enter your full name">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Headline</label>
                                                        <input type="text" class="form-control" name="headline"
                                                            value="{{ $user->headline }}"
                                                            placeholder="e.g. Senior Instructor">
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        value="{{ $user->email }}" placeholder="Enter your email" readonly disabled>
                                                    <small class="text-muted">Email cannot be changed directly.</small>
                                                </div>
                                            </div>

                                            <div class="bio-section"
                                                style="background-color: var(--surface-color); padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px color-mix(in srgb, var(--default-color), transparent 90%); margin-bottom: 25px;">
                                                <h4>About Me</h4>
                                                <div class="mb-3">
                                                    <label class="form-label">Bio (publicly visible)</label>
                                                    <textarea class="form-control" rows="4" name="bio" placeholder="Tell students about yourself">{{ $user->instructor->teaching_experience ?? '' }}</textarea>
                                                </div>
                                            </div>

                                            <div class="bio-section"
                                                style="background-color: var(--surface-color); padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px color-mix(in srgb, var(--default-color), transparent 90%); margin-bottom: 25px;">
                                                <h4>Change Password</h4>

                                                <div class="mb-3">
                                                    <label class="form-label">Current Password</label>
                                                    <input type="password" class="form-control" name="current_password"
                                                        placeholder="Enter your current password">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">New Password</label>
                                                    <input type="password" class="form-control" name="new_password"
                                                        placeholder="Enter your new password">
                                                    <small class="text-muted">Password must be at least 8 characters
                                                        long</small>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Confirm New Password</label>
                                                    <input type="password" class="form-control" name="new_password_confirmation"
                                                        placeholder="Confirm your new password">
                                                </div>
                                            </div>

                                            <div class="d-flex gap-2">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="bi bi-check-circle me-2"></i>Save Changes
                                                </button>
                                                <button type="button" class="btn btn-outline-secondary">
                                                    <i class="bi bi-x-circle me-2"></i>Cancel
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="instructor-profile-courses" role="tabpanel">

                                    <ul class="nav nav-tabs custom-tabs" id="profileCourseTabs" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="profile-all-courses-tab"
                                                data-bs-toggle="tab" data-bs-target="#profile-all-courses" type="button"
                                                role="tab" aria-controls="profile-all-courses" aria-selected="true">
                                                <i class="bi bi-grid"></i> All Courses
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="profile-published-tab" data-bs-toggle="tab"
                                                data-bs-target="#profile-published" type="button" role="tab"
                                                aria-controls="profile-published" aria-selected="false">
                                                <i class="bi bi-check-circle"></i> Published
                                            </button>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="profile-under-review-tab" data-bs-toggle="tab"
                                                data-bs-target="#profile-under-review" type="button" role="tab"
                                                aria-controls="profile-under-review" aria-selected="false">
                                                <i class="bi bi-eye"></i> Under Review
                                            </button>
                                        </li>
                                    </ul>

                                    <div class="tab-content custom-tab-content" id="profileCourseTabsContent">

                                        <div class="tab-pane fade show active" id="profile-all-courses" role="tabpanel"
                                            aria-labelledby="profile-all-courses-tab">

                                            @forelse($courses as $course)
                                            <div class="course-card mb-3">
                                                <div class="row g-0">
                                                    <div class="col-md-2">
                                                        <div class="course-image">
                                                            <img src="{{ $course->thumbnail ? asset('general/img/education/'.$course->thumbnail) : asset('assets/img/course-placeholder.jpg') }}"
                                                                alt="Course" class="img-fluid"
                                                                style="height: 100%; object-fit: cover;">
                                                            @if(!$course->is_private)
                                                            <span class="badge bg-success position-absolute top-0 end-0 m-2">Published</span>
                                                            @else
                                                            <span class="badge bg-warning position-absolute top-0 end-0 m-2 text-dark">Draft</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="course-content p-4">
                                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                                <div>
                                                                    <h3 class="mb-2">{{ $course->title }}</h3>
                                                                    <div class="course-meta mb-2">
                                                                        <span class="badge bg-light text-dark border">{{ ucfirst($course->difficulty) }}</span>
                                                                        <span class="text-muted ms-3"><i class="bi bi-people me-1"></i>{{ $course->enrollments_count }} students</span>
                                                                        <span class="text-muted ms-3"><i class="bi bi-star-fill text-warning me-1"></i>{{ number_format($course->reviews_avg_rating, 1) ?? 'N/A' }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mt-2">
                                                                <p class="text-muted mb-0">Created on {{ $course->created_at->format('M d, Y') }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 d-flex align-items-center justify-content-center p-3">
                                                        <a href="{{ route('instructor.edit-course', ['id' => $course->id]) }}"
                                                            class="btn-course">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                            <div class="text-center py-5">
                                                <p class="text-muted">No courses available.</p>
                                            </div>
                                            @endforelse

                                        </div>

                                        <div class="tab-pane fade" id="profile-published" role="tabpanel"
                                            aria-labelledby="profile-published-tab">
                                            
                                            @forelse($publishedCourses as $course)
                                            <div class="course-card mb-3">
                                                <div class="row g-0">
                                                    <div class="col-md-2">
                                                        <div class="course-image">
                                                            <img src="{{ $course->thumbnail ? asset('general/img/education/'.$course->thumbnail) : asset('assets/img/course-placeholder.jpg') }}"
                                                                alt="Course" class="img-fluid"
                                                                style="height: 100%; object-fit: cover;">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="course-content p-4">
                                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                                <div>
                                                                    <h3 class="mb-2">{{ $course->title }}</h3>
                                                                    <div class="course-meta mb-2">
                                                                        <span class="badge bg-light text-dark border">{{ ucfirst($course->difficulty) }}</span>
                                                                        <span class="text-muted ms-3"><i class="bi bi-people me-1"></i>{{ $course->enrollments_count }} students</span>
                                                                        <span class="text-muted ms-3"><i class="bi bi-star-fill text-warning me-1"></i>{{ number_format($course->reviews_avg_rating, 1) ?? 'N/A' }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mt-2">
                                                                <p class="text-muted mb-0">Published on {{ $course->created_at->format('M d, Y') }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 d-flex align-items-center justify-content-center p-3">
                                                        <a href="{{ route('instructor.edit-course', ['id' => $course->id]) }}"
                                                            class="btn-course">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                            <div class="text-center py-5">
                                                <p class="text-muted">No published courses.</p>
                                            </div>
                                            @endforelse

                                        </div>

                                        <div class="tab-pane fade" id="profile-under-review" role="tabpanel"
                                            aria-labelledby="profile-under-review-tab">

                                            @forelse($pendingCourses as $course)
                                            <div class="course-card mb-3">
                                                <div class="row g-0">
                                                    <div class="col-md-2">
                                                        <div class="course-image">
                                                            <img src="{{ $course->thumbnail ? asset('general/img/education/'.$course->thumbnail) : asset('assets/img/course-placeholder.jpg') }}"
                                                                alt="Course" class="img-fluid"
                                                                style="height: 100%; object-fit: cover;">
                                                            <span class="badge bg-warning position-absolute top-0 end-0 m-2 text-dark">Draft</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="course-content p-4">
                                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                                <div>
                                                                    <h3 class="mb-2">{{ $course->title }}</h3>
                                                                    <div class="course-meta mb-2">
                                                                        <span class="badge bg-light text-dark border">{{ ucfirst($course->difficulty) }}</span>
                                                                        <span class="text-muted ms-3"><i class="bi bi-people me-1"></i>{{ $course->enrollments_count }} students</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mt-2">
                                                                <p class="text-muted mb-0">Created on {{ $course->created_at->format('M d, Y') }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 d-flex align-items-center justify-content-center p-3">
                                                        <a href="{{ route('instructor.edit-course', ['id' => $course->id]) }}"
                                                            class="btn-course">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                            <div class="text-center py-5">
                                                <i class="bi bi-eye display-1 text-muted opacity-25"></i>
                                                <p class="lead text-muted mt-3">No courses under review.</p>
                                            </div>
                                            @endforelse

                                        </div>

                                    </div>

                                </div>

                                <div class="tab-pane fade" id="instructor-profile-reviews" role="tabpanel">
                                    <div class="about-content">
                                        <h4 class="mb-4">Student Reviews</h4>

                                        <div class="reviews-container">
                                            @forelse($reviews as $review)
                                            <div class="card border-0 shadow-sm mb-3">
                                                <div class="card-body p-4">
                                                    <div class="d-flex mb-3">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            @if($i <= $review->rating)
                                                                <i class="bi bi-star-fill text-warning"></i>
                                                            @else
                                                                <i class="bi bi-star text-warning"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <p class="card-text mb-3">"{{ $review->review_text }}"</p>
                                                    <div class="d-flex align-items-center">
                                                        @if($review->user->profile_picture)
                                                            <div class="me-3">
                                                                <img src="{{ asset($review->user->profile_picture) }}" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                                                            </div>
                                                        @else
                                                            <div class="d-flex align-items-center justify-content-center rounded-circle bg-secondary text-white small me-3"
                                                                style="width: 40px; height: 40px;">
                                                                {{ substr($review->user->name, 0, 2) }}
                                                            </div>
                                                        @endif
                                                        
                                                        <div>
                                                            <h6 class="mb-0">{{ $review->user->name }}</h6>
                                                            <small class="text-muted">{{ $review->course->title }} Student</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                            <div class="text-center py-5">
                                                <p class="text-muted">No reviews yet.</p>
                                            </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>

    </main>


@endsection
