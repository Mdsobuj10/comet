<?php

namespace App\Http\Controllers\Admin;

use App\Models\Clients;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clients =Clients::latest() -> get();
        return view('admin.pages.Clients.index',[
            'client' => $clients,
            'form_type'   => 'create'
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
        //data create,
        $this -> validate($request, [
            "name" => ['required'],
            "logo" => ['required'],
        ]);

        //images upload
        if ($request -> hasFile('logo')) {
            $img = $request -> file('logo');
            $file_name = md5(time().rand()) .'.'.$img -> clientExtension();
            
            $image = Image::make($img -> getRealPath());
            $image -> save(storage_path('app/public/clients/').$file_name);
            
           }
        

        Clients::create([
           'name' => $request -> name,
           'logo' =>  $file_name
        ]);
        return back() -> with('success', 'client data added');
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
        //data 
        $data_delete = Clients::findOrFail($id);
        $data_delete -> delete();
        return back() -> with('danger-main', 'client data added');
    }

    /* 
    client stasus
    */
    public function StatusUpdatetesClient($id)
    {
        //stastus update
        $data = Clients::findOrFail($id);
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
}
