<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $user_id = auth()->user()->id;
        
            $cart = Cart::where('user_id', $user_id)->get();
            // dd($cart[1]->id);
        


        //dd($cart);
        return view('products.cart', ['carts' => $cart]);
    }

    public function add($product_id)
    {
        

        if ($product_id) {
            
            if ($product) {
                $cart = new Cart();
                
                
                    $cart->product_id = $product_id;
                    //$cart->price = $product->price;
                    $cart->quantity = 1;
                    $cart->user_id = auth()->user()->id;
                    $cart->save();
                    // dd($cart,$cart->product());

                    return redirect('/cart');
              
            
                } else {
                    return redirect('/product');
                }

        /* // first code
        if ($id) {
            $product = Product::find($id);
            if ($product) {
                $cart = new Cart();
                $user = Auth::user();
                if ($user) {
                    $cart->product_id = $product->id;
                    $cart->price = $product->price;
                    $cart->quantity = 1;
                    $cart->user_id = $user->id;
                    $cart->save();
                    // dd($cart,$cart->product());

                    return redirect('/cart');
                }
            } else {
                return redirect('/product');
            }
        } else {
            return redirect('/product');
        }
        */




    }
}
