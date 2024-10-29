<?php

namespace App\Livewire\Auth;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
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

    public function toLogin(): void
    {
        $this->redirectRoute('login');
    }

    public function toRegister(): void
    {
        $this->redirectRoute('register');
    }

    public function render(): Factory|Application|\Illuminate\Contracts\View\View|View
    {
        return view('livewire.auth.forgot-password');
    }
}
