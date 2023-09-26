<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        
            $cart = Cart::where('user_id', $user->id)->get();
            // dd($cart[1]->id);
        


        //dd($cart);
        return view('products.cart', ['carts' => $cart]);
    }

    public function add($id)
    {
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
    }
}
