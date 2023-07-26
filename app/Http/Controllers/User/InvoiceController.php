<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Item;
use App\Mail\InvoiceMail;
use App\Models\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PDF;

class InvoiceController extends Controller
{
    //

    public function index()
    { 
        $user_invoices = Invoice::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('user.invoice.list',compact('user_invoices'));
    }

    public function create()
    {
        return view('user.invoice.create');
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'from_name'     => 'required',
            'bil_to_name'     => 'required',
            'from_email' =>'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'bil_to_email'    =>'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'from_address' =>'required',
            'bil_to_address' =>'required',
            'from_phone' =>'required|numeric',
            'bil_to_phone' =>'required|numeric',
            'gst' => 'required',
            'bil_to_mobile' =>'required|numeric',
            'bil_to_faxNo' =>'required',
            'terms'=>'required', 
            'notes'=>'required',
            'tax' => 'required',
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
        $invoice->tax = $request->tax;
        $invoice->invoice_no = 'INV'.rand(00000,11111);
        $invoice->terms = $request->terms;
        $invoice->notes = $request->notes;
        
        //image upload
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            
            $file= $request->file('photo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $image_path = $request->file('photo')->store('users', 'public');
            $invoice->image = $image_path;
        }
        //signature upload
        // $folderPath = public_path('upload/');
        $image_parts = explode(";base64,", $request->signed);   
        $image_type_aux = explode("image/", $image_parts[0]);   
        $image_type = $image_type_aux[1];   
        $image_base64 = base64_decode($image_parts[1]); 
        $file = uniqid().'.'.$image_type;  
        $data_uri = $request->signed;
        $encoded_image = explode(",", $data_uri)[1];
        $decoded_image = base64_decode($encoded_image); 
        Storage::put($file, $decoded_image);


        // Storage::put('signatures','public');
        // $image_move = $file->store('signatures','public');
        $invoice->signature = $file;
        // file_put_contents($file, $image_base64);
       
        $invoice->save();

        
        
        //items add
        $totalCost = 0;
        foreach ($request->item_description as $key => $item) {
            if($item != null){
                $add_items = Item::create([
                    'user_id' => Auth::user()->id,
                    'invoice_id' => $invoice->id,
                    'item_description' => $item,
                    'item_additional_details' => $request->additional_details[$key],
                    'item_rate' => $request->rate[$key],
                    'item_quantity' => $request->quantity[$key],
                    'item_amount' =>$request->amount[$key]   
                ]);
            }  
            
            $totalCost += $request->amount[$key];
        }

        $update = Invoice::where('id',$invoice->id)->first();
        $update->sub_total = $totalCost;
        $calculate_price = ($totalCost * 10/100);
        $update->total = $totalCost + $calculate_price;
        $update->update();

        //pdf generate

        $invoice_details = Invoice::where('id', $invoice->id)->first();
        $items = Item::where('invoice_id',$invoice->id)->get();
        $data = [
            'invoice_detail' => $invoice_details,
            'items' => $items,  
        ];
        
        // $pdf = PDF::loadView('pdf.invoice', $data)->setOptions(['defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('pdf.invoice', [
            'data' => $data,
        ])->setOptions(['defaultFont' => 'sans-serif']);

        $data = new File();
        $content = $pdf->download()->getOriginalContent();
        $filename = 'en'. $invoice->id . date('YmdHi').'.pdf';
        Storage::put('invoice/'.$filename, $content);
        $data->file = 'invoice/'.$filename;
        $data->user_id = Auth::user()->id;
        $data->invoice_id = $invoice->id;
        $data->save();

        //mail send

        $maildata = [
            'id' => $data->invoice_id,
            'invoice_detail' => $invoice_details,
            'items' => $items,
        ];
        
        Mail::to($request->bil_to_email)->send(new InvoiceMail($maildata));
        
        return redirect()->route('invoice.index')->with('message', 'Invoice created successfully');
    }

    public function downloadInvoice($id)
    {
       
        $invoice = File::where('invoice_id',$id)->first();
        $file_path = $invoice->file;
        $myFile = storage_path('app\public\\'.$file_path);
    	return response()->download($myFile);
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
