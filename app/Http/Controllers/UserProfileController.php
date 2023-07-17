<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function profile_user($user_id)
    {
        $data = [
            'user' => User::findOrFail($user_id),
            'role_name' => User::findOrFail($user_id)->roles->pluck('name')->first(),
            'action' => route('do.update.profile.user', $user_id),
        ];

        return view('users.profile-user', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $data = User::findOrFail($user_id);

        // perintah update profile admin
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'old_password' => 'nullable',
            'new_password' => 'nullable',
            'confirm_new_password' => 'nullable',
            'photo' => 'mimes:jpg,jpeg,png|max:5120',
            'birthdate' => 'required',
            'gender' => 'required',
            'phone' => 'required',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
