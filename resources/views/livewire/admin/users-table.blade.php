<?php

use App\Models\User;
use Livewire\Volt\Component;
use Livewire\WithPagination;

new class extends Component {
    public string $search = '';
    public int $colums = 10;
    public string $orderBy = 'firstname';
    public string $getUsername = '';

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

    public function getUser($username): void
    {
        $this->getUsername = $username;
    }

    public function delete(): void
    {
        $user = User::where('username', $this->getUsername)->firstOrFail();
        $user->delete();
        noty()->info('Successfully deleted user.');
    }

    public function edit($username): void
    {
        dump($username);
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
                            <x-button wire:key="{{ $user->username }}" wire:click="getUser(`{{ $user->username }}`)"
                                data-modal-target="delete-users" data-modal-toggle="delete-users" color="red"
                                value="Delete" />
                            <x-button color="green" wire:click="edit(`{{ $user->username }}`)" value="Edit" />
                        </td>
                        <x-modal wire:key="{{ $user->username }}" id="delete-users">
                            <div class="space-y-8">
                                <div class="flex flex-col justify-center items-center gap-2 text-center text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-12">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v3.75m0-10.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.25-8.25-3.286Zm0 13.036h.008v.008H12v-.008Z" />
                                    </svg>
                                    <p class="text-lg">Are you sure you want to delete?</p>
                                </div>
                                <div class="flex justify-center items-center gap-4">
                                    <x-button class="text-sm" data-modal-hide="delete-users" wire:click="delete()"
                                        color="red" value="Yes, I'm sure" />
                                    <x-button class="text-sm" data-modal-hide="delete-users" value="No, cancel" />
                                </div>
                            </div>
                        </x-modal>
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
        {{ $users->onEachSide(1)->links() }}
    </div>
</section>
