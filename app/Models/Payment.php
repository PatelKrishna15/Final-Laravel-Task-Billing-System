<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected  $table ='payments';
    protected $fillable =['customer_name','company_name','product_name','quantity','start_date','end_date','payment_method'];


    public function customer(){
        return $this->belongsTo(Customer::class,'customer_name');
    }
    public function company(){
        return $this->belongsTo(Company::class,'name');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_name');
    }
    // public function setTotalAttribute()
    // {
    //     $this->attributes['result'] = $this->quantity * $this->product_price;
    // }
}
