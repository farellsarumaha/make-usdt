<div class="p-4">
    <div class="flex items-center gap-4 mb-6">
        <h6 class="font-extrabold hidden md:flex">Admin Panel</h6>
        <span>|</span>
        <p class="text-xs bg-gray-600 px-2 py-1 rounded-lg text-white">Create User</p>
    </div>
    <form wire:submit="created()">
        <div class="flex flex-col gap-1 mb-4">
            <x-forms.label for="firstname" value="First Name" />
            <x-forms.input wire:model="form.firstname" id="firstname" name="firstname" placeholder="First Name" />
            <x-forms.error :messages="$errors->get('form.firstname')" />
        </div>
        <div class="flex flex-col gap-1 mb-4">
            <x-forms.label for="lastname" value="Last Name" />
            <x-forms.input wire:model="form.lastname" id="lastname" name="lastname" placeholder="Last Name" />
            <x-forms.error :messages="$errors->get('form.lastname')" />
        </div>
        <div class="flex flex-col gap-1 mb-4">
            <x-forms.label value="Select a role" />
            <div class="grid grid-cols-3 gap-1 p-3">
                @foreach(\Spatie\Permission\Models\Role::all() as $role)
                    <div class="flex items-center gap-1">
                        <x-forms.checkbox wire:model="roles" value="{{ $role->name }}" id="{{ $role->name }}" name="{{ $role->name }}" />
                        <x-forms.label for="{{ $role->name }}" value="{{ $role->name }}" />
                    </div>
                @endforeach()
            </div>
        </div>
        <div class="flex flex-col gap-1 mb-4">
            <x-forms.label for="username" value="Username" />
            <x-forms.input wire:model="form.username" id="username" name="username" placeholder="Username" />
            <x-forms.error :messages="$errors->get('form.username')" />
        </div>
        <div class="flex flex-col gap-1 mb-4">
            <x-forms.label for="email" value="Email Address" />
            <x-forms.input wire:model="form.email" id="email" name="email" placeholder="Email Address" />
            <x-forms.error :messages="$errors->get('form.email')" />
        </div>
        <div class="flex flex-col gap-1 mb-4">
            <x-forms.label for="password" value="Password" />
            <x-forms.input wire:model="form.password" id="password" name="password" placeholder="Password" type="password" />
            <x-forms.error :messages="$errors->get('form.password')" />
        </div>
        <div class="flex flex-col gap-1 mb-4">
            <x-forms.label for="password_confirmation" value="Confirm Password" />
            <x-forms.input wire:model="form.password_confirmation" id="password_confirmation" name="password_confirmation"
                           placeholder="Confirm Password" type="password" />
            <x-forms.error :messages="$errors->get('form.password_confirmation')" />
        </div>
        <div class="flex justify-end gap-1">
            <x-buttons.default-button wire:click="cancel()" name="Cancel"/>
            <x-buttons.blue-button type="submit" name="Create"/>
        </div>
    </form>


</div>
