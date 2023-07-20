<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function dashboard_admin()
    {
        return view('admin.dashboard-admin');
    }

    public function manage_user()
    {
        return view('admin.manage.manage-user');
    }

    public function manage_role()
    {
        return view('admin.manage.manage-role');
    }

    public function manage_permission()
    {
        return view('admin.manage.manage-permission');
    }
}
