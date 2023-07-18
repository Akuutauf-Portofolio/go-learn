<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function profile_admin($admin_id)
    {
        if (Auth::user()->id != $admin_id) {
            abort(404);
        }

        $data = [
            'user' => User::findOrFail($admin_id),
            'role_name' => User::findOrFail($admin_id)->roles->pluck('name')->first(),
            'action' => route('do.update.profile.admin', $admin_id),
            'action_password' => route('do.update.password.admin', $admin_id),
        ];

        return view('admin.profile-admin', $data);
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
    public function update(Request $request, $admin_id)
    {
        $data = User::findOrFail($admin_id);

        // validasi field
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'photo' => 'mimes:jpg,jpeg,png|max:5120',
            'birthdate' => 'required',
            'gender' => 'required',
            'phone' => 'required',
        ]);

        // checking any field photo
        if ($request->file('photo')) {
            // if user does not have photo
            if ($data->photo == null || $data->photo == '') {
                $saveData['photo'] = Storage::putFile('public/user', $request->file('photo'));
            } else {
                //   delete any photo files that own already
                Storage::delete($data->photo);

                // and then save new photo
                $saveData['photo'] = Storage::putFile('public/user', $request->file('photo'));
            }
        } else {
            $saveData['photo'] = $data->photo;
        }

        // update an data user profile
        User::where('id', $admin_id)->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'photo' =>  $saveData['photo'],
            'birthdate' => $validated['birthdate'],
            'gender' => $validated['gender'],
            'phone' => $validated['phone'],
        ]);

        return redirect()->route('profile.admin.page', $data);
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
