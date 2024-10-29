<form wire:submit="updatePassword()" class="border rounded-lg shadow p-4 mb-4 flex flex-col justify-between">
    <section>
        <h1 class="font-semibold">Change Password</h1>
        <p class="text-xs mb-4 text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam architecto cupiditate est ipsa iste laboriosam nisi, officiis quaerat repellat reprehenderit!</p>
    </section>
    <section>
        <div class="flex flex-col gap-1 mb-4">
            <x-forms.label for="current_password" value="Current Password" />
            <x-forms.input wire:model="current_password" id="current_password" name="current_password" placeholder="Current Password"
                type="password" />
            <x-forms.error :messages="$errors->get('current_password')" />
        </div>
        <div class="flex flex-col gap-1 mb-4">
            <x-forms.label for="password" value="Password" />
            <x-forms.input wire:model="password" id="password" name="password" placeholder="Password" type="password" />
            <x-forms.error :messages="$errors->get('password')" />
        </div>
        <div class="flex flex-col gap-1 mb-4">
            <x-forms.label for="password_confirmation" value="Confirm Password" />
            <x-forms.input wire:model="password_confirmation" id="password_confirmation" name="password_confirmation"
                placeholder="Confirm Password" type="password" />
            <x-forms.error :messages="$errors->get('password_confirmation')" />
        </div>
    </section>
    <div class="flex flex-col gap-1">
        <x-buttons.blue-button type="submit" name="Change Password" class="max-w-[10rem]" />
    </div>
</form>
