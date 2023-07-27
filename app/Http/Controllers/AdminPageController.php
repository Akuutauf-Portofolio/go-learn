<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminPageController extends Controller
{
    public function dashboard_admin()
    {
        return view('admin.dashboard-admin');
    }
}
