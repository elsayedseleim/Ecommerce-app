@extends('layouts.master')

@section('content')
<h1> category page </h1>

<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3>Products <span class="orange-text">Categories</span></h3>
						<p>Welcome to our porduct Categories.</p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
						</div>
						<h3>Strawberry</h3>
						
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- end product section -->
	
@endsection
