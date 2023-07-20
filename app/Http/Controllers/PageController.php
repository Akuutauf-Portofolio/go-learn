<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landing_page()
    {
        return view('landing-page');
    }

    public function error_page()
    {
        return view('auth.error-page');
    }

    public function unauthorized_page()
    {
        return view('auth.forbidden-page');
    }
}
