<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            [
                'name'=>'Administrator',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('f3rifeb'),
            ],
            [
                'name'=>'Sponsor',
                'email'=>'sponsor@gmail.com',
                'password'=>Hash::make('f3rifeb')
            ],
            [
                'name'=>'User',
                'email'=>'user@gmail.com',
                'password'=>Hash::make('f3rifeb')
            ]
        ]);

        DB::table('roles')->insert([
            [
                'name'=>'super-admin',
                'guard_name'=>'web',
            ]
        ]);

        DB::table('permissions')->insert([
            [ # USERS
                'name'=>'manage users',
                'permission_slug'=>'manage-users',
                'guard_name'=>'web',
            ],
            [
                'name'=>'create users',
                'permission_slug'=>'create-users',
                'guard_name'=>'web',
            ],
            [
                'name'=>'edit users',
                'permission_slug'=>'edit-users',
                'guard_name'=>'web',
            ],
            [
                'name'=>'delete users',
                'permission_slug'=>'delete-users',
                'guard_name'=>'web',
            ],
            [ # ROLES
                'name'=>'manage roles',
                'permission_slug'=>'manage-roles',
                'guard_name'=>'web',
            ],
            [
                'name'=>'create roles',
                'permission_slug'=>'create-roles',
                'guard_name'=>'web',
            ],
            [
                'name'=>'edit roles',
                'permission_slug'=>'edit-roles',
                'guard_name'=>'web',
            ],
            [
                'name'=>'delete roles',
                'permission_slug'=>'delete-roles',
                'guard_name'=>'web',
            ],
            [ # PERMISSION,
                'name'=>'manage permission',
                'permission_slug'=>'manage-permission',
                'guard_name'=>'web',
            ],
            [
                'name'=>'create permission',
                'permission_slug'=>'create-permission',
                'guard_name'=>'web',
            ],
            [
                'name'=>'edit permission',
                'permission_slug'=>'edit-permission',
                'guard_name'=>'web',
            ],
            [
                'name'=>'delete permission',
                'permission_slug'=>'delete-permission',
                'guard_name'=>'web',
            ],
            [ # VENUES
                'name'=>'manage venues',
                'permission_slug'=>'manage-venues',
                'guard_name'=>'web',
            ],
            [
                'name'=>'create venues',
                'permission_slug'=>'create-venues',
                'guard_name'=>'web',
            ],
            [
                'name'=>'edit venues',
                'permission_slug'=>'edit-venues',
                'guard_name'=>'web',
            ],
            [
                'name'=>'delete venues',
                'permission_slug'=>'delete-venues',
                'guard_name'=>'web',
            ],
            [ # CATEGORY
                'name'=>'manage category',
                'permission_slug'=>'manage-category',
                'guard_name'=>'web',
            ],
            [
                'name'=>'create category',
                'permission_slug'=>'create-category',
                'guard_name'=>'web',
            ],
            [
                'name'=>'edit category',
                'permission_slug'=>'edit-category',
                'guard_name'=>'web',
            ],
            [
                'name'=>'delete category',
                'permission_slug'=>'delete-category',
                'guard_name'=>'web',
            ],
        ]);

        DB::table('model_has_permissions')->insert([
            [ # USERS
                'permission_id'=>'1',
                'model_type'=>'App\Models\User',
                'model_id'=>'1',
            ],
            [
                'permission_id'=>'2',
                'model_type'=>'App\Models\User',
                'model_id'=>'1',
            ],
            [
                'permission_id'=>'3',
                'model_type'=>'App\Models\User',
                'model_id'=>'1',
            ],
            [
                'permission_id'=>'4',
                'model_type'=>'App\Models\User',
                'model_id'=>'1',
            ],
            [ # VENUES
                'permission_id'=>'13',
                'model_type'=>'App\Models\Venue',
                'model_id'=>'1',
            ],
            [
                'permission_id'=>'14',
                'model_type'=>'App\Models\Venue',
                'model_id'=>'1',
            ],
            [
                'permission_id'=>'15',
                'model_type'=>'App\Models\Venue',
                'model_id'=>'1',
            ],
            [
                'permission_id'=>'16',
                'model_type'=>'App\Models\Venue',
                'model_id'=>'1',
            ],
            [ # CATEGORY
                'permission_id'=>'13',
                'model_type'=>'App\Models\Category',
                'model_id'=>'1',
            ],
            [
                'permission_id'=>'14',
                'model_type'=>'App\Models\Category',
                'model_id'=>'1',
            ],
            [
                'permission_id'=>'15',
                'model_type'=>'App\Models\Category',
                'model_id'=>'1',
            ],
            [
                'permission_id'=>'16',
                'model_type'=>'App\Models\Category',
                'model_id'=>'1',
            ],
        ]);
    // 'category_model'    => 'App\Models\Category',
    // 'venue_model'       => 'App\Models\Venue',
    // 'ticket_model'      => 'App\Models\Ticket',
    // 'event_model'       => 'App\Models\Event',
    // 'event_tag_model'   => 'App\Models\EventTag',
        DB::table('model_has_roles')->insert([
            [
                'role_id'=>'1',
                'model_type'=>'App\Models\User',
                'model_id'=>'1',
            ],
            [
                'role_id'=>'1',
                'model_type'=>'App\Models\Category',
                'model_id'=>'1',
            ],
            [
                'role_id'=>'1',
                'model_type'=>'App\Models\Venue',
                'model_id'=>'1',
            ],
            [
                'role_id'=>'1',
                'model_type'=>'App\Models\Ticket',
                'model_id'=>'1',
            ],
            [
                'role_id'=>'1',
                'model_type'=>'App\Models\Event',
                'model_id'=>'1',
            ],
            [
                'role_id'=>'1',
                'model_type'=>'App\Models\EventTag',
                'model_id'=>'1',
            ]
        ]);

        DB::table('role_has_permissions')->insert([
            [
                'permission_id'=>'1',
                'role_id'=>'1',
            ],
            [
                'permission_id'=>'2',
                'role_id'=>'1',
            ],
            [
                'permission_id'=>'3',
                'role_id'=>'1',
            ],
            [
                'permission_id'=>'4',
                'role_id'=>'1',
            ],
            [
                'permission_id'=>'5',
                'role_id'=>'1',
            ],
            [
                'permission_id'=>'6',
                'role_id'=>'1',
            ],
            [
                'permission_id'=>'7',
                'role_id'=>'1',
            ],
            [
                'permission_id'=>'8',
                'role_id'=>'1',
            ],
            [
                'permission_id'=>'9',
                'role_id'=>'1',
            ],
            [
                'permission_id'=>'10',
                'role_id'=>'1',
            ],
            [
                'permission_id'=>'11',
                'role_id'=>'1',
            ],
            [
                'permission_id'=>'12',
                'role_id'=>'1',
            ],
            [
                'permission_id'=>'13',
                'role_id'=>'1',
            ],
            [
                'permission_id'=>'14',
                'role_id'=>'1',
            ],
            [
                'permission_id'=>'15',
                'role_id'=>'1',
            ],
            [
                'permission_id'=>'16',
                'role_id'=>'1',
            ],
            [
                'permission_id'=>'17',
                'role_id'=>'1',
            ],
            [
                'permission_id'=>'18',
                'role_id'=>'1',
            ],
            [
                'permission_id'=>'19',
                'role_id'=>'1',
            ],
            [
                'permission_id'=>'20',
                'role_id'=>'1',
            ]
        ]);

        // DB::table('role_permission')->insert([
        //     [
        //         'role_id'=>'1',
        //         'permission_slug'=>'manage-users',
        //     ]
        // ]);

        // DB::table('role_user')->insert([
        //     [
        //         'role_id'=>'1',
        //         'user_id'=>'1',
        //     ]
        // ]);

    }
}