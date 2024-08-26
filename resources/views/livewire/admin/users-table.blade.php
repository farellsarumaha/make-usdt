<?php

use App\Models\User;
use Livewire\Volt\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    public string $search = '';
    public int $colums = 10;
    public string $orderBy = 'firstname';

    public function with(): array
    {
        $users = User::whereAny(['email', 'firstname', 'lastname', 'username'], 'like', '%' . $this->search . '%')
            ->select(['id', 'email', 'firstname', 'lastname', 'username', 'created_at'])
            ->orderBy($this->orderBy)
            ->paginate($this->colums);
        return [
            'users' => $users,
        ];
    }

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
};

?>

<section>
    <div class="flex justify-between items-center py-4">
        <div class="flex justify-start items-center w-full gap-2">
            <div class="flex flex-col w-[50%]">
                <x-label for="search" value="Search" />
                <x-input id="search" wire:model.live="search" placeholder="Search users." />
            </div>
        </div>
        <div class="flex justify-end items-center w-full gap-2">
            <div class="flex flex-col w-[30%]">
                <x-label for="orderBy" value="Order By" />
                <select id="orderBy" wire:model.change="orderBy"
                    class="w-full rounded-lg border-stone-200 focus:border-blue-800 placeholder:text-sm text-sm">
                    <option value="firstname">First Name</option>
                    <option value="lastname">Last Name</option>
                    <option value="username">Username</option>
                    <option value="email">Email Address</option>
                </select>
            </div>
            <div class="flex flex-col w-[30%]">
                <x-label for="costume-colums" value="Costume Colums" />
                <select id="costume-colums" wire:model.change="colums"
                    class="w-full rounded-lg border-stone-200 focus:border-blue-800 placeholder:text-sm text-sm">
                    <option value="10">10</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
    </div>
    <div class="relative overflow-x-auto pb-2">
        <table class="w-full text-sm text-left rtl:text-right text-gray-700 border-x border-b">
            <thead class="text-sm text-white uppercase bg-gray-950">
                <tr>
                    <th scope="col" class="px-6 py-3 whitespace-nowrap">No.</th>
                    <th scope="col" class="px-6 py-3 whitespace-nowrap">Full Name</th>
                    <th scope="col" class="px-6 py-3 whitespace-nowrap">Username</th>
                    <th scope="col" class="px-6 py-3 whitespace-nowrap">Email Address</th>
                    <th scope="col" class="px-6 py-3 whitespace-nowrap">Create At</th>
                    <th scope="col" class="px-6 py-3 whitespace-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $key => $user)
                <tr class="bg-white border-b border-b-stone-200 last:border-none odd:bg-white even:bg-stone-50">
                    <td class="px-6 py-4 whitespace-nowrap border-r w-4 text-center font-semibold">
                        {{ $users->firstItem() + $key . '.' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-r">{{ $user->getFullName() }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-r">{{ $user->username }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-r">{{ $user->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->created_at->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <x-button color="red" wire:click="delete(`{{ $user->username }}`)" value="Delete" />
                        <x-button color="green" wire:click="edit(`{{ $user->username }}`)" value="Edit" />
                    </td>
                </tr>
                @empty
                <tr class="bg-white border-b border-b-stone-200 last:border-none odd:bg-white even:bg-stone-50">
                    @if ($search != null)
                    <td class="px-6 py-4 whitespace-nowrap text-center" colspan="6">No users found for
                        matching
                        "{{ $search }}".
                    </td>
                    @else
                    <td class="px-6 py-4 whitespace-nowrap text-center" colspan="6">No users found</td>
                    @endif
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="py-4">
        {{ $users->links() }}
    </div>
</section>
