<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("components.layouts.guest")]
class VerifyEmail extends Component
{
    public function sendVerification(): void
    {
        if (Auth::user()->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('home', absolute: false), navigate: true);
            return;
        }
        Auth::user()->sendEmailVerificationNotification();
        noty()->info('A new verification link has been sent to the email address you provided during registration.');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        Session::invalidate();
        Session::regenerateToken();
        $this->redirect(route('home'), navigate: true);
        noty()->info('Goodbye.');
    }

    public function toHome()
    {
        $this->redirect(route('home'), navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.verify-email');
    }
}
