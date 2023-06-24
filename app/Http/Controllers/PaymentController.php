<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $customer =Customer::get();
        view()->share('customer',$customer);
        $product =Product::get();
        view()->share('product',$product);
        $company =Company::get();
        view()->share('company',$company);
       $i=1;
        view()->share('i',$i);
    }
    public function index()
    {
        $data = Payment::get();
        return view('payment.index',compact('data'));
    }
    public function store(Request $request)
    {
    
   @dd($product);
            $data =new Payment();
            $data->customer_name = $request->customer_name;
            $data->company_name = $request->company_name;    
            $data->product_name = $request->product_name;
            $data->quantity = $request->quantity;
            $data->start_date = $request->start_date;
            $data->end_date = $request->end_date;
            $data->payment_method = $request->payment_method;
            $data->result =$request->product_price * $request->quantity; 
   
            $data->save();
            return redirect()->route('payment.index');
    }
    public function getproducts(Request $request){
        $products =Product::where('company_id',$request->company_id)->get();
        $view = 'payment.list';
        return view($view,compact('products'));
    }
}
