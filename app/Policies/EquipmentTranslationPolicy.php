<?php

namespace App\Policies;

use App\Models\EquipmentTranslation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EquipmentTranslationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EquipmentTranslation  $equipmentTranslation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, EquipmentTranslation $equipmentTranslation)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EquipmentTranslation  $equipmentTranslation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, EquipmentTranslation $equipmentTranslation)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EquipmentTranslation  $equipmentTranslation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, EquipmentTranslation $equipmentTranslation)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EquipmentTranslation  $equipmentTranslation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, EquipmentTranslation $equipmentTranslation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EquipmentTranslation  $equipmentTranslation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, EquipmentTranslation $equipmentTranslation)
    {
        //
    }
}
