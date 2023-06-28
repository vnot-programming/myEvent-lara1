<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\Category;
use App\Models\User;
use App\Policies\CategoryPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use Pktharindu\NovaPermissions\Traits\ValidatesPermissions;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    use ValidatesPermissions;
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        Category::class=>CategoryPolicy::class,
        \Pktharindu\NovaPermissions\Role::class => \App\Policies\RolePolicy::class,

        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        $this->registerPolicies();
        foreach (config('nova-permissions.permissions') as $key => $permissions) {
            Gate::define($key, function (User $user) use ($key) {
                if ($this->nobodyHasAccess($key)) {
                    return true;
                }

                return $user->hasPermissionTo($key);
            });
        }
    }
}