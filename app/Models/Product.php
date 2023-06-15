<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =['product_name','product_img','product_price','product_company'];

    public function company(){
        return $this->belongsTo(Company::class,'product_company');
    }
}
