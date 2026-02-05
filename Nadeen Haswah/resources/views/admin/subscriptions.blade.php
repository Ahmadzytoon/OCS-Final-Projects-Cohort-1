@extends('admin.layout.master')

@section('title', 'Knowledge Items')

@section('content')
    <div class="page-inner">

        <div class="table-responsive">
            <table id="subscriptions-table" class="display table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Company</th>
                        <th>Plan</th>
                        <th>Users</th>
                        <th>Subscription Status</th>
                        <th>Started At</th>
                        <th>Ends At</th>
                        <th style="width: 15%">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    <!-- Example Row -->
                    <tr>
                        <td>Orange</td>
                        <td>
                            <span class="badge bg-primary">Business</span>
                        </td>
                        <td>98 / 100</td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                        <td>09/07/2024</td>
                        <td>09/07/2025</td>
                        <td>
                            <div class="form-button-action">

                                <!-- View Company -->
                                <a href="{{ route('admin.showCompany') }}">
                                    <button type="button" class="btn btn-icon btn-success btn-round btn-sm"
                                        data-bs-toggle="tooltip" title="View Company">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </a>

                                <!-- Change Plan -->
                                <button type="button" class="btn btn-icon btn-primary btn-round btn-sm"
                                    data-bs-toggle="tooltip" title="Change Plan">
                                    <i class="fa fa-exchange-alt"></i>
                                </button>

                                <!-- Suspend Subscription -->
                                <button type="button" class="btn btn-icon btn-warning btn-round btn-sm"
                                    data-bs-toggle="tooltip" title="Suspend Subscription">
                                    <i class="fa fa-pause"></i>
                                </button>

                                <!-- Cancel Subscription -->
                                <button type="button" class="btn btn-icon btn-danger btn-round btn-sm"
                                    data-bs-toggle="tooltip" title="Cancel Subscription">
                                    <i class="fa fa-times"></i>
                                </button>

                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

@endsection
