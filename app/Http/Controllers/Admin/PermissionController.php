<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     *  permisssion view page show.
     */
    public function index()
    {
        //data show in view page 
       $permission = Permission::latest() -> get();
        //permission view page show
        return view('admin.pages.user.permission.index',[
            'all_permission' => $permission,
            'form_type'      => 'create',
    
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * permission data creted
     */
    public function store(Request $request)
    {
          $this -> validate($request, [
            'name' => 'required|unique:permissions',
          ]);

          Permission::create([
             'name' => $request -> name,
             'slug' => Str::slug($request -> name),
          ]);

          return back() -> with('success', 'permission succesfully');
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
        //edite data 
        $permission = Permission::latest() -> get();
        $per = Permission::findOrFail($id);
        //permission view page show
        return view('admin.pages.user.permission.index',[
            'all_permission' => $permission,
            'form_type'      => 'edite',
            'per'            => $per
    
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //permission data update
        $update = Permission::findOrFail($id); 
        $update -> update([
            'name' => $request -> name,
            'slug' => Str::slug($request -> name),
        ]);
        return back() -> with('success-main', 'permission update succesfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //permission data deleted 
        $delete = Permission::findOrFail($id);
        $delete -> delete();
        return back() -> with('success-main', 'permission delete success full');
    }
}
