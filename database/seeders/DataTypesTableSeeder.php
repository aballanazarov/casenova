<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class DataTypesTableSeeder extends Seeder
{
    public function run()
    {
        /** Voyager Bread for Users */
        $dataType = $this->dataType('slug', 'users');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'users',
                'display_name_singular' => __('voyager::seeders.data_types.user.singular'),
                'display_name_plural'   => __('voyager::seeders.data_types.user.plural'),
                'icon'                  => 'voyager-person',
                'model_name'            => 'TCG\\Voyager\\Models\\User',
                'policy_name'           => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller'            => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }


        /** Voyager Bread for Menus */
        $dataType = $this->dataType('slug', 'menus');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'menus',
                'display_name_singular' => __('voyager::seeders.data_types.menu.singular'),
                'display_name_plural'   => __('voyager::seeders.data_types.menu.plural'),
                'icon'                  => 'voyager-list',
                'model_name'            => 'TCG\\Voyager\\Models\\Menu',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }


        /** Voyager Bread for Roles */
        $dataType = $this->dataType('slug', 'roles');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'roles',
                'display_name_singular' => __('voyager::seeders.data_types.role.singular'),
                'display_name_plural'   => __('voyager::seeders.data_types.role.plural'),
                'icon'                  => 'voyager-lock',
                'model_name'            => 'TCG\\Voyager\\Models\\Role',
                'controller'            => 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }


        /** Voyager Bread for Services */
        $dataType = $this->dataType('slug', 'services');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'services',
                //'slug ' => '',
                'display_name_singular' => __('admin.voyager.bread.services.singular'),
                'display_name_plural'   => __('admin.voyager.bread.services.plural'),
                'icon'                  => 'voyager-dollar',
                'model_name'            => 'App\\Models\\Service',
                //'policy_name'            => '',
                'controller'            => '',
                'description'           => '',
                'generate_permissions'  => 1,
                //'server_side'  => 0,
                //'details'  => '',
            ])->save();
        }


        /** Voyager Bread for Subservices */
        $dataType = $this->dataType('slug', 'subservices');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'subservices',
                //'slug ' => '',
                'display_name_singular' => __('admin.voyager.bread.subservices.singular'),
                'display_name_plural'   => __('admin.voyager.bread.subservices.plural'),
                'icon'                  => 'voyager-dollar',
                'model_name'            => 'App\\Models\\Subservice',
                //'policy_name'            => '',
                'controller'            => '',
                'description'           => '',
                'generate_permissions'  => 1,
                //'server_side'  => 0,
                //'details'  => '',
            ])->save();
        }


        /** Voyager Bread for Equipment */
        $dataType = $this->dataType('slug', 'equipment');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'equipment',
                //'slug ' => '',
                'display_name_singular' => __('admin.voyager.bread.equipment.singular'),
                'display_name_plural'   => __('admin.voyager.bread.equipment.plural'),
                'icon'                  => 'voyager-polaroid',
                'model_name'            => 'App\\Models\\Equipment',
                //'policy_name'            => '',
                'controller'            => '',
                'description'           => '',
                'generate_permissions'  => 1,
                //'server_side'  => 0,
                //'details'  => '',
            ])->save();
        }


        /** Voyager Bread for Blogs */
        $dataType = $this->dataType('slug', 'blogs');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'blogs',
                //'slug ' => '',
                'display_name_singular' => __('admin.voyager.bread.blogs.singular'),
                'display_name_plural'   => __('admin.voyager.bread.blogs.plural'),
                'icon'                  => 'voyager-news',
                'model_name'            => 'App\\Models\\Blog',
                //'policy_name'            => '',
                'controller'            => '',
                'description'           => '',
                'generate_permissions'  => 1,
                //'server_side'  => 0,
                //'details'  => '',
            ])->save();
        }


        /** Voyager Bread for Blogs */
        $dataType = $this->dataType('slug', 'galleries');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'galleries',
                //'slug ' => '',
                'display_name_singular' => __('admin.voyager.bread.galleries.singular'),
                'display_name_plural'   => __('admin.voyager.bread.galleries.plural'),
                'icon'                  => 'voyager-photos',
                'model_name'            => 'App\\Models\\Gallery',
                //'policy_name'            => '',
                'controller'            => '',
                'description'           => '',
                'generate_permissions'  => 1,
                //'server_side'  => 0,
                //'details'  => '',
            ])->save();
        }
    }


    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
