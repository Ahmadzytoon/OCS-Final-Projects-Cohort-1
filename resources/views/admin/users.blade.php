@extends('layouts.admin')
@section('title', 'Code Quest | Users')

@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Users</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                    <h3 class="card-title">Code Quest Users</h3>
                    <div class="input-group" style="width: 40%; align-self: flex-end;">
                        <input type="text" class="form-control" placeholder="Search for an user..." />
                        <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>
                                    <div class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Role
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="#">Admins</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">Instructors</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">Students</a>
                                            </li>
                                        </ul>
                                    </div>
                                </th>
                                <th>Registered At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="align-middle">
                                <td>1.</td>
                                <td> <img src="{{ asset('admin/assets/img/waad.png') }}" alt="User Image" width="50px" />
                                </td>
                                <td>Haitham Nayef</td>
                                <td>haythoom@gmail.com</td>
                                <td>Student</td>
                                <td>8th Oct 2025</td>
                                <td>
                                    <a class="badge rounded-pill text-bg-danger"
                                        onclick='confirmDelete("Haitham")'>Delete</a>
                                    <a class="badge rounded-pill text-bg-info"
                                        href="{{ route('admin.student', 1) }}">Info</a>
                                </td>
                            </tr>

                            <tr class="align-middle">
                                <td>2.</td>
                                <td> <img src="{{ asset('admin/assets/img/waad.png') }}" alt="User Image" width="50px" />
                                </td>
                                <td>Waad Nayef</td>
                                <td>waad@gmail.com</td>
                                <td>Admin</td>
                                <td>8th Oct 2025</td>
                                <td>
                                    <a class="badge rounded-pill text-bg-secondary">Delete</a>
                                    <a class="badge rounded-pill text-bg-info">Info</a>
                                </td>
                            </tr>

                            <tr class="align-middle">
                                <td>3.</td>
                                <td> <img src="{{ asset('admin/assets/img/waad.png') }}" alt="User Image" width="50px" />
                                </td>
                                <td>Raghad Nayef</td>
                                <td>raghad@gmail.com</td>
                                <td>Instructor</td>
                                <td>8th Oct 2025</td>
                                <td>
                                    <a class="badge rounded-pill text-bg-danger"
                                        onclick='confirmDelete("Raghad")'>Delete</a>
                                    <a class="badge rounded-pill text-bg-info"
                                        href="{{ route('admin.instructor', 1) }}">Info</a>
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
    @endsection