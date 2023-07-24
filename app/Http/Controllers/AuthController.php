<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

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
            'name'     => 'required',
            'phone'     => 'required|numeric|digits:10',
            'email'    => 'required|email|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password',
        ], [
            'email.email' => 'The email format is invalid.',
        ]);

        $input = $request->all();
        $user = new User;
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->phone = $input['phone'];
        $user->password = bcrypt($input['password']);
        $user->save();
        $user->assignRole('USER');
        
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
                return redirect()->route('admin.dashboard');
            } else if($user->hasRole('USER') && $user->status == 1){
                return redirect()->route('invoice.index');
            }else{
                Auth::logout();
                return redirect()->back()->with('error', 'Email id & password was invalid!');
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
