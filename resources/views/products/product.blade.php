@extends('layouts.master')
<style>
    svg{
        height:50px !important;
    }
</style>
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
                                <a href="/product-details/{{$product->id}}"><img src="{{asset($product->image_path)}}" alt=""></a>
                            </div>
                            <h3>{{$product->name}}</h3>
                            <p class="product-price"><span>Per Kg</span>{{$product->price}} $ </p>

                            <a href="/addtocart/{{$product->id}}" class="btn btn-warning"><i class="fas fa-shopping-cart"></i> Add to Cart</a>

                            <a href="/deleteproduct/{{$product->id}}" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                            <a href="/editproduct/{{$product->id}}" class="btn btn-primary"><i class="fas fa-edit"></i> Update</a>
                        </div>
                    </div>
                    
            @endforeach
            
            
            
        </div>
        
        
    </div>
    
    
    <div class="mt-3 - text-center m-auto">
        {{$products->links()}}
    </div
</div>

<!-- end product section -->
	
@endsection
