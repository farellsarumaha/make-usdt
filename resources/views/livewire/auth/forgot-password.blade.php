<form wire:submit="sendPasswordResetLink()">
    <div class="flex mb-4">
        <p class="text-xs text-justify">
            Forgot password is a common situation where users cannot remember the correct
            password to access their account. The password recovery process usually involves verifying your identity via
            email. Click forgot password then check your email.
        </p>
    </div>
    <div class="flex flex-col gap-1 mb-4">
        <x-forms.label for="email" value="Email Address" />
        <x-forms.input wire:model="email" id="email" name="email" placeholder="Email Address" />
        <x-forms.error :messages="$errors->get('email')" />
    </div>
    <div class="flex flex-col gap-1">
        <x-buttons.blue-button type="submit" name="Forgot Password"/>
        <x-buttons.default-button wire:click="toRegister()" name="Don't have an account?"/>
        <x-buttons.default-button wire:click="toLogin()" name="Already have an account?"/>
    </div>
</form>
