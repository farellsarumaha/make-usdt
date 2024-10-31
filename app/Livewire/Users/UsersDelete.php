<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use LivewireUI\Modal\ModalComponent;

class UsersDelete extends ModalComponent
{
    public $getUsername;

    public function confirm(): void
    {
        /* Get User */
        $user = User::where('username', $this->getUsername)->first();
        /* Check User */
        if (!$user) {
            $this->closeModal();
            $this->getUsername = '';
            noty()->warning('User not found!');
        }
        /* Delete User */
        $user->delete();
        noty()->info($this->getUsername . ' has been deleted!');
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
        return view('livewire.users.users-delete');
    }
}
