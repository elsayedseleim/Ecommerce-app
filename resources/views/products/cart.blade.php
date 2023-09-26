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
                                                <a href="/deletecart/{{ $cart->id }}"><i
                                                        class="far fa-window-close"></i></a>
                                            </td>
                                            <td class="product-image"><img src="{{ asset($cart->product->image_path) }}"
                                                    alt=""></td>
                                            <td class="product-name">{{ $cart->product->name }}</td>
                                            <td class="product-price" id="price">${{ $cart->price }}</td>
                                            <td class="product-quantity"> 
												<input  type="number" placeholder="0" id="quantity"
                                                    value="{{ $cart->quantity }}" class="quantity" oninput="showInNextSpan(this)">
                                            </td>
                                            <td class="product-total">
											<span class="totalQ" id="totalQ" > {{ $cart->quantity }} </span>
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
	function showInNextSpan(inputElement) {
		// Get the parent <td> element containing the input
			var parentTd = inputElement.parentElement;

			// Get the next <td> element containing the span
			var nextTd = parentTd.nextElementSibling;

			// Get the associated span element
			var outputSpan = nextTd.querySelector('.totalQ');

			// Display the user's input value in the associated span
			outputSpan.textContent = inputElement.value;
}



		// var parent = inputElement.parentElement;
		// var totalQspan = parent.querySelector('.totalQ');
		// //totalQspan.textContent = inputElement.value;
		// totalQspan.textContent = inputElement.value;


      // Get the input element and the next span element
    //   var quantity = document.getElementById("quantity");
    //   var totalQspan = document.getElementById("totalQ");

      // Display the user's input value in the next span
      //totalQspan.textContent = quantity.value;
    }

/*
function calc(t) {
				var val = t.value;
				var th = t.id;
				var tot = Number(val);
				var pare = t.parentElement.parentElement.id;
				var totalQspan =document.getElementById('totalQ');
				alert(tot);
				totalQspan.textContent = quantity;
				
				console.log(totalQspan);

				$('#'+pare).children().children().each(function (va){   
				var item = $(this).attr('id');
				if(item != null ){
					if(item != th){
					tot =tot + Number($('#'+pare+' #'+item).val()) 
				}}
				});
							$('#'+pare+' .tot').text(tot);
							$('#'+pare+' .avg').text(tot*100/Number($('#total').text()));
        
     }

*/

/*
    function calculateTotal() {
        const quantity = parseFloat(documnet.querySelectorAll('.quantity').value);
        const totalQspan = document.querySelectorAll('.totalQ');
        // const price = parseFloat(document.getElementById('price').value);
        const totalpriceSpan = document.getElementById('totalprice');
        alert(quantity);

        // totalQspan.textContent = quantity;
        // const totalprice = totalQ * price; 

        // //display the total 

        // //display the total price 
        totalQspan.textContent = quantity
    }
    // // add event listenter to quantity
    // quantity.forEach( function(input){
    //     input.addEventListener('input',calculateTotal);
    // });


    //calculate the initial total
    quantity.addEventListener('input', calculateTotal);




    calculateTotal();
*/
    /*

    		

    $("#grade").change(function() {
     var val = $(this).val();
    	$('#subject').html('');
    	var info = 'val=' + val+'&teacher='+$('#teacher').val();
       $.ajax({
                                type: "GET",
                                url: "/public/choosesubjectt",
                                data: info,
                                
                                success: function(e){
                                    obj = JSON.parse(e);
    								for(var i=0 ; i<obj.length ;i++){
    									$('#subject').append('<option value="'+obj[i][0].id+'">'+obj[i][0].value+'</option>');
    								}
                           
                                }
                            });
    });
     function calc(t) {
      var val = t.value;
        var th = t.id;
         var tot = Number(val);
     var pare = t.parentElement.parentElement.id;
      $('#'+pare).children().children().each(function (va){   
    var item = $(this).attr('id');
    if(item != null ){
        if(item != th){
        tot =tot + Number($('#'+pare+' #'+item).val()) 
    }}
    });
                $('#'+pare+' .tot').text(tot);
                $('#'+pare+' .avg').text(tot*100/Number($('#total').text()));
        
     }

            $("#getMark").one( "click", function() {
                var grade = $("#gr").val();
                 var subject = $("#su").val();
                var info = 'grade=' + grade+" &subject="+subject;
                $.ajax({
                                type: "GET",
                                url: "/public/TeachergetAssignment",
                                data: info,
                                
                                success: function(e){
                                    console.log(e) ;
                                    var obj = JSON.parse(e);
                                    for (x in obj){
                                        for(z in obj[x]){
                                        console.log(obj[x][z]) ;
                                        $('.'+x+' .'+obj[x][z].assign_name).val(Number($('.'+x+' .'+obj[x][z].assign_name).val())+Number(obj[x][z].mark));
                                        var total = Number($('.'+x+' .tot').text()) + Number(obj[x][z].mark)
                                       $('.'+x+' .tot').text(total);
                                        $('.'+x+' .avg').text(total*100/Number($('#total').text()));
                                    }}

                                }
                            });
    });
    	
    */
</script>
