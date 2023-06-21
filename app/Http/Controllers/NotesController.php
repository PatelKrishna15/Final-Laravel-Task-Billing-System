<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Notes;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function __construct()
    {
        $customer =Customer::get();
        view()->share('customer',$customer);
        $i =1;
        view()->share('i',$i);
    }
    public function index()
    {
        $notes = Notes::where('status','on')->get();
        return view('notes.index',compact('notes'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'status' => 'required',
        ]);
        $status=$request->status;
        if(!is_null($status)){
            $status='off';
        }
        else{
            $status='on';
        }
        
        Notes::updateOrCreate([
            'id'=>$request->id,
        ],
        [
            'customer_name'=>$request->customer_name,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'status'=>$request->status,
        ]);
        return redirect()->route('notes.index');      
    }
    public function delete($id) 
    {
        $id = decrypt($id);
        Notes::where('id',$id)->delete();
        return redirect()->route('notes.index');
    }
    public function edit($id) 
    {
        $id = decrypt($id);
       $notes = Notes::where('id',$id)->first();
        return view('notes.edit',compact('notes'));
    }
}
