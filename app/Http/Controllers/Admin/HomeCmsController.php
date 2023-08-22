<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\HomeCms;
use Auth;
use Illuminate\Support\Facades\Validator;

class HomeCmsController extends Controller
{
    //
    public function homeCms()
    {
        $home_cms = HomeCms::first();
        return view('admin.cms.home-cms',compact('home_cms'));
         
    }
    
    public function homeCmsUpdate(Request $request)
    {
         $request->validate([
            'banner1_title'     => 'required',
            'banner1_subtitle'     => 'required',
            'banner2_title'     => 'required',
            'banner2_subtitle' => 'required',
            'banner3_title' => 'required',
            'banner3_subtitle' => 'required',
            'body_title' => 'required',
            'body_section' => 'required',
            'footer_section' => 'required',
            
        ]);
        
        $update_cms = HomeCms::where('id',$request->home_cms_id)->first();
        $update_cms->banner1_title = $request->banner1_title;
        $update_cms->banner1_subtitle = $request->banner1_subtitle;
        $update_cms->banner2_title = $request->banner2_title;
        $update_cms->banner2_subtitle = $request->banner2_subtitle;
        $update_cms->banner3_title = $request->banner3_title;
        $update_cms->banner3_subtitle = $request->banner3_subtitle;
        $update_cms->body_title = $request->body_title;
        $update_cms->body_section = $request->body_section;
        $update_cms->footer_section = $request->footer_section;
        if ($request->hasFile('banner1_image')) {
            
            $file= $request->file('banner1_image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $image_path = $request->file('banner1_image')->store('home', 'public');
            $update_cms->banner1_image = $image_path;
        }
        
        if ($request->hasFile('banner2_image')) {
            
            $file1 = $request->file('banner2_image');
            $filename1 = date('YmdHi').$file1->getClientOriginalName();
            $image_path1 = $request->file('banner2_image')->store('home', 'public');
            $update_cms->banner2_image = $image_path1;
        }
        
        if ($request->hasFile('banner3_image')) {
            
            $file11 = $request->file('banner3_image');
            $filename11 = date('YmdHi').$file11->getClientOriginalName();
            $image_path11 = $request->file('banner3_image')->store('home', 'public');
            $update_cms->banner3_image = $image_path11;
        }
        
        $update_cms->update();
        return redirect()->back()->with('message', 'Home cms updated successfully.');
        
    }
}
