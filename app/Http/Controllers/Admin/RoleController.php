<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::latest() -> get();
        $permission = Permission::latest() -> get();
        return view('admin.pages.user.role.index',[
            'roles' => $roles,
            'permissions' => $permission,
            'form_type' => 'create'

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //role data validate 
        $this -> validate($request, [
            'name'   =>['required', 'unique:roles'],
        ]);
        //role data created
        Role::create([
            'name'  => $request -> name,
            'slug'  =>Str::slug($request -> name),
            'permission'  =>json_encode($request -> permission)
        ]);

        return back() -> with('success', 'role add succes full');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //student data edite show
        $roles = Role::latest() -> get();
        $edite = Role::findOrFail($id);
        $permission = Permission::latest() -> get();
        return view('admin.pages.user.role.index',[
            'roles' => $roles,
            'permissions' => $permission,
            'form_type' => 'edite',
            'edite'    => $edite,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this -> validate($request, [
            'name'   =>['required'],
        ]);
        //role data update 
        $update_data = Role::findOrFail($id);
        $update_data -> update([
            'name'  => $request -> name,
            'slug'  =>Str::slug($request -> name),
            'permission'  =>json_encode($request -> permission)
        ]);
        return back() -> with('success', 'role update success full');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //role data destory
        $delete_data = Role::findOrFail($id);
        $delete_data -> delete();
        return back() -> with('success-main', 'role add succes full');

    }
}
