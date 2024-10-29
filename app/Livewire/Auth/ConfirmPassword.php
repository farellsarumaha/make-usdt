<?php

namespace App\Livewire\Auth;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("components.layouts.app")]
class ConfirmPassword extends Component
{
    public string $password = '';

    public function confirmPassword(): void
    {
        $this->validate([
            'password' => ['required', 'string'],
        ]);
        if (
            !Auth::guard('web')->validate([
                'email' => Auth::user()->email,
                'password' => $this->password,
            ])
        ) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }
        session(['auth.password_confirmed_at' => time()]);
        $this->redirectRoute('home');
        noty()->info('Successful, do not tell your password to anyone.');
    }

    public function toHome(): void
    {
        $this->redirectRoute('home');
    }

    public function render(): Factory|Application|\Illuminate\Contracts\View\View|View
    {
        return view('livewire.auth.confirm-password');
    }
}
