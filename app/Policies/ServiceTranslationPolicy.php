<?php

namespace App\Policies;

use App\Models\ServiceTranslation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServiceTranslationPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, ServiceTranslation $serviceTranslation)
    {
        //
    }


    public function create(User $user)
    {
        //
    }


    public function update(User $user, ServiceTranslation $serviceTranslation)
    {
        //
    }


    public function delete(User $user, ServiceTranslation $serviceTranslation)
    {
        //
    }


    public function restore(User $user, ServiceTranslation $serviceTranslation)
    {
        //
    }


    public function forceDelete(User $user, ServiceTranslation $serviceTranslation)
    {
        //
    }
}
