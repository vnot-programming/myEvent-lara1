<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\Category;
use App\Models\Event;
use App\Models\EventTag;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Venue;
use App\Policies\CategoryPolicy;
use App\Policies\EventsPolicy;
use App\Policies\EventsTagsPolicy;
use App\Policies\RolePolicy;
use App\Policies\TicketsPolicy;
use App\Policies\UserPolicy;
use App\Policies\VenuePolicy;
use Pktharindu\NovaPermissions\Traits\ValidatesPermissions;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\Permission\Models\Permission;


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
        \Pktharindu\NovaPermissions\Role::class => \App\Policies\RolePolicy::class,

        // User::class => UserPolicy::class,
        // Category::class=>CategoryPolicy::class,
        // Event::class=>EventsPolicy::class,
        // EventTag::class=>EventsTagsPolicy::class,
        // Ticket::class=>TicketsPolicy::class,
        // Venue::class=>VenuePolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        $this->registerPolicies();
        // foreach (config('nova-permissions.permissions') as $key => $permissions) {
        //     Gate::define($key, function (User $user) use ($key) {
        //         if ($this->nobodyHasAccess($key)) {
        //             return true;
        //         }

        //         return $user->hasPermissionTo($key);
        //     });
        // }
        // Implicitly grant "Super-Admin" role all permission checks using can()
       Gate::before(function ($user, $ability) {
        if ($user->hasRole('Super-Admin')) {
            return true;
        }
    });
    }

    protected function getPermissions()
    {
        return Permission::with('roles')->get();
    }
}