<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendPagesController extends Controller
{
    /**
     * home pagess show 
    */
    public function HomePages()
    {
         return view('comet.pages.home');
    }
      /**
     * home pagess show 
    */
    public function ContactPages()
    {
         return view('comet.pages.contact');
    }
}
