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

                                        <tr class="table-body-row mytr">
                                            <td class="product-remove">
                                                <a href="/deletecart/{{ $cart->id }}"><i
                                                        class="far fa-window-close"></i></a>
                                            </td>
                                            <td class="product-image"><img src="{{ asset($cart->product->image_path) }}"
                                                    alt=""></td>
                                            <td class="product-name">
                                                <a href="/product-details/{{ $cart->product->id  }}">
                                                    {{ $cart->product->name }}
                                                </a>
                                            </td>
                                            <td class="product-price" id="price">
                                                
                                                <span class="pprice">
                                                    {{ $cart->product->price }}
                                                </span>
                                            </td>
                                            <td class="product-quantity">
                                                <input type="number" placeholder="0" id="quantity"
                                                    value="{{ $cart->quantity }}" class="quantity"
                                                    oninput="showQuantity(this)">
                                            </td>
                                            <td class="product-total">
                                                <span class="totalQ" id="totalQ"> {{ $cart->quantity }} </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <div class="bg-danger w-75 p-2 m-auto text-white h3"> The cart is Empty .... Try to add
                                        product to the cart ... </div>
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
                                    <td>
                                        $
                                        <span id="sumResult">

                                        </span>
                                    </td>
                                </tr>

                                <tr class="total-data">
                                    <td><strong>Total: </strong></td>
                                    <td>
                                        $
                                        <span id="totalprice">0.00</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="cart-buttons">

                            <a onclick="getGrandTotal()" class="boxed-btn"> Update Cart</a>

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
    function getSubTotal() {
        // Get all <span> elements with the class "outputSpan"
        var priceSpans = document.querySelectorAll('.pprice');

        var sum = 0;

        // Iterate through the selected spans and calculate the sum of their values
        priceSpans.forEach(function(span) {
            var value = parseFloat(span.textContent);

            if (!isNaN(value)) {
                sum += value;
            }
        });


        // Display the calculated sum
        var subtotal = document.getElementById('sumResult');
        subtotal.textContent = sum;
    }


    function showQuantity(inputElement) {
        // Get the parent <td> element containing the input
        var parentTd = inputElement.parentElement;
        // console.log(parentTd)
        // Get the next <td> element containing the span
        var nextTd = parentTd.nextElementSibling;
        // console.log(nextTd)
        // Get the associated span element
        var outputSpan = nextTd.querySelector('.totalQ');

        // Display the user's input value in the associated span
        outputSpan.textContent = inputElement.value;
    }


    
    function getGrandTotal() 
    {
                var rows = document.querySelectorAll('.mytr');

                var total = 0;
                rows.forEach(function(row) {
                    var priceSpan = row.querySelector('.pprice');
                    var quantitySpan = row.querySelector('.totalQ');
                    var price = parseFloat(priceSpan.textContent);
                    var quantity = parseFloat(quantitySpan.textContent);

                    if (!isNaN(price) && !isNaN(quantity)) {
                        total += price * quantity;

                    }
                });

                var totalprice = document.getElementById('totalprice');
                //Display with two decimal places
                totalprice.textContent = total.toFixed(2);;

    }

    document.addEventListener('DOMContentLoaded', function() {getSubTotal();});

    document.addEventListener('DOMContentLoaded', function() { getGrandTotal();});
</script>
