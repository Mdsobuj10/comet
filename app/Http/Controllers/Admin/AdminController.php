<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use App\Notifications\Admin\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //admin user page show with data bain
        $admin = Admin::latest() -> where('trash', false) -> get();
        $roles = Role::latest() -> get();
        return view('admin.pages.user.index',[
            'admin' => $admin,
            'form_type' => 'create',
            'roles' => $roles
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
        //validatiopn 
        $this -> validate($request,[
            'name' => ['required'],
            'email' => ['required','email','unique:admins'],
            'username' => ['required'],
            'cell' => ['required','unique:admins'],
            
        ]);
        //rendom password gennared
        $password = str_shuffle('qwertyuiopasdfghjkllzxcvbnm1234567890!@#$%^&*');

        $pass = substr($password , 10, 10);
        //user data store

       $user =  Admin::create([
            'name' => $request -> name,
            'role_id' => $request -> role,
            'email' => $request -> email,
            'username' => $request -> username,
            'cell' => $request -> cell,
            'password' => Hash::make($pass) 
        ]);

        $user -> notify(new UserNotification([$user['name'], $pass]));

        return back() -> with('success', 'data create success fully');
        
       
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //user data delete
        $delete = Admin::findOrFail($id);
        $delete -> delete();
        return back() -> with('success-main', 'user data  success fully');
        

    }

    /**
     * admin status id
     */
    public function StatusUpdate($id)
    {
       $data = Admin::findOrFail($id);
        //status update
        if ($data -> status ) {
            $data -> update([
                'status' => false
            ]);
        } else {
            $data -> update([
                'status' => true
            ]);
        }
        return back() -> with('success-main', 'status update success fully');
        
    }

    /**
     * admin user trsh update
     **/
    public function TrashUpdate($id)
    {
            //ADMIN User trash
            $data = Admin::findOrFail($id);
            //status update
            if ($data -> trash ) {
                $data -> update([
                    'trash' => false
                ]);
            } else {
                $data -> update([
                    'trash' => true
                ]);
            }
            return back() -> with('success-main', 'trash update success fully');
    }
    public function UserTrash()
    {
        //admin user page show with data bain
        $trash = Admin::latest() -> where('trash', true) -> get();
        
        return view('admin.pages.user.trash',[
            'trash' => $trash,
            'form_type' => 'trash'
        ]);
    }
    
}
