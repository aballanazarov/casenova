<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
         $this->call([
             DataTypesTableSeeder::class,
             DataRowsTableSeeder::class,
             MenusTableSeeder::class,
             MenuItemsTableSeeder::class,
             RolesTableSeeder::class,
             PermissionsTableSeeder::class,
             PermissionRoleTableSeeder::class,
             SettingsTableSeeder::class,
             UserSeeder::class,
         ]);
    }
}
