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
        
    }
}
