<form wire:submit="confirmPassword()">
    <div class="flex mb-4">
        <p class="text-xs text-justify">This is a secure area of the application. Please confirm your password before
            continuing.</p>
    </div>
    <div class="flex flex-col gap-1 mb-4">
        <x-forms.label for="password" value="Password" />
        <x-forms.input wire:model="password" id="password" name="password" placeholder="Password" type="password" />
        <x-forms.error :messages="$errors->get('password')" />
    </div>
    <div class="flex flex-col gap-1">
        <x-buttons.blue-button type="submit" name="Confirm Password"/>
        <x-buttons.default-button wire:click="toHome()" name="Back to Home"/>
    </div>
</form>
