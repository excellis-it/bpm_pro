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
        // dd($request->all());
        
        $request->validate([
            'first_name'     => 'required',
            'last_name'     => 'required',
            'email'    => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|unique:users,email,'.Auth::user()->id,
            'phone'    => 'required',
            'address'  => 'required',
            'state'    => 'required',
            'city'     => 'required',
            'company'  => 'required',
            'zipcode'  => 'required',
            
        ]);

        $data = User::find(Auth::user()->id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->gst  = $request->gst;
        $data->state = $request->state;
        $data->city = $request->city;
        $data->address  = $request->address;
        $data->address1  = $request->address1;
        $data->company = $request->company;
        $data->zipcode = $request->zipcode;
        
        if ($request->hasFile('logo')) {
            
            $file= $request->file('logo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $image_path = $request->file('logo')->store('users', 'public');
            $data->logo = $image_path;
        }
        if ($request->signed) {
            $image_parts = explode(";base64,", $request->signed);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = uniqid() . '.' . $image_type;
            $data_uri = $request->signed;
            $encoded_image = explode(",", $data_uri)[1];
            $decoded_image = base64_decode($encoded_image);
            Storage::put($file, $decoded_image);
            $data->signature = $file;
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
