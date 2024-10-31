<div class="p-5">
    <p class="font-semibold my-5">Update {{ $getUsername }}</p>
    <form wire:submit="save()">
        <div class="flex flex-col gap-1 mb-4">
            <x-forms.label for="firstname" value="First Name" />
            <x-forms.input wire:model="firstname" id="firstname" name="firstname" placeholder="First Name" />
            <x-forms.error :messages="$errors->get('firstname')" />
        </div>
        <div class="flex flex-col gap-1 mb-4">
            <x-forms.label for="lastname" value="Last Name" />
            <x-forms.input wire:model="lastname" id="lastname" name="lastname" placeholder="Last Name" />
            <x-forms.error :messages="$errors->get('lastname')" />
        </div>
        <div class="flex justify-end gap-1">
            <x-buttons.default-button wire:click="cancel()" name="Cancel"/>
            <x-buttons.blue-button type="submit" name="Save"/>
        </div>
    </form>
</div>
