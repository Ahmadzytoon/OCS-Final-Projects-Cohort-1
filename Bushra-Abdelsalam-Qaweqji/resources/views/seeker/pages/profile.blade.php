@extends('seeker.layouts.app')
@section('title', 'Cleanova | My Profile')

@section('content')
    <section class="cc-section pt-4">
        <div class="container">

            <div
                class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2 mb-3">
                <div>
                    <h2 class="fw-bold mb-1">My Profile</h2>
                    <p class="text-muted mb-0">Update your details to make booking faster.</p>
                </div>
                <a href="{{ route('seeker.dashboard') }}" class="btn btn-outline-primary cc-btn-outline">
                    Back to Dashboard
                </a>
            </div>

            <div class="row g-4">
                {{-- Left card (avatar + quick actions) --}}
                <div class="col-12 col-lg-4">
                    <div class="card cc-shell-card">
                        <div class="card-body p-4 text-center">
                            <img src="{{ asset('seeker/img/images.jpg') }}" class="cc-profile-avatar-lg"
                                alt="Profile photo">

                            <h5 class="fw-bold mt-3 mb-1">Eman</h5>
                            <div class="text-muted small mb-3">Customer Account</div>

                            <button type="button" class="btn btn-outline-primary w-100 cc-btn-outline">
                                Change Photo (demo)
                            </button>

                            <hr class="cc-hr my-4">

                            <div class="d-grid gap-2">
                                <a href="{{ route('seeker.bookings.index') }}" class="btn btn-primary cc-book-btn">My
                                    Bookings</a>
                                <a href="{{ route('seeker.providers-list') }}"
                                    class="btn btn-outline-primary cc-btn-outline">Find
                                    Cleaners</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger w-100">Sign Out</button>
                                </form>
                            </div>

                            <div class="text-muted small mt-3">
                                This is UI only. Real account settings will be connected later.
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right cards (forms) --}}
                <div class="col-12 col-lg-8">

                    {{-- Personal info --}}
                    <div class="card cc-shell-card mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold mb-0">Personal Information</h5>
                                <button type="button" class="btn btn-primary cc-book-btn px-4">Save</button>
                            </div>

                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label class="form-label small fw-semibold">First Name</label>
                                    <input class="form-control" value="Eman">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label small fw-semibold">Last Name</label>
                                    <input class="form-control" value="Kawikji">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label small fw-semibold">Email</label>
                                    <input class="form-control" type="email" value="eman@email.com">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label small fw-semibold">Phone</label>
                                    <input class="form-control" value="+962 7X XXX XXXX">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Default address --}}
                    <div class="card cc-shell-card mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Default Address</h5>
                            <p class="text-muted small mb-3">This helps you book faster (you can still change it during
                                checkout).</p>

                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label small fw-semibold">Street Address</label>
                                    <input class="form-control" placeholder="e.g., 12 King Abdullah St.">
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label small fw-semibold">City</label>
                                    <input class="form-control" placeholder="Amman">
                                </div>

                                <div class="col-12 col-md-3">
                                    <label class="form-label small fw-semibold">Zip</label>
                                    <input class="form-control" placeholder="11181">
                                </div>

                                <div class="col-12 col-md-3">
                                    <label class="form-label small fw-semibold">Unit</label>
                                    <input class="form-control" placeholder="Apt 3B">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Preferences --}}
                    <div class="card cc-shell-card">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Preferences</h5>

                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label class="form-label small fw-semibold">Preferred Language</label>
                                    <select class="form-select">
                                        <option selected>English</option>
                                        <option>Arabic</option>
                                    </select>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label small fw-semibold">Notifications</label>
                                    <select class="form-select">
                                        <option selected>Email + SMS</option>
                                        <option>Email only</option>
                                        <option>SMS only</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="form-label small fw-semibold">Default Notes for Cleaners</label>
                                    <textarea class="form-control" rows="4" placeholder="e.g., Please focus on kitchen and bathrooms. We have a cat."></textarea>
                                    <div class="text-muted small mt-2">
                                        These notes will be pre-filled during checkout (you can edit them per booking).
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-column flex-sm-row gap-2 mt-4">
                                <button type="button" class="btn btn-primary cc-book-btn px-4">Save
                                    Changes</button></button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
