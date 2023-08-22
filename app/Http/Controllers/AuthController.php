<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function admin()
    {
        if (Auth::check() && Auth::user()->hasRole('ADMIN')) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login');
        }
    }

    public function register()
    {   
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
       
        $request->validate([
            'fname'     => 'required',
            'lname'     => 'required',
            'phone'     => 'required',
            'email'    => 'required|email|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password',
        ], [
            'email.email' => 'The email format is invalid.',
        ]);

        $input = $request->all();
        $user = new User;
        $user->first_name = $input['fname'];
         $user->last_name = $input['lname'];
        $user->email = $input['email'];
        $user->phone = $input['phone'];
        $user->password = bcrypt($input['password']);
        $user->save();
        $user->assignRole('USER');

        $maildata = [
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
        ];
        Mail::to($request->email)->send(new WelcomeMail($maildata));
        
        return redirect()->route('login')->with('message', 'Your account has been created successfully.');
    }
    
    public function login()
    {   
        return view('auth.login');
    }
    
    public function loginCheck(Request $request)
    {
       
        $request->validate([
            'email'    => 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|min:8'
        ]);
        
       
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password] )) {
            
            $user = User::where('email', $request->email)->first();
            
            if ($user->hasRole('ADMIN')) {
                return redirect()->route('user.list');
            } else if($user->hasRole('USER') && $user->status == 1){
                return redirect()->route('invoice.index');
            } else if($user->hasRole('MANAGER') && $user->status == 1){
                 return redirect()->route('user.list');
            }else{
               
                Auth::logout();
                return redirect()->back()->with('error', 'Your account is not active yet!');
            }
        } else {
            return redirect()->back()->with('error', 'Email id & password was invalid!');
        }
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
