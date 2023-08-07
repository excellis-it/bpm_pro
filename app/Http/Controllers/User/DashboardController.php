<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;

class DashboardController extends Controller
{
    //
    
    public function dashboard()
    {
        $user_invoices = Invoice::orderby('id','desc')->get();
        return view('user.invoice.list')->with(compact('user_invoices'));
    }
}
