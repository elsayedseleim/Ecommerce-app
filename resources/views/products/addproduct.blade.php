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
           
            <div class="col-lg-8 mb-5 mb-lg-0 m-auto ">
                <div class="form-title m-auto ">
                <div class="contact-form m-auto">
                    <form type="POST" action="" id="fruitkha-contact" onSubmit="return valid_datas( this );">
                        <p>
                            <input type="text" placeholder="Name" name="name" id="name" class="w-100">
                            
                        </p>
                        <p class="d-flex">
                            <input type="number" placeholder="Price" name="price" id="price" class="w-50 mr-2">
                            <input type="number" placeholder="Quantity" name="quantity" id="quantity" class="w-50">
                            
                        </p>
                        <p><textarea name="description" id="description" cols="30" rows="10" placeholder="Description"></textarea></p>
                        <input type="hidden" name="token" value="FsWga4&@f6aw" />
                        <p><input type="submit" value="Submit"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- end product section -->
	
@endsection
