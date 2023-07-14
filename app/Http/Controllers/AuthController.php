<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function forgot_password()
    {
        return view('auth.forgot-password');
    }

    public function doRegister(Request $request)
    {
        // validation
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'max:100', 'email', 'unique:' . User::class],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required', Rules\Password::defaults()],
        ]);

        // register user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'verification_code' => rand(1000, 9999),
            'password' => Hash::make($request->password),
        ]);

        // assign as user
        $user->assignRole('user');

        // login proccess
        Auth::login($user);

        return redirect()->route('dashboard.page');
    }

    public function doLogin(Request $request)
    {
        // validasi
        $credentials = $request->validate([
            'email' => ['required', 'string', 'max:100', 'email'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->hasRole('admin')) {
                return redirect()->intended('/dashboard');
            } else if (auth()->user()->hasRole('user')) {
                return redirect()->route('dashboard.page');
            }
        }
    }


    public function doLogout(Request $request)
    {
        // fungsi logout
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index.page');
    }
}
