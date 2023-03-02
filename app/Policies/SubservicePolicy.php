<?php

namespace App\Policies;

use App\Models\Subservice;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubservicePolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, Subservice $subservice)
    {
        //
    }


    public function create(User $user)
    {
        //
    }


    public function update(User $user, Subservice $subservice)
    {
        //
    }


    public function delete(User $user, Subservice $subservice)
    {
        //
    }


    public function restore(User $user, Subservice $subservice)
    {
        //
    }


    public function forceDelete(User $user, Subservice $subservice)
    {
        //
    }
}
