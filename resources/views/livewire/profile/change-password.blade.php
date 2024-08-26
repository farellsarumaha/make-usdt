<form wire:submit="updatePassword()">
    <div class="flex flex-col gap-1 mb-4">
        <x-label for="current_password" value="Current Password" />
        <x-input wire:model="current_password" id="current_password" name="current_password" placeholder="Current Password"
            type="password" />
        <x-error :messages="$errors->get('current_password')" />
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
        <x-button wire:click="updatePassword()" value="Change Password" color="blue" class="text-sm w-48" />
    </div>
</form>
