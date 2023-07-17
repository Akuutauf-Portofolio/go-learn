<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function dashboard_admin()
    {
        return view('admin.dashboard-admin');
    }

    public function profile_admin()
    {
        return view('admin.profile-admin');
    }
}
