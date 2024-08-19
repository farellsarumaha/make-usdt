<div wire:ignore.self
    {{ $attributes->merge(['tabindex' => '-1', 'class' => 'hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full']) }}>
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative p-8 bg-white rounded-lg shadow">
            {{ $slot }}
        </div>
    </div>
</div>
