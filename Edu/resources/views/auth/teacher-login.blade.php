<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login - EduTrack</title>
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

        .btn-indigo {
            background-color: #3f51b5;
            color: white;
        }

        .btn-indigo:hover {
            background-color: #303f9f;
            color: white;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="card login-card p-4 p-md-5 border-0 bg-white">
        <h2 class="text-center fw-bold mb-3" style="color: #3f51b5;">Teacher Login</h2>
        <p class="text-center text-muted mb-4 small">Login with credentials provided by admin</p>

        @if ($errors->any())
            <div class="alert alert-danger py-2 mb-4">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('teacher.login') }}">
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
            <div class="mb-4 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label class="form-check-label small" for="remember">Remember me</label>
            </div>
            <button type="submit" class="btn btn-indigo btn-lg w-100 fw-bold shadow-sm mb-4">Login</button>

            <div class="border-top pt-4 text-center">
                <a href="{{ route('admin.login') }}" class="btn btn-outline-secondary w-100">
                    Switch to Admin Login
                </a>
            </div>
        </form>
    </div>
</body>

</html>