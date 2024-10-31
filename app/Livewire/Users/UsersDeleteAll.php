<?php

namespace App\Livewire\Users;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class UsersDeleteAll extends ModalComponent
{
    public $tableName;

    public function confirm(): void
    {
        $this->dispatch('bulkDelete.' . $this->tableName, []);
        $this->closeModal();
    }

    public function cancel(): void
    {
        $this->closeModal();
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View
    {
        return view('livewire.users.users-delete-all');
    }
}
