<form wire:submit="deleteUser()" class="border rounded-lg shadow p-4 mb-4 flex flex-col justify-between">
    <section>
        <h1 class="font-semibold">Delete Account</h1>
        <p class="text-xs mb-4 text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam architecto cupiditate est ipsa iste laboriosam nisi, officiis quaerat repellat reprehenderit!</p>
    </section>
    <section>
        <div class="flex flex-col gap-1 mb-4">
            <x-forms.label for="password" value="Password" />
            <x-forms.input wire:model="password" id="password" name="password" placeholder="Password" type="password" />
            <x-forms.error :messages="$errors->get('password')" />
        </div>
    </section>
    <div class="flex flex-col gap-1">
        <x-buttons.red-button type="submit" name="Delete Account" class="max-w-[10rem]" />
    </div>
</form>
