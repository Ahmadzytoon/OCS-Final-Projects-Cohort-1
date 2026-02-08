@extends('layouts.admin')
@section('title', 'Code Quest | Enrollments')
@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Total Enrollments</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Enrollments</li>
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
                    <h3 class="card-title">Code Quest Enrollments</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Student</th>
                                <th>Course</th>
                                <th>Completion</th>
                                <th>Progress</th>
                                <th>Module Completed</th>
                                <th>Projects Completed</th>
                                <th>Enrolled at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>Haitham</td>
                                <td>Python</td>
                                <td><span class="badge text-bg-success">90%</span></td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar text-bg-success" style="width: 90%">
                                        </div>
                                    </div>
                                </td>
                                <td>12</td>
                                <td>4</td>
                                <td>16th Dec 2025</td>
                                <td>
                                    <span class="badge rounded-pill text-bg-danger"
                                        onclick='confirmUnenroll("Haitham","Python")'>Unenroll</span>
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
    @push('scripts')
        <script>
            function confirmUnenroll( /*id,*/ userName, courseName) {
                Swal.fire({
                    title: 'Unenroll ' + userName + ' from ' + courseName + '?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Unenroll',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // window.location.href = '#';
                    }
                });
            }

            // if (urlParams.get('deleted') === '1') {
            //     let name = urlParams.get('name');
            //     Swal.fire({
            //         icon: 'success',
            //         title: 'Updated',
            //         text: name + 'deleted successfully',
            //         confirmButtonColor: '#28a745',
            //         timer: 3000
            //     }).then(() => {
            //         window.history.replaceState({}, document.title, window.location.pathname);
            //     });
            // }
        </script>
    @endpush
