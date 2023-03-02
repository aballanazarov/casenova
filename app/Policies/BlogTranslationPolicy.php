<?php

namespace App\Policies;

use App\Models\BlogTranslation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogTranslationPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, BlogTranslation $blogTranslation)
    {
        //
    }


    public function create(User $user)
    {
        //
    }


    public function update(User $user, BlogTranslation $blogTranslation)
    {
        //
    }


    public function delete(User $user, BlogTranslation $blogTranslation)
    {
        //
    }


    public function restore(User $user, BlogTranslation $blogTranslation)
    {
        //
    }


    public function forceDelete(User $user, BlogTranslation $blogTranslation)
    {
        //
    }
}
