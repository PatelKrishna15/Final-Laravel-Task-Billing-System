<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
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
    public function export()
    {
        $product = Product::get();
        $pdf =Pdf::loadView('product.pdf',compact('product'));
        return $pdf->download('product_list.pdf');
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
                'company_id' => 'required',
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
            'company_id'=>$request->company_id,
            
        ]);
        return redirect()->route('product.index');
    }
    public function edit($id)
    {
        $id = decrypt($id);
        $product = Product::where('id',$id)->first();
        return view('product.edit',compact('product'));
    }
    public function delete($id)
    {
        $id = decrypt($id);
        Product::where('id',$id)->delete();
        return redirect()->route('product.index');
    }
}
