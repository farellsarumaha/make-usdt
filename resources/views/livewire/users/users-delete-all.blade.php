<div>
    <div class="flex flex-col justify-center items-center gap-6 p-5">
        <div class="flex flex-col justify-center items-center gap-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
            </svg>
            <p class="max-w-sm text-center">Please confirm whether you are sure you want to delete the selected users.</p>
            <p class="font-semibold"><span x-text="window.pgBulkActions.count(`{{$this->tableName}}`)"></span> Users Selected</p>
        </div>
        <div class="flex w-full justify-end items-center gap-2">
            <x-buttons.default-button wire:click="cancel()" name="Cancel"/>
            <x-buttons.red-button wire:click="confirm()" name="Confirm"/>
        </div>
    </div>
</div>
