<?php

use App\Models\User;
use Livewire\Volt\Component;

new #[\Livewire\Attributes\Layout('components.layouts.guest')] class extends Component {
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
};
?>

<form wire:submit="register()">
    <div class="flex flex-col gap-1 mb-4">
        <x-label for="firstname" value="First Name" />
        <x-input wire:model="firstname" id="firstname" name="firstname" placeholder="First Name" />
        <x-error :messages="$errors->get('firstname')" />
    </div>
    <div class="flex flex-col gap-1 mb-4">
        <x-label for="lastname" value="Last Name" />
        <x-input wire:model="lastname" id="lastname" name="lastname" placeholder="Last Name" />
        <x-error :messages="$errors->get('lastname')" />
    </div>
    <div class="flex flex-col gap-1 mb-4">
        <x-label for="username" value="Username" />
        <x-input wire:model="username" id="username" name="username" placeholder="Username" />
        <x-error :messages="$errors->get('username')" />
    </div>
    <div class="flex flex-col gap-1 mb-4">
        <x-label for="email" value="Email Address" />
        <x-input wire:model="email" id="email" name="email" placeholder="Email Address" />
        <x-error :messages="$errors->get('email')" />
    </div>
    <div class="flex flex-col gap-1 mb-4">
        <x-label for="password" value="Password" />
        <x-input wire:model="password" id="password" name="password" placeholder="Password" type="password" />
        <x-error :messages="$errors->get('password')" />
    </div>
    <div class="flex flex-col gap-1 mb-4">
        <x-label for="password_confirmation" value="Confirm Password" />
        <x-input wire:model="password_confirmation" id="password_confirmation" name="password_confirmation"
            placeholder="Confirm Password" type="password" />
        <x-error :messages="$errors->get('password_confirmation')" />
    </div>
    <div class="flex flex-col gap-1">
        <x-button wire:click="register()" value="Register" color="blue" class="w-full text-sm" />
        <x-button wire:click="toLogin()" value="Already have an account?" class="w-full text-sm" />
    </div>
</form>
