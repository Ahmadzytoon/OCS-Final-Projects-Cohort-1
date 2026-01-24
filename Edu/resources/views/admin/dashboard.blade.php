@extends('layouts.admin')

@section('content')
    <div class="mb-4">
        <h2 class="fw-bold text-dark">Admin Dashboard</h2>
    </div>

    <div class="row g-4">
        <div class="col-md-auto col-lg">
            <div class="card card-stat border-0 shadow-sm h-100">
                <div class="card-body">
                    <h6 class="text-muted text-uppercase small fw-bold">Classes</h6>
                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <h2 class="fw-bold text-primary mb-0">{{ \App\Models\SchoolClass::count() }}</h2>
                        <i data-lucide="layers" class="text-primary opacity-50" width="32" height="32"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-auto col-lg">
            <div class="card card-stat border-0 shadow-sm h-100">
                <div class="card-body">
                    <h6 class="text-muted text-uppercase small fw-bold">Sections</h6>
                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <h2 class="fw-bold text-success mb-0">{{ \App\Models\Section::count() }}</h2>
                        <i data-lucide="grid" class="text-success opacity-50" width="32" height="32"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-auto col-lg">
            <div class="card card-stat border-0 shadow-sm h-100">
                <div class="card-body">
                    <h6 class="text-muted text-uppercase small fw-bold">Subjects</h6>
                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <h2 class="fw-bold text-info mb-0">{{ \App\Models\Subject::count() }}</h2>
                        <i data-lucide="book-open" class="text-info opacity-50" width="32" height="32"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-auto col-lg">
            <div class="card card-stat border-0 shadow-sm h-100">
                <div class="card-body">
                    <h6 class="text-muted text-uppercase small fw-bold">Teachers</h6>
                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <h2 class="fw-bold text-warning mb-0">{{ \App\Models\Teacher::count() }}</h2>
                        <i data-lucide="users" class="text-warning opacity-50" width="32" height="32"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-auto col-lg">
            <div class="card card-stat border-0 shadow-sm h-100">
                <div class="card-body">
                    <h6 class="text-muted text-uppercase small fw-bold">Students</h6>
                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <h2 class="fw-bold text-danger mb-0">{{ \App\Models\Student::count() }}</h2>
                        <i data-lucide="graduation-cap" class="text-danger opacity-50" width="32" height="32"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection