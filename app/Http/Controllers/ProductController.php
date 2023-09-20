<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $categories = Category::all();
        return view('products.addproduct',['categories'=>$categories]);
    }
    public function storeproduct(Request $request){
        //apply validation
        $request->validate([
            'name'=>['required','min:3','unique:products'],
            'price'=>'required',
            'quantity'=>'required',
            'description'=>'required',
            'category_id'=>['required','between:1,6']
        ]);


        //add new product
        $newproduct = new Product();
        $newproduct->name = $request->name;
        $newproduct->price = $request->price;
        $newproduct->quantity = $request->quantity;
        $newproduct->description = $request->description;
        $newproduct->image_path = 'url';
        $newproduct->category_id = $request->category_id;
        $newproduct->save();

        return redirect('/');
    }
}
