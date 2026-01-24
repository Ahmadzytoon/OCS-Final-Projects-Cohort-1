@extends('layouts.admin')
@section('title', 'Code Quest | Badge Details')
@section('content')

    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Deep Thinker</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="{{ route('admin.badges') }}">Badges </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Details</li>
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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img src="{{ asset('admin/assets/img/goal.png') }}" alt="" class="img-fluid rounded"
                                    style="max-height: 400px; object-fit: contain;">
                            </div>
                            <div class="col-md-8">
                                <form action="#" id="badge-edit">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>#</th>
                                            <td>
                                                <input type="text" name="id" id="id" class="form-control"
                                                    disabled value="x.">
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Title</th>
                                            <td>
                                                <input type="text" name="title" id="title" class="form-control"
                                                    disabled value="Deep Thinker">
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Category</th>
                                            <td>
                                                <input type="text" name="title" id="title" class="form-control"
                                                    disabled value="Task">
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Trigger Condition</th>
                                            <td>
                                                <input type="text" name="title" id="title" class="form-control"
                                                    disabled value="answer conceptual questions correctly">
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Description</th>
                                            <td>
                                                <textarea name="title" id="title" class="form-control" disabled>xyz</textarea>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div id="card-badge">
                            <a href="{{ route('admin.badges') }}" class="btn btn-secondary">Back To Badges</a>
                            <a href="{{ route('admin.badge-edit', 1) }}" class="btn btn-warning">Edit Badge</a>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card mb-4">
                    <div class="card-header" style="display: flex; gap: 50px; align-items: center;">
                        <h3 class="card-title">Students Earned This Badge</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Earned At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle">
                                    <td>1.</td>
                                    <td>
                                        <img src="{{ asset('admin/assets/img/waad.png') }}" alt="User Image"
                                            width="50px" />
                                    </td>
                                    <td>Haitham Nayef</td>
                                    <td>Python</td>
                                    <td>8th Oct 2025</td>
                                    <td>
                                        <a class="badge rounded-pill text-bg-danger"
                                            onclick='confirmDelete("")'>Revoke Badge</a>
                                        <a class="badge rounded-pill text-bg-info"
                                           href="{{route('admin.student',1)}}">Info</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>

@endsection

@push('scripts')
@endpush
