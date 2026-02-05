@extends('layouts.owner_master')


@section('title', 'My Profile - Owner Dashboard')


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
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}"> <!-- Reusing profile styles -->

@endsection



@section('content')



    <!-- Profile Header Card (Adapted from profile.html but without navbar padding) -->
    <div class="profile-header-card mb-5">
        <h2 class="fw-bold fs-1">My Profile</h2><br><br>
        <div class="profile-avatar-wrapper">
            <img src="https://ui-avatars.com/api/?name=Alex+Johnson&background=fff&color=1E3A8A&size=128" alt="Profile"
                class="profile-avatar">
            <div class="profile-edit-btn">
                <i class="bi bi-camera-fill"></i>
            </div>
        </div>
    </div>

    <!-- Profile Form -->
    <div class="profile-form-card">
        <form>
            <div class="section-label">Personal Information</div>
            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullName" value="Alex Johnson">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" value="alex.j@example.com" disabled>
                    <div class="form-text">Contact support to change email.</div>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" value="+1 234 567 8900">
                </div>
            </div>

            <div class="section-label">Security</div>
            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <label for="currentPassword" class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="currentPassword" placeholder="••••••••">
                </div>
                <div class="col-md-6">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="newPassword" placeholder="Leave blank to keep current">
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-5">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>



@endsection


@section('js')

    <script>
        const el = document.getElementById("Profile");
        el.classList.add("active");
    </script>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
