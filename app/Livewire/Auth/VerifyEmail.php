<?php

namespace App\Livewire\Auth;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("components.layouts.guest")]
class VerifyEmail extends Component
{
    public function sendVerification(): void
    {
        if (Auth::user()->hasVerifiedEmail()) {
            $this->redirectRoute('home');
            return;
        }
        Auth::user()->sendEmailVerificationNotification();
        noty()->info('A new verification link has been sent to the email address you provided during registration.');
    }

    public function logout(): void
    {
        Auth::guard('web')->logout();
        Session::invalidate();
        Session::regenerateToken();
        $this->redirectRoute('home');
        noty()->info('Goodbye.');
    }

    public function toHome(): void
    {
        $this->redirectRoute('home');
    }

    public function render(): Factory|Application|\Illuminate\Contracts\View\View|View
    {
        return view('livewire.auth.verify-email');
    }
}
