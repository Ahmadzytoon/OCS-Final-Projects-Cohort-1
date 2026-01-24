@extends('layouts.admin')
@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-lg-3 col-6">
                    <!--begin::Small Box Widget 1-->

                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3>150</h3>

                            <p>Registered Users</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path
                                d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                            </path>
                        </svg>
                        <div class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            &nbsp;
                        </div>
                    </div>
                    <!--end::Small Box Widget 1-->

                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-lg-3 col-6">
                    <!--begin::Small Box Widget 2-->
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3>30</h3>

                            <p>Live Courses</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path
                                d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25">
                            </path>
                        </svg>
                        <div class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            &nbsp;
                        </div>
                    </div>
                    <!--end::Small Box Widget 2-->
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-lg-3 col-6">
                    <!--begin::Small Box Widget 3-->
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3>230</h3>
                            <p>Total Enrollments</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path
                                d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 0 0 2.25-2.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v2.25A2.25 2.25 0 0 0 6 10.5Zm0 9.75h2.25A2.25 2.25 0 0 0 10.5 18v-2.25a2.25 2.25 0 0 0-2.25-2.25H6a2.25 2.25 0 0 0-2.25 2.25V18A2.25 2.25 0 0 0 6 20.25Zm9.75-9.75H18a2.25 2.25 0 0 0 2.25-2.25V6A2.25 2.25 0 0 0 18 3.75h-2.25A2.25 2.25 0 0 0 13.5 6v2.25a2.25 2.25 0 0 0 2.25 2.25Z">
                            </path>
                        </svg>
                        <div class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            &nbsp;
                        </div>
                    </div>
                    <!--end::Small Box Widget 3-->
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-lg-3 col-6">
                    <!--begin::Small Box Widget 4-->
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3>20</h3>
                            <p>Total Badges</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path
                                d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z">
                            </path>
                        </svg>
                        <div class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            &nbsp;
                        </div>
                    </div>
                    <!--end::Small Box Widget 4-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-8 connectedSortable">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Sales Value</h3>
                        </div>
                        <div class="card-body">
                            <div id="revenue-chart"></div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>

                <!-- Start col -->
                <div class="col-lg-4 connectedSortable">
                    <div class="row g-1 mb-4">
                        <div class="card mb-6">
                            <div class="card-header">
                                <h3 class="card-title">Users</h3>

                                <div class="card-tools">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!--begin::Row-->
                                <div class="row">
                                    <div class="col-12">
                                        <div id="pie-chart"></div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- USERS LIST -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Latest Members</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="row text-center m-1">
                                    <div class="col-3 p-2">
                                        <img class="img-fluid rounded-circle" src="{{ asset('admin/assets/img/waad.png') }}"
                                            alt="User Image" />
                                        <a class="btn fw-bold fs-7 text-secondary text-truncate w-100 p-0" href="#">
                                            Alexander Pierce
                                        </a>
                                        <div class="fs-8">Today</div>
                                    </div>
                                    <div class="col-3 p-2">
                                        <img class="img-fluid rounded-circle" src="{{ asset('admin/assets/img/waad.png') }}"
                                            alt="User Image" />
                                        <a class="btn fw-bold fs-7 text-secondary text-truncate w-100 p-0" href="#">
                                            Norman
                                        </a>
                                        <div class="fs-8">Yesterday</div>
                                    </div>
                                    <div class="col-3 p-2">
                                        <img class="img-fluid rounded-circle"src="{{ asset('admin/assets/img/waad.png') }}"
                                            alt="User Image" />
                                        <a class="btn fw-bold fs-7 text-secondary text-truncate w-100 p-0" href="#">
                                            Jane
                                        </a>
                                        <div class="fs-8">12 Jan</div>
                                    </div>
                                    <div class="col-3 p-2">
                                        <img class="img-fluid rounded-circle" src="{{ asset('admin/assets/img/waad.png') }}"
                                            alt="User Image" />
                                        <a class="btn fw-bold fs-7 text-secondary text-truncate w-100 p-0" href="#">
                                            John
                                        </a>
                                        <div class="fs-8">12 Jan</div>
                                    </div>
                                </div>
                                <!-- /.users-list -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    @endsection
    @push('scripts')
        <!-- ChartJS -->
        <script>
            // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
            // IT'S ALL JUST JUNK FOR DEMO
            // ++++++++++++++++++++++++++++++++++++++++++

            const sales_chart_options = {
                series: [{
                        name: 'Python',
                        data: [28, 48, 40, 19, 86, 27, 90],
                    },
                    {
                        name: 'Java',
                        data: [65, 59, 80, 81, 56, 55, 40],
                    },
                ],
                chart: {
                    height: 300,
                    type: 'area',
                    toolbar: {
                        show: false,
                    },
                },
                legend: {
                    show: false,
                },
                colors: ['#0d6efd', '#20c997'],
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    curve: 'smooth',
                },
                xaxis: {
                    type: 'datetime',
                    categories: [
                        '2023-01-01',
                        '2023-02-01',
                        '2023-03-01',
                        '2023-04-01',
                        '2023-05-01',
                        '2023-06-01',
                        '2023-07-01',
                    ],
                },
                tooltip: {
                    x: {
                        format: 'MMMM yyyy',
                    },
                },
            };

            const sales_chart = new ApexCharts(
                document.querySelector('#revenue-chart'),
                sales_chart_options,
            );
            sales_chart.render();


            //-------------
            // - PIE CHART -
            //-------------

            const pie_chart_options = {
                series: [700, 200, 40],
                chart: {
                    type: 'donut',
                },
                labels: ['Students', 'Instructors', 'Admins'],
                dataLabels: {
                    enabled: false,
                },
                colors: ['#0d6efd', '#20c997', '#ffc107'],
            };

            const pie_chart = new ApexCharts(document.querySelector('#pie-chart'), pie_chart_options);
            pie_chart.render();

            //-----------------
            // - END PIE CHART -
            //-----------------
        </script>
    @endpush
