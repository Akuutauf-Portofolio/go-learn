<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'roles' => Role::all(),
            'permissions' => Permission::all(),
        ];

        return view('admin.manage.role.manage-role', $data);
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
        // Validasi form dan sebagainya (sesuai kebutuhan)
        $validated = $request->validate([
            'name' => ['required', Rule::unique('roles')->ignore(null, 'name')],
        ]);

        // Buat role baru
        $formattedName = strtolower($validated['name']);
        $newRole = Role::create([
            'name' => $formattedName,
            'guard_name' => 'web',
        ]);

        // Ambil data permission dari model Permission
        $permissions = Permission::all();
        $check_permissions = $request->except('_token', 'name');

        // Loop untuk mencocokkan dan meng-assign permission ke role baru
        if ($check_permissions) {
            foreach ($check_permissions as $new_permission) {
                if ($permissions->has($new_permission)) {
                    $newRole->givePermissionTo($new_permission);
                }
            }
        }

        Alert::success('Success Insert', 'Role berhasil ditambahkan');

        return redirect()->route('manage.role.page');
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
    public function edit($role_id)
    {
        $role = Role::findOrFail($role_id);
        $permissions = $role->permissions()->get();

        $data = [
            'role' => $role,
            'permissions' => Permission::all(),
            'role_permissions' => $permissions,
            'action' => route('manage.role.update', $role_id),
        ];

        return view('admin.manage.role.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $role_id)
    {
        // validasi field role
        $validated = $request->validate([
            'name' => ['required', Rule::unique('roles')->ignore($role_id)],
        ]);

        // update role
        $role = Role::findOrFail($role_id);
        $formattedName = strtolower($validated['name']);
        $role->name = $formattedName;
        $role->save();

        // Ambil data permission dari model Permission
        $permissions = Permission::all();
        $check_permissions = $request->except('_token', 'name');

        // Loop untuk mencocokkan dan meng-assign permission ke role baru
        if ($check_permissions) {
            foreach ($permissions as $permission) {
                if (array_key_exists($permission->id, $check_permissions)) {
                    // Assign permission yang dipilih
                    $role->givePermissionTo($permission);
                } else {
                    // Revoke permission yang tidak dipilih
                    $role->revokePermissionTo($permission);
                }
            }
        } else {
            // Jika tidak ada permission yang dipilih, revoke semua permission dari role
            $role->revokePermissionTo($permissions);
        }

        Alert::success('Success Update', 'Data role berhasil diubah');

        return redirect()->route('manage.role.page');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($role_id)
    {
        // Get the role data
        $role = Role::findOrFail($role_id);

        // Revoke all permissions from the role
        $role->syncPermissions([]);

        // Delete the role
        $role->delete();

        Alert::success('Success Delete', 'Data role berhasil dihapus');

        return redirect()->route('manage.role.page');
    }
}
