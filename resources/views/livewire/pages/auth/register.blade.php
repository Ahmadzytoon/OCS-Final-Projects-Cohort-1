<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.visitor')] class extends Component 
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'student';

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(route('student.home', absolute: false));
    }
}; ?>

<div >
    <main class="main">

        <!-- Enroll Section -->
        <section id="enroll" class="enroll section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="enrollment-form-wrapper">

                            <div class="enrollment-header text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                                <h2>Create Your Account</h2>
                                <p>Start your coding quest today!</p>
                            </div>

                            <form wire:submit="register" class="enrollment-form" data-aos="fade-up"
                                data-aos-delay="300">

                                <div class="row mb-4">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="fullName" class="form-label">Full Name *</label>
                                            <input wire:model="name" type="text" id="fullName" name="fullName"
                                                class="form-control" required autocomplete="name">
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email *</label>
                                            <input wire:model="email" type="email" id="email" name="email"
                                                class="form-control" required autocomplete="email">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="password" class="form-label">Password *</label>
                                            <input wire:model="password" type="password" id="password" name="password"
                                                class="form-control" required autocomplete="new-password">
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="confirmPassword" class="form-label">Confirm Password *</label>
                                            <input wire:model="password_confirmation" type="password"
                                                id="confirmPassword" name="confirmPassword" class="form-control"
                                                required autocomplete="new-password">
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-enroll">
                                            Create Account
                                        </button>
                                        <p class="enrollment-note mt-3">
                                            Already have an account? <a href="{{ route('login') }}">Login</a>
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 text-left">
                                        <p class="enrollment-note mt-3">
                                            By signing up, you agree to our
                                            <a href="#">Terms of Service</a> and
                                            <a href="#">Privacy Policy</a>.
                                        </p>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div><!-- End Form Column -->

                </div>

            </div>

        </section><!-- /Enroll Section -->

    </main>
</div>
