<?php

return [
    /*
    |--------------------------------------------------------------------------
    | User model class
    |--------------------------------------------------------------------------
    */

    'user_model'        => 'App\Models\User',
    'venue_model'       => 'App\Models\Venue',
    'ticket_model'      => 'App\Models\Ticket',
    'event_model'       => 'App\Models\Event',
    'event_tag_model'   => 'App\Models\EventTag',
    'category_model'    => 'App\Models\Category',

    /*
    |--------------------------------------------------------------------------
    | Nova User resource tool class
    |--------------------------------------------------------------------------
    */

    'user_resource'         => 'App\Nova\User',
    'venue_resource'        => 'App\Nova\Venue',
    'ticket_resource'       => 'App\Nova\Ticket',
    'event_resource'        => 'App\Nova\Event',
    'event_tag_resource'    => 'App\Nova\EventTag',
    'category_resource'     => 'App\Nova\Category',

    /*
    |--------------------------------------------------------------------------
    | The group associated with the resource
    |--------------------------------------------------------------------------
    */

    'role_resource_group' => 'Other',

    /*
    |--------------------------------------------------------------------------
    | Database table names
    |--------------------------------------------------------------------------
    | When using the "HasRoles" trait from this package, we need to know which
    | table should be used to retrieve your roles. We have chosen a basic
    | default value but you may easily change it to any table you like.
    */

    'table_names' => [
        'roles' => 'roles',
        'role_permission' => 'role_permission',
        'role_user' => 'role_user',
        'users' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Application Permissions
    |--------------------------------------------------------------------------
    */

    // 'permissions' => [
    //     'manage users' => [
    //         'display_name' => 'View users',
    //         'description'  => 'Can view users',
    //         'group'        => 'User',
    //     ],

    //     'create users' => [
    //         'display_name' => 'Create users',
    //         'description'  => 'Can create users',
    //         'group'        => 'User',
    //     ],

    //     'edit users' => [
    //         'display_name' => 'Edit users',
    //         'description'  => 'Can edit users',
    //         'group'        => 'User',
    //     ],

    //     'delete users' => [
    //         'display_name' => 'Delete users',
    //         'description'  => 'Can delete users',
    //         'group'        => 'User',
    //     ],

    //     'manage roles' => [
    //         'display_name' => 'View roles',
    //         'description'  => 'Can view roles',
    //         'group'        => 'Role',
    //     ],

    //     'create roles' => [
    //         'display_name' => 'Create roles',
    //         'description'  => 'Can create roles',
    //         'group'        => 'Role',
    //     ],

    //     'edit roles' => [
    //         'display_name' => 'Edit roles',
    //         'description'  => 'Can edit roles',
    //         'group'        => 'Role',
    //     ],

    //     'delete roles' => [
    //         'display_name' => 'Delete roles',
    //         'description'  => 'Can delete roles',
    //         'group'        => 'Role',
    //     ],
    //     'manage permission' => [
    //         'display_name' => 'View permission',
    //         'description'  => 'Can view permission',
    //         'group'        => 'Role',
    //     ],

    //     'create permission' => [
    //         'display_name' => 'Create permission',
    //         'description'  => 'Can create permission',
    //         'group'        => 'Role',
    //     ],

    //     'edit permission' => [
    //         'display_name' => 'Edit permission',
    //         'description'  => 'Can edit permission',
    //         'group'        => 'Role',
    //     ],

    //     'delete permission' => [
    //         'display_name' => 'Delete permission',
    //         'description'  => 'Can delete permission',
    //         'group'        => 'Role',
    //     ],
    //     'manage venues' => [
    //         'display_name' => 'View venues',
    //         'description'  => 'Can view venues',
    //         'group'        => 'Events',
    //     ],
    //     'create venues' => [
    //         'display_name' => 'Create venues',
    //         'description'  => 'Can create venues',
    //         'group'        => 'Events',
    //     ],
    //     'edit venues' => [
    //         'display_name' => 'Edit venues',
    //         'description'  => 'Can edit venues',
    //         'group'        => 'Events',
    //     ],
    //     'delete venues' => [
    //         'display_name' => 'Delete venues',
    //         'description'  => 'Can delete venues',
    //         'group'        => 'Events',
    //     ],
    //     'manage category' => [
    //         'display_name' => 'View category',
    //         'description'  => 'Can view category',
    //         'group'        => 'Events',
    //     ],
    //     'create category' => [
    //         'display_name' => 'Create category',
    //         'description'  => 'Can create category',
    //         'group'        => 'Events',
    //     ],
    //     'edit venues' => [
    //         'display_name' => 'Edit category',
    //         'description'  => 'Can edit category',
    //         'group'        => 'Events',
    //     ],
    //     'delete category' => [
    //         'display_name' => 'Delete category',
    //         'description'  => 'Can delete category',
    //         'group'        => 'Events',
    //     ],
    // ],
];
