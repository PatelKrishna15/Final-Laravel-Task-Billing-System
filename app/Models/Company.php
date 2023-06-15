<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
   protected $fillable =[ 
    'name',
   'phone',
   'image',
   'address',
   'postalcode',
   'fax',
   'country_id',    
   'user_id'];
   public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'name');
    }
}
