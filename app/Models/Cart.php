<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    //relation method one to many
    public function product(){
       //return $this->belongsTo(Product::class);
       return $this->belongsTo(Product::class,"product_id");
    }
}
