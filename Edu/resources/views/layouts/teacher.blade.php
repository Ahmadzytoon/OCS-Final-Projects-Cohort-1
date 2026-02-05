<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Teacher</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen">
        <nav class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <span class="text-xl font-bold text-indigo-600">EduTrack</span>
                        </div>
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                            <a href="{{ route('teacher.dashboard') }}"
                                class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('teacher.dashboard') ? 'border-b-2 border-indigo-500 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">Dashboard</a>
                            <a href="{{ route('teacher.assignments') }}"
                                class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('teacher.assignments') ? 'border-b-2 border-indigo-500 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">Assignments</a>
                            <a href="{{ route('teacher.attendance') }}"
                                class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('teacher.attendance') ? 'border-b-2 border-indigo-500 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">Attendance</a>
                            <a href="{{ route('teacher.grades') }}"
                                class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('teacher.grades') ? 'border-b-2 border-indigo-500 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">Grades</a>
                            <a href="{{ route('teacher.students') }}"
                                class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('teacher.students') ? 'border-b-2 border-indigo-500 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">Students</a>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <span class="mr-4 text-sm text-gray-700">{{ auth('teacher')->user()->name }}</span>
                        <form method="POST" action="{{ route('teacher.logout') }}">
                            @csrf
                            <button type="submit" class="text-sm text-gray-700 hover:text-gray-900">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @yield('content')
        </main>
    </div>
    @livewireScripts
</body>

</html>