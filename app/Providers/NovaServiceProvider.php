<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Event;
use App\Models\EventTag;
use App\Models\Ticket;
use App\Nova\License;
use App\Nova\Series;
use App\Models\User as AppUser;
use App\Models\Venue;
use App\Nova\User as NovaUser;
use App\Nova\Dashboards\Sales;
use App\Nova\Lenses\MostValuableUsers;
use App\Nova\Refund;
use App\Nova\User;
use Laravel\Nova\Dashboards\Main;
use Laravel\Nova\Menu\MenuGroup;
use Laravel\Nova\Menu\Menu;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

use Vyuldashev\NovaPermission\PermissionPolicy;
use Vyuldashev\NovaPermission\RolePolicy;
use Vyuldashev\NovaPermission\NovaPermissionTool;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        Nova::userTimezone(function (Request $request) {
            return $request->user()?->timezone;
        });

        // Nova::mainMenu(function (Request $request) {
        //     return [
        //         // MenuSection::dashboard(Main::class)->icon('chart-bar'),
        //         // MenuSection::make('Events', [
        //         //     MenuItem::resource(Ticket::class),
        //         //     MenuItem::resource(Event::class),
        //         //     MenuItem::resource(EventTag::class),
        //         //     MenuItem::resource(Venue::class),
        //         // ])->icon('document-text')->collapsable(),

        //         // MenuSection::make('Configuration', [
        //         //     MenuItem::resource(AppUser::class),
        //         // ])->icon('user')->collapsable(),

        //         // protected $fillable = [
        //         //     'name',
        //         //     'email',
        //         //     'password',
        //         // ];

        //         // MenuSection::make('Customers', [
        //         //     MenuItem::resource(NovaUser::class),
        //         //     MenuItem::resource(License::class),
        //         // ])->icon('user')->collapsable(),

        //         // MenuSection::make('Content', [
        //         //     MenuItem::resource(Series::class),
        //         //     MenuItem::resource(Release::class),
        //         // ])->icon('document-text')->collapsable(),
        //     ];
        // });
        $this->getMyMainMenu();
        $this->getFooterContent();
    }

    private function getMyMainMenu()
    {
        Nova::mainMenu(function (Request $request, Menu $menu) {
            return [
                MenuSection::dashboard(Main::class)->icon('view-grid'),
                // MenuSection::make('Price Tracker')
                //     ->path('/price-tracker')
                //     ->icon('server'),
                MenuSection::make('Events', [
                    MenuSection::make('Manage Events',[
                        MenuItem::make('Events','/resources/events'),
                        MenuItem::make('Create Events','/resources/events/new'),
                        MenuItem::make('Events Tags','/resources/event-tags'),
                        MenuItem::make('Create Events Tags','/resources/event-tags/new'),
                    ])
                    ->icon('calendar')->collapsable(),
                    MenuSection::make('Manage Tickets',[
                        MenuItem::make('Tickets','/resources/tickets'),
                        MenuItem::make('Create Tickets','/resources/tickets/new'),
                    ])
                    ->icon('ticket')->collapsable(),
                    MenuSection::make('Manage Venues',[
                        MenuItem::make('Venues','/resources/venues'),
                        MenuItem::make('Create Venues','/resources/venues/new'),
                    ])
                    ->icon('location-marker')->collapsable(),
                    MenuSection::make('Manage Categories',[
                        MenuItem::make('Categories','/resources/categories'),
                        MenuItem::make('Create Categories','/resources/categories/new'),
                    ])
                    ->icon('office-building')->collapsable(),
                    // MenuItem::make('Tickets','/resources/tickets'),
                    // MenuItem::make('Events','/resources/events'),
                    // MenuItem::make('Events Tags','/resources/event-tags'),
                    // MenuItem::make('Venues','/resources/venues'),
                    // MenuItem::make('Categories','/resources/categories'),
                ])->icon('server'),

                // MenuSection::make('Events', [
                //     MenuItem::resource(Category::class),
                //     // MenuItem::resource(Event::class),
                //     // MenuItem::resource(EventTag::class),
                //     // MenuItem::resource(Venue::class),
                // ])->icon('document-text')->collapsable(),

                MenuSection::make('Configuration', [
                    MenuItem::resource(NovaUser::class),
                ])->icon('user')->collapsable(),

                //     MenuGroup::make('Customers', [
                //         MenuItem::lens(NovaUser::class, MostValuableUsers::class),
                //     ]),
                // ]),
            ];
        });
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            // ...
            // \Vyuldashev\NovaPermission\NovaPermissionTool::make(),

            /* sukses */
            NovaPermissionTool::make()
            ->rolePolicy(RolePolicy::class)
            ->permissionPolicy(PermissionPolicy::class),

            // new \Pktharindu\NovaPermissions\NovaPermissions(),
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function getFooterContent(): void{
        Nova::footer(function ($request){
            return Blade::render(string: 'nova/footer');
        });

    }
}
