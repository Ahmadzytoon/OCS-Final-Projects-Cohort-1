@extends('admin.layout.master')

@section('title', 'Dashboard')

@section('content')

    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-primary card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-building"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category"> Companies</p>
                                    <h4 class="card-title">1,294</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-primary card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Total Users</p>
                                    <h4 class="card-title">1,294</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-info card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-user-check"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Active Users</p>
                                    <h4 class="card-title">1303</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-success card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-chart-pie"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Knowledge </p>
                                    <h4 class="card-title">$ 1,345</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-secondary card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="far fa-check-circle"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Requests</p>
                                    <h4 class="card-title">576</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">User Statistics</div>
                            {{-- <div class="card-tools">
                                <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                                    <span class="btn-label">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    Export
                                </a>
                                <a href="#" class="btn btn-label-info btn-round btn-sm">
                                    <span class="btn-label">
                                        <i class="fa fa-print"></i>
                                    </span>
                                    Print
                                </a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="min-height: 375px">
                            <canvas id="statisticsChart"></canvas>
                        </div>
                        <div id="myChartLegend"></div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-4">
                <div class="card card-primary card-round">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Daily Sales</div>
                            <div class="card-tools">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-label-light dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Export
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-category">March 25 - April 02</div>
                    </div>
                    <div class="card-body pb-0">
                        <div class="mb-4 mt-2">
                            <h1>$4,578.58</h1>
                        </div>
                        <div class="pull-in">
                            <canvas id="dailySalesChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card card-round">
                    <div class="card-body pb-0">
                        <div class="h1 fw-bold float-end text-primary">+5%</div>
                        <h2 class="mb-2">17</h2>
                        <p class="text-muted">Users online</p>
                        <div class="pull-in sparkline-fix">
                            <div id="lineChart"></div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <h4 class="card-title">Users</h4>
                            <div class="card-tools">
                                <a href="{{ route('admin.users') }}"><button class="btn  btn-primary ">
                                        View All
                                    </button></a>

                            </div>
                        </div>
                        {{-- <p class="card-category">
                            lastest users
                        </p> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive table-hover table-sales">
                                    <table class="table">
                                        <thead>
                                            <th>Profile Pic</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>role</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="avatar avatar-sm">
                                                        <img src="{{ asset('admin/assets/img/profile2.jpg') }}"
                                                            alt="indonesia" class="avatar-img rounded-circle" />
                                                    </div>
                                                </td>
                                                <td>Ahmad Ahmad</td>
                                                <td class="">ahmad@gmail.com</td>
                                                <td class="">Company admin</td>
                                                <td><button class="btn btn-success  btn-round">View</button></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="avatar avatar-sm">
                                                        <img src="{{ asset('admin/assets/img/mlane.jpg') }}" alt="indonesia"
                                                            class="avatar-img rounded-circle" />
                                                    </div>
                                                </td>
                                                <td>Ahmad Ahmad</td>
                                                <td class="">ahmad@gmail.com</td>
                                                <td class="">Company admin</td>
                                                <td><button class="btn btn-success  btn-round">View</button></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="mapcontainer">
                                    <div id="world-map" class="w-100" style="height: 300px"></div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-md-4">
                <div class="card card-round">
                    <div class="card-body">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">Lastest Companies</div>
                            <div class="card-tools">

                            </div>
                        </div>
                        <div class="card-list py-4">
                            <div class="item-list">

                                <div class="info-user text-info ms-2">
                                    <div class="">Company owner</div>
                                </div>
                                <div class="info-user text-info  ms-5">
                                    <div class="">Company name</div>
                                </div>
                            </div>
                            <div class="item-list">
                                <div class="avatar">
                                    <img src="{{ asset('admin/assets/img/jm_denis.jpg') }}" alt="..."
                                        class="avatar-img rounded-circle" />
                                </div>
                                <div class="info-user ms-3">
                                    <div class="username">Jimmy Denis</div>
                                </div>
                                <div class="info-user ms-3">
                                    <div class="">IT</div>
                                </div>
                            </div>

                            <div class="item-list">
                                <div class="avatar">
                                    <span class="avatar-title rounded-circle border border-white">CF</span>
                                </div>
                                <div class="info-user ms-3">
                                    <div class="username">Chandra Felix</div>
                                </div>
                                <div class="info-user ms-3">
                                    <div class="">Sales </div>
                                </div>

                            </div>

                            <div class="item-list">
                                <div class="avatar">
                                    <img src="{{ asset('admin/assets/img/talha.jpg') }}" alt="..."
                                        class="avatar-img rounded-circle" />
                                </div>
                                <div class="info-user ms-3">
                                    <div class="username">Talha</div>
                                </div>
                                <div class="info-user ms-3">
                                    <div class="">Marketing</div>
                                </div>

                            </div>
                            <div class="item-list">
                                <div class="avatar">
                                    <img src="{{ asset('admin/assets/img/chadengle.jpg') }}" alt="..."
                                        class="avatar-img rounded-circle" />
                                </div>
                                <div class="info-user ms-3">
                                    <div class="username">Chad</div>
                                </div>
                                <div class="info-user ms-3">
                                    <div class="">Accountent</div>
                                </div>

                            </div>

                            <div class="item-list">
                                <div class="avatar">
                                    <span class="avatar-title rounded-circle border border-white bg-primary">H</span>
                                </div>
                                <div class="info-user ms-3">
                                    <div class="username">Hizrian</div>

                                </div>
                                <div class="info-user ms-3">
                                    <div class="">Photography</div>
                                </div>

                            </div>

                            <div class="item-list">
                                <div class="avatar">
                                    <span class="avatar-title rounded-circle border border-white bg-secondary">F</span>
                                </div>
                                <div class="info-user ms-3">
                                    <div class="username">Farrah</div>
                                </div>
                                <div class="info-user ms-3">
                                    <div class="">Marketing</div>
                                </div>
                                {{-- <button class="btn btn-icon btn-link op-8 me-1">
                                    <i class="far fa-envelope"></i>
                                </button>
                                <button class="btn btn-icon btn-link btn-danger op-8">
                                    <i class="fas fa-ban"></i>
                                </button> --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">Departments</div>

                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Department Members</th>
                                        <th scope="col" class="text-end">Department Manager</th>
                                        <th scope="col" class="text-end">Department Title</th>
                                        <th scope="col" class="text-end">Totls members</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <div class="avatar-group">
                                                <div class="avatar">
                                                    <img src="{{ asset('admin/assets/img/jm_denis.jpg') }}" alt="..."
                                                        class="avatar-img rounded-circle border border-white">
                                                </div>
                                                <div class="avatar">
                                                    <img src="{{ asset('admin/assets/img/chadengle.jpg') }}"
                                                        alt="..."
                                                        class="avatar-img rounded-circle border border-white">
                                                </div>
                                                <div class="avatar">
                                                    <img src="{{ asset('admin/assets/img/mlane.jpg') }}" alt="..."
                                                        class="avatar-img rounded-circle border border-white">
                                                </div>
                                                <div class="avatar">
                                                    <span class="avatar-title rounded-circle border border-white">CF</span>
                                                </div>
                                            </div>

                                        </th>
                                        <td class="text-end">Ahmad Haswah</td>
                                        <td class="text-end">
                                            <span class="badge badge-success">IT</span>
                                        </td>
                                        <td class="text-end">90</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div class="avatar-group">
                                                <div class="avatar">
                                                    <img src="{{ asset('admin/assets/img/jm_denis.jpg') }}" alt="..."
                                                        class="avatar-img rounded-circle border border-white">
                                                </div>
                                                <div class="avatar">
                                                    <img src="{{ asset('admin/assets/img/chadengle.jpg') }}"
                                                        alt="..."
                                                        class="avatar-img rounded-circle border border-white">
                                                </div>
                                                <div class="avatar">
                                                    <img src="{{ asset('admin/assets/img/mlane.jpg') }}" alt="..."
                                                        class="avatar-img rounded-circle border border-white">
                                                </div>
                                                <div class="avatar">
                                                    <span class="avatar-title rounded-circle border border-white">CF</span>
                                                </div>
                                            </div>

                                        </th>
                                        <td class="text-end">Ahmad Haswah</td>
                                        <td class="text-end">
                                            <span class="badge badge-success">IT</span>
                                        </td>
                                        <td class="text-end">90</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div class="avatar-group">
                                                <div class="avatar">
                                                    <img src="{{ asset('admin/assets/img/jm_denis.jpg') }}" alt="..."
                                                        class="avatar-img rounded-circle border border-white">
                                                </div>
                                                <div class="avatar">
                                                    <img src="{{ asset('admin/assets/img/chadengle.jpg') }}"
                                                        alt="..."
                                                        class="avatar-img rounded-circle border border-white">
                                                </div>
                                                <div class="avatar">
                                                    <img src="{{ asset('admin/assets/img/mlane.jpg') }}" alt="..."
                                                        class="avatar-img rounded-circle border border-white">
                                                </div>
                                                <div class="avatar">
                                                    <span class="avatar-title rounded-circle border border-white">CF</span>
                                                </div>
                                            </div>

                                        </th>
                                        <td class="text-end">Ahmad Haswah</td>
                                        <td class="text-end">
                                            <span class="badge badge-success">IT</span>
                                        </td>
                                        <td class="text-end">90</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div class="avatar-group">
                                                <div class="avatar">
                                                    <img src="{{ asset('admin/assets/img/jm_denis.jpg') }}" alt="..."
                                                        class="avatar-img rounded-circle border border-white">
                                                </div>
                                                <div class="avatar">
                                                    <img src="{{ asset('admin/assets/img/chadengle.jpg') }}"
                                                        alt="..."
                                                        class="avatar-img rounded-circle border border-white">
                                                </div>
                                                <div class="avatar">
                                                    <img src="{{ asset('admin/assets/img/mlane.jpg') }}" alt="..."
                                                        class="avatar-img rounded-circle border border-white">
                                                </div>
                                                <div class="avatar">
                                                    <span class="avatar-title rounded-circle border border-white">CF</span>
                                                </div>
                                            </div>

                                        </th>
                                        <td class="text-end">Ahmad Haswah</td>
                                        <td class="text-end">
                                            <span class="badge badge-success">IT</span>
                                        </td>
                                        <td class="text-end">90</td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
