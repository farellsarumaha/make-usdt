<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public string $search = '';
    public int $colums = 10;
    public string $orderBy = 'firstname';

    public function delete($username): void
    {
        // $user = User::where('username', $this->getUsername)->firstOrFail();
        // $user->delete();
        // noty()->info('Successfully deleted user.');
        dump($username);
    }

    public function edit($username): void
    {
        dump($username);
    }

    public function paginationView()
    {
        return 'components.pagination';
    }
    public function render()
    {
        return view('livewire.admin.users-table')->with([
            'users' => User::whereAny(['email', 'firstname', 'lastname', 'username'], 'like', '%' . $this->search . '%')
                ->select(['id', 'email', 'firstname', 'lastname', 'username', 'created_at'])
                ->orderBy($this->orderBy)
                ->paginate($this->colums)
        ]);
    }
}
