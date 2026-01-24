@extends('site.innerPages.layout.master')


@section('content')
    <div class="content-header">
        <h1>Company Profile</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Users & Roles</a></li>
                <li class="breadcrumb-item active">Access Requests</li>
            </ol>
        </nav>
    </div>

    <div class="content-body">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-md-8">
                <h4 class="mb-2">Access Requests</h4>
                <p class="text-muted">Review and manage pending access requests from users</p>
            </div>
            <div class="col-md-4 text-end">
                <button class="btn btn-outline-secondary">
                    <i class="fas fa-history me-2"></i> View History
                </button>
            </div>
        </div>

        <!-- Statistics -->
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="stats-mini-card">
                    <div class="stats-icon bg-warning bg-opacity-10 text-warning">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stats-info">
                        <h4>8</h4>
                        <p>Pending Requests</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-mini-card">
                    <div class="stats-icon bg-success bg-opacity-10 text-success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stats-info">
                        <h4>42</h4>
                        <p>Approved This Month</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-mini-card">
                    <div class="stats-icon bg-danger bg-opacity-10 text-danger">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="stats-info">
                        <h4>5</h4>
                        <p>Rejected This Month</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests -->
        <div class="content-card">
            <div class="card-header">
                <h4>Pending Access Requests</h4>
            </div>
            <div class="card-body">
                <!-- Request Item 1 -->
                <div class="access-request-item">
                    <div class="request-user">
                        <img src="https://ui-avatars.com/api/?name=Noor+Ibrahim" alt="User" class="request-avatar">
                        <div class="request-info">
                            <h6>Noor Ibrahim</h6>
                            <p class="text-muted mb-1">noor.ibrahim@gmail.com</p>
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i> Requested 2 hours ago
                            </small>
                        </div>
                    </div>
                    <div class="request-details">
                        <div class="detail-item">
                            <span class="detail-label">Company</span>
                            <span class="detail-value">Acme Corporation</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Requested Role</span>
                            <span class="detail-value">Employee</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Message</span>
                            <span class="detail-value">I would like to join the marketing team</span>
                        </div>
                    </div>
                    <div class="request-actions">
                        <button class="btn btn-success" onclick="approveRequest(1)">
                            <i class="fas fa-check me-1"></i> Approve
                        </button>
                        <button class="btn btn-danger" onclick="rejectRequest(1)">
                            <i class="fas fa-times me-1"></i> Reject
                        </button>
                    </div>
                </div>

                <!-- Request Item 2 -->
                <div class="access-request-item">
                    <div class="request-user">
                        <img src="https://ui-avatars.com/api/?name=Zaid+Mansour" alt="User" class="request-avatar">
                        <div class="request-info">
                            <h6>Zaid Mansour</h6>
                            <p class="text-muted mb-1">zaid.mansour@outlook.com</p>
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i> Requested 5 hours ago
                            </small>
                        </div>
                    </div>
                    <div class="request-details">
                        <div class="detail-item">
                            <span class="detail-label">Company</span>
                            <span class="detail-value">Acme Corporation</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Requested Role</span>
                            <span class="detail-value">Employee</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Message</span>
                            <span class="detail-value">Joining as software developer in IT dept</span>
                        </div>
                    </div>
                    <div class="request-actions">
                        <button class="btn btn-success" onclick="approveRequest(2)">
                            <i class="fas fa-check me-1"></i> Approve
                        </button>
                        <button class="btn btn-danger" onclick="rejectRequest(2)">
                            <i class="fas fa-times me-1"></i> Reject
                        </button>
                    </div>
                </div>

                <!-- Request Item 3 -->
                <div class="access-request-item">
                    <div class="request-user">
                        <img src="https://ui-avatars.com/api/?name=Rania+Saleh" alt="User" class="request-avatar">
                        <div class="request-info">
                            <h6>Rania Saleh</h6>
                            <p class="text-muted mb-1">rania.saleh@yahoo.com</p>
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i> Requested 1 day ago
                            </small>
                        </div>
                    </div>
                    <div class="request-details">
                        <div class="detail-item">
                            <span class="detail-label">Company</span>
                            <span class="detail-value">Acme Corporation</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Requested Role</span>
                            <span class="detail-value">Department Manager</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Message</span>
                            <span class="detail-value">HR Department Manager position</span>
                        </div>
                    </div>
                    <div class="request-actions">
                        <button class="btn btn-success" onclick="approveRequest(3)">
                            <i class="fas fa-check me-1"></i> Approve
                        </button>
                        <button class="btn btn-danger" onclick="rejectRequest(3)">
                            <i class="fas fa-times me-1"></i> Reject
                        </button>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <p class="text-muted">Showing 3 of 8 pending requests</p>
                    <button class="btn btn-outline-primary">Load More</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Approve Request Modal -->
    <div class="modal fade" id="approveRequestModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success bg-opacity-10">
                    <h5 class="modal-title text-success">
                        <i class="fas fa-check-circle me-2"></i> Approve Access Request
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Assign Department</label>
                        <select class="form-select" id="assignDepartment" required>
                            <option value="">Select Department</option>
                            <option value="it">IT Department</option>
                            <option value="hr">HR Department</option>
                            <option value="sales">Sales Department</option>
                            <option value="marketing">Marketing Department</option>
                            <option value="finance">Finance Department</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Assign Role</label>
                        <select class="form-select" id="assignRole" required>
                            <option value="">Select Role</option>
                            <option value="admin">Company Admin</option>
                            <option value="manager">Department Manager</option>
                            <option value="employee" selected>Employee</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Welcome Message (Optional)</label>
                        <textarea class="form-control" rows="3" placeholder="Welcome to the team!"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" onclick="confirmApproval()">
                        <i class="fas fa-check me-1"></i> Approve & Send Invite
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Reject Request Modal -->
    <div class="modal fade" id="rejectRequestModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger bg-opacity-10">
                    <h5 class="modal-title text-danger">
                        <i class="fas fa-times-circle me-2"></i> Reject Access Request
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Reason for Rejection</label>
                        <select class="form-select mb-3">
                            <option value="">Select reason</option>
                            <option value="not_hiring">Not currently hiring</option>
                            <option value="no_position">No available positions</option>
                            <option value="qualifications">Doesn't meet qualifications</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Additional Message (Optional)</label>
                        <textarea class="form-control" rows="3" placeholder="Thank you for your interest..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="confirmRejection()">
                        <i class="fas fa-times me-1"></i> Reject Request
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
