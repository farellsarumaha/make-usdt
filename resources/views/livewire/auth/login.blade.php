<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[\Livewire\Attributes\Layout('components.layouts.guest')] class extends Component {

    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    protected function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
    }

    public function login(): void
    {
        $validated = $this->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'remember' => ['boolean']
        ]);

        $this->ensureIsNotRateLimited();

        if (!Auth::attempt($this->only(['email', 'password']), 'remember')) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());

        Session::regenerate();
        $this->redirectIntended(default: route('home', absolute: false), navigate: true);
        noty()->info('Successfully logged in.');
    }

    public function toRegister() { $this->redirect(route('register'), navigate: true); }
}; ?>

<form wire:submit="login()">
    <div class="flex flex-col gap-1 mb-4">
        <x-label for="email" value="Email Address"/>
        <x-input wire:model="email" id="email" name="email" placeholder="Email Address"/>
        <x-error :messages="$errors->get('email')"/>
    </div>
    <div class="flex flex-col gap-1 mb-4">
        <x-label for="password" value="Password"/>
        <x-input wire:model="password" id="password" name="password" placeholder="Password" type="password"/>
        <x-error :messages="$errors->get('password')"/>
    </div>
    <div class="flex justify-between items-center mb-4">
        <div class="flex items-center gap-1">
            <x-checkbox wire:model="remember" id="remember" name="remember"/>
            <x-label for="remember" value="Remember Me"/>
        </div>
        <x-alinks href="{{ route('password.request') }}" value="Forgot Password?"/>
    </div>
    <div class="flex flex-col gap-1">
        <x-button wire:click="login()" value="Login" color="blue" class="w-full text-sm"/>
        <x-button wire:click="toRegister()" value="Don't have an account?" class="w-full text-sm"/>
    </div>
</form>
