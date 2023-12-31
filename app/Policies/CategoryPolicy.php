<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class CategoryPolicy
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
        return true;
        // if ($user->type == 'admin2') {
        //     return true;
        // }else{
        //     return false;
        // }
        // if ($user->hasRole('Super-Admin')) {
        //     return true;
        // }else{
        //     return $user->hasPermissionTo('manage category');
        // }
        // return $user->hasPermissionTo('manage category');
    }

    // /* *
    //  * Determine whether the user can view the model.
    //  */
    public function view(User $user, Category $category): bool
    {
        //
        return true;
        // if ($user->hasRole('Super-Admin')) {
        //     return true;
        // }else{
        //     return $user->hasPermissionTo('manage category');
        // }
        // return $user->hasPermissionTo('manage category');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        return true;
        // if ($user->hasRole('Super-Admin')) {
        //     return true;
        // }else{
        //     return $user->hasPermissionTo('create category');
        // }
        // return $user->hasPermissionTo('create category');
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
        //     return $user->hasPermissionTo('edit category');
        // }
        // return $user->hasPermissionTo('edit category');
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
        //     return $user->hasPermissionTo('delete category');
        // }
        // return $user->hasPermissionTo('delete category');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Category $category): bool
    {
        //
        return true;
        // if ($user->hasRole('Super-Admin')) {
        //     return true;
        // }else{
        //     return $user->hasPermissionTo('restore category');
        // }
    }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, Category $category): bool
    // {
    //     //
    //     return true;
    // }
}