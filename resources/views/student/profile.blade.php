@extends('layouts.student')

@section('title', 'Measurements | ' . $user->name)

@section('content')

    <main class="main">

        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">My Profile</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('student.home') }}">Home</a></li>
                        <li class="current">My Profile</li>
                    </ol>
                </nav>
            </div>
        </div>

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
                                            style="width: 120px; height: 120px; font-weight: 700; font-size: 3rem; border: 4px solid white;">
                                            {{ substr($user->name, 0, 2) }}
                                        </div>
                                    @endif
                                </div>
                                <div class="instructor-info">
                                    <h2>{{ $user->name }}</h2>
                                    <p class="title">{{ $user->headline ?? 'Student' }}</p>
                                    <div class="credentials">
                                        <span class="credential">Member since {{ $user->created_at->format('M Y') }}</span>
                                        <span class="credential">{{ $inProgressCourses->count() + $notStartedCourses->count() + $completedCourses->count() }} Courses Enrolled</span>
                                        <span class="credential">{{ $student->total_xp ?? 0 }} Total XP</span>
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
                                        data-bs-target="#student-profile-view" type="button" role="tab">
                                        <i class="bi bi-person"></i>
                                        Profile
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#student-profile-edit"
                                        type="button" role="tab">
                                        <i class="bi bi-pencil"></i>
                                        Edit Profile
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#student-profile-courses"
                                        type="button" role="tab">
                                        <i class="bi bi-book"></i>
                                        My Courses
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#student-profile-badges"
                                        type="button" role="tab">
                                        <i class="bi bi-trophy"></i>
                                        Badges
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content custom-tab-content">

                                <div class="tab-pane fade show active" id="student-profile-view" role="tabpanel">
                                    <div class="about-content">

                                        <div class="bio-section"
                                            style="background-color: var(--surface-color); padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px color-mix(in srgb, var(--default-color), transparent 90%); margin-bottom: 25px;">
                                            <h4>About Me</h4>
                                            <p>{{ $student->bio ?? 'No bio available yet. Use the edit tab to add something about yourself!' }}</p>
                                        </div>

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
                                                    <strong>Member Since:</strong> {{ $user->created_at->format('F Y') }}
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <strong>Account Status:</strong> <span
                                                        class="badge bg-success">Active</span>
                                                </div>
                                                @if($user->email_verified_at)
                                                <div class="col-md-6 mb-3">
                                                     <strong>Verified:</strong> <i class="bi bi-check-circle-fill text-success"></i> Yes
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="student-profile-edit" role="tabpanel">
                                    <div class="about-content">
                                        <form action="{{ route('student.profile.update') }}" method="POST" enctype="multipart/form-data">
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
                                                        <input type="file" class="form-control mb-2" id="profilePicture" name="profile_picture"
                                                            accept="image/*">
                                                        <small class="text-muted">Upload a new profile picture (JPG,
                                                            PNG, max 5MB)</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="bio-section"
                                                style="background-color: var(--surface-color); padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px color-mix(in srgb, var(--default-color), transparent 90%); margin-bottom: 25px;">
                                                <h4>Basic Information</h4>

                                                <div class="mb-3">
                                                    <label class="form-label">Full Name</label>
                                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                                        placeholder="Enter your full name">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" value="{{ $user->email }}"
                                                        placeholder="Enter your email" disabled readonly>
                                                    <small class="text-muted">Email cannot be changed directly.</small>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label class="form-label">Headline</label>
                                                    <input type="text" class="form-control" name="headline" value="{{ $user->headline }}"
                                                        placeholder="e.g. Aspiring Developer">
                                                </div>
                                            </div>

                                            <div class="bio-section"
                                                style="background-color: var(--surface-color); padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px color-mix(in srgb, var(--default-color), transparent 90%); margin-bottom: 25px;">
                                                <h4>About Me</h4>
                                                <div class="mb-3">
                                                    <label class="form-label">Bio (Optional)</label>
                                                    <textarea class="form-control" rows="4" name="bio" placeholder="Tell others about yourself">{{ $student->bio ?? '' }}</textarea>
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
                                                    <input type="password" class="form-control"
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

                                <div class="tab-pane fade" id="student-profile-courses" role="tabpanel">

                                    <ul class="nav nav-tabs custom-tabs" id="courseTabs" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="in-progress-tab" data-bs-toggle="tab"
                                                data-bs-target="#in-progress" type="button" role="tab">
                                                <i class="bi bi-play-circle"></i> In Progress
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="not-started-tab" data-bs-toggle="tab"
                                                data-bs-target="#not-started" type="button" role="tab">
                                                <i class="bi bi-bookmark"></i> Not Started
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="completed-tab" data-bs-toggle="tab"
                                                data-bs-target="#completed" type="button" role="tab">
                                                <i class="bi bi-check-circle"></i> Completed
                                            </button>
                                        </li>
                                    </ul>

                                    <div class="tab-content custom-tab-content" id="courseTabsContent">

                                        <div class="tab-pane fade show active" id="in-progress" role="tabpanel">
                                            @forelse($inProgressCourses as $enrollment)
                                            <div class="course-card mb-3">
                                                <div class="row g-0">
                                                    <div class="col-md-2">
                                                        <div class="course-image">
                                                            <img src="{{ $enrollment->course->thumbnail ? asset('general/img/education/'.$enrollment->course->thumbnail) : asset('assets/img/course-placeholder.jpg') }}"
                                                                alt="Course" class="img-fluid"
                                                                style="height: 100%; object-fit: cover;">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="course-content p-4">
                                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                                <div>
                                                                    <h3 class="mb-2">{{ $enrollment->course->title }}</h3>
                                                                    <div class="course-meta mb-2">
                                                                        <span class="badge bg-light text-dark border">{{ ucfirst($enrollment->course->difficulty) }}</span>
                                                                        <span class="text-muted ms-3"><i class="bi bi-calendar3 me-1"></i>Enrolled: {{ $enrollment->enrolled_at ? $enrollment->enrolled_at->format('M d, Y') : 'N/A' }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-info mt-3">
                                                                <div class="d-flex justify-content-between mb-2">
                                                                    <span class="progress-text"><strong>Progress:</strong> {{ $enrollment->progress_percentage }}% Complete</span>
                                                                    <span class="progress-details">{{ $enrollment->course->modules->count() }} modules</span>
                                                                </div>
                                                                <div class="progress" style="height: 8px;">
                                                                    <div class="progress-fill" role="progressbar"
                                                                        style="width: {{ $enrollment->progress_percentage }}%; background: linear-gradient(90deg, var(--accent-color) 0%, color-mix(in srgb, var(--accent-color), #fff 20%) 100%);"
                                                                        aria-valuenow="{{ $enrollment->progress_percentage }}" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 d-flex align-items-center justify-content-center p-3">
                                                        <a href="{{ route('student.enrolled-course-details', ['id' => $enrollment->course->id]) }}"
                                                            class="btn-course">Continue</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                            <div class="text-center py-5">
                                                <p class="text-muted">No courses in progress.</p>
                                                <a href="{{ route('student.courses') }}" class="btn btn-outline-primary mt-2">Browse Courses</a>
                                            </div>
                                            @endforelse
                                        </div>

                                        <div class="tab-pane fade" id="not-started" role="tabpanel">
                                            @forelse($notStartedCourses as $enrollment)
                                            <div class="course-card mb-3">
                                                <div class="row g-0">
                                                    <div class="col-md-2">
                                                        <div class="course-image">
                                                             <img src="{{ $enrollment->course->thumbnail ? asset('general/img/education/'.$enrollment->course->thumbnail) : asset('assets/img/course-placeholder.jpg') }}"
                                                                alt="Course" class="img-fluid"
                                                                style="height: 100%; object-fit: cover;">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="course-content p-4">
                                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                                <div>
                                                                    <h3 class="mb-2">{{ $enrollment->course->title }}</h3>
                                                                    <div class="course-meta mb-2">
                                                                        <span class="badge bg-light text-dark border">{{ ucfirst($enrollment->course->difficulty) }}</span>
                                                                        <span class="text-muted ms-3"><i class="bi bi-calendar3 me-1"></i>Enrolled: {{ $enrollment->enrolled_at ? $enrollment->enrolled_at->format('M d, Y') : 'N/A' }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-info mt-3">
                                                                <div class="d-flex justify-content-between mb-2">
                                                                    <span class="progress-text"><strong>Progress:</strong> 0% Complete</span>
                                                                    <span class="progress-details">{{ $enrollment->course->modules->count() }} modules</span>
                                                                </div>
                                                                <div class="progress" style="height: 8px;">
                                                                    <div class="progress-fill" role="progressbar"
                                                                        style="width: 0%; background: linear-gradient(90deg, var(--accent-color) 0%, color-mix(in srgb, var(--accent-color), #fff 20%) 100%);"
                                                                        aria-valuenow="0" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 d-flex align-items-center justify-content-center p-3">
                                                        <a href="{{ route('student.enrolled-course-details', ['id' => $enrollment->course->id]) }}"
                                                            class="btn-course">Start</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                            <div class="text-center py-5">
                                                <p class="text-muted">No courses waiting to start.</p>
                                            </div>
                                            @endforelse
                                        </div>

                                        <div class="tab-pane fade" id="completed" role="tabpanel">
                                            @forelse($completedCourses as $enrollment)
                                            <div class="course-card mb-3">
                                                <div class="row g-0">
                                                    <div class="col-md-2">
                                                        <div class="course-image">
                                                             <img src="{{ $enrollment->course->thumbnail ? asset('general/img/education/'.$enrollment->course->thumbnail) : asset('assets/img/course-placeholder.jpg') }}"
                                                                alt="Course" class="img-fluid"
                                                                style="height: 100%; object-fit: cover;">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="course-content p-4">
                                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                                <div>
                                                                    <h3 class="mb-2">{{ $enrollment->course->title }}</h3>
                                                                    <div class="course-meta mb-2">
                                                                        <span class="badge bg-light text-dark border">{{ ucfirst($enrollment->course->difficulty) }}</span>
                                                                        <span class="text-muted ms-3"><i class="bi bi-calendar3 me-1"></i>Enrolled: {{ $enrollment->enrolled_at ? $enrollment->enrolled_at->format('M d, Y') : 'N/A' }}</span>
                                                                        <span class="text-muted ms-3"><i class="bi bi-check-circle-fill text-success me-1"></i>Completed: {{ $enrollment->completed_at ? $enrollment->completed_at->format('M d, Y') : 'Recently' }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-info mt-3">
                                                                <div class="d-flex justify-content-between mb-2">
                                                                    <span class="progress-text"><strong>Progress:</strong> 100% Complete</span>
                                                                    <span class="progress-details">{{ $enrollment->course->modules->count() }} modules</span>
                                                                </div>
                                                                <div class="progress" style="height: 8px;">
                                                                    <div class="progress-fill" role="progressbar"
                                                                        style="width: 100%; background: linear-gradient(90deg, #28a745 0%, #20c997 100%);"
                                                                        aria-valuenow="100" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 d-flex align-items-center justify-content-center p-3">
                                                        <a href="{{ route('student.enrolled-course-details', ['id' => $enrollment->course->id]) }}"
                                                            class="btn-course">Review</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                            <div class="text-center py-5">
                                                <p class="text-muted">No completed courses yet.</p>
                                            </div>
                                            @endforelse
                                        </div>

                                    </div>

                                </div>

                                <div class="tab-pane fade" id="student-profile-badges" role="tabpanel">
                                    <div class="about-content">
                                        <h4 class="mb-4">Badges Earned</h4>
                                        
                                        @if(isset($badges) && $badges->count() > 0)
                                            <div class="row g-4">
                                            </div>
                                        @else
                                             <div class="text-center py-5">
                                                <i class="bi bi-trophy display-1 text-muted opacity-25"></i>
                                                <p class="lead text-muted mt-3">Start learning to earn badges!</p>
                                            </div>
                                        @endif
                                        
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
