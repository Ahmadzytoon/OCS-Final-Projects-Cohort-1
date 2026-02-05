@extends('admin.layout.master')

@section('title', 'Knowledge Items')


@section('content')

    <div class="page-inner">
        <form>

            <h4 class="fw-bold mb-3">Create New Plan</h4>

            <div class="row">

                <!-- Plan Name -->
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        <label>Plan Name</label>
                        <input type="text" class="form-control" placeholder="e.g. Starter, Pro">
                    </div>
                </div>

                <!-- Price -->
                <div class="col-md-3">
                    <div class="form-group form-group-default">
                        <label>Price ($)</label>
                        <input type="number" class="form-control" placeholder="0">
                    </div>
                </div>

                <!-- Billing Cycle -->
                <div class="col-md-3">
                    <div class="form-group form-group-default">
                        <label>Billing Cycle</label>
                        <select class="form-control">
                            <option>Monthly</option>
                            <option>Yearly</option>
                            <option>Trial</option>
                        </select>
                    </div>
                </div>

                <!-- Limits -->
                <div class="col-md-4">
                    <div class="form-group form-group-default">
                        <label>Max Users</label>
                        <input type="number" class="form-control" placeholder="10">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group form-group-default">
                        <label>Knowledge Cards Limit</label>
                        <input type="number" class="form-control" placeholder="500">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group form-group-default">
                        <label>AI Requests / Month</label>
                        <input type="number" class="form-control" placeholder="1000">
                    </div>
                </div>

                <!-- Trial -->
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        <label>Trial Days (optional)</label>
                        <input type="number" class="form-control" placeholder="14">
                    </div>
                </div>

                <!-- Status -->
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        <label>Status</label>
                        <select class="form-control">
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>
                </div>

            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    Save Plan
                </button>
                <button type="button" class="btn btn-danger">
                    Cancel
                </button>
            </div>

        </form>

    </div>
@endsection
