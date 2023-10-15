<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){

        $user_id = auth()->user()->id;
        //check the session if found add the session to the cart
        

        if(session('cart')!==null && count(session('cart'))>0){
            //dd($cartSession);
            foreach (session('cart') as $array) {
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

        // if not retrieve from the cart
        $cart =Cart::with('product')->where('user_id', $user_id)->get();
       // dd($cart);
        return view('products.check-out',['cart'=>$cart]);
    }

public function storeorder(Request $request){
    /*
    $name = $request->name;
    $email = $request->email;
    $address = $request->address;
    $phone = $request->phone;
    $note = $request->note;
    */

    //1- get user id
    // 2- get all user orders from cart
    // 3- create new order to save user details and order details
    //4- clear the user cart from any products
    $request->validate([
        'name' =>"required | max:150",
        'email' =>"required",
        'address' =>"required",
        'phone' =>"required",
         
    ]);
    $order = new Order();
    $user_id = auth()->user()->id;
    $cartProducts = $cart =Cart::with('product')->where('user_id', $user_id)->get();
    
    $order->name = $request->name;
    $order->email = $request->email;
    $order->address = $request->address;
    $order->phone = $request->phone;
    $order->note = $request->note;
    $order->user_id = $user_id;
    $order->save();

    foreach ($cartProducts as $cart) {
        $orderDetails = new OrderDetails();
        $orderDetails->product_id = $cart->product_id;
        $orderDetails->quantity = $cart->quantity;
        $orderDetails->price = $cart->product->price;
        $orderDetails->order_id = $order->id;
        $orderDetails->save();
    }
    Cart::where('user_id', $user_id)->delete();

    return redirect('/productTable');

    //dd($name, $email, $address, $phone, $note);
}




public function previousorders(){
    $user_id = auth()->user()->id;
    $prevorders =Order::with('orderDetails')->where('user_id', $user_id)->get();
//    dd($prevorders);
    // return view('products.previousorders');
    return view('products.previousorders',['prevorders'=>$prevorders]);
}

}
