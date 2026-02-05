{{-- @extends('site.loging.layout.mater') --}}
@extends('site.layout.mater')
@section('content_forms')
    <!-- Access Request Form -->
    <div id="access-request-form" class="form-container mt-5">
        <h2 class="form-title">Request Access</h2>
        <form action="" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Your full name"
                    required>
            </div>
            <div class="mb-3">
                <label for="request-email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="request-email" placeholder="name@company.com"
                    required>
            </div>
            <div class="mb-3">
                <label for="department" class="form-label">Department</label>
                <select class="form-select" id="department" required>
                    <option value="" selected disabled>Select department</option>
                    <option value="hr">Human Resources</option>
                    <option value="it">Information Technology</option>
                    <option value="sales">Sales</option>
                    <option value="marketing">Marketing</option>
                    <option value="finance">Finance</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" rows="4" placeholder="Briefly explain why you need access..."
                    required></textarea>
            </div>
            <button type="submit" class="btn-submit">Submit Request</button>
        </form>

        <div class="form-switch">
            <p>Already have an account? <a href="login.html" class="fw-bold">Sign in here</a></p>
        </div>
    </div>
@endsection
