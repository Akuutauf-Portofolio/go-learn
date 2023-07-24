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

        return redirect()->route('dashboard.user.page');
    }

    public function doLogin(Request $request)
    {
        // validasi
        $credentials = $request->validate([
            'email' => ['required', 'string', 'max:100', 'email'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        // Mengecek apakah user memiliki role yang diizinkan untuk login
        $user = User::where('email', $credentials['email'])->first();
        if (!$user || !$user->hasAnyRole(['admin', 'user'])) {
            return back()->withErrors([
                'email' => 'User must have valid role to log in.',
            ])->onlyInput('email');
        }

        // Jika user memiliki role yang diizinkan, mencoba proses login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->hasRole('admin')) {
                return redirect()->intended('/dashboard-admin');
            } else if (auth()->user()->hasRole('user')) {
                return redirect()->route('dashboard.user.page');
            }
        }

        // menampilkan pesan error jika kredential yang dimasukkan salah
        return back()->withErrors([
            'email' => 'Email and password invalid.',
        ])->onlyInput('email');
    }

    public function doLogout(Request $request)
    {
        // fungsi logout
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing.page');
    }
}
