<x-layouts.app title="Profile">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <section class="row-span-2">
            <livewire:profile.information />
        </section>
        <section>
            <livewire:profile.change-password />
        </section>
        <section>
            <livewire:profile.delete-account />
        </section>
    </div>
</x-layouts.app>
