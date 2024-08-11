<?php

use Illuminate\Support\Facades\Password;
use Livewire\Volt\Component;

new #[\Livewire\Attributes\Layout('components.layouts.guest')] class extends Component {

    public string $email = '';

    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');
        noty()->info('Please check your email, forgot password request has been sent.');
    }

    public function toLogin() { $this->redirect(route('login'), navigate: true); }
    public function toRegister() { $this->redirect(route('login'), navigate: true); }
}; ?>

<form wire:submit="sendPasswordResetLink()">
    <div class="flex mb-4">
        <p class="text-xs text-justify">Forgot password is a common situation where users cannot remember the correct password to access their account. The password recovery process usually involves verifying your identity via email. Click forgot password then check your email.</p>
    </div>
    <div class="flex flex-col gap-1 mb-4">
        <x-label for="email" value="Email Address"/>
        <x-input wire:model="email" id="email" name="email" placeholder="Email Address"/>
        <x-error :messages="$errors->get('email')"/>
    </div>
    <div class="flex flex-col gap-1">
        <x-button wire:click="sendPasswordResetLink()" value="Forgot Password" color="blue" class="w-full text-sm"/>
        <x-button wire:click="toRegister()" value="Don't have an account?" class="w-full text-sm"/>
        <x-button wire:click="toLogin()" value="Already have an account?" class="w-full text-sm"/>
    </div>
</form>
