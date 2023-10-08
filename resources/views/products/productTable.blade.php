<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


@extends('layouts.master')
@section('content')
    <div class="container my-5" >
        <a href="/addproduct" class="btn btn-primary d-block w-50 my-3"><i
            class="fas fa-plus"></i> Add product</a>

        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Product Description</th>
                    <th>Product image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <img src="{{ asset($product->image_path) }}" alt=""
                                style="max-width:100px; max-height: 100px; ">
                        </td>
                        <td>
                            <div class="d-flex">

                                <a href="/deleteproduct/{{ $product->id }}" class="btn btn-danger btn-sm m-1"
                                    onclick="return confirm('Are you sure you want to delete this product?');">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                 </a>
                                    {{-- <form action="/deleteproduct/{{ $product->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" onclick="confirmDelete()">Delete Product</button>
                                    </form>  --}}
                                    {{-- <a  class="btn btn-danger btn-sm m-1"><i
                                        class="fas fa-trash" onclick="event.preventDefault(); confirmDelete()" ></i>
                                    Delete</a>    --}}
                                <a href="/editproduct/{{ $product->id }}" class="btn btn-warning btn-sm m-1"><i
                                        class="fas fa-edit"></i> Update</a>
                                <a href="/product-photos/{{ $product->id }}" class="btn btn-info btn-sm m-1">
                                    <i class="fas fa-image"></i> Add photos</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

<script>
    $(document).ready(function() {
        let table = new DataTable('#myTable');
        // $('#myTable').DataTable();
        
    });
</script>
<script>
    function confirmDelete() {
        if (confirm("Are you sure you want to delete this product?")) {
            // If the user confirms, submit the form
            document.forms[0].submit(); // Change the index if you have multiple forms on the page
        } else {
            // If the user cancels, do nothing
        }
    }
</script>
