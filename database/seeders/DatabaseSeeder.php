<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
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

        $roles = \App\Enums\RolesEnum::cases();

        foreach($roles as $role){
            $name = Role::create(['name' => $role]);
        }

        $admin1 = User::create([
            'name' => 'يزيد بن ناصر',
            'email' => 'admin1@mail.com',
            'password' => bcrypt(123456)
        ]);
        $admin1->assignRole('admin');


    }
}
