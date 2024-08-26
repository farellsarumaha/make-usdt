<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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

    public function register()
    {
        $validated = $this->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'lowercase', 'max:25', 'alpha_dash:ascii', 'unique:' . User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', \Illuminate\Validation\Rules\Password::default()],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        event(new \Illuminate\Auth\Events\Registered(($user = User::create($validated))));
        \Illuminate\Support\Facades\Auth::login($user);
        $this->redirect(route('home', absolute: false), navigate: true);
        noty()->info("Your account has been registered. Don't forget to verify your email to increase the security of your account.");
    }

    public function toLogin()
    {
        $this->redirect(route('login'), navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
