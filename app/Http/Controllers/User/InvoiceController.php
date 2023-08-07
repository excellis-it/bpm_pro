<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Item;
use App\Models\State;
use App\Mail\InvoiceMail;
use App\Models\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PDF;

class InvoiceController extends Controller
{
    //

    public function index()
    {
        if (!Auth::user()->logo) {
            return redirect()->route('user.profile')->with('error', 'please update your profile first');
        } else {
            $user_invoices = Invoice::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
            return view('user.invoice.list', compact('user_invoices'));
        }
    }

    public function create()
    {
        $states = State::orderBy('id', 'desc')->get();
        return view('user.invoice.create', compact('states'));
    }

    public function store(Request $request)
    {
        try {
          

        $currentDate = Carbon::now();


        $invoice = new Invoice;
        $invoice->user_id = Auth::user()->id;
        if ($request->send_in == 1) {
            $invoice->send_in = '';
            $invoice->send_in_status = 1;
        } else if ($request->send_in == 2) {
            $oneWeekLater = $currentDate->addWeek();
            $formattedDate = $oneWeekLater->format('Y-m-d');
            $invoice->send_in = $formattedDate;
            $invoice->send_in_status = 1;
        } else {
            $oneWeekLater = $currentDate->addMonth();
            $formattedDate = $oneWeekLater->format('Y-m-d');
            $invoice->send_in = $formattedDate;
            $invoice->send_in_status = 1;
        }

        $invoice->send_id = $request->send_in;
        $invoice->from_name = $request->from_name;
        $invoice->from_email = $request->from_email;
        $invoice->from_state = $request->bill_from_state;
        $invoice->from_city = $request->bill_from_city;
        $invoice->from_address = $request->from_address;
        $invoice->from_zipcode = $request->from_zipcode;
        $invoice->from_phone = $request->bill_from_phone;
        $invoice->project_name = $request->project_name;
        $invoice->project_address = $request->project_address;
        $invoice->from_gst = $request->bill_from_gst;
        $invoice->bil_to_name = $request->first_name . ' ' . $request->last_name;
        $invoice->bil_to_email = $request->bil_to_email;
        $invoice->bil_to_state = $request->bil_to_state;
        $invoice->bil_to_city = $request->bil_to_city;
        $invoice->bil_to_address = $request->bil_to_address;
        $invoice->bil_to_zipcode = $request->bil_to_zipcode;
        $invoice->bil_to_phone = $request->bil_to_phone;
        $invoice->bil_to_mobile = $request->bil_to_mobile;
        $invoice->tax = '10';
        $invoice->type = $request->type;
        $invoice->bil_to_faxNo = $request->bil_to_faxNo;
        $invoice->invoice_no = $request->invoice_no;
        $invoice->notes = $request->notes;
        $invoice->sub_total = $request->sub_amount;
        $invoice->total = $request->sum_amount;
        $invoice->invoice_date = $request->invoice_date;
        $invoice->company = $request->bil_to_company;
        $invoice->due = $request->due;
        if ($request->due == "On specific date") {
            $invoice->due_date = $request->due_date;
        }
        $invoice->discount_price = $request->discount_price ?? '';
        $invoice->discount_type = $request->discount_type ?? '';
        $invoice->tax_amount = $request->tax_amount ?? '';
        $invoice->image = Auth::user()->logo;

        //image upload
        // if ($request->hasFile('photo')) {
        //     $request->validate([
        //         'photo' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        //     ]);

        //     $file= $request->file('photo');
        //     $filename= date('YmdHi').$file->getClientOriginalName();
        //     $image_path = $request->file('photo')->store('users', 'public');
        //     $invoice->image = $image_path;
        // }
        //signature upload
        // $folderPath = public_path('upload/');

        // $image_parts = explode(";base64,", $request->signed);
        // $image_type_aux = explode("image/", $image_parts[0]);
        // $image_type = $image_type_aux[1];
        // $image_base64 = base64_decode($image_parts[1]);
        // $file = uniqid() . '.' . $image_type;
        // $data_uri = $request->signed;
        // $encoded_image = explode(",", $data_uri)[1];
        // $decoded_image = base64_decode($encoded_image);
        // Storage::put($file, $decoded_image);
        // $invoice->signature = $file;

        // file_put_contents($file, $image_base64);

        $invoice->save();



        //items add
        foreach ($request->item_description as $key => $item) {
            if ($item != null) {
                $add_items = Item::create([
                    'user_id' => Auth::user()->id,
                    'invoice_id' => $invoice->id,
                    'item_description' => $item,
                    'item_additional_details' => $request->additional_details[$key],
                    'item_rate' => $request->rate[$key],
                    'item_quantity' => $request->quantity[$key],
                    'item_amount' => $request->amount[$key] ?? ''
                ]);
            }

        }


        $items = Item::where('invoice_id', $invoice->id)->get();

        $data = [
            'invoice_detail' => $invoice,
            'items' => $items,
        ];

        $pdf = PDF::loadView('pdf.invoice', [
                'data' => $data,
            ])->setOptions(['defaultFont' => 'sans-serif']);
        $pdf_file = new File();
        $content = $pdf->download()->getOriginalContent();
        $filename = 'en' . $invoice->id . date('YmdHi') . '.pdf';
        Storage::put('invoice/' . $filename, $content);
        $pdf_file->file = 'invoice/' . $filename;
        $pdf_file->user_id = Auth::user()->id;
        $pdf_file->invoice_id = $invoice->id;
        $pdf_file->save();
        
        $maildata = [
            'id' => $invoice->id,
            'invoice_detail' => $invoice,
            'items' => $items,
            'pdf_file' => 'invoice/' .$filename ?? '',
            'invoice_id' => '',
        ];

        Mail::to($request->bil_to_email)->send(new InvoiceMail($maildata));

        return redirect()->route('invoice.index')->with('message', 'Invoice created successfully');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function downloadInvoice($id)
    {

        $invoice = File::where('invoice_id', $id)->first();
        $file_path = $invoice->file;

        return response()->download(storage_path('app/public/' . $file_path));
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

    public function invoiceChangeStatus(Request $request)
    {
        $invice = Invoice::findOrFail($request->id);
        $invice->send_in_status = $request->status;
        $invice->save();

        return response()->json(['success' => 'Status change successfully.']);
    }
}
