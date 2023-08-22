<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\HomeCms;


class Homecontroller extends Controller
{
    //
    public function home()
    {
        $home_content = HomeCms::first();
        return view('home.main',compact('home_content'));
    }
    
  
}
