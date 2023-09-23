<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
   public function categories(){
    
    if(Auth::user()){
        $results = Category::all();
    }else{
        $results = Category::take(3)->get();
    }
       //dd($results);
       return view('welcome',['categories'=>$results]);
   }

   public function categoriesWithproducts(){
    $results = Category::all();
    $products = Product::all();
    return view('category',['categories'=>$results, 'products'=>$products]);
}
   
}
