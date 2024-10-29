<?php

namespace App\Livewire\Auth;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Locked;
use Livewire\Component;

#[Layout("components.layouts.guest")]
class ResetPassword extends Component
{
    #[Locked]
    public string $token = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function mount(string $token): void
    {
        $this->token = $token;
        $this->email = request()->string('email');
    }

    public function resetPassword(): void
    {
        $this->validate([
            'token' => ['required'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'confirmed', \Illuminate\Validation\Rules\Password::default()],
        ]);
        $status = Password::reset($this->only('email', 'password', 'password_confirmation', 'token'), function ($user) {
            $user
                ->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])
                ->save();

            event(new PasswordReset($user));
        });
        if ($status != Password::PASSWORD_RESET) {
            $this->addError('email', __($status));
            return;
        }
        $this->redirectRoute('home');
        noty()->info('Successfully change password, always remember your password and do not tell anyone.');
    }

    public function render(): Factory|Application|\Illuminate\Contracts\View\View|View
    {
        return view('livewire.auth.reset-password');
    }
}
