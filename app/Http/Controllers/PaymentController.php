<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
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
    }
    public function index()
    {
        return view('payment.paymentindex');
    }
}
