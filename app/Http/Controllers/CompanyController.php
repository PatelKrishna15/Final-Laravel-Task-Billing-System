<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Country;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function __construct()
    {
        $country =Country::get();
        view()->share('country',$country);
        $i =1;
        view()->share('i',$i);
    }
    public function index()
    {
       
        $company = Company::get();
        return view('company.index',compact('company'));
    }
   
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'phone' => 'required',
        //     'image' => 'required',
        //     'address' => 'required',
        //     'postalcode' => 'required',
        //     'fax' => 'required',
        //     'country_id' => 'required',
        //     'user_id' => 'required',
        // ]);
          
        $img_t = Company::where('id',$request->id)->first(); 

        if($request->image != null || $request->image != ''){
            $image =$request->file('image');
            $imagename = time().'.'.$image->extension();
            $request->image->move(public_path('images'),$imagename);
        }elseif($request->image == null){
            $imagename = $img_t->image    ;
        }
       
        Company::updateOrCreate([
            'id'=>$request->id,
        ],
        [
            'name'=>$request->name,
            'phone'=>$request->phone,
            // 'image'=>$image=$imagename,
            'image'=>$imagename,
            'address'=>$request->address,
            'postalcode'=>$request->postalcode,
            'fax'=>$request->fax,
            'country_id'=>$request->country_id,
            'user_id' => Auth::user()->id,
        ]);
        // $data->save();
        return redirect()->route('index');
    }
    public function delete($id)
    {
        $id = decrypt($id);
        Company::where('id',$id)->delete();
        return redirect()->route('index');

    }
    public function edit($id)
    {
      
        $id = decrypt($id);
        $data = Company::where('id',$id)->first();
        // $company = Company::get();
        return view('company.edit',compact('data'));
    }
}