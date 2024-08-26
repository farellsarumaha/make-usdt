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
