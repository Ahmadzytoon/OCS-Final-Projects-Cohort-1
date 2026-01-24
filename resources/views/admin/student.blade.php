@extends('layouts.admin')

@section('title', 'Code Quest | Student')

@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Haitham Nayef</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.users')}}">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">example</li>
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
                                Haitham' s Registered Courses </h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Course</th>
                                        <th>Enrolled At</th>
                                        <th>XP</th>
                                        <th>Percentage</th>
                                        <th>Progress</th>
                                        <th>Badges</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="align-middle">
                                        <td>1.</td>
                                        <td>Python</td>
                                        <td>9th Nov 2025</td>
                                        <td>25</td>
                                        <td>
                                            <span class="badge text-bg-danger">30%</span>
                                        </td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar text-bg-danger" style="width: 30%">
                                                </div>
                                            </div>
                                        </td>
                                        <td style="display: flex; gap: 10px;">
                                            <img src="{{ asset('admin/assets/img/goal.png') }}" width="20px"
                                                alt="">
                                            <img src="{{ asset('admin/assets/img/blocks.png') }}" width="20px"
                                                alt="">
                                        </td>
                                    </tr>

                                    <tr class="align-middle">
                                        <td>2.</td>
                                        <td>Java</td>
                                        <td>9th Nov 2025</td>
                                        <td>75</td>
                                        <td>
                                            <span class="badge text-bg-success">90%</span>
                                        </td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar text-bg-success" style="width: 90%">
                                                </div>
                                            </div>
                                        </td>
                                        <td style="display: flex; gap: 10px;">
                                            <img src="{{ asset('admin/assets/img/goal.png') }}" width="20px"
                                                alt="">
                                            <img src="{{ asset('admin/assets/img/blocks.png') }}" width="20px"
                                                alt="">
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



