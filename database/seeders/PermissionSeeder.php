<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'edit profile',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'forgot password',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'delete account',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'manage spatie',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'manage permit',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'manage role',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'manage user',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'manage category',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'manage book',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'accept booking',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'search book',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'can booking',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'can read',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'review book',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'wishlist book',
            'guard_name' => 'web',
        ]);
    }
}
