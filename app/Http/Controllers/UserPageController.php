<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPageController extends Controller
{
    public function dashboard_user()
    {
        return view('users.dashboard-user');
    }

    public function profile_user()
    {
        return view('users.profile-user');
    }

    public function setting_user()
    {
        return view('users.setting-user');
    }
}
