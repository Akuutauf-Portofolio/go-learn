<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'permissions' => Permission::all(),
        ];

        return view('admin.manage.permission.manage-permission', $data);
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
            'name' => ['required', Rule::unique('permissions')->ignore(null, 'name'),],
        ]);

        $formattedName = strtolower($validated['name']);

        Permission::create([
            'name' => $formattedName,
            'guard_name' => 'web',
        ]);

        Alert::success('Success Insert', 'Permission berhasil ditambahkan');

        return redirect()->route('manage.permission.page');
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
    public function edit($permission_id)
    {
        $data = [
            'permission'  => Permission::find($permission_id),
            'action' => route('manage.permission.update', $permission_id),
        ];

        return view('admin.manage.permission.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $permission_id)
    {
        $validated = $request->validate([
            'name' => ['required', Rule::unique('permissions')->ignore($permission_id),],
        ]);

        $formattedName = strtolower($validated['name']);

        Permission::where('id', $permission_id)->update([
            'name' => $formattedName,
        ]);

        Alert::success('Success Update', 'Data permission berhasil diubah');

        return redirect()->route('manage.permission.page');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($permission_id)
    {
        $data = Permission::findOrFail($permission_id);
        $data->delete();

        Alert::success('Success Delete', 'Data permission berhasil dihapus');

        return redirect()->route('manage.permission.page');
    }
}
