<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, Blog $blog)
    {
        //
    }


    public function create(User $user)
    {
        //
    }


    public function update(User $user, Blog $blog)
    {
        //
    }


    public function delete(User $user, Blog $blog)
    {
        //
    }


    public function restore(User $user, Blog $blog)
    {
        //
    }


    public function forceDelete(User $user, Blog $blog)
    {
        //
    }
}
