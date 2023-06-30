<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return true;
        // if ($user->hasRole('Super-Admin')) {
        //     return true;
        // }else{
        //     return $user->hasPermissionTo('manage users');
        // }
        // if ($post->published) {
        //     return true;
        // }

        // // visitors cannot view unpublished items
        // if ($user === null) {
        //     return false;
        // }

        // admin overrides published status
        // if ($user->can('manage users')) {
        //     return true;
        // }

        // return $user->hasRole('Super-Admin');
        // authors can view their own unpublished posts
        // return $user->id == $post->user_id;
    }

    // /**
    //  * Determine whether the user can view the model.
    //  */
    public function view(User $user): bool
    {
        //
        return true;
        // if ($user->hasRole('Super-Admin')) {
        //     return true;
        // }else{
        //     return $user->hasPermissionTo('manage users');
        // }
    }

    // /**
    //  * Determine whether the user can create models.
    //  */
    public function create(User $user): bool
    {
        //
        return true;
        // if ($user->hasRole('Super-Admin')) {
        //     return true;
        // }else{
        //     return $user->hasPermissionTo('create users');
        // }
        // return $user->can('create users');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        //
        return true;
        // if ($user->hasRole('Super-Admin')) {
        //     return true;
        // }else{
        //     return $user->hasPermissionTo('edit users');
        // }
        // return $user->can('edit users');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        //
        return true;
        // if ($user->hasRole('Super-Admin')) {
        //     return true;
        // }else{
        //     return $user->hasPermissionTo('delete users');
        // }
        // return $user->can('delete users');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user): bool
    {
        //
        return true;
        // if ($user->hasRole('Super-Admin')) {
        //     return true;
        // }else{
        //     return $user->hasPermissionTo('restore users');
        // }
        // return $user->can('restore users');
    }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, User $model): bool
    // {
    //     //
    // }

}
