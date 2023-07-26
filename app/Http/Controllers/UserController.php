<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'users' => User::all(),
            'roles' => Role::all(),
        ];

        return view('admin.manage.user.manage-user', $data);
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
        $validated = $request->validate([
            'name' => ['required', 'string', Rule::unique('users')->ignore(null, 'name'),],
            'email' => ['required', 'string', 'max:100', 'email', 'unique:' . User::class],
            'birthdate' => ['required', 'date'],
            'gender' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'password' => ['required', 'min:8'],
            'role' => ['required'],
        ]);

        // create a new user
        $new_user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'birthdate' => $validated['birthdate'],
            'gender' => $validated['gender'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
        ]);

        // Ambil ID role dari request
        $roleId = $request->role;

        // Validasi keberadaan ID role dalam database
        $role = Role::findOrFail($roleId);

        // Assign role ke user baru
        $new_user->assignRole($role);

        return redirect()->route('manage.user.page');
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
    public function edit($user_id)
    {
        $user = User::findOrFail($user_id);

        // Ambil role yang dimiliki oleh user
        $role = $user->roles()->first(); // Mengambil role pertama dari user

        $data = [
            'user' => $user,
            'role' => $role,
            'roles' => Role::all(),
            'action' => route('manage.user.update', $user_id),
        ];

        return view('admin.manage.user.form', $data);
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
        $validated = $request->validate([
            'name' => ['required', 'string', Rule::unique('users')->ignore($user_id)],
            'email' => ['required', 'string', 'max:100', 'email', Rule::unique('users')->ignore($user_id)],
            'birthdate' => ['required', 'date'],
            'gender' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'role' => ['required'],
        ]);

        $user = User::findOrFail($user_id);

        // Update user data
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'birthdate' => $validated['birthdate'],
            'gender' => $validated['gender'],
            'phone' => $validated['phone'],
        ]);

        // Ambil ID role baru dari request
        $roleId = $request->role;

        // Ambil data role lama dari user
        $old_role = $user->roles->first();

        // Validasi keberadaan ID role dalam database
        $role = Role::findOrFail($roleId);

        // Revoke role dan permission lama
        if ($old_role) {
            $user->removeRole($old_role);
            $user->revokePermissionTo($old_role->permissions);
        }

        // Assign role baru dan permission dari role tersebut ke user
        $user->assignRole($role);
        $user->givePermissionTo($role->permissions);

        return redirect()->route('manage.user.page');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        // Get the user data
        $user = User::findOrFail($user_id);

        // Detach all roles from the user
        $user->roles()->detach();

        // Delete the user
        $user->delete();

        return redirect()->route('manage.user.page');
    }
}
