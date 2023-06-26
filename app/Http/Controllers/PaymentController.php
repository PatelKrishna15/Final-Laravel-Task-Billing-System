<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $payment = Payment::get();
        return view('payment.index',compact('payment'));
    }
    public function store(Request $request)
    {
        $pr = Product::where('id',$request->product_name)->first();
        $price =$pr->product_price;

        // @dd($pr->product_price);

            $data =new Payment();
            $data->customer_name = $request->customer_name;
            $data->company_name = $request->company_name;    
            $data->product_name = $request->product_name;
            $data->quantity = $request->quantity;
            $data->start_date = $request->start_date;
            $data->end_date = $request->end_date;
            $data->payment_method = $request->payment_method;
            $data->result =$request->quantity* $price ; 
            $data->save();
            return redirect()->route('payment.index');
    }
    public function getproducts(Request $request){
        $products =Product::where('company_id',$request->company_id)->get();
        $view = 'payment.list';
        return view($view,compact('products'));
    }
    public function delete($id)
    {
        $id =decrypt($id);
        Payment::where('id',$id)->delete();
        return redirect()->route('payment.index');

    }
    public function export_ind($id){
        
        $id = decrypt($id);
        $payment= Payment::where('id',$id)->first();
        $pdf = Pdf::loadView('payment.pdf_ind',compact('payment'));
        $customer_name = $payment->customer_name;
        return $pdf->download("$customer_name.pdf");
    }
    public function sendMailWithPDF($id)
    {
        $id = decrypt($id);
        $payment= Payment::where('id',$id)->first();
        $customer = Customer::where('id',$payment->customer_name)->first();
        // dd($customer->customer_email);
        // $email = $customer->customer_email;
        $pdf = PDF::loadView('payment.pdf_mail', $payment,$customer);

        Mail::send('payment.pdf_mail',$payment,function ($message) use ($payment, $pdf) {
            $message->to($payment)
                ->subject('Billing')
                ->attachData($pdf->output(), "billing.pdf");
        });

        echo "email send successfully !!";
    }
}
