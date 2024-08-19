<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Locked;
use Livewire\Volt\Component;

new #[\Livewire\Attributes\Layout('components.layouts.guest')] class extends Component {
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
        $this->redirect(route('home'), navigate: true);
        noty()->info('Successfully change password, always remember your password and do not tell anyone.');
    }
}; ?>

<form wire:submit="resetPassword()">
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
        <x-button wire:click="resetPassword()" value="Reset Password" color="blue" class="w-full text-sm" />
        <x-button wire:click="toLogin()" value="Already have an account?" class="w-full text-sm" />
        <x-button wire:click="toRegister()" value="Don't have an account?" class="w-full text-sm" />
    </div>
</form>
