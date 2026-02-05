@extends('layouts.teacher')

@section('content')
    <div>
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Teacher Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-500 text-sm font-medium">My Assignments</h3>
                <p class="text-3xl font-bold text-indigo-600 mt-2">
                    {{ \App\Models\Assignment::where('teacher_id', auth('teacher')->id())->count() }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-500 text-sm font-medium">Total Students</h3>
                <p class="text-3xl font-bold text-green-600 mt-2">{{ \App\Models\Student::count() }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-500 text-sm font-medium">Classes</h3>
                <p class="text-3xl font-bold text-blue-600 mt-2">{{ \App\Models\SchoolClass::count() }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-500 text-sm font-medium">Grades Recorded</h3>
                <p class="text-3xl font-bold text-purple-600 mt-2">
                    {{ \App\Models\Grade::where('teacher_id', auth('teacher')->id())->count() }}</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold mb-4">Quick Actions</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <a href="{{ route('teacher.assignments') }}"
                    class="p-4 border-2 border-indigo-200 rounded-lg hover:bg-indigo-50 transition">
                    <h3 class="font-semibold text-indigo-600">Manage Assignments</h3>
                    <p class="text-sm text-gray-600 mt-1">Create and view assignments</p>
                </a>
                <a href="{{ route('teacher.attendance') }}"
                    class="p-4 border-2 border-green-200 rounded-lg hover:bg-green-50 transition">
                    <h3 class="font-semibold text-green-600">Record Attendance</h3>
                    <p class="text-sm text-gray-600 mt-1">Mark student attendance</p>
                </a>
                <a href="{{ route('teacher.grades') }}"
                    class="p-4 border-2 border-purple-200 rounded-lg hover:bg-purple-50 transition">
                    <h3 class="font-semibold text-purple-600">Enter Grades</h3>
                    <p class="text-sm text-gray-600 mt-1">Record student marks</p>
                </a>
                <a href="{{ route('teacher.students') }}"
                    class="p-4 border-2 border-blue-200 rounded-lg hover:bg-blue-50 transition">
                    <h3 class="font-semibold text-blue-600">View Students</h3>
                    <p class="text-sm text-gray-600 mt-1">Browse student list</p>
                </a>
            </div>
        </div>
    </div>
@endsection