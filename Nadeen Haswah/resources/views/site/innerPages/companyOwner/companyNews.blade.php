@extends('site.innerPages.layout.master')


@section('content')
    <div class="content-header">
        <h1>Company Profile</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Company News</a></li>
                <li class="breadcrumb-item active">Company News</li>
            </ol>
        </nav>
    </div>
    <div class="content-body">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-md-8">
                <h4 class="mb-2">
                    <i class="fas fa-newspaper text-primary me-2"></i> Company News
                </h4>
                <p class="text-muted">Manage company announcements and news articles</p>
            </div>
            <div class="col-md-4 text-end">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createNewsModal">
                    <i class="fas fa-plus me-2"></i> Create News
                </button>
            </div>
        </div>

        <!-- Statistics -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="news-stat-card">
                    <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="stat-details">
                        <h3>24</h3>
                        <p>Total News</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="news-stat-card">
                    <div class="stat-icon bg-success bg-opacity-10 text-success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-details">
                        <h3>18</h3>
                        <p>Published</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="news-stat-card">
                    <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-details">
                        <h3>4</h3>
                        <p>Scheduled</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="news-stat-card">
                    <div class="stat-icon bg-secondary bg-opacity-10 text-secondary">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="stat-details">
                        <h3>2</h3>
                        <p>Drafts</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters & Search -->
        <div class="row g-3 mb-4">
            <div class="col-md-5">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control" placeholder="Search news articles...">
                </div>
            </div>
            <div class="col-md-3">
                <select class="form-select">
                    <option value="">All Status</option>
                    <option value="published">Published</option>
                    <option value="scheduled">Scheduled</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select">
                    <option value="">Sort By</option>
                    <option value="newest">Newest First</option>
                    <option value="oldest">Oldest First</option>
                    <option value="popular">Most Viewed</option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-outline-secondary w-100">
                    <i class="fas fa-filter me-2"></i> Filter
                </button>
            </div>
        </div>

        <!-- News List -->
        <div class="row g-4">
            <!-- Published News Article -->
            <div class="col-lg-6">
                <div class="news-card">
                    <div class="news-card-header">
                        <div class="news-status-badge published">
                            <i class="fas fa-check-circle"></i> Published
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#" onclick="viewNews(1)">
                                        <i class="fas fa-eye me-2"></i> View
                                    </a></li>
                                <li><a class="dropdown-item" href="#" onclick="editNews(1)">
                                        <i class="fas fa-edit me-2"></i> Edit
                                    </a></li>
                                <li><a class="dropdown-item" href="#" onclick="unpublishNews(1)">
                                        <i class="fas fa-pause me-2"></i> Unpublish
                                    </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="#" onclick="deleteNews(1)">
                                        <i class="fas fa-trash me-2"></i> Delete
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="news-card-body">
                        <div class="news-image">
                            <img src="https://via.placeholder.com/400x200/667eea/ffffff?text=Q4+Results" alt="News">
                            <div class="news-category">Company Update</div>
                        </div>
                        <h5 class="news-title">Q4 Results Exceeded Expectations</h5>
                        <p class="news-excerpt">We're proud to announce that our Q4 performance has surpassed all targets.
                            Revenue increased by 45% compared to last quarter...</p>
                        <div class="news-meta">
                            <div class="meta-item">
                                <img src="https://ui-avatars.com/api/?name=Ahmad+Khaled" alt="Author"
                                    class="author-avatar-small">
                                <span>Ahmad Khaled</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar text-primary"></i>
                                <span>Jan 15, 2025</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-eye text-success"></i>
                                <span>234 views</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scheduled News Article -->
            <div class="col-lg-6">
                <div class="news-card">
                    <div class="news-card-header">
                        <div class="news-status-badge scheduled">
                            <i class="fas fa-clock"></i> Scheduled
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#" onclick="viewNews(2)">
                                        <i class="fas fa-eye me-2"></i> View
                                    </a></li>
                                <li><a class="dropdown-item" href="#" onclick="editNews(2)">
                                        <i class="fas fa-edit me-2"></i> Edit
                                    </a></li>
                                <li><a class="dropdown-item" href="#" onclick="publishNow(2)">
                                        <i class="fas fa-paper-plane me-2"></i> Publish Now
                                    </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="#" onclick="deleteNews(2)">
                                        <i class="fas fa-trash me-2"></i> Delete
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="news-card-body">
                        <div class="news-image">
                            <img src="https://via.placeholder.com/400x200/4facfe/ffffff?text=Product+Launch"
                                alt="News">
                            <div class="news-category">Product News</div>
                        </div>
                        <h5 class="news-title">New Product Launch Next Month</h5>
                        <p class="news-excerpt">Get ready for our biggest product launch of the year coming in February.
                            This innovative solution will revolutionize how we serve our customers...</p>
                        <div class="news-meta">
                            <div class="meta-item">
                                <img src="https://ui-avatars.com/api/?name=Sarah+Ahmed" alt="Author"
                                    class="author-avatar-small">
                                <span>Sarah Ahmed</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar text-warning"></i>
                                <span>Scheduled: Jan 30, 2025</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Published News Article 2 -->
            <div class="col-lg-6">
                <div class="news-card">
                    <div class="news-card-header">
                        <div class="news-status-badge published">
                            <i class="fas fa-check-circle"></i> Published
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#" onclick="viewNews(3)">
                                        <i class="fas fa-eye me-2"></i> View
                                    </a></li>
                                <li><a class="dropdown-item" href="#" onclick="editNews(3)">
                                        <i class="fas fa-edit me-2"></i> Edit
                                    </a></li>
                                <li><a class="dropdown-item" href="#" onclick="unpublishNews(3)">
                                        <i class="fas fa-pause me-2"></i> Unpublish
                                    </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="#" onclick="deleteNews(3)">
                                        <i class="fas fa-trash me-2"></i> Delete
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="news-card-body">
                        <div class="news-image">
                            <img src="https://via.placeholder.com/400x200/f093fb/ffffff?text=New+Team" alt="News">
                            <div class="news-category">HR Update</div>
                        </div>
                        <h5 class="news-title">Welcome Our New Team Members</h5>
                        <p class="news-excerpt">Please join us in welcoming 5 new talented individuals to our growing team.
                            They bring diverse skills and experience...</p>
                        <div class="news-meta">
                            <div class="meta-item">
                                <img src="https://ui-avatars.com/api/?name=Layla+Hassan" alt="Author"
                                    class="author-avatar-small">
                                <span>Layla Hassan</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar text-primary"></i>
                                <span>Jan 10, 2025</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-eye text-success"></i>
                                <span>189 views</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Draft News Article -->
            <div class="col-lg-6">
                <div class="news-card">
                    <div class="news-card-header">
                        <div class="news-status-badge draft">
                            <i class="fas fa-file-alt"></i> Draft
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#" onclick="editNews(4)">
                                        <i class="fas fa-edit me-2"></i> Continue Editing
                                    </a></li>
                                <li><a class="dropdown-item" href="#" onclick="publishNews(4)">
                                        <i class="fas fa-paper-plane me-2"></i> Publish
                                    </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="#" onclick="deleteNews(4)">
                                        <i class="fas fa-trash me-2"></i> Delete
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="news-card-body">
                        <div class="news-image">
                            <img src="https://via.placeholder.com/400x200/30cfd0/ffffff?text=Draft" alt="News">
                            <div class="news-category">Announcement</div>
                        </div>
                        <h5 class="news-title">Company Anniversary Celebration</h5>
                        <p class="news-excerpt">Planning details for our 10th anniversary celebration event. More
                            information coming soon...</p>
                        <div class="news-meta">
                            <div class="meta-item">
                                <img src="https://ui-avatars.com/api/?name=Ahmad+Khaled" alt="Author"
                                    class="author-avatar-small">
                                <span>Ahmad Khaled</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar text-muted"></i>
                                <span>Saved: Jan 20, 2025</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            <nav>
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Create News Modal -->
    <div class="modal fade" id="createNewsModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-newspaper me-2"></i> Create Company News
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="createNewsForm">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label">News Title</label>
                                <input type="text" class="form-control" placeholder="Enter news title..." required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Category</label>
                                <select class="form-select">
                                    <option value="">Select Category</option>
                                    <option value="company">Company Update</option>
                                    <option value="product">Product News</option>
                                    <option value="hr">HR Update</option>
                                    <option value="achievement">Achievement</option>
                                    <option value="announcement">Announcement</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Featured Image</label>
                                <input type="file" class="form-control" accept="image/*">
                                <small class="text-muted">Recommended size: 800x400px</small>
                            </div>
                            <div class="col-12">
                                <label class="form-label">News Content</label>
                                <textarea class="form-control" rows="8" placeholder="Write your news content here..." required></textarea>
                                <small class="text-muted">You can use formatting for better readability</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Publisher (Optional)</label>
                                <select class="form-select">
                                    <option value="">Assign Publisher</option>
                                    <option value="ahmad">Ahmad Khaled</option>
                                    <option value="sarah">Sarah Ahmed</option>
                                    <option value="mohammed">Mohammed Ali</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Publication Type</label>
                                <select class="form-select" id="publicationType" onchange="toggleSchedule()">
                                    <option value="now">Publish Immediately</option>
                                    <option value="schedule">Schedule for Later</option>
                                    <option value="draft">Save as Draft</option>
                                </select>
                            </div>
                            <div class="col-md-6" id="scheduleDate" style="display: none;">
                                <label class="form-label">Schedule Date</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-6" id="scheduleTime" style="display: none;">
                                <label class="form-label">Schedule Time</label>
                                <input type="time" class="form-control">
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sendNotification" checked>
                                    <label class="form-check-label" for="sendNotification">
                                        Send notification to all employees when published
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="allowComments" checked>
                                    <label class="form-check-label" for="allowComments">
                                        Allow employee comments
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-outline-primary" onclick="saveDraft()">
                        <i class="fas fa-save me-1"></i> Save as Draft
                    </button>
                    <button type="button" class="btn btn-primary" onclick="createNews()">
                        <i class="fas fa-paper-plane me-1"></i> Publish News
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit News Modal -->
    <div class="modal fade" id="editNewsModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-edit me-2"></i> Edit News Article
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editNewsForm">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label">News Title</label>
                                <input type="text" class="form-control" value="Q4 Results Exceeded Expectations"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Category</label>
                                <select class="form-select">
                                    <option value="company" selected>Company Update</option>
                                    <option value="product">Product News</option>
                                    <option value="hr">HR Update</option>
                                    <option value="achievement">Achievement</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Featured Image</label>
                                <input type="file" class="form-control" accept="image/*">
                                <small class="text-muted">Current image will be replaced if you upload a new one</small>
                            </div>
                            <div class="col-12">
                                <label class="form-label">News Content</label>
                                <textarea class="form-control" rows="8" required>We're proud to announce that our Q4 performance has surpassed all targets...</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Publisher</label>
                                <select class="form-select">
                                    <option value="ahmad" selected>Ahmad Khaled</option>
                                    <option value="sarah">Sarah Ahmed</option>
                                    <option value="mohammed">Mohammed Ali</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select class="form-select">
                                    <option value="published" selected>Published</option>
                                    <option value="schedule">Scheduled</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="updateNews()">
                        <i class="fas fa-save me-1"></i> Update News
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- View News Modal -->
    <div class="modal fade" id="viewNewsModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title">Q4 Results Exceeded Expectations</h5>
                        <small class="text-muted">Published on Jan 15, 2025 by Ahmad Khaled</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <img src="https://via.placeholder.com/800x400/667eea/ffffff?text=Q4+Results" alt="News"
                        class="img-fluid rounded mb-3">
                    <div class="news-content-view">
                        <p>We're proud to announce that our Q4 performance has surpassed all targets. Revenue increased by
                            45% compared to last quarter, driven by strong customer demand and successful product launches.
                        </p>
                        <p>Key highlights include:</p>
                        <ul>
                            <li>Revenue growth of 45% quarter-over-quarter</li>
                            <li>Customer base expanded by 30%</li>
                            <li>Successfully launched 3 new products</li>
                            <li>Employee satisfaction scores reached all-time high</li>
                        </ul>
                        <p>This achievement is a testament to the hard work and dedication of our entire team. Thank you all
                            for your continued commitment to excellence.</p>
                    </div>
                    <hr>
                    <div class="news-stats-view">
                        <div class="stat-view-item">
                            <i class="fas fa-eye text-primary"></i>
                            <span>234 views</span>
                        </div>
                        <div class="stat-view-item">
                            <i class="fas fa-heart text-danger"></i>
                            <span>45 likes</span>
                        </div>
                        <div class="stat-view-item">
                            <i class="fas fa-comment text-success"></i>
                            <span>12 comments</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="editNewsFromView()">
                        <i class="fas fa-edit me-1"></i> Edit
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
