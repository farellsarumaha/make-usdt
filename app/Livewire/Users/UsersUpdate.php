<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use LivewireUI\Modal\ModalComponent;

class UsersUpdate extends ModalComponent
{
    public $getUsername;

    public User $user;

    public string $firstname = '';
    public string $lastname = '';

    public $roles = [];

    public function mount(): void
    {
        $this->user = User::where('username', $this->getUsername)->first();
        $this->roles = $this->user->roles()->pluck('name')->toArray();
        $this->firstname = $this->user->firstname;
        $this->lastname = $this->user->lastname;
    }

    public function save(): void
    {
        /* Check User */
        if ($this->user->username !== $this->getUsername) {
            $this->closeModal();
            $this->getUsername = '';
            noty()->warning('Username not found!');
        }
        /* Validate User */
        $validated = $this->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255']
        ]);
        /* Update User */
        $this->user->update($validated);
        /* Check Checked Box & Delete Roles*/
        if(!$this->roles){
            $this->user->roles()->detach();
        }else{
            /* Added Roles in a user */
            foreach ($this->roles as $role) {
                $this->user->assignRole($role);
            }
        }
        noty()->info('User: ' . $this->getUsername . ' updated successfully!');
        /* Close Modal */
        $this->closeModal();
        $this->getUsername = '';
        /* Reload Table */
        $this->dispatch('reload-table-user');
    }

    public function cancel(): void
    {
        $this->closeModal();
        $this->getUsername = '';
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View
    {
        return view('livewire.users.users-update');
    }
}
