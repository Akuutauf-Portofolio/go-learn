<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;

class SpecialPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'users' => User::whereHas('roles', function ($query) {
                $query->where('name', 'user');
            })->get(),
            'roles' => Role::all(),
        ];

        return view('admin.manage.special-permission.manage-special-permission', $data);
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
    public function edit($user_id)
    {
        $user = User::findOrFail($user_id);

        if ($user->hasRole('user')) {

            // Ambil data permission dari relasi 'permissions'
            $permissionsFromModel = $user->permissions()->get();

            // Ambil data permission dari permission yang diassign melalui role
            $permissionsFromRoles = collect();
            foreach ($user->roles as $role) {
                $permissionsFromRoles = $permissionsFromRoles->merge($role->permissions);
            }

            // Gabungkan data permission dari dua relasi
            $permissions = $permissionsFromModel->merge($permissionsFromRoles);

            $data = [
                'user' => $user,
                'permissions' => Permission::all(),
                'user_permissions' => $permissions,
                'action' => route('manage.special.permission.update', $user_id),
            ];

            return view('admin.manage.special-permission.form', $data);
        } else {
            return redirect()->route('unauthorized.page');
        }
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
        $user = User::findOrFail($user_id);

        // check if the user is only user role
        if ($user->hasRole('user')) {

            $validated = $request->validate([
                'name' => ['required', 'string', Rule::unique('users')->ignore($user_id),],
            ]);

            // Update user data
            $user->update([
                'name' => $validated['name'],
            ]);

            $permissions = Permission::all();
            $check_permissions = $request->except('_token', '_method', 'name');

            // Loop untuk mencocokkan dan meng-assign permission ke user
            if ($check_permissions) {
                foreach ($permissions as $permission) {
                    if (array_key_exists($permission->id, $check_permissions)) {
                        // Assign permission yang dipilih
                        $user->givePermissionTo($permission);
                    } else {
                        // Revoke permission yang tidak dipilih
                        $user->revokePermissionTo($permission);
                    }
                }
            } else {
                // Jika tidak ada permission yang dipilih, revoke semua permission dari role
                $user->revokePermissionTo($permissions);
            }

            return redirect()->route('manage.special.permission.page');
        } else {
            return redirect()->route('unauthorized.page');
        }
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
