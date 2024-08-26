<form wire:submit="login()">
    <div class="flex flex-col gap-1 mb-4">
        <x-label for="email" value="Email Address" />
        <x-input wire:model="email" id="email" name="email" placeholder="Email Address" />
        <x-error :messages="$errors->get('email')" />
    </div>
    <div class="flex flex-col gap-1 mb-4">
        <x-label for="password" value="Password" />
        <x-input wire:model="password" id="password" name="password" placeholder="Password" type="password" />
        <x-error :messages="$errors->get('password')" />
    </div>
    <div class="flex justify-between items-center mb-4">
        <div class="flex items-center gap-1">
            <x-checkbox wire:model="remember" id="remember" name="remember" />
            <x-label for="remember" value="Remember Me" />
        </div>
        <x-alinks href="{{ route('password.request') }}" value="Forgot Password?" />
    </div>
    <div class="flex flex-col gap-1">
        <x-button wire:click="login()" value="Login" color="blue" class="w-full text-sm" />
        <x-button wire:click="toRegister()" value="Don't have an account?" class="w-full text-sm" />
    </div>
</form>
