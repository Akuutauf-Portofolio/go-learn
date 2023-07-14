<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verification_code_page()
    {
        return view('auth.verify-email');
    }
}
