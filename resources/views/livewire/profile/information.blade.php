<form wire:submit="updateProfileInformation()" class="flex flex-col justify-between border rounded-lg shadow p-4 mb-4">
    <section>
        <h1 class="font-semibold">Information Profile</h1>
        <p class="text-xs mb-4 text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam architecto cupiditate est ipsa iste laboriosam nisi, officiis quaerat repellat reprehenderit!</p>
    </section>
    <section>
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
            <x-forms.label for="username" value="Username" />
            <x-forms.input wire:model="username" id="username" name="username" placeholder="Username" />
            <x-forms.error :messages="$errors->get('username')" />
        </div>
        <div class="flex flex-col gap-1 mb-4">
            <x-forms.label for="email" value="Email Address" />
            <x-forms.input wire:model="email" id="email" name="email" placeholder="Email Address" />
            <x-forms.error :messages="$errors->get('email')" />
        </div>
    </section>
    <div class="flex flex-col gap-1">
        <x-buttons.blue-button type="submit" name="Save" class="max-w-[10rem]"/>
    </div>
</form>
