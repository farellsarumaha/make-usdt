<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Blade;
use Livewire\Attributes\On;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Components\SetUp\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class UserTable extends PowerGridComponent
{
    use WithExport;

    public string $tableName = 'user-table-z8yfwp-table';

    /** @noinspection PhpUndefinedMethodInspection */
    public function header(): array
    {
        return [
            Button::add('create')
                ->slot('
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                ')
                ->class('text-sm p-2 border border-blue-200 bg-blue-800 hover:bg-blue-900 text-white rounded-lg flex justify-center items-center')
                ->openModal('users.users-create', []),
            Button::add('bulk-delete')
                ->slot('
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                ')
                ->class('text-sm p-2 border border-red-200 bg-red-800 hover:bg-red-900 text-white rounded-lg flex justify-center items-center')
                ->openModal('users.users-delete-all', ['tableName' => $this->tableName]),
        ];
    }

    #[On('bulkDelete.{tableName}')]
    public function bulkDelete(): void
    {
        if($this->checkboxValues){
            User::destroy($this->checkboxValues);
            $this->js('window.pgBulkActions.clearAll()');
            $this->checkboxAll = false;
            noty()->info('Successfully deleted users.');
        }else{
            noty()->error('Please select at least one user');
        }
    }

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::exportable('export')
                ->striped()
                ->columnWidth([
                    2 => 30,
                ])
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),

            PowerGrid::header()
                ->showSearchInput()
                ->withoutLoading(),
            PowerGrid::footer()
                ->showPerPage(perPageValues: [5, 10, 20, 50, 100])
                ->showRecordCount(mode: 'short')
        ];
    }

    public function datasource(): Builder
    {
        return User::query();
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('firstname')
            ->add('lastname')
            ->add('username')
            ->add('email')
            ->add('email_verified_at')
            ->add('email_verified_at_label', fn ($entry) => Blade::render('<x-tables.verified-rows verified="' . $entry->email_verified_at . '"/>'))
            ->add('created_at');
    }

    #[On('reload-table-user')]
    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Firstname', 'firstname')->sortable()->searchable(),
            Column::make('Lastname', 'lastname')->sortable()->searchable(),
            Column::make('Username', 'username')->sortable()->searchable(),
            Column::make('Email', 'email')->sortable()->searchable(),
            Column::make('Verified', 'email_verified_at_label'),
            Column::make('Created at', 'created_at')->sortable()->searchable(),
            Column::action('Action')
        ];
    }

    public function actions(User $row): array
    {
        return [
            Button::add('edit')
                ->slot('
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                    </svg>
                ')
                ->id()
                ->class('text-sm p-2 border border-green-200 bg-green-800 hover:bg-green-900 text-white rounded-lg flex justify-center items-center')
                ->openModal('users.users-update', ['getUsername' => $row->username]),
            Button::add('delete')
                ->slot('
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                ')
                ->id()
                ->class('text-sm p-2 border border-red-200 bg-red-800 hover:bg-red-900 text-white rounded-lg flex justify-center items-center')
                ->openModal('users.users-delete', ['getUsername' => $row->username]),
        ];
    }
}
