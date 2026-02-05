@extends('provider.layouts.app')
@section('title', 'Cleanova | Provider Profile')

@section('content')
    <div class="container-fluid">
        <div class="cc-page-head mb-3">
            <h2 class="fw-bold mb-1">Profile</h2>
            <p class="text-muted mb-0">Keep your information up to date for customers.</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row g-4">
            <div class="col-12 col-xl-4">
                <div class="card cc-shell-card">
                    <div class="card-body p-4 text-center">
                        <img src="{{ asset('provider/img/images.jpg') }}" class="cc-profile-avatar-lg" alt="Avatar">
                        <h5 class="fw-bold mt-3 mb-1">{{ $user->name }}</h5>
                        <div class="text-muted small mb-3">Verified Provider</div>

                        <button class="btn btn-outline-primary w-100 cc-btn-outline" type="button">
                            Change photo    
                        </button>

                        <div class="text-muted small mt-3">
                            Tip: In real app, upload will be connected to backend.
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-8">
                <div class="card cc-shell-card">
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('provider.profile.update') }}">
                            @csrf
                            @method('PATCH')

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold mb-0">Personal Information</h5>
                                <button class="btn btn-primary cc-book-btn px-4" type="submit">Save</button>
                            </div>

                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label class="form-label small fw-semibold">Full name</label>
                                    <input class="form-control" name="name" value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label small fw-semibold">Email</label>
                                    <input class="form-control" value="{{ $user->email }}" disabled>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label small fw-semibold">Phone</label>
                                    <input class="form-control" name="phone" value="{{ old('phone', $user->phone) }}">
                                    @error('phone')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label small fw-semibold">Zip Code</label>
                                    <input class="form-control" name="zip_code"
                                        value="{{ old('zip_code', $profile?->zip_code) }}">
                                    @error('zip_code')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label small fw-semibold">Bio</label>
                                    <textarea class="form-control" name="bio" rows="4">{{ old('bio', $profile?->bio) }}</textarea>
                                    @error('bio')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
