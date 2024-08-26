<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class DeleteAccount extends Component
{
    public string $password = '';

    public function logout()
    {
        Auth::guard('web')->logout();
        Session::invalidate();
        Session::regenerateToken();
    }

    public function deleteUser(): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $this->logout(...))->delete();

        $this->redirect('/', navigate: true);
        noty()->info('Successfully deleted account.');
    }
    public function render()
    {
        return view('livewire.profile.delete-account');
    }
}
