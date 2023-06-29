<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class EventsTagsPolicy
{
    use HandlesAuthorization;

    private $user;
    public function __construct()
    {
        $this->user = Auth::user();

    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        if ($user->hasRole('Super-Admin')) {
            return true;
        }else{
            return $user->hasPermissionTo('manage events');
        }
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        //
        if ($user->hasRole('Super-Admin')) {
            return true;
        }else{
            return $user->hasPermissionTo('manage events');
        }
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        if ($user->hasRole('Super-Admin')) {
            return true;
        }else{
            return $user->hasPermissionTo('create events');
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        //
        if ($user->hasRole('Super-Admin')) {
            return true;
        }else{
            return $user->hasPermissionTo('edit events');
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        //
        if ($user->hasRole('Super-Admin')) {
            return true;
        }else{
            return $user->hasPermissionTo('delete events');
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        //
        if ($user->hasRole('Super-Admin')) {
            return true;
        }else{
            return $user->hasPermissionTo('restore events');
        }
    }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, User $model): bool
    // {
    //     //
    // }
}