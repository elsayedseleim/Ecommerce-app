@extends('layouts.master')

@section('content')

    <div class="container">
        <form method="POST" action="/add-product-photo" id="fruitkha-contact" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$product->id}}" name="product_id">
        <div class="row my-4 d-flex">
                <div class="col-8">
                    <input type="file" name="photo" id="photo" class="form-control-file">
                    <span class="text-danger">
                        @error('photo')
                            {{ $message }}
                        @enderror
                    </span>

                </div>
                   
                <button type="submit" class="btn btn-primary col-2">Add photo </button>
            
                
            </div>
        </form>
        <div class="row my-3">
            <div class="col-10  d-flex align-content-between">
            @foreach ($photos as $photo )
                <div class="m-1 text-center">

                    <img src="{{asset($photo->imagePath )}}" alt=""  style="max-height: 200px; max-width:150px">
                    <a href="/delete-product-photo/{{$product->id}}/{{ $photo->id }}" class="btn btn-danger btn-sm m-1">
                        <i class="fas fa-image"></i> Delete Photo</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
@endsection