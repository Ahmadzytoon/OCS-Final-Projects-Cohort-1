@extends('site.innerPages.layout.master')


@section('content')
    <div class="content-header">
        <h1>Company Profile</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Departments</a></li>
                <li class="breadcrumb-item active">departments</li>
            </ol>
        </nav>
    </div>
    <div class="content-body">
        <!-- Page Header with Actions -->
        <div class="row mb-4">
            <div class="col-md-8">
                <h4 class="mb-2">Departments</h4>
                <p class="text-muted">Manage your company's organizational structure</p>
            </div>
            <div class="col-md-4 text-end">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createDepartmentModal">
                    <i class="fas fa-plus me-2"></i> Create Department
                </button>
            </div>
        </div>

        <!-- Department Statistics -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="stats-mini-card">
                    <div class="stats-icon bg-primary bg-opacity-10 text-primary">
                        <i class="fas fa-sitemap"></i>
                    </div>
                    <div class="stats-info">
                        <h4>8</h4>
                        <p>Total Departments</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-mini-card">
                    <div class="stats-icon bg-success bg-opacity-10 text-success">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stats-info">
                        <h4>127</h4>
                        <p>Total Members</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-mini-card">
                    <div class="stats-icon bg-warning bg-opacity-10 text-warning">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="stats-info">
                        <h4>342</h4>
                        <p>Knowledge Cards</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-mini-card">
                    <div class="stats-icon bg-info bg-opacity-10 text-info">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="stats-info">
                        <h4>8</h4>
                        <p>Department Managers</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Departments Grid -->
        <div class="row g-4 mb-4">
            <!-- IT Department -->
            <div class="col-lg-6 col-xl-4">
                <div class="department-card">
                    <div class="department-header">
                        <div class="department-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <div class="department-actions dropdown">
                            <button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#" onclick="editDepartment('it')">
                                        <i class="fas fa-edit me-2"></i> Edit
                                    </a></li>
                                <li><a class="dropdown-item" href="#" onclick="viewDepartmentDetails('it')">
                                        <i class="fas fa-eye me-2"></i> View Details
                                    </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="#" onclick="deleteDepartment('it')">
                                        <i class="fas fa-trash me-2"></i> Delete
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="department-body">
                        <h5 class="department-name">IT Department</h5>
                        <div class="department-manager">
                            <img src="https://ui-avatars.com/api/?name=Ahmad+Khaled" alt="Manager" class="manager-avatar">
                            <div>
                                <div class="manager-label">Manager</div>
                                <div class="manager-name">Ahmad Khaled</div>
                            </div>
                        </div>
                        <div class="department-stats">
                            <div class="stat-item">
                                <i class="fas fa-users text-primary"></i>
                                <span>23 Members</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-book text-warning"></i>
                                <span>87 Cards</span>
                            </div>
                        </div>
                        <div class="department-progress">
                            <div class="progress-label">
                                <span>Knowledge Completion</span>
                                <span class="fw-bold">78%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 78%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="department-footer">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewDepartmentMembers('it')">
                            <i class="fas fa-users me-1"></i> View Members
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" onclick="viewDepartmentCards('it')">
                            <i class="fas fa-book me-1"></i> View Cards
                        </button>
                    </div>
                </div>
            </div>

            <!-- HR Department -->
            <div class="col-lg-6 col-xl-4">
                <div class="department-card">
                    <div class="department-header">
                        <div class="department-icon" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <div class="department-actions dropdown">
                            <button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#" onclick="editDepartment('hr')">
                                        <i class="fas fa-edit me-2"></i> Edit
                                    </a></li>
                                <li><a class="dropdown-item" href="#" onclick="viewDepartmentDetails('hr')">
                                        <i class="fas fa-eye me-2"></i> View Details
                                    </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="#" onclick="deleteDepartment('hr')">
                                        <i class="fas fa-trash me-2"></i> Delete
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="department-body">
                        <h5 class="department-name">HR Department</h5>
                        <div class="department-manager">
                            <img src="https://ui-avatars.com/api/?name=Sarah+Ahmed" alt="Manager"
                                class="manager-avatar">
                            <div>
                                <div class="manager-label">Manager</div>
                                <div class="manager-name">Sarah Ahmed</div>
                            </div>
                        </div>
                        <div class="department-stats">
                            <div class="stat-item">
                                <i class="fas fa-users text-primary"></i>
                                <span>12 Members</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-book text-warning"></i>
                                <span>45 Cards</span>
                            </div>
                        </div>
                        <div class="department-progress">
                            <div class="progress-label">
                                <span>Knowledge Completion</span>
                                <span class="fw-bold">92%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 92%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="department-footer">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewDepartmentMembers('hr')">
                            <i class="fas fa-users me-1"></i> View Members
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" onclick="viewDepartmentCards('hr')">
                            <i class="fas fa-book me-1"></i> View Cards
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sales Department -->
            <div class="col-lg-6 col-xl-4">
                <div class="department-card">
                    <div class="department-header">
                        <div class="department-icon"
                            style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="department-actions dropdown">
                            <button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#" onclick="editDepartment('sales')">
                                        <i class="fas fa-edit me-2"></i> Edit
                                    </a></li>
                                <li><a class="dropdown-item" href="#" onclick="viewDepartmentDetails('sales')">
                                        <i class="fas fa-eye me-2"></i> View Details
                                    </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="#"
                                        onclick="deleteDepartment('sales')">
                                        <i class="fas fa-trash me-2"></i> Delete
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="department-body">
                        <h5 class="department-name">Sales Department</h5>
                        <div class="department-manager">
                            <img src="https://ui-avatars.com/api/?name=Mohammed+Ali" alt="Manager"
                                class="manager-avatar">
                            <div>
                                <div class="manager-label">Manager</div>
                                <div class="manager-name">Mohammed Ali</div>
                            </div>
                        </div>
                        <div class="department-stats">
                            <div class="stat-item">
                                <i class="fas fa-users text-primary"></i>
                                <span>18 Members</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-book text-warning"></i>
                                <span>63 Cards</span>
                            </div>
                        </div>
                        <div class="department-progress">
                            <div class="progress-label">
                                <span>Knowledge Completion</span>
                                <span class="fw-bold">85%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 85%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="department-footer">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewDepartmentMembers('sales')">
                            <i class="fas fa-users me-1"></i> View Members
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" onclick="viewDepartmentCards('sales')">
                            <i class="fas fa-book me-1"></i> View Cards
                        </button>
                    </div>
                </div>
            </div>

            <!-- Marketing Department -->
            <div class="col-lg-6 col-xl-4">
                <div class="department-card">
                    <div class="department-header">
                        <div class="department-icon"
                            style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div class="department-actions dropdown">
                            <button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#" onclick="editDepartment('marketing')">
                                        <i class="fas fa-edit me-2"></i> Edit
                                    </a></li>
                                <li><a class="dropdown-item" href="#" onclick="viewDepartmentDetails('marketing')">
                                        <i class="fas fa-eye me-2"></i> View Details
                                    </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="#"
                                        onclick="deleteDepartment('marketing')">
                                        <i class="fas fa-trash me-2"></i> Delete
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="department-body">
                        <h5 class="department-name">Marketing Department</h5>
                        <div class="department-manager">
                            <img src="https://ui-avatars.com/api/?name=Layla+Hassan" alt="Manager"
                                class="manager-avatar">
                            <div>
                                <div class="manager-label">Manager</div>
                                <div class="manager-name">Layla Hassan</div>
                            </div>
                        </div>
                        <div class="department-stats">
                            <div class="stat-item">
                                <i class="fas fa-users text-primary"></i>
                                <span>15 Members</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-book text-warning"></i>
                                <span>52 Cards</span>
                            </div>
                        </div>
                        <div class="department-progress">
                            <div class="progress-label">
                                <span>Knowledge Completion</span>
                                <span class="fw-bold">68%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 68%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="department-footer">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewDepartmentMembers('marketing')">
                            <i class="fas fa-users me-1"></i> View Members
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" onclick="viewDepartmentCards('marketing')">
                            <i class="fas fa-book me-1"></i> View Cards
                        </button>
                    </div>
                </div>
            </div>

            <!-- Finance Department -->
            <div class="col-lg-6 col-xl-4">
                <div class="department-card">
                    <div class="department-header">
                        <div class="department-icon"
                            style="background: linear-gradient(135deg, #30cfd0 0%, #330867 100%);">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="department-actions dropdown">
                            <button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#" onclick="editDepartment('finance')">
                                        <i class="fas fa-edit me-2"></i> Edit
                                    </a></li>
                                <li><a class="dropdown-item" href="#" onclick="viewDepartmentDetails('finance')">
                                        <i class="fas fa-eye me-2"></i> View Details
                                    </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="#"
                                        onclick="deleteDepartment('finance')">
                                        <i class="fas fa-trash me-2"></i> Delete
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="department-body">
                        <h5 class="department-name">Finance Department</h5>
                        <div class="department-manager">
                            <img src="https://ui-avatars.com/api/?name=Omar+Yousef" alt="Manager"
                                class="manager-avatar">
                            <div>
                                <div class="manager-label">Manager</div>
                                <div class="manager-name">Omar Yousef</div>
                            </div>
                        </div>
                        <div class="department-stats">
                            <div class="stat-item">
                                <i class="fas fa-users text-primary"></i>
                                <span>14 Members</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-book text-warning"></i>
                                <span>38 Cards</span>
                            </div>
                        </div>
                        <div class="department-progress">
                            <div class="progress-label">
                                <span>Knowledge Completion</span>
                                <span class="fw-bold">72%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 72%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="department-footer">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewDepartmentMembers('finance')">
                            <i class="fas fa-users me-1"></i> View Members
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" onclick="viewDepartmentCards('finance')">
                            <i class="fas fa-book me-1"></i> View Cards
                        </button>
                    </div>
                </div>
            </div>

            <!-- Operations Department -->
            <div class="col-lg-6 col-xl-4">
                <div class="department-card">
                    <div class="department-header">
                        <div class="department-icon"
                            style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <div class="department-actions dropdown">
                            <button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#" onclick="editDepartment('operations')">
                                        <i class="fas fa-edit me-2"></i> Edit
                                    </a></li>
                                <li><a class="dropdown-item" href="#"
                                        onclick="viewDepartmentDetails('operations')">
                                        <i class="fas fa-eye me-2"></i> View Details
                                    </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="#"
                                        onclick="deleteDepartment('operations')">
                                        <i class="fas fa-trash me-2"></i> Delete
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="department-body">
                        <h5 class="department-name">Operations Department</h5>
                        <div class="department-manager">
                            <div class="manager-avatar-placeholder">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <div class="manager-label">Manager</div>
                                <div class="manager-name text-muted">Not Assigned</div>
                            </div>
                        </div>
                        <div class="department-stats">
                            <div class="stat-item">
                                <i class="fas fa-users text-primary"></i>
                                <span>19 Members</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-book text-warning"></i>
                                <span>29 Cards</span>
                            </div>
                        </div>
                        <div class="department-progress">
                            <div class="progress-label">
                                <span>Knowledge Completion</span>
                                <span class="fw-bold">55%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 55%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="department-footer">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewDepartmentMembers('operations')">
                            <i class="fas fa-users me-1"></i> View Members
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" onclick="viewDepartmentCards('operations')">
                            <i class="fas fa-book me-1"></i> View Cards
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Department Comparison Table -->
        <div class="content-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Department Comparison</h4>
                <button class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-download me-1"></i> Export Report
                </button>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover comparison-table">
                        <thead>
                            <tr>
                                <th>Department</th>
                                <th>Manager</th>
                                <th>Members</th>
                                <th>Knowledge Cards</th>
                                <th>Completion Rate</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="table-icon"
                                            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                            <i class="fas fa-laptop-code"></i>
                                        </div>
                                        <strong>IT Department</strong>
                                    </div>
                                </td>
                                <td>Ahmad Khaled</td>
                                <td><span class="badge bg-primary">23</span></td>
                                <td><span class="badge bg-warning text-dark">87</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="progress flex-grow-1" style="height: 8px; width: 80px;">
                                            <div class="progress-bar bg-primary" style="width: 78%"></div>
                                        </div>
                                        <span class="small">78%</span>
                                    </div>
                                </td>
                                <td><span class="status-badge status-active">Active</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="table-icon"
                                            style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                                            <i class="fas fa-user-friends"></i>
                                        </div>
                                        <strong>HR Department</strong>
                                    </div>
                                </td>
                                <td>Sarah Ahmed</td>
                                <td><span class="badge bg-primary">12</span></td>
                                <td><span class="badge bg-warning text-dark">45</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="progress flex-grow-1" style="height: 8px; width: 80px;">
                                            <div class="progress-bar bg-success" style="width: 92%"></div>
                                        </div>
                                        <span class="small">92%</span>
                                    </div>
                                </td>
                                <td><span class="status-badge status-active">Active</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="table-icon"
                                            style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                                            <i class="fas fa-chart-line"></i>
                                        </div>
                                        <strong>Sales Department</strong>
                                    </div>
                                </td>
                                <td>Mohammed Ali</td>
                                <td><span class="badge bg-primary">18</span></td>
                                <td><span class="badge bg-warning text-dark">63</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="progress flex-grow-1" style="height: 8px; width: 80px;">
                                            <div class="progress-bar bg-info" style="width: 85%"></div>
                                        </div>
                                        <span class="small">85%</span>
                                    </div>
                                </td>
                                <td><span class="status-badge status-active">Active</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="table-icon"
                                            style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                                            <i class="fas fa-bullhorn"></i>
                                        </div>
                                        <strong>Marketing Department</strong>
                                    </div>
                                </td>
                                <td>Layla Hassan</td>
                                <td><span class="badge bg-primary">15</span></td>
                                <td><span class="badge bg-warning text-dark">52</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="progress flex-grow-1" style="height: 8px; width: 80px;">
                                            <div class="progress-bar bg-warning" style="width: 68%"></div>
                                        </div>
                                        <span class="small">68%</span>
                                    </div>
                                </td>
                                <td><span class="status-badge status-active">Active</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="table-icon"
                                            style="background: linear-gradient(135deg, #30cfd0 0%, #330867 100%);">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                        <strong>Finance Department</strong>
                                    </div>
                                </td>
                                <td>Omar Yousef</td>
                                <td><span class="badge bg-primary">14</span></td>
                                <td><span class="badge bg-warning text-dark">38</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="progress flex-grow-1" style="height: 8px; width: 80px;">
                                            <div class="progress-bar bg-primary" style="width: 72%"></div>
                                        </div>
                                        <span class="small">72%</span>
                                    </div>
                                </td>
                                <td><span class="status-badge status-active">Active</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="table-icon"
                                            style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                                            <i class="fas fa-cogs"></i>
                                        </div>
                                        <strong>Operations Department</strong>
                                    </div>
                                </td>
                                <td><span class="text-muted">Not Assigned</span></td>
                                <td><span class="badge bg-primary">19</span></td>
                                <td><span class="badge bg-warning text-dark">29</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="progress flex-grow-1" style="height: 8px; width: 80px;">
                                            <div class="progress-bar bg-warning" style="width: 55%"></div>
                                        </div>
                                        <span class="small">55%</span>
                                    </div>
                                </td>
                                <td><span class="status-badge status-pending">Needs Manager</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Department Modal -->
    <div class="modal fade" id="createDepartmentModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-plus me-2"></i> Create New Department
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="createDepartmentForm">
                        <div class="mb-3">
                            <label class="form-label">Department Name</label>
                            <input type="text" class="form-control" placeholder="e.g. Customer Support" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Department Icon</label>
                            <select class="form-select">
                                <option value="">Select Icon</option>
                                <option value="laptop-code">💻 IT / Technology</option>
                                <option value="user-friends">👥 Human Resources</option>
                                <option value="chart-line">📈 Sales</option>
                                <option value="bullhorn">📣 Marketing</option>
                                <option value="dollar-sign">💰 Finance</option>
                                <option value="cogs">⚙️ Operations</option>
                                <option value="headset">🎧 Customer Support</option>
                                <option value="flask">🔬 Research & Development</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Assign Manager (Optional)</label>
                            <select class="form-select">
                                <option value="">Select Manager</option>
                                <option value="1">Ahmad Khaled</option>
                                <option value="2">Sarah Ahmed</option>
                                <option value="3">Mohammed Ali</option>
                                <option value="4">Layla Hassan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description (Optional)</label>
                            <textarea class="form-control" rows="3" placeholder="Brief description of the department..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="createDepartment()">
                        <i class="fas fa-plus me-1"></i> Create Department
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Department Modal -->
    <div class="modal fade" id="editDepartmentModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-edit me-2"></i> Edit Department
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editDepartmentForm">
                        <div class="mb-3">
                            <label class="form-label">Department Name</label>
                            <input type="text" class="form-control" value="IT Department" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Department Icon</label>
                            <select class="form-select">
                                <option value="laptop-code" selected>💻 IT / Technology</option>
                                <option value="user-friends">👥 Human Resources</option>
                                <option value="chart-line">📈 Sales</option>
                                <option value="bullhorn">📣 Marketing</option>
                                <option value="dollar-sign">💰 Finance</option>
                                <option value="cogs">⚙️ Operations</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Assign Manager</label>
                            <select class="form-select">
                                <option value="">Select Manager</option>
                                <option value="1" selected>Ahmad Khaled</option>
                                <option value="2">Sarah Ahmed</option>
                                <option value="3">Mohammed Ali</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3">Handles all technology and IT infrastructure</textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="saveDepartment()">
                        <i class="fas fa-save me-1"></i> Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- View Department Members Modal -->
    <div class="modal fade" id="viewMembersModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-users me-2"></i> IT Department Members
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="members-list">
                        <div class="member-item">
                            <img src="https://ui-avatars.com/api/?name=Ahmad+Khaled" alt="Member"
                                class="member-avatar-modal">
                            <div class="member-details">
                                <h6>Ahmad Khaled</h6>
                                <p class="text-muted mb-0">ahmad.khaled@acme.com</p>
                                <span class="role-badge role-admin mt-1">Company Admin</span>
                            </div>
                            <div class="member-stats">
                                <div class="stat-badge">
                                    <i class="fas fa-book"></i> 12 Cards
                                </div>
                            </div>
                        </div>
                        <div class="member-item">
                            <img src="https://ui-avatars.com/api/?name=John+Doe" alt="Member"
                                class="member-avatar-modal">
                            <div class="member-details">
                                <h6>John Doe</h6>
                                <p class="text-muted mb-0">john.doe@acme.com</p>
                                <span class="role-badge role-employee mt-1">Employee</span>
                            </div>
                            <div class="member-stats">
                                <div class="stat-badge">
                                    <i class="fas fa-book"></i> 8 Cards
                                </div>
                            </div>
                        </div>
                        <div class="member-item">
                            <img src="https://ui-avatars.com/api/?name=Jane+Smith" alt="Member"
                                class="member-avatar-modal">
                            <div class="member-details">
                                <h6>Jane Smith</h6>
                                <p class="text-muted mb-0">jane.smith@acme.com</p>
                                <span class="role-badge role-employee mt-1">Employee</span>
                            </div>
                            <div class="member-stats">
                                <div class="stat-badge">
                                    <i class="fas fa-book"></i> 15 Cards
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-user-plus me-1"></i> Add Member
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
