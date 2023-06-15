<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $company =Company::get();
        view()->share('company',$company);
        $i =1;
        view()->share('i',$i);
    }
    public function index()
    {
        $product = Product::get();
        return view('product.index',compact('product'));
    }
    public function store(Request $request)
    {
        $img_t =Product::where('id',$request->id)->first(); 

        if($request->product_img != null || $request->product_img != ''){
            $product_img =$request->file('product_img');
            $imagename = time().'.'.$product_img->extension();
            $request->product_img->move(public_path('images'),$imagename);
        }elseif($request->product_img == null){
            $request->validate([
                'product_name' => 'required',
                'product_img' => 'required',
                'product_price' => 'required',
                'product_company' => 'required',
            ]);
           
            $imagename = $img_t->product_img;
        }
       
        Product::updateOrCreate([
            'id'=>$request->id,
        ],
        [
            'product_name'=>$request->product_name,
            'product_img'=>$product_img=$imagename,
            'product_price'=>$request->product_price,
            'product_company'=>$request->product_company,
            
        ]);

        return redirect()->route('product.index');
    }
    }

