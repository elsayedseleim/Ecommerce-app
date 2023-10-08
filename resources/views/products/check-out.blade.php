@extends('layouts.master');


@section('content')

<div class="breadcrumb-text">
    <p class="h1 text-center my-5">Check Out Product</p>
    
</div>
    	<!-- check out section -->
	<div class="checkout-section  mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Billing Address
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
						        	<form action="/storeorder" method="post">
                                        @csrf
						        		<p>
                                            <input type="text" name="name" id="name" placeholder="Full Name" value="{{old('name')}}">
                                            <span class="text-danger">
                                                @error('name')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </p>
						        		<p><input type="email" name="email" id="email" placeholder="Email" value="{{old('email')}}">
                                            <span class="text-danger">
                                                @error('email')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </p>
						        		<p><input type="text" name="address" id="address" placeholder="Address" value="{{old('address')}}">
                                            <span class="text-danger">
                                                @error('address')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </p>
						        		<p><input type="tel" name="phone" id="phone" placeholder="Phone" value="{{old('phone')}}">
                                            <span class="text-danger">
                                                @error('address')
                                                {{$phone}}
                                                @enderror
                                            </span>
                                        </p>
						        		<p><textarea name="note" id="note" cols="30" rows="10" placeholder="Write a note">{{old('note')}}</textarea></p>
						        	
						        </div>
						      </div>
						    </div>
						  </div>
						  <div class="card single-accordion">
						    <div class="card-header" id="headingTwo">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						          Shipping Address
						        </button>
						      </h5>
						    </div>
						    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="shipping-address-form">
						        	<p>Your shipping address form is here.</p>
						        </div>
						      </div>
						    </div>
						  </div>
						  <div class="card single-accordion">
						    <div class="card-header" id="headingThree">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						          Card Details
						        </button>
						      </h5>
						    </div>
						    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="card-details">
						        	<p>Your card details goes here.</p>
						        </div>
						      </div>
						    </div>
						  </div>
						</div>

					</div>
				</div>

				<div class="col-lg-4">
					<div class="order-details-wrap">
						<table class="order-details">
							<thead>
								<tr>
									<th colspan="4" class= "text-center"><span style="font-weight: bold !important;">Your order Details</span></th>
									
                                    
								</tr>
							</thead>
							<tbody class="order-details-body">
								<tr >
									<td><span style="font-weight: bold !important;">Product</span></td>
                                    <td><span style="font-weight: bold !important;">Quantity</span></td>
									<td><span style="font-weight: bold !important;">Price</span></td>
                                    <td><span style="font-weight: bold !important;">Total</span></td>
								</tr>

                               
                               @php
                                   $total = 0
                               @endphp
                                @foreach ($cart as $cart)
                                    
								<tr class="bg-light">
                                    
									<td><span style="font-weight: bold !important;">{{$cart->product->name}}</span></td>
                                    <td class="text-center">{{$cart->quantity}}</td>
									<td><span style="font-size:13px !important">AED</span>  {{$cart->product->price}}</td>
                                    <td><span style="font-size:13px !important">AED</span>  {{$cart->quantity * $cart->product->price}}</td>
                                    @php
                                   $total += $cart->quantity * $cart->product->price
                                    @endphp
                                    
								</tr>
                                @endforeach
								




							</tbody>
                            
							<tbody class="checkout-details">
								<tr>
									<td><span style="font-weight: bold !important;">Subtotal</span></td>
									<td colspan="3" class= "text-center"><span style="font-size:13px !important">AED</span> {{$total}}</td>
								</tr>
								<tr>
									<td><span style="font-weight: bold !important;">Shipping</span></td>
									<td colspan="3" class="text-center"><span style="font-size:13px !important">AED</span>  50</td>
								</tr>
								<tr>
									<td><span style="font-weight: bold !important;">Total</span></td>
									<td colspan="3" class="text-center"  style="background-color: #efefef; font-weight: 900">AED {{$total + 50}}</td>
								</tr>
							</tbody>
                                                                                  
						</table>
                        <button type="submit" class="form-control btn bg-warning w-70 my-3 text-bold">Place Order</button>
                    </form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end check out section -->

@endsection