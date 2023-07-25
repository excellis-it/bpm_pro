<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //

    public function index()
    { 
        return view('user.invoice.list');
    }

    public function create()
    {
        return view('user.invoice.create');
    }

    public function store(Request $request)
    {
        return $request;
        $request->validate([
            'from_name'     => 'required',
            'bil_to_name'     => 'required',
            'from_email' =>'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'bil_to_email'    =>'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'from_address' =>'required',
            'bil_to_address' =>'required',
            'from_phone' =>'required',
            'bil_to_phone' =>'required',
            'gst' => 'required',
            'bil_to_mobile' =>'required',
            'bil_to_faxNo' =>'required',
            'terms'=>'required', 
            'notes'=>'required',
        ]);

        $invoice = new Invoice;
        $invoice->user_id = Auth::user()->id;
        $invoice->from_name = $request->from_name;
        $invoice->from_email = $request->from_email;
        $invoice->from_address = $request->from_address;
        $invoice->from_phone = $request->from_phone;
        $invoice->from_gst = $request->gst;
        $invoice->bil_to_name = $request->bil_to_name;
        $invoice->bil_to_email = $request->bil_to_email;
        $invoice->bil_to_address = $request->bil_to_address;
        $invoice->bil_to_phone = $request->bil_to_phone;
        $invoice->bil_to_mobile = $request->bil_to_mobile;
        $invoice->bil_to_faxNo = $request->bil_to_faxNo;
        $invoice->invoice_no = $request->rand(0000,1111);
        $invoice->terms = $request->terms;
        $invoice->notes = $request->notes;
        $invoice->sub_total = $request->total;
        $invoice->total = $request->total;

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            
            $file= $request->file('photo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $image_path = $request->file('photo')->store('users','image', 'public');
            $invoice->image = $image_path;
        }

        $folderPath = public_path('users/signature/');
        $image_parts = explode(";base64,", $request->signed);   
        $image_type_aux = explode("image/", $image_parts[0]);   
        $image_type = $image_type_aux[1];   
        $image_base64 = base64_decode($image_parts[1]);  
        $file = $folderPath . uniqid() . '.'.$image_type;
        file_put_contents($file, $image_base64);
        return back()->with('success', 'success Full upload signature');
    }

    public function show($id)
    {
        
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
