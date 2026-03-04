<!--suppress JSUnresolvedReference -->
<x-buttons.green-button data-dropdown-toggle="exportDropdown">
    <span class="inline-flex justify-center items-center gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 sm:size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
        </svg>
        <p class="hidden sm:block">Export</p>
    </span>
</x-buttons.green-button>
<x-dropdown.menu id="exportDropdown">
    <div class="grid grid-rows-2 grid-cols-1 gap-1" x-data="{ countChecked: @entangle('checkboxValues').live }">
        @if (in_array('xlsx', data_get($setUp, 'exportable.type')))
            <div class="flex justify-between items-center w-full px-2 py-1">
                <span class="w-12 font-semibold">@lang('XLSX')</span>
                <button wire:click.prevent="exportToXLS" class="py-2 px-1 hover:!text-blue-700 text-xs">
                    <span class="export-count">({{ $total }})</span>
                    @if (count($enabledFilters) === 0)
                        @lang('livewire-powergrid::datatable.labels.all')
                    @else
                        @lang('livewire-powergrid::datatable.labels.filtered')
                    @endif
                </button>
                @if ($checkbox)
                    <button wire:click.prevent="exportToXLS(true)" class="py-2 px-1 text-xs" :class="countChecked.length === 0 ? 'cursor-not-allowed' : 'hover:!text-blue-700'">
                        <span x-text="`(${countChecked.length})`"></span>
                        @lang('livewire-powergrid::datatable.labels.selected')
                    </button>
                @endif
            </div>
        @endif
        @if (in_array('csv', data_get($setUp, 'exportable.type')))
            <div class="flex justify-between items-center w-full px-2 py-1">
                <span class="w-12 font-semibold">@lang('CSV')</span>
                <button class="py-2 px-1 hover:!text-blue-700 text-xs" wire:click.prevent="exportToCsv">
                    <span class="export-count">({{ $total }})</span>
                    @if (count($enabledFilters) === 0)
                        @lang('livewire-powergrid::datatable.labels.all')
                    @else
                        @lang('livewire-powergrid::datatable.labels.filtered')
                    @endif
                </button>
                @if ($checkbox)
                    <button wire:click.prevent="exportToCsv(true)" class="py-2 px-1  text-xs"  :class="countChecked.length === 0 ? 'cursor-not-allowed' : 'hover:!text-blue-700'">
                        <span x-text="`(${countChecked.length})`"></span>
                        @lang('livewire-powergrid::datatable.labels.selected')
                    </button>
                @endif
            </div>
        @endif
    </div>
</x-dropdown.menu>
