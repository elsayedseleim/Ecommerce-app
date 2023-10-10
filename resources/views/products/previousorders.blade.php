@extends('layouts.master')

@section('content')
    <!-- check out section -->
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    @php
                                                                $counter=1
                                                            @endphp
                    @foreach ($prevorders as $order)
                                            
                        <div class="checkout-accordion-wrap mb-2">
                            <div class="accordion" id="accordionExample">
                                <div class="card single-accordion">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Order Number # {{$counter++}}
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="billing-address-form">

                                                <form >
                                                    
                                                    <p><input type="text" placeholder="Name" value="Order Date:  {{$order->created_at}}" disabled></p>
                                                    <p><input type="text" placeholder="Name" value="{{$order->name}}"disabled></p>
                                                    <p><input type="email" placeholder="Email" value="{{$order->email}}" disabled></p>
                                                    <p><input type="text" placeholder="Address" value="{{$order->address}}" disabled></p>
                                                    <p><input type="tel" placeholder="Phone" value="{{$order->phone}}" disabled></p>
                                                    <p>
                                                        <textarea disabled  name="bill" id="bill" cols="30" rows="10" placeholder="Say Something">{{$order->note}}</textarea>
                                                    </p>
                                                </form>
                                                
                                                    
                                                
                                                 <table class="cart-table">
                                                    <thead class="cart-table-head">
                                                        <tr class="table-head-row">
                                                            <th class="product-remove"></th>
                                                            <th class="product-image">Product Image</th>
                                                            <th class="product-name">Name</th>
                                                            <th class="product-price">Price</th>
                                                            <th class="product-quantity">Quantity</th>
                                                            <th class="product-total">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($order->orderDetails as $orderdetails )
                                                        <tr class="table-body-row mytr">
                                                            <td class="product-remove">
                                                                {{-- <a href="/deletecart/{{ $cart->id }}"><i
                                                                        class="far fa-window-close"></i></a> --}}
                                                            </td>
                                                            <td class="product-image"><img
                                                                    src="{{ asset($orderdetails->product->image_path) }}"
                                                                    alt=""></td>
                                                            <td class="product-name">
                                                                <a href="/product-details/{{ $orderdetails->product->id }}">
                                                                    {{ $orderdetails->product->name }}
                                                                </a>
                                                            </td>
                                                            <td class="product-price" id="price">

                                                                <span class="pprice">
                                                                    {{ $orderdetails->product->price }}
                                                                </span>
                                                            </td>
                                                            <td class="product-quantity">
                                                                {{ $orderdetails->quantity }}
                                                            </td>
                                                            <td class="product-total">
                                                                <span class="totalQ" id="totalQ"> {{ $orderdetails->quantity  *  $orderdetails->product->price}}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        
                                                        
                                                        @endforeach
                                                        <tr>
                                                            <td colspan="5" class=" border-3 border-bottom text-right h5 ">
                                                           
                                                               Subtotal: 
                                                            
                                                            </td>
                                                            <td \ class=" border-3 border-bottom text-center h5 ">
                                                           
                                                                {{$order->orderDetails->sum(function($item){
                                                                    return $item->product->price * $item->quantity;
                                                                })
                                                                }}
                                                            
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                
                                                
                                            </div>
                                            

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    @endforeach
                </div>


            </div>
        </div>
    </div>
    <!-- end check out section -->
@endsection
