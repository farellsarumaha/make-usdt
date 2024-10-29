<form wire:submit="register()">
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
    <div class="flex flex-col gap-1">
        <x-buttons.blue-button type="submit" name="Register"/>
        <x-buttons.default-button wire:click="toLogin()" name="Already have an account?"/>
    </div>
</form>
