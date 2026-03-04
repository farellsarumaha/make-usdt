<div class="p-5">
    <div class="flex items-center gap-4 mb-6">
        <h6 class="font-extrabold hidden md:flex">Admin Panel</h6>
        <span>|</span>
        <p class="text-xs bg-gray-600 px-2 py-1 rounded-lg text-white">Update User</p>
    </div>
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
        <div class="flex flex-col gap-1 mb-4">
            <x-forms.label value="Select a role" />
            <div class="grid grid-cols-3 gap-1 p-3">
                @foreach(\Spatie\Permission\Models\Role::all() as $role)
                    <div class="flex items-center gap-1">
                        <x-forms.checkbox  wire:model="roles" value="{{ $role->name }}" id="{{ $role->name }}" name="{{ $role->name }}"/>
                        <x-forms.label for="{{ $role->name }}" value="{{ $role->name }}" />
                    </div>
                @endforeach
            </div>
        </div>
        <div class="flex justify-end gap-1">
            <x-buttons.default-button wire:click="cancel()" name="Cancel"/>
            <x-buttons.blue-button type="submit" name="Save"/>
        </div>
    </form>
</div>
