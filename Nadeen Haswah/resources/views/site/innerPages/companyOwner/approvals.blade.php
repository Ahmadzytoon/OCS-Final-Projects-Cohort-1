@extends('site.innerPages.layout.master')


@section('content')
    <div class="content-header">
        <h1>Company Profile</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Approvals</a></li>
                <li class="breadcrumb-item active">Approvals</li>
            </ol>
        </nav>
    </div>

    <div class="content-body">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-md-8">
                <h4 class="mb-2">
                    <i class="fas fa-check-circle text-success me-2"></i> Approvals
                </h4>
                <p class="text-muted">Review and approve pending knowledge cards</p>
            </div>
            <div class="col-md-4 text-end">
                <button class="btn btn-outline-secondary" onclick="bulkApprove()">
                    <i class="fas fa-check-double me-2"></i> Bulk Approve
                </button>
            </div>
        </div>

        <!-- Statistics -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="approval-stat-card pending">
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-details">
                        <h3>15</h3>
                        <p>Pending Approval</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="approval-stat-card approved">
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-details">
                        <h3>42</h3>
                        <p>Approved This Month</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="approval-stat-card rejected">
                    <div class="stat-icon">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="stat-details">
                        <h3>3</h3>
                        <p>Rejected This Month</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="approval-stat-card avg-time">
                    <div class="stat-icon">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                    <div class="stat-details">
                        <h3>2.5h</h3>
                        <p>Avg. Approval Time</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <select class="form-select" id="filterKnowledgeType">
                    <option value="">All Knowledge Types</option>
                    <option value="onboarding">Onboarding Knowledge</option>
                    <option value="mistakes">Mistakes & Lessons</option>
                    <option value="operational">Operational Knowledge</option>
                    <option value="critical">Critical & Strategic</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select" id="filterDepartment">
                    <option value="">All Departments</option>
                    <option value="it">IT Department</option>
                    <option value="hr">HR Department</option>
                    <option value="sales">Sales Department</option>
                    <option value="marketing">Marketing Department</option>
                    <option value="finance">Finance Department</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select" id="filterAuthor">
                    <option value="">All Authors</option>
                    <option value="ahmad">Ahmad Khaled</option>
                    <option value="sarah">Sarah Ahmed</option>
                    <option value="mohammed">Mohammed Ali</option>
                    <option value="layla">Layla Hassan</option>
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-outline-secondary w-100" onclick="resetFilters()">
                    <i class="fas fa-redo me-2"></i> Reset Filters
                </button>
            </div>
        </div>

        <!-- Pending Approvals List -->
        <div class="content-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Pending Knowledge Cards (15)</h4>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="selectAll" onclick="toggleSelectAll()">
                    <label class="form-check-label" for="selectAll">
                        Select All
                    </label>
                </div>
            </div>
            <div class="card-body p-0">
                <!-- Approval Item 1 -->
                <div class="approval-item">
                    <div class="approval-select">
                        <input type="checkbox" class="form-check-input approval-checkbox" value="1">
                    </div>
                    <div class="approval-content">
                        <div class="approval-header-row">
                            <div class="approval-title-section">
                                <h5 class="approval-title">New Employee Onboarding Process</h5>
                                <div class="approval-badges">
                                    <span class="type-badge type-onboarding">
                                        <i class="fas fa-graduation-cap"></i> Onboarding
                                    </span>
                                    <span class="dept-badge">
                                        <i class="fas fa-building"></i> HR Department
                                    </span>
                                </div>
                            </div>
                            <div class="approval-meta">
                                <div class="meta-info">
                                    <img src="https://ui-avatars.com/api/?name=Sarah+Ahmed" alt="Author"
                                        class="author-avatar">
                                    <div>
                                        <div class="author-name">Sarah Ahmed</div>
                                        <div class="submitted-time">
                                            <i class="fas fa-clock"></i> 2 hours ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="approval-description">
                            <p>Complete step-by-step guide for onboarding new employees including documentation, system
                                access, training schedule, and first-week checklist. This process ensures all new hires have
                                a smooth transition into the company.</p>
                        </div>
                        <div class="approval-actions-row">
                            <button class="btn btn-sm btn-outline-primary" onclick="viewCardDetails(1)">
                                <i class="fas fa-eye me-1"></i> View Full Details
                            </button>
                            <div class="action-buttons-group">
                                <button class="btn btn-success" onclick="approveWithComment(1)">
                                    <i class="fas fa-check me-1"></i> Approve
                                </button>
                                <button class="btn btn-danger" onclick="rejectWithComment(1)">
                                    <i class="fas fa-times me-1"></i> Reject
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Approval Item 2 -->
                <div class="approval-item">
                    <div class="approval-select">
                        <input type="checkbox" class="form-check-input approval-checkbox" value="2">
                    </div>
                    <div class="approval-content">
                        <div class="approval-header-row">
                            <div class="approval-title-section">
                                <h5 class="approval-title">Customer Data Migration Error</h5>
                                <div class="approval-badges">
                                    <span class="type-badge type-mistakes">
                                        <i class="fas fa-exclamation-triangle"></i> Mistake
                                    </span>
                                    <span class="dept-badge">
                                        <i class="fas fa-building"></i> IT Department
                                    </span>
                                    <span class="impact-badge high">
                                        <i class="fas fa-fire"></i> High Impact
                                    </span>
                                </div>
                            </div>
                            <div class="approval-meta">
                                <div class="meta-info">
                                    <img src="https://ui-avatars.com/api/?name=Ahmad+Khaled" alt="Author"
                                        class="author-avatar">
                                    <div>
                                        <div class="author-name">Ahmad Khaled</div>
                                        <div class="submitted-time">
                                            <i class="fas fa-clock"></i> 5 hours ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="approval-description">
                            <p><strong>What Happened:</strong> During database migration, customer contact information was
                                not properly validated, resulting in 500+ customers receiving incorrect emails.</p>
                            <p><strong>Lesson Learned:</strong> Always implement dry-run testing with validation checks
                                before production migrations.</p>
                        </div>
                        <div class="approval-actions-row">
                            <button class="btn btn-sm btn-outline-primary" onclick="viewCardDetails(2)">
                                <i class="fas fa-eye me-1"></i> View Full Details
                            </button>
                            <div class="action-buttons-group">
                                <button class="btn btn-success" onclick="approveWithComment(2)">
                                    <i class="fas fa-check me-1"></i> Approve
                                </button>
                                <button class="btn btn-danger" onclick="rejectWithComment(2)">
                                    <i class="fas fa-times me-1"></i> Reject
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Approval Item 3 -->
                <div class="approval-item">
                    <div class="approval-select">
                        <input type="checkbox" class="form-check-input approval-checkbox" value="3">
                    </div>
                    <div class="approval-content">
                        <div class="approval-header-row">
                            <div class="approval-title-section">
                                <h5 class="approval-title">Weekly Sales Report Template</h5>
                                <div class="approval-badges">
                                    <span class="type-badge type-operational">
                                        <i class="fas fa-tasks"></i> Operational
                                    </span>
                                    <span class="dept-badge">
                                        <i class="fas fa-building"></i> Sales Department
                                    </span>
                                </div>
                            </div>
                            <div class="approval-meta">
                                <div class="meta-info">
                                    <img src="https://ui-avatars.com/api/?name=Mohammed+Ali" alt="Author"
                                        class="author-avatar">
                                    <div>
                                        <div class="author-name">Mohammed Ali</div>
                                        <div class="submitted-time">
                                            <i class="fas fa-clock"></i> 1 day ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="approval-description">
                            <p>Standardized template for weekly sales reports including KPIs, pipeline updates, and team
                                performance metrics. Includes automated data pulling from Salesforce.</p>
                        </div>
                        <div class="approval-actions-row">
                            <button class="btn btn-sm btn-outline-primary" onclick="viewCardDetails(3)">
                                <i class="fas fa-eye me-1"></i> View Full Details
                            </button>
                            <div class="action-buttons-group">
                                <button class="btn btn-success" onclick="approveWithComment(3)">
                                    <i class="fas fa-check me-1"></i> Approve
                                </button>
                                <button class="btn btn-danger" onclick="rejectWithComment(3)">
                                    <i class="fas fa-times me-1"></i> Reject
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Approval Item 4 -->
                <div class="approval-item">
                    <div class="approval-select">
                        <input type="checkbox" class="form-check-input approval-checkbox" value="4">
                    </div>
                    <div class="approval-content">
                        <div class="approval-header-row">
                            <div class="approval-title-section">
                                <h5 class="approval-title">Social Media Content Strategy</h5>
                                <div class="approval-badges">
                                    <span class="type-badge type-critical">
                                        <i class="fas fa-star"></i> Strategic
                                    </span>
                                    <span class="dept-badge">
                                        <i class="fas fa-building"></i> Marketing Department
                                    </span>
                                </div>
                            </div>
                            <div class="approval-meta">
                                <div class="meta-info">
                                    <img src="https://ui-avatars.com/api/?name=Layla+Hassan" alt="Author"
                                        class="author-avatar">
                                    <div>
                                        <div class="author-name">Layla Hassan</div>
                                        <div class="submitted-time">
                                            <i class="fas fa-clock"></i> 2 days ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="approval-description">
                            <p>Comprehensive social media strategy for 2025 including content pillars, posting schedule,
                                engagement tactics, and performance metrics across all platforms.</p>
                        </div>
                        <div class="approval-actions-row">
                            <button class="btn btn-sm btn-outline-primary" onclick="viewCardDetails(4)">
                                <i class="fas fa-eye me-1"></i> View Full Details
                            </button>
                            <div class="action-buttons-group">
                                <button class="btn btn-success" onclick="approveWithComment(4)">
                                    <i class="fas fa-check me-1"></i> Approve
                                </button>
                                <button class="btn btn-danger" onclick="rejectWithComment(4)">
                                    <i class="fas fa-times me-1"></i> Reject
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Approval Item 5 -->
                <div class="approval-item">
                    <div class="approval-select">
                        <input type="checkbox" class="form-check-input approval-checkbox" value="5">
                    </div>
                    <div class="approval-content">
                        <div class="approval-header-row">
                            <div class="approval-title-section">
                                <h5 class="approval-title">IT Systems Access Guide</h5>
                                <div class="approval-badges">
                                    <span class="type-badge type-onboarding">
                                        <i class="fas fa-graduation-cap"></i> Onboarding
                                    </span>
                                    <span class="dept-badge">
                                        <i class="fas fa-building"></i> IT Department
                                    </span>
                                </div>
                            </div>
                            <div class="approval-meta">
                                <div class="meta-info">
                                    <img src="https://ui-avatars.com/api/?name=Ahmad+Khaled" alt="Author"
                                        class="author-avatar">
                                    <div>
                                        <div class="author-name">Ahmad Khaled</div>
                                        <div class="submitted-time">
                                            <i class="fas fa-clock"></i> 3 days ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="approval-description">
                            <p>Step-by-step instructions for setting up email, VPN, project management tools, and internal
                                systems for new IT team members.</p>
                        </div>
                        <div class="approval-actions-row">
                            <button class="btn btn-sm btn-outline-primary" onclick="viewCardDetails(5)">
                                <i class="fas fa-eye me-1"></i> View Full Details
                            </button>
                            <div class="action-buttons-group">
                                <button class="btn btn-success" onclick="approveWithComment(5)">
                                    <i class="fas fa-check me-1"></i> Approve
                                </button>
                                <button class="btn btn-danger" onclick="rejectWithComment(5)">
                                    <i class="fas fa-times me-1"></i> Reject
                                </button>
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

    <!-- Approve with Comment Modal -->
    <div class="modal fade" id="approveModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success bg-opacity-10">
                    <h5 class="modal-title text-success">
                        <i class="fas fa-check-circle me-2"></i> Approve Knowledge Card
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Approval Comment (Optional)</label>
                        <textarea class="form-control" id="approvalComment" rows="4" placeholder="Add any comments or suggestions..."></textarea>
                        <small class="text-muted">Your comment will be visible to the author</small>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="notifyAuthor" checked>
                        <label class="form-check-label" for="notifyAuthor">
                            Notify author via email
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" onclick="confirmApproval()">
                        <i class="fas fa-check me-1"></i> Approve Card
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Reject with Comment Modal -->
    <div class="modal fade" id="rejectModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger bg-opacity-10">
                    <h5 class="modal-title text-danger">
                        <i class="fas fa-times-circle me-2"></i> Reject Knowledge Card
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Reason for Rejection <span class="text-danger">*</span></label>
                        <select class="form-select mb-3" id="rejectionReason">
                            <option value="">Select reason</option>
                            <option value="incomplete">Incomplete information</option>
                            <option value="inaccurate">Inaccurate or outdated content</option>
                            <option value="duplicate">Duplicate content</option>
                            <option value="inappropriate">Inappropriate content</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Additional Comments <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="rejectionComment" rows="4"
                            placeholder="Explain why this card is being rejected..." required></textarea>
                        <small class="text-muted">Please provide clear feedback so the author can improve</small>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="notifyAuthorReject" checked>
                        <label class="form-check-label" for="notifyAuthorReject">
                            Notify author via email
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="confirmRejection()">
                        <i class="fas fa-times me-1"></i> Reject Card
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
