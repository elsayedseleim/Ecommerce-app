@extends('layouts.master')

@section('content')

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
				@foreach ($categories as $category)
                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="/product/{{$category->id}}">
										<img src="{{asset($category->image_path)}}" alt="">
									
									</a>
                                </div>
                                <h3>{{$category->name}}</h3>
                                
                            </div>
                        </div>
                @endforeach
				
			</div>
		</div>
	</div>
	<!-- end product section -->
@endsection