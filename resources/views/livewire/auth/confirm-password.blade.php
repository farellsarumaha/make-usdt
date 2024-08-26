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
