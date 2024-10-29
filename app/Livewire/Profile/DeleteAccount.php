<?php /** @noinspection PhpPossiblePolymorphicInvocationInspection */

namespace App\Livewire\Profile;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Livewire\Component;

class DeleteAccount extends Component
{
    public string $password = '';

    public function logout(): void
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

        $this->redirectRoute('home');
        noty()->info('Successfully deleted account.');
    }
    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View
    {
        return view('livewire.profile.delete-account');
    }
}
