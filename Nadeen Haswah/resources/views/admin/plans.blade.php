@extends('admin.layout.master')

@section('title', 'Knowledge Items')


@section('content')
    <div class="page-inner">
        {{-- <h3 class="fw-bold mb-4">Subscription Plans</h3> --}}
        <div class="card-header">
            <div class="d-flex align-items-center  justify-content-between">
                <h4 class="card-title">Subscription Plans</h4>

                <a href="{{ route('admin.addPlan') }}">
                    <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Add Plan
                    </button>
                </a>
            </div>
        </div>

        <div class="row justify-content-center align-items-stretch mb-5 mt-5">

            <!-- Starter Plan -->
            <div class="col-md-4">
                <div class="card card-pricing2 card-success h-100">

                    <div class="pricing-header text-center">
                        <h3 class="fw-bold mb-2">Starter</h3>
                        <span class="sub-title text-muted">For small teams & trials</span>
                    </div>

                    <div class="price-value text-center my-3">
                        <div class="value">
                            <span class="currency">$</span>
                            <span class="amount">0</span>
                            <span class="month">/trial</span>
                        </div>
                    </div>

                    <ul class="pricing-content text-start px-4">
                        <li>👥 Max Users: 5</li>
                        <li>🏢 Max Departments: 2</li>
                        <li>📚 Knowledge Cards: 100</li>
                        <li>🤖 AI Requests: 50 / month</li>
                        <li>⏳ Trial: 14 days</li>
                    </ul>

                    <div class="text-center mt-auto mb-3">
                        <a href="{{ route('admin.editPlan') }}">
                            <button class="btn btn-sm btn-outline-primary me-2">✏️ Edit</button>
                        </a>
                        <button class="btn btn-sm btn-outline-danger">🗑 Delete</button>
                    </div>

                </div>
            </div>

            <!-- Business Plan -->
            <div class="col-md-4">
                <div class="card card-pricing2 card-primary h-100">

                    <div class="pricing-header text-center">
                        <h3 class="fw-bold mb-2">Business</h3>
                        <span class="sub-title text-muted">For growing companies</span>
                    </div>

                    <div class="price-value text-center my-3">
                        <div class="value">
                            <span class="currency">$</span>
                            <span class="amount">29</span>
                            <span class="month">/month</span>
                        </div>
                    </div>

                    <ul class="pricing-content text-start px-4">
                        <li>👥 Max Users: 50</li>
                        <li>🏢 Max Departments: 10</li>
                        <li>📚 Knowledge Cards: 5,000</li>
                        <li>🤖 AI Requests: 1,000 / month</li>
                        <li>📅 Public & Private Calendars</li>
                        <li>📰 Company News</li>
                    </ul>

                    <div class="text-center mt-auto mb-3">
                        <a href="{{ route('admin.editPlan') }}">
                            <button class="btn btn-sm btn-outline-primary me-2">✏️ Edit</button>
                        </a> <button class="btn btn-sm btn-outline-danger">🗑 Delete</button>
                    </div>

                </div>
            </div>

            <!-- Enterprise Plan -->
            <div class="col-md-4">
                <div class="card card-pricing2 card-secondary h-100">

                    <div class="pricing-header text-center">
                        <h3 class="fw-bold mb-2">Enterprise</h3>
                        <span class="sub-title text-muted">For large organizations</span>
                    </div>

                    <div class="price-value text-center my-3">
                        <div class="value">
                            <span class="currency">$</span>
                            <span class="amount">99</span>
                            <span class="month">/month</span>
                        </div>
                    </div>

                    <ul class="pricing-content text-start px-4">
                        <li>👥 Unlimited Users</li>
                        <li>🏢 Unlimited Departments</li>
                        <li>📚 Unlimited Knowledge Cards</li>
                        <li>🤖 Unlimited AI Requests</li>
                        <li>🧠 Advanced Knowledge Analytics</li>
                        <li>🔐 Custom Roles & Permissions</li>
                        <li>📞 Priority Support</li>
                    </ul>

                    <div class="text-center mt-auto mb-3">
                        <a href="{{ route('admin.editPlan') }}">
                            <button class="btn btn-sm btn-outline-primary me-2">✏️ Edit</button>
                        </a> <button class="btn btn-sm btn-outline-danger">🗑 Delete</button>
                    </div>

                </div>
            </div>

        </div>


    </div>
@endsection
