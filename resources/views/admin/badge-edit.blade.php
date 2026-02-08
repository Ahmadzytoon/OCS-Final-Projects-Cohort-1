@extends('layouts.admin')
@section('title', 'Code Quest | Badge')
@section('content')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.badges') }}">Badges
                            </a>
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
                            <div class="img-wrapper">
                                <img src="https://placehold.net/default.png"  alt="" class="img-fluid rounded"
                                    style="max-height: 400px; object-fit: contain;">

                                <div class="overlay">
                                    <button id="edit-btn"><i class="fa-solid fa-pen"></i> Change</button>
                                    <input type="file" name="badge-icon" id="file-input" style="display: none;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <form action="#" id="badge-edit">
                                <table class=" table table-bordered">
                                    <tr>
                                        <th>#</th>
                                        <td><input type="text" name="id" id="id" class="form-control"
                                                disabled value="x."></td>
                                    </tr>

                                    <tr>
                                        <th>Title</th>
                                        <td><input type="text" name="title" id="title" class="form-control"
                                                autofocus>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-light">Select
                                                    Category</button>
                                                <button type="button"
                                                    class="btn btn-light dropdown-toggle dropdown-toggle-split"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Course</a></li>
                                                    <li>
                                                    <li><a class="dropdown-item" href="#">Module</a></li>
                                                    <li>
                                                    <li><a class="dropdown-item" href="#">Project</a></li>
                                                    <li>
                                                    <li><a class="dropdown-item" href="#">Task</a></li>
                                                    <li>

                                                </ul>
                                            </div>
                                    </tr>
                                    <tr>
                                        <th>Trigger Condition</th>
                                        <td><input type="text" name="title" id="title" class="form-control">
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>
                                            <textarea type="text" name="title" id="title" class="form-control"></textarea>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div id="card-badge"><a class="btn btn-secondary" onclick="confirmCancel()">Cancel</a>
                            <a href="#" class="btn btn-warning">Update</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <!--end::App Content-->
    @endsection
    @push('scripts')
        <script>
            const editBtn = document.getElementById('edit-btn');
            const fileInput = document.getElementById('file-input');

            editBtn.addEventListener('click', () => {
                fileInput.click();
            })

            fileInput.addEventListener('change', (event) => {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.querySelector('.img-wrapper img').src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            })

            function confirmCancel() {
                Swal.fire({
                    title: 'Cancel Changes?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {}
                });
            }
        </script>
    @endpush
