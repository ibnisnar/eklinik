<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'read']);
        Permission::create(['name' => 'update']);
        Permission::create(['name' => 'delete']);

        $roleAdmin = Role::create(['name' => 'super-admin']);
        $roleAdmin->givePermissionTo(Permission::all());

        $rolePelulus = Role::create(['name' => 'pelulus']);
        $rolePelulus->givePermissionTo(Permission::all());

        $roleKlinik = Role::create(['name' => 'klinik']);
        $roleKlinik->givePermissionTo(Permission::all());

        $roleAgensi = Role::create(['name' => 'agensi']);
        $roleAgensi->givePermissionTo(Permission::all());

        $user->assignRole('super-admin');
    }
}
