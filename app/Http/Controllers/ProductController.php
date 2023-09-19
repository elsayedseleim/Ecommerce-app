<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products($cat_id=0){
        if($cat_id){
            $products = Product::where('category_id',$cat_id)->get();
        }else{
    
            $products = Product::all();
        }
        return view('products.product',['products'=>$products]);
    }

    public function addproduct()
    {
        return view('products.addproduct');
    }
}
