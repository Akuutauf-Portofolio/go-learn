<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify_email()
    {
        return view('auth.verify-email');
    }

    public function verify_code()
    {
        return view('auth.verify-email');
    }
}
