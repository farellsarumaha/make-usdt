<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        User::factory(100)->create();

        $user = User::factory()->create([
            'firstname' => 'Farel',
            'lastname' => 'Sarumaha',
            'username' => 'farellsarumaha',
            'email' => 'farellsarumaha10@gmail.com',
            'email_verified_at' => now(),
        ]);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
        Role::create(['name' => 'ceo']);
        Role::create(['name' => 'owner']);
        Role::create(['name' => 'super-admin']);

        $user->assignRole('admin');
    }
}
