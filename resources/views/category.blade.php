@extends('layouts.master')

@section('content')

<!-- product section -->
	<div class="product-section mt-80 ">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3>Products <span class="orange-text">Categories</span></h3>
						<p>Welcome to our porduct Categories.</p>
					</div>
				</div>
			</div>

			<!-- products -->
	<div class="product-section ">
		<div class="container">
			<div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach ($categories as $category)
								<li data-filter="._{{$category->id}}">{{$category->name}}</li>
							@endforeach
                        </ul>
                    </div>
                </div>
            </div>

			<div class="row product-lists">
				@foreach ($products as $product )
				<div class="col-lg-4 col-md-6 text-center _{{$product->category_id}}">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
						</div>
						<h3>{{$product->name}}</h3>
						<p class="product-price"><span>Per Kg</span> {{$product->price}}$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				@endforeach
				

			</div>

			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<li><a href="#">Prev</a></li>
							<li><a href="#">1</a></li>
							<li><a class="active" href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end products -->


		</div>
	</div>
	<!-- end product section -->
	
@endsection
