<?php

use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component {

    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', \Illuminate\Validation\Rules\Password::default(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
        noty()->info('Successfully changed password.');
    }

}; ?>

<form wire:submit="updatePassword()">
    <div class="flex flex-col gap-1 mb-4">
        <x-label for="current_password" value="Current Password"/>
        <x-input wire:model="current_password" id="current_password" name="current_password" placeholder="Current Password" type="password"/>
        <x-error :messages="$errors->get('current_password')"/>
    </div>
    <div class="flex flex-col gap-1 mb-4">
        <x-label for="password" value="Password"/>
        <x-input wire:model="password" id="password" name="password" placeholder="Password" type="password"/>
        <x-error :messages="$errors->get('password')"/>
    </div>
    <div class="flex flex-col gap-1 mb-4">
        <x-label for="password_confirmation" value="Confirm Password"/>
        <x-input wire:model="password_confirmation" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" type="password"/>
        <x-error :messages="$errors->get('password_confirmation')"/>
    </div>
    <div class="flex flex-col gap-1">
        <x-button wire:click="updatePassword()" value="Change Password" color="blue" class="text-sm w-48"/>
    </div>
</form>
