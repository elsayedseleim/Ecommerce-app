<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function categories(){

       $results = Category::all();
       //dd($results);
       return view('welcome',['categories'=>$results]);
   }
   public function categoriesWithproducts(){
    $results = Category::all();
    $products = Product::all();
    return view('category',['categories'=>$results, 'products'=>$products]);
}
   
}
