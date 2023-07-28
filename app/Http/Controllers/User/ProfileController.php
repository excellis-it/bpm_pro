<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //

    public function index()
    {
        return view('user.profile');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
