<?php

namespace App\Policies;

use App\Models\Service;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicePolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, Service $service)
    {
        //
    }


    public function create(User $user)
    {
        //
    }


    public function update(User $user, Service $service)
    {
        //
    }


    public function delete(User $user, Service $service)
    {
        //
    }


    public function restore(User $user, Service $service)
    {
        //
    }


    public function forceDelete(User $user, Service $service)
    {
        //
    }
}
