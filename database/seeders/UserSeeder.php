<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use TCG\Voyager\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        if (!User::where(['email' => 'admin@casenova.uz'])->first()) {
            User::query()->create([
                'name' => 'Admin',
                'email' => 'admin@casenova.uz',
                'password' => Hash::make('P@$$Admin'),
            ]);
        }

        $roleModerator = Role::where('name', 'moderator')->firstOrFail();
        if (!User::where(['email' => 'moderator@casenova.uz'])->first()) {
            User::query()->create([
                'role_id' => $roleModerator->id,
                'name' => 'Moderator',
                'email' => 'moderator@casenova.uz',
                'password' => Hash::make('P@$$CaseNova'),
            ]);
        }
    }
}
