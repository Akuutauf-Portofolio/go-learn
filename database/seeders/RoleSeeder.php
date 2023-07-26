<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();

        $admin = Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        // ambil data permit milik admin (edit profile, forgot password, manage permit, manage category, manage book, accept booking, search book)
        $edit_profile = $permissions->where('name', 'edit profile')->first();
        $forgot_password = $permissions->where('name', 'forgot password')->first();
        $manage_spatie = $permissions->where('name', 'manage spatie')->first();
        $manage_permit = $permissions->where('name', 'manage permit')->first();
        $manage_role = $permissions->where('name', 'manage role')->first();
        $manage_user = $permissions->where('name', 'manage user')->first();
        $manage_special_permission = $permissions->where('name', 'manage special permission')->first();
        $manage_category = $permissions->where('name', 'manage category')->first();
        $manage_book = $permissions->where('name', 'manage book')->first();
        $accept_booking = $permissions->where('name', 'accept booking')->first();
        $search_book = $permissions->where('name', 'search book')->first();
        $admin->givePermissionTo([$edit_profile, $forgot_password, $manage_spatie, $manage_permit, $manage_role, $manage_user, $manage_special_permission, $manage_category, $manage_book, $accept_booking, $search_book]);

        $user = Role::create([
            'name' => 'user',
            'guard_name' => 'web',
        ]);

        // ambil data permit yang lain untuk user (wishlist book, can booking, can read, review book)
        $wishlist_book = $permissions->where('name', 'wishlist book')->first();
        $can_booking = $permissions->where('name', 'can booking')->first();
        $can_read = $permissions->where('name', 'can read')->first();
        $review_book = $permissions->where('name', 'review book')->first();
        $delete_account = $permissions->where('name', 'delete account')->first();
        $user->givePermissionTo([$edit_profile, $forgot_password, $search_book, $wishlist_book, $can_booking, $can_read, $review_book, $delete_account]);
    }
}
