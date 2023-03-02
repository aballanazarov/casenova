<?php

namespace App\Policies;

use App\Models\EquipmentTranslation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EquipmentTranslationPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, EquipmentTranslation $equipmentTranslation)
    {
        //
    }


    public function create(User $user)
    {
        //
    }


    public function update(User $user, EquipmentTranslation $equipmentTranslation)
    {
        //
    }


    public function delete(User $user, EquipmentTranslation $equipmentTranslation)
    {
        //
    }


    public function restore(User $user, EquipmentTranslation $equipmentTranslation)
    {
        //
    }


    public function forceDelete(User $user, EquipmentTranslation $equipmentTranslation)
    {
        //
    }
}
