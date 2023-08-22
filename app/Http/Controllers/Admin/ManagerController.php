<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\State;
use Illuminate\Support\Facades\Auth;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $managers = User::orderBy('id','desc')->Role('MANAGER')->get();
        return view('admin.manager.list',compact('managers'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $states = State::orderBy('id','desc')->get();
        return view('admin.manager.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'first_name'     => 'required',
            'last_name'     => 'required',
            'email'    => 'required|email|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password',
        ], [
            'email.email' => 'The email format is invalid.',
        ]);

        $input = $request->all();
        $user = new User;
        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->email = $input['email'];
        $user->phone = $input['phone'];
        $user->password = bcrypt($input['password']);
        
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $image_path = $request->file('image')->store('user', 'public');
            $user->logo = $image_path;
        }
        $user->save();
        $user->assignRole('MANAGER');

        $maildata = [
            'name' => $user->first_name,
            'email' => $user->email,
            
        ];
        Mail::to($request->email)->send(new WelcomeMail($maildata));
        
        return redirect()->back()->with('message', 'Manager has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    public function editManager($id)
    {
        $states = State::orderBy('id','desc')->get();
        $manager = User::where('id',$id)->Role('MANAGER')->first();
        return view('admin.manager.edit',compact('manager','states'));
    }
    
    public function updateManager(Request $request)
    {
         $request->validate([
            'first_name'     => 'required',
            'last_name'     => 'required',
            'email'    => 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',

        ], [
            'email.email' => 'The email format is invalid.',
        ]);
        $update_manager = User::where('id',$request->id)->Role('MANAGER')->first();
        $update_manager->first_name = $request->first_name;
        $update_manager->last_name = $request->last_name;
        $update_manager->email = $request->email;
        $update_manager->phone = $request->phone;
       
        if ($request->password) {
            $request->validate([
                'password' => 'required|min:8',
            ]);
            $update_manager->password = bcrypt($request->password);
        }
        
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $image_path = $request->file('image')->store('user', 'public');
            $update_manager->logo = $image_path;
        }
        $update_manager->update();
        
        return redirect()->route('managers.index')->with('message', 'Manager has been updated successfully.');
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
