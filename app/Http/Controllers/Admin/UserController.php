<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Invoice;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function list(Request $request)
    {
        return view('admin.customer.list');
    }

    public function userList(Request $request)
    {
        
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = User::orderBy('id','desc')->Role('USER')->count();
        $totalRecordswithFilter = User::orderBy('id','desc')->Role('USER')->count();

        // Fetch records
        $records = User::query();
        $columns = ['name','email','phone','status'];
        foreach($columns as $column){
            $records->where($column, 'like', '%' . $searchValue . '%');
        }
        $records->orderBy($columnName,$columnSortOrder);
        $records->skip($start);
        $records->take($rowperpage);
        $records = $records->Role('USER');
        $records = $records->get();

        $data_arr = array(); 

        foreach($records as $record){
            $id = $record->id;
            $name = $record->name;
            $email = $record->email;
            $phone = $record->phone;
            $no_of_invoice = Invoice::where('user_id',$id)->get()->count();

            $data_arr[] = array(
               "name" => $name,
               "email" => $email,
               "phone" => $phone,
               "invoice" =>$no_of_invoice,
               "status" => '<div class="button-switch"><input type="checkbox" id="switch-orange" class="switch toggle-class" data-id="'.$record->id.'"'.($record->status ? 'checked' : '').'/><label for="switch-orange" class="lbl-off"></label><label for="switch-orange" class="lbl-on"></label></div>',
            );
        }                                                                                                                                                   
                                                                                                                                                    
        $response = array(
           "draw" => intval($draw),
           "iTotalRecords" => $totalRecords,
           "iTotalDisplayRecords" => $totalRecordswithFilter,
           "aaData" => $data_arr
        );

        return response()->json($response); 
    }

    public function userStatusChange(Request $request)
    {
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
