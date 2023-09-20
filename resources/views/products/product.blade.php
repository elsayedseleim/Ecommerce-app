@extends('layouts.master')

@section('content')
<!-- product section -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">	
                    <h3>Products <span class="orange-text"></span></h3>
                    <p>Welcome to our porduct page.</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
                            </div>
                            <h3>{{$product->name}}</h3>
                            <p class="product-price"><span>Per Kg</span>{{$product->price}} $ </p>
                            <a href="cart.html" class="btn btn-warning"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                            <a href="/deleteproduct/{{$product->id}}" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                            <a href="/editproduct/{{$product->id}}" class="btn btn-primary"><i class="fas fa-edit"></i> Update</a>
                        </div>
                    </div>
            @endforeach
            
        </div>
    </div>

</div>


<!-- end product section -->
	
@endsection
