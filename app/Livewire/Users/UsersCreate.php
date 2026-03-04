<?php

namespace App\Livewire\Users;

use App\Livewire\Forms\UsersForm;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class UsersCreate extends ModalComponent
{
    public UsersForm $form;
    public $roles = ['user'];

    public function created(): void
    {
        $this->form->create($this->roles);
        $this->closeModal();
        $this->dispatch('reload-table-user');
        noty()->info("Your account has been registered. Don't forget to verify your email to increase the security of your account.");
    }

    public function cancel(): void
    {
        $this->closeModal();
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View
    {
        return view('livewire.users.users-create');
    }
}
