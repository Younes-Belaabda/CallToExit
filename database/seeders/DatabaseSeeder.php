<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            foreach(range(1 , 5) as $rep){
                \App\Models\User::factory()->create()->assignRole($name);
            }
        }

        // simulate requests
        // foreach(range(0,10) as $rep){
        //     $exit_request = \App\Models\ExitRequest::create(
        //         [
        //             'requested_by' => \App\Models\User::role('father')->get()->random(1)->first()->id,
        //             'verified_by' => \App\Models\User::role('staff')->get()->random(1)->first()->id,
        //             'reason' => fake()->text(),
        //             'status' => Arr::random(\App\Enums\ExitRequestStatusEnum::cases())
        //         ]
        //     );
        //     \App\Models\ExitRequestStudent::create(
        //         [
        //             'exit_request_id' => $exit_request->id,
        //             'user_id' => \App\Models\User::role('student')->get()->random(1)->first()->id
        //         ]
        //     );
        // }


    }
}
