<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        if (!User::where(['email' => 'moderator@casenova.uz'])->first()) {
            User::query()->create([
                'name' => 'Moderator',
                'email' => 'moderator@casenova.uz',
                'password' => Hash::make('P@$$CaseNova'),
            ]);
        }
    }
}
