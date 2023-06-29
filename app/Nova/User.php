<?php

namespace App\Nova;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Vyuldashev\NovaPermission\PermissionBooleanGroup;
use Vyuldashev\NovaPermission\RoleBooleanGroup;
use Vyuldashev\NovaPermission\RoleSelect;
use Laravel\Nova\Fields\MorphToMany;
use Vyuldashev\NovaPermission\Role;
use Vyuldashev\NovaPermission\Permission;

class User extends Resource
{

    // public static $permissionsForAbilities = [
    //   'all' => 'manage users',
    //   'viewAny' => 'view products',
    //   'view' => 'view users',
    //   'create' => 'create users',
    //   'update' => 'update users',
    //   'delete' => 'delete users',
    // //   'restore' => 'restore products',
    // //   'forceDelete' => 'forceDelete products',
    // //   'addAttribute' => 'add product attributes',
    // //   'attachAttribute' => 'attach product attributes',
    // //   'detachAttribute' => 'detach product attributes',
    // ];
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\User>
     */
    public static $model = ModelsUser::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'email',
    ];

    public static function redirectAfterCreate(NovaRequest $request, $resource)
    {
        return '/resources/'.static::uriKey();
    }
    public static function redirectAfterUpdate(NovaRequest $request, $resource)
    {
        return '/resources/'.static::uriKey();
    }
    public static function redirectAfterDelete(NovaRequest $request)
    {
        return null;
    }
    // public static $tableStyle = 'tight';
    // public static $clickAction = 'select';
    public static $perPageOptions = [10,20,50];
    public static $trafficCop = true;

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            // ID::make()->sortable(),
            Gravatar::make()->maxWidth(50),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),
            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),
            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', Rules\Password::defaults())
                ->updateRules('nullable', Rules\Password::defaults()),
            // RoleBooleanGroup::make('Roles'),
            RoleSelect::make('Roles',)->searchable()->help('Choose your User Role')->hideFromIndex(),
            RoleBooleanGroup::make('Roles')->onlyOnIndex(),
            PermissionBooleanGroup::make('Permissions'),
            // RoleBooleanGroup::make('Roles', 'roles', null, 'description', Role::class),
            // PermissionBooleanGroup::make('Permissions', 'permissions', null, 'description', Permission::class),
            // RoleSelect::make('Role', 'roles', null, 'description', Role::class),

            // MorphToMany::make('Roles', 'roles', Role::class),
            MorphToMany::make('Permissions', 'permissions', Permission::class),

            // BelongsToMany::make('Roles', 'roles', Role::class),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}