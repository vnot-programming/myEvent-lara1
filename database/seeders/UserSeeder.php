<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Pktharindu\NovaPermissions\Permission;
// use Pktharindu\NovaPermissions\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // DB::table('users')->insert([
        //     [
        //         'name'=>'Administrator',
        //         'email'=>'admin@gmail.com',
        //         'password'=>Hash::make('f3rifeb'),
        //     ],
        //     [
        //         'name'=>'Sponsor',
        //         'email'=>'sponsor@gmail.com',
        //         'password'=>Hash::make('f3rifeb')
        //     ],
        //     [
        //         'name'=>'User',
        //         'email'=>'user@gmail.com',
        //         'password'=>Hash::make('f3rifeb')
        //     ]
        // ]);

        // DB::table('roles')->insert([
        //     [
        //         'name'=>'super-admin',
        //         'guard_name'=>'web',
        //     ]
        // ]);

        // DB::table('permissions')->insert([
        //     [ # USERS
        //         'name'=>'manage users',
        //         'permission_slug'=>'manage-users',
        //         'guard_name'=>'web',
        //     ],
        //     [
        //         'name'=>'create users',
        //         'permission_slug'=>'create-users',
        //         'guard_name'=>'web',
        //     ],
        //     [
        //         'name'=>'edit users',
        //         'permission_slug'=>'edit-users',
        //         'guard_name'=>'web',
        //     ],
        //     [
        //         'name'=>'delete users',
        //         'permission_slug'=>'delete-users',
        //         'guard_name'=>'web',
        //     ],
        //     [ # ROLES
        //         'name'=>'manage roles',
        //         'permission_slug'=>'manage-roles',
        //         'guard_name'=>'web',
        //     ],
        //     [
        //         'name'=>'create roles',
        //         'permission_slug'=>'create-roles',
        //         'guard_name'=>'web',
        //     ],
        //     [
        //         'name'=>'edit roles',
        //         'permission_slug'=>'edit-roles',
        //         'guard_name'=>'web',
        //     ],
        //     [
        //         'name'=>'delete roles',
        //         'permission_slug'=>'delete-roles',
        //         'guard_name'=>'web',
        //     ],
        //     [ # PERMISSION,
        //         'name'=>'manage permission',
        //         'permission_slug'=>'manage-permission',
        //         'guard_name'=>'web',
        //     ],
        //     [
        //         'name'=>'create permission',
        //         'permission_slug'=>'create-permission',
        //         'guard_name'=>'web',
        //     ],
        //     [
        //         'name'=>'edit permission',
        //         'permission_slug'=>'edit-permission',
        //         'guard_name'=>'web',
        //     ],
        //     [
        //         'name'=>'delete permission',
        //         'permission_slug'=>'delete-permission',
        //         'guard_name'=>'web',
        //     ],
        //     [ # VENUES
        //         'name'=>'manage venues',
        //         'permission_slug'=>'manage-venues',
        //         'guard_name'=>'web',
        //     ],
        //     [
        //         'name'=>'create venues',
        //         'permission_slug'=>'create-venues',
        //         'guard_name'=>'web',
        //     ],
        //     [
        //         'name'=>'edit venues',
        //         'permission_slug'=>'edit-venues',
        //         'guard_name'=>'web',
        //     ],
        //     [
        //         'name'=>'delete venues',
        //         'permission_slug'=>'delete-venues',
        //         'guard_name'=>'web',
        //     ],
        //     [ # CATEGORY
        //         'name'=>'manage category',
        //         'permission_slug'=>'manage-category',
        //         'guard_name'=>'web',
        //     ],
        //     [
        //         'name'=>'create category',
        //         'permission_slug'=>'create-category',
        //         'guard_name'=>'web',
        //     ],
        //     [
        //         'name'=>'edit category',
        //         'permission_slug'=>'edit-category',
        //         'guard_name'=>'web',
        //     ],
        //     [
        //         'name'=>'delete category',
        //         'permission_slug'=>'delete-category',
        //         'guard_name'=>'web',
        //     ],
        // ]);

        // DB::table('model_has_permissions')->insert([
        //     [ # USERS
        //         'permission_id'=>'1',
        //         'model_type'=>'App\Models\User',
        //         'model_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'2',
        //         'model_type'=>'App\Models\User',
        //         'model_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'3',
        //         'model_type'=>'App\Models\User',
        //         'model_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'4',
        //         'model_type'=>'App\Models\User',
        //         'model_id'=>'1',
        //     ],
        //     [ # VENUES
        //         'permission_id'=>'13',
        //         'model_type'=>'App\Models\Venue',
        //         'model_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'14',
        //         'model_type'=>'App\Models\Venue',
        //         'model_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'15',
        //         'model_type'=>'App\Models\Venue',
        //         'model_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'16',
        //         'model_type'=>'App\Models\Venue',
        //         'model_id'=>'1',
        //     ],
        //     [ # CATEGORY
        //         'permission_id'=>'13',
        //         'model_type'=>'App\Models\Category',
        //         'model_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'14',
        //         'model_type'=>'App\Models\Category',
        //         'model_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'15',
        //         'model_type'=>'App\Models\Category',
        //         'model_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'16',
        //         'model_type'=>'App\Models\Category',
        //         'model_id'=>'1',
        //     ],
        // ]);

        // DB::table('model_has_roles')->insert([
        //     [
        //         'role_id'=>'1',
        //         'model_type'=>'App\Models\User',
        //         'model_id'=>'1',
        //     ],
        //     [
        //         'role_id'=>'1',
        //         'model_type'=>'App\Models\Category',
        //         'model_id'=>'1',
        //     ],
        //     [
        //         'role_id'=>'1',
        //         'model_type'=>'App\Models\Venue',
        //         'model_id'=>'1',
        //     ],
        //     [
        //         'role_id'=>'1',
        //         'model_type'=>'App\Models\Ticket',
        //         'model_id'=>'1',
        //     ],
        //     [
        //         'role_id'=>'1',
        //         'model_type'=>'App\Models\Event',
        //         'model_id'=>'1',
        //     ],
        //     [
        //         'role_id'=>'1',
        //         'model_type'=>'App\Models\EventTag',
        //         'model_id'=>'1',
        //     ]
        // ]);

        // DB::table('role_has_permissions')->insert([
        //     [
        //         'permission_id'=>'1',
        //         'role_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'2',
        //         'role_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'3',
        //         'role_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'4',
        //         'role_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'5',
        //         'role_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'6',
        //         'role_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'7',
        //         'role_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'8',
        //         'role_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'9',
        //         'role_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'10',
        //         'role_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'11',
        //         'role_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'12',
        //         'role_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'13',
        //         'role_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'14',
        //         'role_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'15',
        //         'role_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'16',
        //         'role_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'17',
        //         'role_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'18',
        //         'role_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'19',
        //         'role_id'=>'1',
        //     ],
        //     [
        //         'permission_id'=>'20',
        //         'role_id'=>'1',
        //     ]
        // ]);

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

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'restore user']);

        // Permission::create(['name' => 'manage roles']);
        // Permission::create(['name' => 'create roles']);
        // Permission::create(['name' => 'edit roles']);
        // Permission::create(['name' => 'delete roles']);
        // Permission::create(['name' => 'delete roles']);

        // Permission::create(['name' => 'manage permissions']);
        // Permission::create(['name' => 'create permissions']);
        // Permission::create(['name' => 'edit permissions']);
        // Permission::create(['name' => 'delete permissions']);
        // Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'manage category']);
        Permission::create(['name' => 'create category']);
        Permission::create(['name' => 'edit category']);
        Permission::create(['name' => 'delete category']);
        Permission::create(['name' => 'restore category']);

        Permission::create(['name' => 'manage venues']);
        Permission::create(['name' => 'create venues']);
        Permission::create(['name' => 'edit venues']);
        Permission::create(['name' => 'delete venues']);
        Permission::create(['name' => 'restore venues']);

        Permission::create(['name' => 'manage tickets']);
        Permission::create(['name' => 'create tickets']);
        Permission::create(['name' => 'edit tickets']);
        Permission::create(['name' => 'delete tickets']);
        Permission::create(['name' => 'restore tickets']);

        Permission::create(['name' => 'manage events']);
        Permission::create(['name' => 'create events']);
        Permission::create(['name' => 'edit events']);
        Permission::create(['name' => 'delete events']);
        Permission::create(['name' => 'restore events']);

        Permission::create(['name' => 'manage event tags']);
        Permission::create(['name' => 'create event tags']);
        Permission::create(['name' => 'edit event tags']);
        Permission::create(['name' => 'delete event tags']);
        Permission::create(['name' => 'restore event tags']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'user']);

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('manage category');
        $role2->givePermissionTo('edit category');
        $role2->givePermissionTo('delete category');
        $role2->givePermissionTo('restore category');

        $role2->givePermissionTo('manage venues');
        $role2->givePermissionTo('create venues');
        $role2->givePermissionTo('edit venues');
        $role2->givePermissionTo('delete venues');
        $role2->givePermissionTo('restore venues');

        $role2->givePermissionTo('manage tickets');
        $role2->givePermissionTo('create tickets');
        $role2->givePermissionTo('edit tickets');
        $role2->givePermissionTo('delete tickets');
        $role2->givePermissionTo('restore tickets');

        $role2->givePermissionTo('manage events');
        $role2->givePermissionTo('create events');
        $role2->givePermissionTo('edit events');
        $role2->givePermissionTo('delete events');
        $role2->givePermissionTo('restore events');

        $role2->givePermissionTo('manage event tags');
        $role2->givePermissionTo('create event tags');
        $role2->givePermissionTo('edit event tags');
        $role2->givePermissionTo('delete event tags');
        $role2->givePermissionTo('restore event tags');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // $role3->givePermissionTo('manage category');
        // $role3->givePermissionTo('edit category');
        // $role3->givePermissionTo('delete category');
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = User::factory()->create([
            'name' => 'Example User',
            'email' => 'user@example.com',
        ]);
        $user->assignRole($role1);

        $user = User::factory()->create([
            'name' => 'Example Admin User',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role2);

        $user = User::factory()->create([
            'name' => 'Example Super-Admin User',
            'email' => 'superadmin@example.com',
        ]);
        $user->assignRole($role3);

    }
}