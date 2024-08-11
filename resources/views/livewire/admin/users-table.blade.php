<?php

use App\Models\User;
use Livewire\Volt\Component;
use Livewire\WithPagination;

new class extends Component {
    public function with(): array
    {
        return [ 'users' => User::select(['id', 'email', 'firstname', 'lastname', 'username', 'created_at'])->paginate(5)];
    }
};

?>

<section>
    <div class="relative overflow-x-auto pb-2">
        <table class="w-full text-sm text-left rtl:text-right text-gray-700 border-x border-b">
            <thead class="text-sm text-white uppercase bg-gray-950">
            <tr>
                <th scope="col" class="px-6 py-3 whitespace-nowrap">No.</th>
                <th scope="col" class="px-6 py-3 whitespace-nowrap">Full Name</th>
                <th scope="col" class="px-6 py-3 whitespace-nowrap">Username</th>
                <th scope="col" class="px-6 py-3 whitespace-nowrap">Email Address</th>
                <th scope="col" class="px-6 py-3 whitespace-nowrap">Create At</th>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $key => $user)
                    <tr class="bg-white border-b border-b-stone-200 last:border-none odd:bg-white even:bg-stone-50">
                        <td class="px-6 py-4 whitespace-nowrap border-r w-4 text-center font-semibold">{{ $users->firstItem() + $key . '.'}}</td>
                        <td class="px-6 py-4 whitespace-nowrap border-r">{{ $user->getFullName() }}</td>
                        <td class="px-6 py-4 whitespace-nowrap border-r">{{ $user->username }}</td>
                        <td class="px-6 py-4 whitespace-nowrap border-r">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="py-4">
        {{ $users->onEachSide(1)->links() }}
    </div>
</section>

