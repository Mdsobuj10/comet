<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * slider page show with deshboard 
     */
    public function index()
    {

        $slider = Slider::latest() -> get();
         return view('admin.pages.silder.index',[
            'slider' => $slider,
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
         $this -> validate($request, [
            'title' => ['required'],
            'subtitle' => ['required'],
            'photo' => ['required'],
            
         ]);
         $btns = [];

         for ($i=0; $i < count($request -> btn_title) ; $i++) { 
             array_push($btns,[
                'btn_title' => $request -> btn_title[$i],
                'btn_link' => $request -> btn_title[$i],
                'btn_type' => $request -> btn_type[$i]
             ]);
         }
       

         //image upload system 
         if ($request -> hasFile('photo')) {
            $img = $request -> file('photo');
            $file_name = md5(time().rand()) .'.'.$img -> clientExtension();

            $image = Image::make($img -> getRealPath());
            $image -> save(storage_path('app/public/slider/').$file_name);

         }

         //data create with slider table
         Slider::create([
            'title' => $request -> title,
            'subtitle' => $request -> subtitle,
            'photo' => $file_name,
            'btns' => json_encode($btns)
           
            
         ]);
         return back() -> with('success', 'slider success full added');
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
         $sliders = Slider::latest() -> get();
         $single_slider = Slider::findOrFail($id);
         return view('admin.pages.silder.index',[
            'slider' => $sliders,
            'single_slider' => $single_slider,
            'form_type' => 'edite'
         ]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
   
         $btns = [];

         for ($i=0; $i < count($request -> btn_title) ; $i++) { 
             array_push($btns,[
                'btn_title' => $request -> btn_title[$i],
                'btn_link' => $request -> btn_title[$i],
                'btn_type' => $request -> btn_type[$i]
             ]);
         }
         $slider_update = Slider::findOrFail($id);
         //image upload system 
         if ($request -> hasFile('photo')) {
             $img = $request -> file('photo');
             $file_name = md5(time().rand()) .'.'.$img -> clientExtension();
             
             $image = Image::make($img -> getRealPath());
             $image -> save(storage_path('app/public/slider/').$file_name);
             
            }else{
                $file_name =  $slider_update -> photo;
            }
            
         
         //data create with slider table
         $slider_update -> update([
            'title' => $request -> title,
            'subtitle' => $request -> subtitle,
            'photo' => $file_name,
            'btns' => json_encode($btns)
           
            
         ]);
         return back() -> with('success', 'slider update data success');
        
    }

    //status update 
    public function StatusUpdateSlider($id)
    {
       $data = Slider::findOrFail($id);
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete_data = Slider::findOrFail($id);
        $delete_data -> delete();

        return back() -> with('danger-main', 'slider data delete success full');

        
    }
}
