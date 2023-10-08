<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function products($cat_id = 0)
    {
        if ($cat_id) {
            // $products = Product::where('category_id', $cat_id)->get()
            $products = Product::where('category_id', $cat_id)->paginate(5);
        } else {

            //$products = Product::all();
            $products = Product::paginate(5);
        }
        return view('products.product', ['products' => $products]);
    }

    public function addproduct()
    {
        $user = Auth::user();
        $categories = Category::all();
        return view('products.addproduct', ['categories' => $categories, 'user'=>$user]);
    }
    public function storeproduct(Request $request){
        
        
        //dd($newName, $path,$url);
        //apply validation
        $request->validate([
            'name' => ['required', 'min:3'],
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'category_id' => ['required', 'between:1,6'],
            'photo'=>'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        //update the product
                if ($request->id) {
                    $product = Product::find($request->id);
                    $product->name = $request->name;
                    $product->price = $request->price;
                    $product->quantity = $request->quantity;
                    $product->description = $request->description;
                    $product->category_id = $request->category_id;

                    $path='';

                            if($request->has('photo')){
                                $newName = time().'_'.$request->photo->getClientOriginalName();
                                $path= $request->photo->move('uploads',$newName);
                                $product->image_path = $path;
                            }

                    

                    $product->save();
                    return redirect('/');
                }
        
        else{
            $request->validate([
                'name' => ['required', 'min:3', 'unique:products'],
                'price' => 'required',
                'quantity' => 'required',
                'description' => 'required',
                'category_id' => ['required', 'between:1,6'],
                'photo'=>'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            //add new product
            $newproduct = new Product();
            $newproduct->name = $request->name;
            $newproduct->price = $request->price;
            $newproduct->quantity = $request->quantity;
            $newproduct->description = $request->description;
            $newproduct->category_id = $request->category_id;

            $path='';
            
            if($request->has('photo')){
                $newName = time().'_'.$request->photo->getClientOriginalName();
                $path= $request->photo->move('uploads',$newName);
            }
            
            $newproduct->image_path = $path;
            $newproduct->save();
    
            return redirect('/');
        }

    }


    public function delete($product_id = null)
    {
        if ($product_id) {

            $product = Product::find($product_id);
            $product->delete();
            return redirect('/productTable');
        } else {
            return redirect('/productTable');
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

    public function search(Request $request){
        //dd($request->keyword);
        $results = Product::query()->where('name','like','%'.$request->keyword.'%')->get();
        //dd($results);
        return view('products.product', ['products' => $results]);

        // if($keyword){
        //     dd($keyword);
        // }else{
        //     return redirect('/product');
        // }
    }


    public function productTable(){
        $products = Product::all();
    
        return view('products.productTable', ['products' => $products]);
    }

    // show product details

    public function show($product_id=null){
        if($product_id){
           //$product = Product::find($product_id);
           $product = Product::with('category','productImages')->where('id',$product_id)->get()->first();
           
         // dd($product);
            //dd($product, $product->category->name);
            return view('products.single-product', ['product'=>$product]);
        }

    }


}
