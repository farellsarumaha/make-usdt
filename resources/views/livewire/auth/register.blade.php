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
