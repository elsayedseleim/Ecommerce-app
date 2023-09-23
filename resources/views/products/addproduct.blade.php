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
                    @if ($user==null)
                        <p class="bg-danger text-white h3 my-5 p-3"> This page for Admin only or you should 
                            <a href="{{route('login')}}">
                            Login 
                            </a>
                            First </p>
                    @else    
                    <div class="form-title m-auto ">
                        <div class="contact-form m-auto">
                            <form method="POST" action="/storeproduct" id="fruitkha-contact" enctype="multipart/form-data">
                                @csrf()
                                <select class="form-control mb-2" required name="category_id">
                                    <option>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    @error('category_id')
                                        Missing Vlaue of The category field.
                                    @enderror
                                </span>
                                <p>

                                    <input type="text" required placeholder="Name" name="name" id="name"
                                        class="w-100 mr-2" value="{{ old('name') }}">
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>


                                </p>
                                <p class="d-flex">
                                    <input type="number" required placeholder="Price" name="price" id="price"
                                        class="w-50 mr-2" value="{{ old('price') }}">
                                    <span class="text-danger">
                                        @error('price')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <input type="number" required placeholder="Quantity" name="quantity" id="quantity"
                                        class="w-50" value="{{ old('quantity') }}">
                                    <span class="text-danger">
                                        @error('quantity')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </p>
                                <p>
                                    <textarea name="description" required id="description" cols="30" rows="10" placeholder="Description">{{ old('description') }}</textarea>
                                    <span class="text-danger">
                                        @error('description')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </p>
                                <p>
                                    <input type="file" name="photo" id="photo" class="form-control-file">
                                    <span class="text-danger">
                                        @error('photo')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </p>
                                <p><input type="submit" value="Add prodcut"></p>
                            </form>
                        </div>
                    </div>
                    @endif

                </div>
            </div>

        </div>


        <!-- end product section -->
    @endsection
