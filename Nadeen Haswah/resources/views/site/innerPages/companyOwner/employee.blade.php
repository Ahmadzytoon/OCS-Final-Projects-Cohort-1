@extends('site.innerPages.layout.master')


@section('content')
    <div class="content-header">
        <h1>Company Profile</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Users & Roles</a></li>
                <li class="breadcrumb-item active">Employees</li>
            </ol>
        </nav>
    </div>

    <div class="content-body">
        <!-- Page Header with Actions -->
        <div class="row mb-4">
            <div class="col-md-8">
                <div class="d-flex align-items-center gap-3">
                    <div class="search-box flex-grow-1">
                        <i class="fas fa-search"></i>
                        <input type="text" class="form-control"
                            placeholder="Search employees by name, email, or department...">
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-end">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inviteEmployeeModal">
                    <i class="fas fa-user-plus me-2"></i> Invite Employee
                </button>
            </div>
        </div>

        <!-- Filters -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <select class="form-select">
                    <option value="">All Departments</option>
                    <option value="it">IT Department</option>
                    <option value="hr">HR Department</option>
                    <option value="sales">Sales Department</option>
                    <option value="marketing">Marketing Department</option>
                    <option value="finance">Finance Department</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select">
                    <option value="">All Roles</option>
                    <option value="admin">Company Admin</option>
                    <option value="manager">Department Manager</option>
                    <option value="employee">Employee</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="suspended">Suspended</option>
                    <option value="pending">Pending</option>
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-outline-secondary w-100">
                    <i class="fas fa-redo me-2"></i> Reset Filters
                </button>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="stats-mini-card">
                    <div class="stats-icon bg-primary bg-opacity-10 text-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stats-info">
                        <h4>127</h4>
                        <p>Total Employees</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-mini-card">
                    <div class="stats-icon bg-success bg-opacity-10 text-success">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="stats-info">
                        <h4>119</h4>
                        <p>Active</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-mini-card">
                    <div class="stats-icon bg-warning bg-opacity-10 text-warning">
                        <i class="fas fa-user-clock"></i>
                    </div>
                    <div class="stats-info">
                        <h4>5</h4>
                        <p>Pending</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-mini-card">
                    <div class="stats-icon bg-danger bg-opacity-10 text-danger">
                        <i class="fas fa-user-slash"></i>
                    </div>
                    <div class="stats-info">
                        <h4>3</h4>
                        <p>Suspended</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Employees Table -->
        <div class="content-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Employees List</h4>
                <div class="d-flex gap-2">
                    <button class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-download me-1"></i> Export
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover employees-table">
                        <thead>
                            <tr>
                                <th width="50">
                                    <input type="checkbox" class="form-check-input">
                                </th>
                                <th>Employee</th>
                                <th>Role</th>
                                <th>Department</th>
                                <th>Join Date</th>
                                <th>Status</th>
                                <th width="150">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input">
                                </td>
                                <td>
                                    <div class="employee-info">
                                        <img src="https://ui-avatars.com/api/?name=Ahmad+Khaled" alt="Employee"
                                            class="employee-avatar">
                                        <div>
                                            <div class="employee-name">Ahmad Khaled</div>
                                            <div class="employee-email">ahmad.khaled@acme.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="role-badge role-admin">Company Admin</span></td>
                                <td>IT Department</td>
                                <td>Jan 15, 2025</td>
                                <td><span class="status-badge status-active">Active</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" title="Suspend">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input">
                                </td>
                                <td>
                                    <div class="employee-info">
                                        <img src="https://ui-avatars.com/api/?name=Sarah+Ahmed" alt="Employee"
                                            class="employee-avatar">
                                        <div>
                                            <div class="employee-name">Sarah Ahmed</div>
                                            <div class="employee-email">sarah.ahmed@acme.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="role-badge role-manager">Department Manager</span></td>
                                <td>HR Department</td>
                                <td>Dec 10, 2024</td>
                                <td><span class="status-badge status-active">Active</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" title="Suspend">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input">
                                </td>
                                <td>
                                    <div class="employee-info">
                                        <img src="https://ui-avatars.com/api/?name=Mohammed+Ali" alt="Employee"
                                            class="employee-avatar">
                                        <div>
                                            <div class="employee-name">Mohammed Ali</div>
                                            <div class="employee-email">mohammed.ali@acme.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="role-badge role-employee">Employee</span></td>
                                <td>Sales Department</td>
                                <td>Nov 20, 2024</td>
                                <td><span class="status-badge status-active">Active</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" title="Suspend">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input">
                                </td>
                                <td>
                                    <div class="employee-info">
                                        <img src="https://ui-avatars.com/api/?name=Layla+Hassan" alt="Employee"
                                            class="employee-avatar">
                                        <div>
                                            <div class="employee-name">Layla Hassan</div>
                                            <div class="employee-email">layla.hassan@acme.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="role-badge role-employee">Employee</span></td>
                                <td>Marketing Department</td>
                                <td>Oct 05, 2024</td>
                                <td><span class="status-badge status-pending">Pending</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" title="Suspend">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input">
                                </td>
                                <td>
                                    <div class="employee-info">
                                        <img src="https://ui-avatars.com/api/?name=Omar+Yousef" alt="Employee"
                                            class="employee-avatar">
                                        <div>
                                            <div class="employee-name">Omar Yousef</div>
                                            <div class="employee-email">omar.yousef@acme.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="role-badge role-employee">Employee</span></td>
                                <td>Finance Department</td>
                                <td>Sep 15, 2024</td>
                                <td><span class="status-badge status-suspended">Suspended</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-success" title="Activate">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="table-footer">
                    <div class="showing-info">Showing 1-5 of 127 employees</div>
                    <nav>
                        <ul class="pagination mb-0">
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
        </div>
    </div>

    <!-- Invite Employee Modal -->
    <div class="modal fade" id="inviteEmployeeModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-user-plus me-2"></i> Invite New Employee
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="inviteEmployeeForm">
                        <div class="mb-3">
                            <label class="form-label">Employee Email</label>
                            <input type="email" class="form-control" placeholder="employee@company.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" placeholder="John Doe" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Department</label>
                            <select class="form-select" required>
                                <option value="">Select Department</option>
                                <option value="it">IT Department</option>
                                <option value="hr">HR Department</option>
                                <option value="sales">Sales Department</option>
                                <option value="marketing">Marketing Department</option>
                                <option value="finance">Finance Department</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select class="form-select" required>
                                <option value="">Select Role</option>
                                <option value="admin">Company Admin</option>
                                <option value="manager">Department Manager</option>
                                <option value="employee">Employee</option>
                            </select>
                        </div>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            An invitation email will be sent to the employee's email address.
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-paper-plane me-1"></i> Send Invitation
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
