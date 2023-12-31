<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    use HasFactory;
    protected $fillable =['customer_name','subject','message','status'];
    
    
    public function customer(){
        return $this->belongsTo(Customer::class,'customer_name');
    }
}

