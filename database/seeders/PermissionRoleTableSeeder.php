<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $role = Role::where('name', 'admin')->firstOrFail();

        $permissions = Permission::all();

        $role->permissions()->sync(
            $permissions->pluck('id')->all()
        );


        $role = Role::where('name', 'moderator')->firstOrFail();

        $permissions = Permission::where(
            function ($query) {
                $query->whereIn('table_name', ['services', 'subservices', 'equipment', 'blogs', 'galleries'])
                    ->orWhere('key', 'browse_admin');
            }
        );

        $role->permissions()->sync(
            $permissions->pluck('id')->all()
        );
    }
}
