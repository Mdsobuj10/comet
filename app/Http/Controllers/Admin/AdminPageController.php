<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    /**
     * deshboard show
     **/
    public function DeshboardShow()
    {
         return view('admin.pages.deshboard');
    }
}
