<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductPhotosController extends Controller
{
    
    public function index($product_id=null){
        if($product_id){
            $product = Product::where('id', $product_id)->get()->first();
            //dd($product);
            $photo = ProductImage::where('product_id', $product_id)->get();
            return view('products.add-product-photo',['product'=>$product, 'photos'=>$photo]);
        }
        
    }
    public function add(Request $request){
       
        if($request->has('photo')){

            $request->validate([
                'photo'=>'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            $path='';
            $newName = time().'_'.$request->photo->getClientOriginalName();
            $path= $request->photo->move('uploads',$newName);
            $photo = new ProductImage();
            $photo->imagePath =$path;
            $photo->product_id =  $request->product_id;
    
            $photo->save();
            return redirect('/product-photos/'.$request->product_id);
        }else{
            return redirect('/product-photos/'.$request->product_id);
        }
        
        
    }

    public function delete($product_id=null, $photo_id=null){
        if($product_id){
            if($photo_id){
                $photo = ProductImage::find($photo_id);
                $photo->delete();
                return redirect('/product-photos/'.$product_id);
    
            }else{
                return redirect('/product-photos/'.$product_id);
            }
        }else{
            return redirect('/productTable');
        }
       
        

    }
}
