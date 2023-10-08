<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $user_id = auth()->user()->id;

        //product here is the name of the relation method in Cart model
        $cart = Cart::with('product')->where('user_id', $user_id)->get();
        // dd($cart[1]->id);



        //dd($cart);
        return view('products.cart', ['carts' => $cart]);
    }

    public function add($product_id)
    {
        $user_id = auth()->user()->id;
        // $product = Cart::where('user_id', $user_id)->where('product_id', $product_id)->get();
        $product = Cart::where('user_id', $user_id)->where('product_id', $product_id)->first();
        if ($product) {
            $product->quantity += 1;
            $product->save();
            // if ($product->count() > 0) {
            // $product->first()->quantity += 1;
            // $product->first()->save();
            return redirect('/cart');
        } else {
            $product  = Product::find($product_id);
            $cart = new Cart();
            $cart->product_id = $product_id;
            $cart->price = $product->price;
            $cart->quantity = 1;
            $cart->user_id = auth()->user()->id;
            $cart->save();
            return redirect('/cart');
        }
        // if ($product_id) {

        //     if ($product) {

        // dd($cart,$cart->product());

        //return redirect('/cart');


        // } else {
        //     return redirect('/product');
        // }

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

    public function delete($cartid=null){
        if($cartid){
           // dd($cartid);
           Cart::find($cartid)->delete();
            
            return redirect('/cart');

        }
        else{
            return redirect('/cart');
        }

    }

    public function updateQuantity(Request $request){
        $cartIds = $request->input('cart_id');
        $quantities = $request->input('quantity');

        //dd($cartIds, $quantities);
    // Loop through the cart_ids and update quantities
    foreach ($cartIds as $key => $cartId) {
        $quantity = $quantities[$key];

        // Find the corresponding cart item and update the quantity
        $cart = Cart::find($cartId);

        if ($cart) {
            $cart->quantity = $quantity;
            $cart->save();
        }
    }
        return redirect('/cart');


    }
    

}
