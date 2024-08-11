<?php

use Livewire\Volt\Component;

new class extends Component {

    public function logout()
    {
        Auth::guard('web')->logout();
        Session::invalidate();
        Session::regenerateToken();
        $this->redirect(route('home'), navigate: true);
        noty()->info('Goodbye.');
    }

}; ?>

<div>
    //
</div>
