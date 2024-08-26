<form wire:submit="deleteUser()">
    <div class="flex flex-col gap-1 mb-4">
        <x-label for="password" value="Password" />
        <x-input wire:model="password" id="password" name="password" placeholder="Password" type="password" />
        <x-error :messages="$errors->get('password')" />
    </div>
    <div class="flex flex-col gap-1">
        <x-button wire:click="deleteUser()" value="Delete Account" color="blue" class="text-sm w-48" />
    </div>
</form>
