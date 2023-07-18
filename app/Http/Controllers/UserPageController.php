<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserPageController extends Controller
{
    public function dashboard_user()
    {
        return view('users.dashboard-user');
    }

    public function setting_user($user_id)
    {
        $data = [
            'user_id' => User::findOrFail($user_id),
        ];

        if (Auth::user()->id != $user_id) {
            abort(404);
        }

        return view('users.setting-user', $data);
    }


    public function delete_account(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);

        // Melakukan logout user yang sedang aktif
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Hapus data foto jika ada
        if ($user->photo) {
            Storage::delete($user->photo);
        }

        // Hapus data user
        $user->delete();

        return redirect()->route('landing.page');
    }
}
