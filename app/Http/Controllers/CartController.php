<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function index(Request $request)
    {


        

        //if guest
        if(!Auth::check()){

            return view('products.cart');
        }
        else{
            $user_id = auth()->user()->id;
            $cartSession = session('cart');

            if($cartSession && is_array($cartSession)){
                //dd($cartSession);
                foreach ($cartSession as $array) {
                    //dd($array);                                        
                    $cart = new Cart();
                    $cart->product_id =$array['product_id'];
                    $cart->price =$array['price'];
                    $cart->quantity=  $array['quantity'];
                    $cart->user_id = auth()->user()->id;
                    $cart->save();
                   
                    //empty the session cart
                    session(['cart' => []]);
                    
            }

            }
            if(Auth::check())
            {
                $user_id = auth()->user()->id;
                if($user_id){
                    //product here is the name of the relation method in Cart model
                    $cart = Cart::with('product')->where('user_id', $user_id)->get();
                    // dd($cart[1]->id);
            
            
                    //dd(session('cart'));
                    //dd($cart);
        
                    return view('products.cart', ['carts' => $cart]);
                }
            }
        }

        
    }

    public function add(Request $request, $product_id)
    {
        
         // Get the product details from the database or elsewhere
            $product  = Product::find($product_id);
            
      
            //$user_id = auth()->user()->id;
            
            if(!Auth::check()){
               
                // Initialize the cart if it doesn't exist in the session
                if (!$request->session()->has('cart')) {
                $request->session()->put('cart', []);
                }
                // Retrieve the current cart from the session
                $cart = $request->session()->get('cart');
          
                // Check if the product is already in the cart
                $index = array_search($product_id, array_column($cart, 'product_id'));
                if ($index !== false) {
                    // If the product is already in the cart, increase its quantity
                    $cart[$index]['quantity']++;
                    
                }else {
                    // If the product is not in the cart, add it
                    $cart[] = [
                        'product_id' => $product_id,
                        'price' => $product->price,
                        'image_path' => $product->image_path,
                        'name' => $product->name,
                        'quantity' => 1,
                    ];
                }
                    // Update the cart in the session
                    $request->session()->put('cart', $cart);

                    //dump(session('cart'));
                    return redirect('/cart');
            

    }




        /*
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
        */

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
