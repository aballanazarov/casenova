<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         if (!User::where('email', 'admin@casenova.uz')->first()) {
             User::factory(10)->create();

             User::factory()->create([
                 'name' => 'admin',
                 'email' => 'admin@casenova.uz',
                 'password' => Hash::make('P@$$Admin'),
             ]);
         }

         $this->call([
             ServiceSeeder::class,
             EquipmentSeeder::class,
             BlogSeeder::class,
         ]);
    }
}
