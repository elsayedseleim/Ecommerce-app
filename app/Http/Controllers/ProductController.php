<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products($cat_id = 0)
    {
        if ($cat_id) {
            $products = Product::where('category_id', $cat_id)->get();
        } else {

            $products = Product::all();
        }
        return view('products.product', ['products' => $products]);
    }

    public function addproduct()
    {
        $categories = Category::all();
        return view('products.addproduct', ['categories' => $categories]);
    }
    public function storeproduct(Request $request)
    {
        //apply validation
        $request->validate([
            'name' => ['required', 'min:3'],
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'category_id' => ['required', 'between:1,6']
        ]);
        //update the product
        if ($request->id) {
            $product = Product::find($request->id);
            $product->name = $request->name;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->description = $request->description;
            $product->image_path = 'url';
            $product->category_id = $request->category_id;
            $product->save();
            return redirect('/');
        }
        
        else{
            $request->validate([
                'name' => ['required', 'min:3', 'unique:products'],
                'price' => 'required',
                'quantity' => 'required',
                'description' => 'required',
                'category_id' => ['required', 'between:1,6']
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


    public function delete($product_id = null)
    {
        if ($product_id) {

            $product = Product::find($product_id);
            $product->delete();
            return redirect('/product');
        } else {
            return redirect('/product');
        }
    }
    public function edit($product_id = null)
    {

        if ($product_id) {
            $product = Product::find($product_id);

            if ($product == null) {
                abort('403', 'The product was not found');
            }
            $categories = Category::all();
            return view('products.editproduct', ['product' => $product, 'categories' => $categories]);
        } else {
            return redirect('/product');
        }
    }
}
