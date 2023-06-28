<?php

namespace App\Policies;

// use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;
// use Pktharindu\NovaPermissions\Role;
use Spatie\Permission\Models\Role;
// use Vyuldashev\NovaPermission\Role;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class RolePolicy
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
        // return true;
        // return $user->type == "manage users";
        return $user->hasRole('admin1');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        //

        return $user->hasRole('admin1');
        // return true;
        // if ($user->hasPermissionTo('manage users')) {
        //     return $user->id === $role->user_id;
        // }

        // return $user->hasPermissionTo('manage users');
        // return in_array('manage users', $user->permissions);

        // return $user->hasPermissionTo('manage users');
    }

    /**
     * Determine whether the user can create models.
     */
    // public function create(User $user): bool
    // {
    //     //
    //     if ($user->hasPermissionTo('create users')) {
    //         return $user->id;
    //     }

    //     return $user->hasPermissionTo('create users');
    // }

    /**
     * Determine whether the user can update the model.
     */
    // public function update(User $user, Role $role): bool
    // {
    //     //
    //     if ($user->hasPermissionTo('edit users')) {
    //         return $user->id === $role->user_id;
    //     }

    //     return $user->hasPermissionTo('edit users');
    // }

    /**
     * Determine whether the user can delete the model.
     */
    // public function delete(User $user, Role $role): bool
    // {
    //     //
    //     if ($user->hasPermissionTo('delete users')) {
    //         return $user->id === $role->user_id;
    //     }

    //     return $user->hasPermissionTo('delete users');
    // }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, Role $role): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can permanently delete the model.
     */
    // public function forceDelete(User $user, Role $role): bool
    // {
    //     //
    // }
}