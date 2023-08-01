<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\State;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //

    public function index()
    {
        $states = State::orderBy('id','desc')->get();
        return view('user.profile',compact('states'));
    }

    public function profileUpdate(Request $request)
    {
        
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|unique:users,email,'.Auth::user()->id,
            'phone'    => 'required|numeric|min:10',
            'address'  => 'required',
            'gst'      => 'required',
            'state'    => 'required',
            'city'     => 'required',

            
        ]);

        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->gst  = $request->gst;
        $data->state = $request->state;
        $data->city = $request->city;
        $data->address  = $request->address;
        
        if ($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            ]);
            
            $file= $request->file('logo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $image_path = $request->file('logo')->store('users', 'public');
            $data->logo = $image_path;
        }
        $data->save();
        return redirect()->back()->with('message', 'Profile updated successfully.');
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


}
