@extends('layouts.cart')

@section('content')
    	<!-- cart -->
	<div class="cart-section mt-100 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
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
                              @if ($carts)
                              
                              @foreach ($carts as $cart) 
                              {{-- @dd($cart->id,$cart->product->name,$cart->user_id) --}}
                                    
                                    <tr class="table-body-row">
                                        <td class="product-remove">
                                            <a href="/deletecart/{{$cart->id}}"><i class="far fa-window-close"></i></a>
                                        </td>
                                        <td class="product-image"><img src="{{asset($cart->product->image_path)}}" alt=""></td>
                                        <td class="product-name">{{$cart->product->name}}</td>
                                        <td class="product-price" id="price">${{$cart->price}}</td>
                                        <td class="product-quantity"><input type="number" placeholder="0" value="{{$cart->quantity}}" class="quantity" oninput="calculateTotal"></td>
                                        <td class="product-total" ><span class="totalQ" id="totalQ">{{$cart->quantity}}
                                        </span>
                                        </td>
                                    </tr>
                                    
                              
                              @endforeach    

                              @else
                                  <div class="bg-danger w-75 p-2 m-auto text-white h3"> The cart is Empty .... Try to add product to the cart ... </div
                              @endif
								
								
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td>$500</td>
								</tr>
								
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>$<span id="totalprice">0.00</span></td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="cart.html" class="boxed-btn">Update Cart</a>
							<a href="checkout.html" class="boxed-btn black">Check Out</a>
						</div>
					</div>

					<div class="coupon-section">
						<h3>Apply Coupon</h3>
						<div class="coupon-form-wrap">
							<form action="index.html">
								<p><input type="text" placeholder="Coupon"></p>
								<p><input type="submit" value="Apply"></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->
@endsection

<script>
    alert('hello');
    function calculateTotal(){
        const quantity = parseFloat(documnet.querySelectorAll('.quantity').value);
        const totalQspan = document.querySelectorAll('.totalQ');
        // const price = parseFloat(document.getElementById('price').value);
        const totalpriceSpan = document.getElementById('totalprice');


        // totalQspan.textContent = quantity;
        // const totalprice = totalQ * price; 

        // //display the total 

        // //display the total price 
        totalQspan.textContent = quantity
    }
        // // add event listenter to quantity
        quantity.forEach( function(input){
            input.addEventListener('input',calculateTotal);
        });
        

        //calculate the initial total
        //quantity.addEventListener('input',calculateTotal );
        


        

   
    calculateTotal();
</script>