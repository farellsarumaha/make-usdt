<?php

use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component {
    public string $password = '';

    /**
     * Confirm the current user's password.
     */
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
}; ?>

<form wire:submit="confirmPassword()">
    <div class="flex mb-4">
        <p class="text-xs text-justify">This is a secure area of the application. Please confirm your password before
            continuing.</p>
    </div>
    <div class="flex flex-col gap-1 mb-4">
        <x-label for="password" value="Password" />
        <x-input wire:model="password" id="password" name="password" placeholder="Password" type="password" />
        <x-error :messages="$errors->get('password')" />
    </div>
    <div class="flex flex-col gap-1">
        <x-button wire:click="confirmPassword()" value="Confirm Password" color="blue" class="w-full text-sm" />
        <x-button wire:click="toHome()" value="Back to Home" class="w-full text-sm" />
    </div>
</form>
