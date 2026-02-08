@extends('layouts.admin')
@section('title', 'Code Quest | Badges')
@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Badges</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Badges</li>
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
                <div class="card-header">
                    <h3 class="card-title">Code Quest Badges</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Icon</th>
                                <th>Title</th>
                                <th>
                                    <div class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Category
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="#">Course</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">Module</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">Task</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">Topic</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">Project</a>
                                            </li>
                                        </ul>
                                    </div>
                                </th>
                                <th>Trigger Condition</th>
                                <th>Times Rewarded</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td> <img src="./assets/img/goal.png" alt="User Image" width="30px" />
                                <td>Deep Thinker</td>
                                <td>Task</td>
                                <td>answer conceptual questions correctly</td>
                                <td> 33 </td>
                                <td>5th Nov 2025</td>
                                <td>
                                    <span class="badge rounded-pill text-bg-danger"
                                        onclick='confirmDelete("Deep Thinker")'>Delete</span>
                                    <a class="badge rounded-pill text-bg-warning"
                                        href="{{ route('admin.badge-edit',1) }}">Edit</a>
                                    <a class="badge rounded-pill text-bg-info"
                                        href="{{ route('admin.badge-details',1) }}">Info</a>
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
