<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.visitor')] class extends Component
 {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $user = Auth::user();

        if ($user->role === 'student') {
             $this->redirectIntended(default: route('student.home', absolute: false));
        } elseif ($user->role === 'instructor') {
             $this->redirectIntended(default: route('instructor.home', absolute: false));
        } elseif ($user->role === 'admin') {
             $this->redirectIntended(default: route('admin.dashboard', absolute: false));
        } else {
             $this->redirectIntended(default: route('dashboard', absolute: false));
        }
    }
}; ?>

<div>
    <main class="main">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <section id="enroll" class="enroll section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-5">
                        <div class="enrollment-form-wrapper p-4 shadow rounded bg-white">
                            <div class="enrollment-header text-center mb-4" data-aos="fade-up" data-aos-delay="200">
                                <h2>Welcome Back!</h2>
                                <p>Log in to continue your learning journey</p>
                            </div>
                            <form wire:submit="login" class="enrollment-form" data-aos="fade-up" data-aos-delay="300">
                                @csrf

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" id="email" wire:model="form.email" name="email"
                                        class="form-control" required autofocus autocomplete="email">
                                    <x-input-error :messages="$errors->get('form.email')" class="mt-2" />

                                </div>

                                <div class="mb-4">
                                    <label for="password" class="form-label">Password *</label>
                                    <input type="password" id="password" wire:model="form.password" name="password"
                                        class="form-control" required autocomplete="password">
                                    <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                                </div>

                                <!-- Remember Me -->
                                <div class="block mt-4">
                                    <label for="remember" class="inline-flex items-center">
                                        <input wire:model="form.remember" id="remember" type="checkbox"
                                            class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                            name="remember">
                                        <span
                                            class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                                    </label>
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                            href="{{ route('password.request') }}" wire:navigate>
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                </div>

                                <div class="text-center ms-3">
                                    <button type="submit" class="btn btn-enroll w-100">
                                        Login
                                    </button>

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
</div>
