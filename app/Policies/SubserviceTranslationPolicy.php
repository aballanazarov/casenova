<?php

namespace App\Policies;

use App\Models\SubserviceTranslation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubserviceTranslationPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, SubserviceTranslation $subserviceTranslation)
    {
        //
    }


    public function create(User $user)
    {
        //
    }


    public function update(User $user, SubserviceTranslation $subserviceTranslation)
    {
        //
    }


    public function delete(User $user, SubserviceTranslation $subserviceTranslation)
    {
        //
    }


    public function restore(User $user, SubserviceTranslation $subserviceTranslation)
    {
        //
    }


    public function forceDelete(User $user, SubserviceTranslation $subserviceTranslation)
    {
        //
    }
}
