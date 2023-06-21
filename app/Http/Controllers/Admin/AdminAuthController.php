<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    //admin login page show
    public function LoginPage(){
            return view('admin.pages.login');
    }
    
    /**
     * admin login system
     **/
    public function Login(Request $request)
    {
        //validation
       $this -> validate($request, [
        'email' => 'required|email',
        'password' => 'required',
       ],[
        'email.required' => 'আপনার ইমেইলের ঘরটি পুরন করুন',
        'password.required' => 'আপনার পাসওরডের ঘরটি পুরন করুন',
       ]);

       if (Auth::guard('admin') -> attempt(['email' => $request -> email, 'password' => $request -> password]) || Auth::guard('admin') -> attempt(['cell' => $request -> email, 'password' => $request -> password])) {
         return redirect() -> route('admin.deshboard.page');
       }else{
        return redirect() -> route('admin.login.page') -> with('danger', 'Email or Password dose not Match');
       }


    }



}
