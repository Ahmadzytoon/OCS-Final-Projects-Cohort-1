@section('title','Signup - Sakan')


<x-guest-layout>
    <div class="auth-layout">
        <div class="auth-sidebar">
            <div class="auth-sidebar-content">
                <a href="{{ url('/') }}" class="text-white text-decoration-none fs-2 fw-bold mb-5 d-block">Sakan</a>
            </div>
            <div class="auth-sidebar-content">
                <blockquote class="auth-quote">
                    "Join thousands of students and owners finding their perfect match."
                </blockquote>
            </div>
            <div class="text-white opacity-50 small">
                &copy; {{ date('Y') }} Sakan Housing Platform.
            </div>
        </div>

        <div class="auth-content">
            <div class="auth-form-wrapper">
                <div class="auth-header">
                    <a href="{{ url('/') }}" class="auth-logo d-lg-none">Sakan</a>
                    <h1 class="auth-title">Create Account</h1>
                    <p class="auth-subtitle">Start your journey with us today.</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="role-selector mb-4">
                        <div class="role-option">
                            <input type="radio" name="role" id="role-student" value="student" class="role-input"
                                {{ old('role', 'student') === 'student' ? 'checked' : '' }}>
                            <label for="role-student" class="role-label">
                                <i class="bi bi-mortarboard fs-3 mb-2"></i>
                                <span>I'm a Student</span>
                            </label>
                        </div>
                        <div class="role-option">
                            <input type="radio" name="role" id="role-owner" value="owner" class="role-input"
                                {{ old('role') === 'owner' ? 'checked' : '' }}>
                            <label for="role-owner" class="role-label">
                                <i class="bi bi-briefcase fs-3 mb-2"></i>
                                <span>I'm an Owner</span>
                            </label>
                        </div>
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>

                    <div class="row g-3">
                        <div class="col-12">
                            <x-input-label for="name" :value="__('Full Name')" class="form-label" />
                            <x-text-input id="name" class="form-control" type="text" name="name"
                                :value="old('name')" required autofocus placeholder="John Doe" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="col-12">
                            <x-input-label for="email" :value="__('Email Address')" class="form-label" />
                            <x-text-input id="email" class="form-control" type="email" name="email"
                                :value="old('email')" required placeholder="name@example.com" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="col-md-6">
                            <x-input-label for="phone" :value="__('Phone')" class="form-label" />
                            <x-text-input id="phone" class="form-control" type="tel" name="phone"
                                :value="old('phone')" required placeholder="+1234567890" />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>

                        <div class="col-md-6">
                            <x-input-label for="gender" :value="__('Gender')" class="form-label" />
                            <select name="gender" id="gender" class="form-select" required>
                                <option value="" selected disabled>Select...</option>
                                <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female
                                </option>
                            </select>
                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                        </div>

                        <div class="col-md-6">
                            <x-input-label for="password" :value="__('Password')" class="form-label" />
                            <x-text-input id="password" class="form-control" type="password" name="password" required
                                placeholder="••••••••" autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="col-md-6">
                            <x-input-label for="password_confirmation" :value="__('Confirm')" class="form-label" />
                            <x-text-input id="password_confirmation" class="form-control" type="password"
                                name="password_confirmation" required placeholder="••••••••"
                                autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-auth w-100 mt-4">
                        {{ __('Sign Up') }}
                    </button>

                    <p class="text-center mt-4 text-muted">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-primary fw-bold text-decoration-none">
                            {{ __('Sign in') }}
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
