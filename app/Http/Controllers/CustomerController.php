<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::get();
        return view('customer.index',compact('customer'));
    }
    public function store(Request $request)
    {
        $img_t =Customer::where('id',$request->id)->first(); 

        if($request->customer_img != null || $request->customer_img != ''){
            $customer_img =$request->file('customer_img');
            $imagename = time().'.'.$customer_img->extension();
            $request->customer_img->move(public_path('c_images'),$imagename);
        }elseif($request->customer_img == null){
             $request->validate([
                'customer_name' => 'required',
                'industry' => 'required',
                'contact_person' => 'required',
                'phone' => 'required',
                'customer_img' => 'required',
                'address' => 'required',
                'postal_code' => 'required',
                
            ]);
           
            $imagename = $img_t->customer_img;
        }
        Customer::updateOrCreate([
            'id'=>$request->id,
        ],
        [
            'customer_name'=>$request->customer_name,
            'industry'=>$request->industry,
            'contact_person'=>$request->contact_person,
            'phone'=>$request->phone,
            'customer_img'=>$customer_img=$imagename,
            'address'=>$request->address,
            'postal_code'=>$request->postal_code,
        ]);
        return redirect()->route('customer.index');
    }
    public function edit($id)
    {
        $id = decrypt($id);
        $customer = Customer::where('id',$id)->first();
        return view('customer.edit',compact('customer'));
    }
    
    public function delete($id)
    {
        $id = decrypt($id);
        Customer::where('id',$id)->delete();
        return redirect()->route('customer.index');
    }
}