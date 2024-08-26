<?php

namespace App\Livewire\Layouts;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class NavbarAdmin extends Component
{
    public function logout(): void
    {
        Auth::guard('web')->logout();
        Session::invalidate();
        Session::regenerateToken();
        $this->redirect(route('home'), navigate: true);
        noty()->info('Goodbye.');
    }

    public function render()
    {
        return view('livewire.layouts.navbar-admin');
    }
}
