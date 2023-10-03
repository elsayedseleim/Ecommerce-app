@extends('layouts.master')

@section('content')
    <!-- single product -->






    <div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="single-product-img">

                        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset($product->image_path) }}" class="d-block w-100"
                                        alt="{{ asset($product->name) }}">
                                </div>
                                @foreach ($product->productImages as $item)
                                    <div class="carousel-item">
                                        <img src="{{ asset($item->imagePath) }}" class="d-block w-100"
                                            alt="{{ asset($product->name) }}">
                                    </div>
                                @endforeach
                            </div>
                           
                        </div>


                        



                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-content">
                        <h3>{{ $product->name }}</h3>
                        <p class="single-product-pricing"><span>Per Kg</span> ${{ $product->price }}</p>
                        <p>{{ $product->description }}</p>
                        <div class="single-product-form">

                            <a href="/addtocart/{{ $product->id }}" class="cart-btn"><i class="fas fa-shopping-cart"></i>
                                Add to Cart</a>
                            <p><strong>Categories: </strong>{{ $product->category->name }}</p>
                        </div>
                        <h4>Share:</h4>
                        <ul class="product-share">
                            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end single product -->
@endsection
