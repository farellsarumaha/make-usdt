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
