<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - EduTrack</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
        }

        .login-card {
            max-width: 450px;
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-purple {
            background-color: #7b1fa2;
            color: white;
        }

        .btn-purple:hover {
            background-color: #6a1b9a;
            color: white;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="card login-card p-4 p-md-5 border-0 bg-white">
        <h2 class="text-center fw-bold mb-3" style="color: #7b1fa2;">Admin Login</h2>
        <p class="text-center text-muted mb-4 small">Administrator Access Only</p>

        @if ($errors->any())
            <div class="alert alert-danger py-2 mb-4">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold small">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="form-control form-control-lg">
            </div>
            <div class="mb-4">
                <label class="form-label fw-bold small">Password</label>
                <input type="password" name="password" required class="form-control form-control-lg">
            </div>
            <button type="submit" class="btn btn-purple btn-lg w-100 fw-bold shadow-sm mb-4">Login</button>

            <div class="border-top pt-4 text-center">
                <a href="{{ route('teacher.login') }}" class="btn btn-outline-secondary w-100">
                    Switch to Teacher Login
                </a>
            </div>
        </form>
    </div>
</body>

</html>