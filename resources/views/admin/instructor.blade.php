@extends('layouts.admin')
@section('title', 'Code Quest | Instructor')
@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Raghad Nayef</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Instructor</li>
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
            <div class="row g-4">
                <!-- User Card Column -->
                @include('admin.partials.user-card')
                <!-- Orders Table Column -->
                <div class=" col-md-8 col-lg-9">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Raghad's Created Courses </h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>title</th>
                                        <th>Visibility</th>
                                        <th>Enrollments</th>
                                        <th>Completion rate</th>
                                        <th>XP</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="align-middle">
                                        <td>1.</td>
                                        <td>Python</td>
                                        <td>Public</td>
                                        <td>25</td>
                                        <td>
                                            <span class="badge text-bg-success">90%</span>
                                        </td>
                                        <td>200</td>
                                        <td>9th Nov 2025</td>

                                        <td>
                                            <span class="badge rounded-pill text-bg-danger"
                                                onclick='confirmDelete("Python")'>Delete</span>
                                            <span class="badge rounded-pill text-bg-warning">Edit</span>
                                            <span class="badge rounded-pill text-bg-info"
                                                onclick="window.location.href='instructor-details.html'">Info</span>
                                        </td>
                                    </tr>

                                    <tr class="align-middle">
                                        <td>2.</td>
                                        <td>Java</td>
                                        <td>Private</td>
                                        <td>2</td>
                                        <td>
                                            <span class="badge text-bg-warning">70%</span>
                                        </td>
                                        <td>300</td>
                                        <td>9th Nov 2025</td>

                                        <td>
                                            <span class="badge rounded-pill text-bg-danger"
                                                onclick='confirmDelete("Java")'>Delete</span>
                                            <span class="badge rounded-pill text-bg-warning">Edit</span>
                                            <span class="badge rounded-pill text-bg-info"
                                                onclick="window.location.href='course-details.html'">Info</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--end::App Content-->
    @endsection
