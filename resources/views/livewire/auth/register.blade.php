<form wire:submit="register()">
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
    <div class="flex flex-col gap-1">
        <x-buttons.blue-button type="submit" name="Register"/>
        <x-buttons.default-button wire:click="toLogin()" name="Already have an account?"/>
    </div>
</form>
