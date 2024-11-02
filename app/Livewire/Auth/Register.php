<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\UsersForm;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("components.layouts.guest")]
class Register extends Component
{
    public UsersForm $form;

    public function register(): void
    {
        $this->form->register();
        $this->redirectRoute('home');
        noty()->info("Your account has been registered. Don't forget to verify your email to increase the security of your account.");
    }

    public function toLogin(): void
    {
        $this->redirectRoute('login');
    }

    public function render(): Factory|Application|\Illuminate\Contracts\View\View|View
    {
        return view('livewire.auth.register');
    }
}
