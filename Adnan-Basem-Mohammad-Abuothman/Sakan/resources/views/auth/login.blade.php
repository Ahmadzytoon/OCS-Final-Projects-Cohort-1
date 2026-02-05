
@section('title','Login - Sakan')

<x-guest-layout>
    <div class="auth-layout">
        <div class="auth-sidebar">
            <div class="auth-sidebar-content">
                <a href="{{ url('/') }}" class="text-white text-decoration-none fs-2 fw-bold mb-5 d-block">Sakan</a>
            </div>
            <div class="auth-sidebar-content">
                <blockquote class="auth-quote">
                    "Finding a place to call home during your studies has never been this easy and secure."
                </blockquote>
                <div class="auth-quote-author">
                    &mdash; The Sakan Team
                </div>
            </div>
            <div class="text-white opacity-50 small">
                &copy; {{ date('Y') }} Sakan Housing Platform.
            </div>
        </div>

        <div class="auth-content">
            <div class="auth-form-wrapper">
                <div class="auth-header">
                    <a href="{{ url('/') }}" class="auth-logo d-lg-none">Sakan</a>
                    <h1 class="auth-title">Welcome Back</h1>
                    <p class="auth-subtitle">Please enter your details to sign in.</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Email Address')" class="form-label" />
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <x-text-input id="email" class="form-control" type="email" name="email"
                                :value="old('email')" required autofocus placeholder="name@example.com" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="password" :value="__('Password')" class="form-label" />
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <x-text-input id="password" class="form-control" type="password" name="password"
                                placeholder="••••••••" required autocomplete="current-password" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <label for="remember_me" class="form-check-label text-muted small">
                                {{ __('Remember me') }}
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="text-primary text-decoration-none fw-semibold small">
                                {{ __('Forgot Password?') }}
                            </a>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary btn-auth w-100">Sign In</button>

                    {{-- <x-primary-button class="btn btn-primary btn-auth w-100">
                        {{ __('Sign In') }}
                    </x-primary-button> --}}

                    <p class="text-center mt-4 text-muted">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="text-primary fw-bold text-decoration-none">
                            Create free account
                        </a>
                    </p>
                    <p class="text-center mt-4 text-muted">
                        
                        <a href="{{ route('index') }}" style="" class="text-dark fw-bold text-decoration-none">
                            Back to home
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
