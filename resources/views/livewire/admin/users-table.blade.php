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
                <select id="orderBy" wire:model.change="orderBy" class="w-full rounded-lg border-stone-200 focus:border-blue-800 placeholder:text-sm text-sm">
                    <option value="firstname">First Name</option>
                    <option value="lastname">Last Name</option>
                    <option value="username">Username</option>
                    <option value="email">Email Address</option>
                </select>
            </div>
            <div class="flex flex-col w-[30%]">
                <x-label for="costume-colums" value="Costume Colums" />
                <select id="costume-colums" wire:model.change="colums" class="w-full rounded-lg border-stone-200 focus:border-blue-800 placeholder:text-sm text-sm">
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
                        {{ $users->firstItem() + $key . '.' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap border-r">{{ $user->getFullName() }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-r">{{ $user->username }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-r">{{ $user->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-r">{{ $user->created_at->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center inline-flex justify-center items-center w-full gap-2">
                        <x-button color="red" wire:click="delete(`{{ $user->username }}`)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </x-button>
                        <x-button color="green" wire:click="edit(`{{ $user->username }}`)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </x-button>
                    </td>
                </tr>
                @empty
                <tr class="bg-white border-b border-b-stone-200 last:border-none odd:bg-white even:bg-stone-50">
                    @if ($search != null)
                    <td class="px-6 py-4 whitespace-nowrap text-center" colspan="6">
                        No users found for matching "{{ $search }}".
                    </td>
                    @else
                    <td class="px-6 py-4 whitespace-nowrap text-center" colspan="6">
                        No users found
                    </td>
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
