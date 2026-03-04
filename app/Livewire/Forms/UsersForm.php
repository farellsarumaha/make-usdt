<?php /** @noinspection PhpUnused */

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Form;

class UsersForm extends Form
{
    public $firstname = '';
    public $lastname = '';
    public $username = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    public function create($roles): void
    {
        $validated = $this->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'lowercase', 'max:25', 'alpha_dash:ascii', 'unique:' . User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Password::default()],
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        foreach ($roles as $role) {
            $user->assignRole($role);
        }
        $this->reset();
    }

    public function register(): void
    {
        $validated = $this->validate();
        $validated['password'] = Hash::make($validated['password']);
        event(new Registered(($user = User::create($validated))));
        Auth::login($user);
    }
}
