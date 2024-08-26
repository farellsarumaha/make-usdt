<?php

namespace App\Livewire\Layouts;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class NavbarApp extends Component
{
    public function logout()
    {
        Auth::guard('web')->logout();
        Session::invalidate();
        Session::regenerateToken();
        $this->redirect(route('home'), navigate: true);
        noty()->info('Goodbye.');
    }

    public function render()
    {
        return view('livewire.layouts.navbar-app');
    }
}
