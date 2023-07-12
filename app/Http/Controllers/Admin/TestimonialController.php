<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonials;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $testimonial =Testimonials::latest() -> get();
        return view('admin.pages.Testimonials.index',[
            'testimonial' => $testimonial,
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
        //validation 
        $this -> validate($request, [
            'testimonial' =>['required'],
            'name' =>['required'],
            'company' =>['required'],
        ]);

        Testimonials::create([
            'testimonial' => $request -> testimonial,
            'name' => $request -> name,
            'company' => $request -> company,
        ]);
        return back() -> with('success', 'testimonial data create success fully');
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
        //
    }

    
        /**
     * Remove the specified resource from storage.
     */
    public function StatusUpdatetesTimonial($id)
    {
        //stastus update
        $data = Testimonials::findOrFail($id);
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
