<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduTrack - School Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .portal-card {
            transition: transform 0.2s;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .portal-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .icon-circle {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }

        .admin-card .icon-circle {
            background-color: #f3e5f5;
            color: #7b1fa2;
        }

        .admin-card {
            border-top: 4px solid #7b1fa2;
        }

        .teacher-card .icon-circle {
            background-color: #e8eaf6;
            color: #3f51b5;
        }

        .teacher-card {
            border-top: 4px solid #3f51b5;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold text-dark">Welcome to EduTrack</h1>
            <p class="lead text-secondary">Select your portal to continue</p>
        </div>

        <div class="row justify-content-center g-4">
            <!-- Admin Portal -->
            <div class="col-md-5">
                <div class="card h-100 p-4 portal-card admin-card bg-white">
                    <div class="card-body text-center">
                        <div class="icon-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                class="bi bi-shield-lock" viewBox="0 0 16 16">
                                <path
                                    d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z" />
                            </svg>
                        </div>
                        <h3 class="card-title fw-bold mb-3">Admin Portal</h3>
                        <p class="card-text text-muted mb-4">Access system configuration, manage users, and academic
                            structure.</p>
                        <a href="{{ route('admin.login') }}" class="btn btn-primary btn-lg w-100 py-3 fw-bold"
                            style="background-color: #7b1fa2; border-color: #7b1fa2;">
                            Login as Admin
                        </a>
                    </div>
                </div>
            </div>

            <!-- Teacher Portal -->
            <div class="col-md-5">
                <div class="card h-100 p-4 portal-card teacher-card bg-white">
                    <div class="card-body text-center">
                        <div class="icon-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                class="bi bi-person-workspace" viewBox="0 0 16 16">
                                <path
                                    d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                <path
                                    d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
                            </svg>
                        </div>
                        <h3 class="card-title fw-bold mb-3">Teacher Portal</h3>
                        <p class="card-text text-muted mb-4">Manage assignments, record attendance, and enter student
                            grades.</p>
                        <a href="{{ route('teacher.login') }}" class="btn btn-primary btn-lg w-100 py-3 fw-bold"
                            style="background-color: #3f51b5; border-color: #3f51b5;">
                            Login as Teacher
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>