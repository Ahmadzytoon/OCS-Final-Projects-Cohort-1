@extends('layouts.owner_master')


@section('title', 'Checkout - Sakan')


@section('head')


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">


@endsection




@section('content')


    <div class="container-fluid p-0">
        <div class="d-flex align-items-center mb-4">
            <a href="owner-plans.html" class="text-decoration-none text-muted me-3"><i class="bi bi-arrow-left"></i> Back to
                Plans</a>
            <h2 class="fw-bold mb-0">Secure Checkout</h2>
        </div>

        <div class="row g-5">
            <!-- Checkout Form -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm p-4">
                    <h4 class="mb-4">Payment Methods</h4>

                    <div class="d-flex gap-3 mb-4">
                        <div class="border rounded p-3 text-center border-primary bg-primary bg-opacity-10"
                            style="cursor: pointer; width: 120px;">
                            <i class="bi bi-credit-card fs-4 text-primary d-block mb-1"></i>
                            <small class="fw-bold text-primary">Card</small>
                        </div>
                        <div class="border rounded p-3 text-center bg-light" style="cursor: pointer; width: 120px;">
                            <i class="bi bi-paypal fs-4 text-muted d-block mb-1"></i>
                            <small class="text-muted">Paypal</small>
                        </div>
                    </div>

                    <form>
                        <div class="mb-3">
                            <label for="cardName" class="form-label">Cardholder Name</label>
                            <input type="text" class="form-control" id="cardName" placeholder="John Doe" required>
                        </div>

                        <div class="mb-3">
                            <label for="cardNumber" class="form-label">Card Number</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="bi bi-credit-card"></i></span>
                                <input type="text" class="form-control border-start-0 ps-0" id="cardNumber"
                                    placeholder="0000 0000 0000 0000" maxlength="19" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="expiryDate" class="form-label">Expiry Date</label>
                                <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY"
                                    maxlength="5" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cvv" class="form-label">CVV / CVC</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="cvv" placeholder="123"
                                        maxlength="4" required>
                                    <span class="input-group-text bg-white" data-bs-toggle="tooltip"
                                        title="3 digits on back of card"><i class="bi bi-question-circle"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="saveCard">
                            <label class="form-check-label text-muted" for="saveCard">
                                Save this card for future payments
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-3 fw-bold fs-5 shadow-sm">Checkout</button>

                        <p class="text-center text-muted small mt-3">
                            <i class="bi bi-lock-fill"></i> Your payment information is encrypted and secure.
                        </p>
                    </form>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-lg-5">
                <div class="card border-0 bg-light p-4">
                    <h4 class="mb-4">Order Summary</h4>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Plan</span>
                        <span class="fw-bold" id="planName">Professional Plan</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Billing Cycle</span>
                        <span class="fw-bold">Monthly</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="h5 mb-0">Total</span>
                        <span class="h3 fw-bold text-primary mb-0" id="planPrice">$20.00</span>
                    </div>

                    <div class="alert alert-info border-0 d-flex align-items-start gap-3">
                        <i class="bi bi-info-circle-fill mt-1"></i>
                        <small>Your subscription will start immediately after payment. You can cancel anytime
                            from your profile settings.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection


@section('js')




    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple script to parse URL params and update summary
        document.addEventListener('DOMContentLoaded', () => {
            const params = new URLSearchParams(window.location.search);
            const plan = params.get('plan');
            const price = params.get('price');

            if (plan && price) {
                const planNameMap = {
                    'starter': 'Starter Plan',
                    'professional': 'Professional Plan',
                    'enterprise': 'Enterprise Plan'
                };

                document.getElementById('planName').textContent = planNameMap[plan] || 'Unknown Plan';
                document.getElementById('planPrice').textContent = '$' + parseFloat(price).toFixed(2);
            }
        });
    </script>


    <script>
        const el = document.getElementById("Apartments");
        el.classList.add("active");
    </script>


@endsection
