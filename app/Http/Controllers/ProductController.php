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
    public function storeproduct(Request $request){
        //apply validation
        $request->validate([
            'name'=>['required','min:3','unique:products'],
            'price'=>'required',
            'quantity'=>'required',
            'description'=>'required'
        ]);


        //add new product
        $newproduct = new Product();
        $newproduct->name = $request->name;
        $newproduct->price = $request->price;
        $newproduct->quantity = $request->quantity;
        $newproduct->description = $request->description;
        $newproduct->image_path = 'url';
        $newproduct->category_id = 1;
        $newproduct->save();

        return redirect('/');
    }
}
