<form wire:submit="login()">
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
    <div class="flex justify-between items-center mb-4">
        <div class="flex items-center gap-1">
            <x-forms.checkbox wire:model="remember" id="remember" name="remember" />
            <x-forms.label for="remember" value="Remember Me" />
        </div>
        <x-navbar.a-default request="password.request" name="Forgot Password?" />
    </div>
    <div class="flex flex-col gap-1">
        <x-buttons.blue-button type="submit" name="Login" />
        <x-buttons.default-button wire:click="toRegister()" name="Don't have an account?"/>
    </div>
</form>
