@extends('layouts.master')

@section('content')
<!-- product section -->
<div class="product-section mt-100 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">	
                    <h3>Add <span class="orange-text">New Product</span></h3>
                    
                </div>
            </div>
        </div>

        <div class="row">
           
            <div class="col-lg-8  mb-lg-0 m-auto mb-5">
                <div class="form-title m-auto ">
                <div class="contact-form m-auto">
                    <form method="POST" action="/storeproduct" id="fruitkha-contact" enctype="multipart/form-data">
                        @csrf()
                        <select class="form-control mb-2" required name="category_id">
                            <option >Select Category</option>
                            @foreach ($categories as $category ) 
                              @if ($category->id == $product->category_id )
                                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                              @else
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                              @endif
                            
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('category_id')
                            Missing Vlaue of The category field.
                            @enderror
                        </span>
                        <p>
                            <input type="hidden" name="id" id="id"value="{{$product->id}}">
                            <input type="text" required placeholder="Name" name="name" id="name" class="w-100 mr-2" value="{{$product->name}}">
                            <span class="text-danger">
                                @error('name')
                                    {{$message}}
                                @enderror
                            </span>
                        
                    
                        </p>
                        <p class="d-flex">
                            <input type="number" required placeholder="Price" name="price" id="price" class="w-50 mr-2" value="{{$product->price}}">
                            <span class="text-danger">
                                @error('price')
                                    {{$message}}
                                @enderror
                            </span>
                            <input type="number" required placeholder="Quantity" name="quantity" id="quantity" class="w-50" value="{{$product->quantity}}">
                            <span class="text-danger"> 
                                @error('quantity')
                                    {{$message}}
                                @enderror
                            </span>
                        </p>
                        <p>
                            <textarea name="description" required id="description" cols="30" rows="10" placeholder="Description" >{{$product->description}}</textarea>
                            <span class="text-danger">
                                @error('description')
                                        {{$message}}
                                    @enderror
                            </span>
                        </p>

                        <p>
                            <img src="{{asset($product->image_path)}}" alt="" width="150" height="200" class="rounded">
                        </p>
                        <p>
                            <input type="file" name="photo" id="photo" class="form-control-file">
                            <span class="text-danger">
                                @error('photo')
                                        {{$message}}
                                    @enderror
                            </span>
                        </p>

                        <p><input type="submit" value="update prodcut"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- end product section -->
	
@endsection
