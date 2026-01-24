@extends('layouts.admin')
@section('title', 'Code Quest | Courses')
@section('content')
    <!--begin::App Main-->
    <main class="app-main" style="overflow: auto;">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Courses</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Courses</li>
                        </ol>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-header" style="display: flex; gap: 50px; align-items: center;">
                        <h3 class="card-title">Code Quest Courses</h3>
                        <div class="input-group" style="width: 40%; align-self: flex-end;">
                            <input type="text" class="form-control" placeholder="Search for a course..." />
                            <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Course</th>
                                    <th>Instructor</th>
                                    <th>
                                        <div class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Visibility
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="#">Public</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Private</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </th>
                                    <th>Enrollments</th>
                                    <th>Modules</th>
                                    <th>Projects</th>
                                    <th>Completions</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle">
                                    <td>1.</td>
                                    <td>Python </td>
                                    <td>Raghad Nayef</td>
                                    <td>Public</td>
                                    <td>32</td>
                                    <td>10</td>
                                    <td>5</td>
                                    <td>90%</td>
                                    <td>1st Nov 2025</td>
                                    <td>
                                        <a class="badge rounded-pill text-bg-danger"
                                            onclick='confirmDelete("Python")'>Delete</a>
                                        <a class="badge rounded-pill text-bg-warning">Edit</a>
                                        <a class=" badge rounded-pill text-bg-info">Info</a>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td>2.</td>
                                    <td>Java </td>
                                    <td>Raghad Nayef</td>
                                    <td>Private</td>
                                    <td>2</td>
                                    <td>10</td>
                                    <td>8</td>
                                    <td>70%</td>
                                    <td>1st Nov 2025</td>
                                    <td>
                                        <a class="badge rounded-pill text-bg-danger"
                                            onclick='confirmDelete("Java")'>Delete</a>
                                        <a class="badge rounded-pill text-bg-warning">Edit</a>
                                        <a class="badge rounded-pill text-bg-info">Info</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!--end::App Content-->
    </main>
    <!--end::App Main-->
@endsection
