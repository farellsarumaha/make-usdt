<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("components.layouts.guest")]
class ForgotPassword extends Component
{
    public string $email = '';

    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        $status = Password::sendResetLink($this->only('email'));

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');
        noty()->info('Please check your email, forgot password request has been sent.');
    }

    public function toLogin()
    {
        $this->redirect(route('login'), navigate: true);
    }

    public function toRegister()
    {
        $this->redirect(route('login'), navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
