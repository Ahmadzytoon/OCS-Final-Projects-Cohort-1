<div>
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Explore Courses</h1>
            <div class="search-box">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Search courses..." wire:model.live.debounce.300ms="search">
            </div>
            <nav class="breadcrumbs">
                <ol>
                    <li>
                        @auth
                            <a href="{{ route('student.home') }}">Home</a>
                        @else
                            <a href="{{ route('visitor.home') }}">Home</a>
                        @endauth
                    </li>
                    <li class="current">Courses</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Courses Section -->
    <section id="courses-2" class="courses-2 section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="course-filters">
                        <h4 class="filter-title">Filter Courses</h4>
                        
                        <div class="filter-group">
                            <h5>Category</h5>
                            <div class="filter-options">
                                @foreach($categories as $category)
                                    <label class="filter-checkbox">
                                        <input type="checkbox" wire:model.live="selectedCategories" value="{{ $category->id }}">
                                        <span class="checkmark"></span>
                                        {{ $category->name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="filter-group">
                            <h5>Level</h5>
                            <div class="filter-options">
                                <label class="filter-checkbox">
                                    <input type="checkbox" wire:model.live="selectedLevels" value="beginner">
                                    <span class="checkmark"></span>
                                    Beginner
                                </label>
                                <label class="filter-checkbox">
                                    <input type="checkbox" wire:model.live="selectedLevels" value="intermediate">
                                    <span class="checkmark"></span>
                                    Intermediate
                                </label>
                                <label class="filter-checkbox">
                                    <input type="checkbox" wire:model.live="selectedLevels" value="advanced">
                                    <span class="checkmark"></span>
                                    Advanced
                                </label>
                            </div>
                        </div>

                        <div class="filter-group">
                            <h5>Price</h5>
                            <div class="filter-options">
                                <label class="filter-checkbox">
                                    <input type="checkbox" wire:model.live="selectedPricing" value="free">
                                    <span class="checkmark"></span>
                                    Free
                                </label>
                                <label class="filter-checkbox">
                                    <input type="checkbox" wire:model.live="selectedPricing" value="paid">
                                    <span class="checkmark"></span>
                                    Paid
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="courses-header">
                        <div class="sort-dropdown">
                            <select class="form-select" wire:model.live="sortBy">
                                <option value="popular">Sort by: Most Popular</option>
                                <option value="newest">Newest First</option>
                                <option value="price_low">Price: Low to High</option>
                                <option value="price_high">Price: High to Low</option>
                            </select>
                        </div>
                        <button class="btn-outline btn muted" wire:click="clearFilters">Clear Filters</button>
                    </div>

                    @if($courses->count() > 0)
                        <div class="courses-grid">
                            <div class="row">
                                @foreach($courses as $course)
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="course-card">
                                            <div class="course-image">
                                                <img src="{{ asset('general/img/education/' . ($course->thumbnail ?? 'courses-12.webp')) }}" 
                                                     alt="{{ $course->title }}" 
                                                     class="img-fluid">
                                                <div class="course-price">
                                                    {{ $course->pricing === 'paid' ? '$' . number_format($course->price, 0) : 'FREE' }}
                                                </div>
                                            </div>
                                            <div class="course-content">
                                                <div class="course-meta">
                                                    <span class="{{ $course->difficulty }}">{{ ucfirst($course->difficulty) }}</span>
                                                    <span class="duration">{{ $course->modules->count() }} Modules • {{ $course->projects->count() }} projects</span>
                                                </div>
                                                <h3>{{ $course->title }}</h3>
                                                <p>{{ Str::limit($course->short_description, 100) }}</p>
                                                <div class="instructor-info">
                                                    <img src="{{ asset('general/img/person/' . ($course->instructor->profile_picture ?? 'person-m-1.webp')) }}" 
                                                         alt="{{ $course->instructor->name }}" 
                                                         class="instructor-avatar">
                                                    <span class="instructor-name">{{ $course->instructor->name }}</span>
                                                </div>
                                                <div class="course-stats">
                                                    @php
                                                        $avgRating = $course->reviews->count() > 0 ? round($course->reviews->avg('rating'), 1) : 0;
                                                        $reviewCount = $course->reviews->count();
                                                    @endphp
                                                    <div class="rating">
                                                        @if($avgRating > 0)
                                                            @for($i = 1; $i <= 5; $i++)
                                                                @if($i <= floor($avgRating))
                                                                    <i class="bi bi-star-fill"></i>
                                                                @elseif($i - 0.5 <= $avgRating)
                                                                    <i class="bi bi-star-half"></i>
                                                                @else
                                                                    <i class="bi bi-star"></i>
                                                                @endif
                                                            @endfor
                                                            <span>{{ $avgRating }} ({{ $reviewCount }} reviews)</span>
                                                        @else
                                                            <span class="text-muted">No reviews yet</span>
                                                        @endif
                                                    </div>
                                                    <div class="stat">
                                                        <i class="bi bi-people"></i>
                                                        <span>{{ $course->enrollments->count() }} students</span>
                                                    </div>
                                                </div>
                                                @auth
                                                    <a href="{{ route('student.course-details', ['id' => $course->id]) }}" class="btn-course">View Details</a>
                                                @else
                                                    <a href="{{ route('visitor.course-details', $course) }}" class="btn-course">View Details</a>
                                                @endauth
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{ $courses->links('livewire.custom-pagination') }}
                    @else
                        <div class="d-flex align-items-center justify-content-center text-center py-5">
                            <div class="p-5 rounded w-100">
                                <h4 class="mb-2">No Courses Found</h4>
                                <p class="text-muted mb-0">
                                    Try adjusting your filters or clearing them to see more courses.
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section><!-- /Courses Section -->
</div>