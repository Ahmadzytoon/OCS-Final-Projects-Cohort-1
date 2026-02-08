<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.visitor')] class extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
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
                                <h2>Reset Password</h2>
                                <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                            </div>
                            <form wire:submit="sendPasswordResetLink" class="enrollment-form" data-aos="fade-up" data-aos-delay="300">
                                @csrf

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" id="email" wire:model="email" name="email"
                                        class="form-control" required autofocus autocomplete="email">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                </div>

                                <div class="text-center ms-3">
                                    <button type="submit" class="btn btn-enroll w-100">
                                       Email Password Reset Link
                                    </button>
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
