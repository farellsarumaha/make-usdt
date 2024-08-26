<?php

namespace App\Livewire\Auth;

use Auth;
use Illuminate\Validation\ValidationException;
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
        $this->redirectIntended(default: route('home', absolute: false), navigate: true);
        noty()->info('Successful, do not tell your password to anyone.');
    }

    public function toHome()
    {
        $this->redirect(route('home'), navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.confirm-password');
    }
}
