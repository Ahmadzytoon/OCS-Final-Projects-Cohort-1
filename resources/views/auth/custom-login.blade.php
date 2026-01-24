@extends('layouts.visitor')

@section('title', 'Code Quest | Login')

@section('content')

    <main class="main">
        <!-- Enroll Section -->
        <section id="enroll" class="enroll section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-5">
                        <div class="enrollment-form-wrapper p-4 shadow rounded bg-white">
                            <div class="enrollment-header text-center mb-4" data-aos="fade-up" data-aos-delay="200">
                                <h2>Welcome Back!</h2>
                                <p>Log in to continue your learning journey</p>
                            </div>
                            <form method="POST" action="{{ route('login') }}" class="enrollment-form" data-aos="fade-up"
                                data-aos-delay="300">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" id="email" name="email" class="form-control" required
                                        autocomplete="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label">Password *</label>
                                    <input type="password" id="password" name="password" class="form-control" required
                                        autocomplete="current-password">
                                    @error('password')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-enroll w-100">Login</button>
                                    <p class="enrollment-note mt-3">
                                        Don't have an account? <a href="{{ route('register') }}">Sign up</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Enroll Section -->
    </main>

@endsection
