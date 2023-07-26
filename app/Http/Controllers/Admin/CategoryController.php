<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //category view show 
        $category = Category::latest() -> get();
        return view('admin.pages.Category.index',[
            'categorys' => $category,
            'form_type' => 'create',
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
        //data create category all
        $this -> validate($request, [
            'name' => ['required', 'unique:categories']
        ]);

        Category::create([
            'name' => $request -> name,
            'slug' => Str::slug($request -> name) ,
        ]);

        return back() -> with('success', 'category added success full');
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
           //category view show 
           $categorys = Category::latest() -> get();
           $single_data = Category:: findOrFail($id);
           return view('admin.pages.Category.index',[
               'categorys' => $categorys,
               'form_type' => 'edite',
               'single_data' => $single_data,
           ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this -> validate($request, [
            'name' => ['required', 'unique:categories']
        ]);
        //category update
        $update_data = Category:: findOrFail($id);

        $update_data  -> update([
            'name'   => $request -> name,
            'slug'   => Str::slug($request -> name) ,
        ]);

        return back() -> with('success', 'data update success full');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //cetagory delete 
        $delete_data = Category:: findOrFail($id);

        $delete_data -> delete();
        return back() -> with('success-main', 'data delete success full');


    }

    
    public function CategoryUpdatetesClient($id)
    {
        //stastus update
        $data = Category::findOrFail($id);
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
