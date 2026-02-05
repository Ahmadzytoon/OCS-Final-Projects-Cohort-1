<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'EduTrack') }} - Admin</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f8f9fa;
        }

        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -15rem;
            transition: margin .25s ease-out;
            background-color: #2c3e50;
            color: white;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
            font-weight: bold;
            background-color: #1a252f;
        }

        #sidebar-wrapper .list-group {
            width: 15rem;
        }

        #page-content-wrapper {
            min-width: 100vw;
        }

        body.sb-sidenav-toggled #sidebar-wrapper {
            margin-left: 0;
        }

        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
            }

            body.sb-sidenav-toggled #sidebar-wrapper {
                margin-left: -15rem;
            }
        }

        .sidebar-link {
            color: rgba(255, 255, 255, 0.8);
            border: none;
            background: none;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .sidebar-link:hover {
            background-color: #34495e;
            color: white;
        }

        .sidebar-link.active {
            background-color: #34495e;
            color: white;
            border-left: 4px solid #3498db;
        }

        .sidebar-link i {
            margin-right: 10px;
            width: 20px;
        }

        .card-stat {
            transition: transform 0.2s;
        }

        .card-stat:hover {
            transform: translateY(-3px);
        }
    </style>
    @livewireStyles
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="sidebar-heading">EduTrack Admin</div>
            <div class="list-group list-group-flush">
                <a href="{{ route('admin.dashboard') }}"
                    class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i data-lucide="layout-dashboard"></i> Dashboard
                </a>
                <a href="{{ route('admin.classes') }}"
                    class="sidebar-link {{ request()->routeIs('admin.classes*') ? 'active' : '' }}">
                    <i data-lucide="layers"></i> Classes
                </a>
                <a href="{{ route('admin.sections') }}"
                    class="sidebar-link {{ request()->routeIs('admin.sections*') ? 'active' : '' }}">
                    <i data-lucide="grid"></i> Sections
                </a>
                <a href="{{ route('admin.subjects') }}"
                    class="sidebar-link {{ request()->routeIs('admin.subjects*') ? 'active' : '' }}">
                    <i data-lucide="book-open"></i> Subjects
                </a>
                <a href="{{ route('admin.teachers') }}"
                    class="sidebar-link {{ request()->routeIs('admin.teachers*') ? 'active' : '' }}">
                    <i data-lucide="users"></i> Teachers
                </a>
                <a href="{{ route('admin.students') }}"
                    class="sidebar-link {{ request()->routeIs('admin.students*') ? 'active' : '' }}">
                    <i data-lucide="graduation-cap"></i> Students
                </a>

                <div class="mt-auto p-3">
                    <div class="small text-white-50 mb-2">Logged in as: {{ auth('admin')->user()->name }}</div>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm w-100">
                            <i data-lucide="log-out" style="width: 14px; display: inline;"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
                <div class="container-fluid">
                    <button class="btn btn-light" id="sidebarToggle">
                        <i data-lucide="menu"></i>
                    </button>
                </div>
            </nav>

            <div class="container-fluid p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        lucide.createIcons();
        document.getElementById('sidebarToggle').addEventListener('click', function (e) {
            e.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
        });
    </script>
    @livewireScripts
</body>

</html>