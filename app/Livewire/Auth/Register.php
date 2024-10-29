<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("components.layouts.guest")]
class Register extends Component
{
    public string $firstname = '';
    public string $lastname = '';
    public string $username = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function register(): void
    {
        $validated = $this->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'lowercase', 'max:25', 'alpha_dash:ascii', 'unique:' . User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Password::default()],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        event(new Registered(($user = User::create($validated))));
        Auth::login($user);
        $this->redirectRoute('home');
        noty()->info("Your account has been registered. Don't forget to verify your email to increase the security of your account.");
    }

    public function toLogin(): void
    {
        $this->redirectRoute('login');
    }

    public function render(): Factory|Application|\Illuminate\Contracts\View\View|View
    {
        return view('livewire.auth.register');
    }
}
