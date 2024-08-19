<?php

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component {
    public string $firstname = '';
    public string $lastname = '';
    public string $username = '';
    public string $email = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->firstname = Auth::user()->firstname;
        $this->lastname = Auth::user()->lastname;
        $this->username = Auth::user()->username;
        $this->email = Auth::user()->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'lowercase', 'max:25', 'alpha_dash:ascii', Rule::unique(User::class)->ignore($user->id)],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
        noty()->info('Successfully changed profile information.');
    }
}; ?>

<form wire:submit="updateProfileInformation()">
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
    <div class="flex flex-col gap-1">
        <x-button wire:click="updateProfileInformation()" value="Save" color="blue" class="text-sm w-40" />
    </div>
</form>
