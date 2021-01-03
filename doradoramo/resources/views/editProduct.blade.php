@extends('layouts.app')
@section('content')
<div>
    <div style="text-align:center"> 
        <form class="form-group" method="post" action="{{ route('updateProduct') }}" enctype="multipart/form-data">
            @csrf 
            <p>
                <h3>Edit Product</h3>
            </p>

            @foreach($products as $product)
            <p>
                <label for="ID" class="label">Product ID</label>
                <input type="text" name="ID" id="ID" value="{{$product->id}}" readonly>
            </p>
            
            <p>
                <label for="name" class="label">Name</label>
                <input type="text" name="name" id="name" value="{{$product->name}}">
            </p>
            
            <p>
                <label for="description" class="label">Description</label>
                <input type="text" name="description" id="description" value="{{$product->description}}">
            </p>
                    
            <select name="category" id="category" class="form-control">
                @foreach($categories as $category)
                    <option  value="{{ $category->id }}"
                    @if($product->categoryID==$category->id)
                    selected                    
                    @endif
                    >{{ $category->name }}</option>
                @endforeach
            </select>
                    
            <p>
                <label for="price" class="label">Price</label>
                <input type="number" name="price" id="Price" value="{{$product->price}}">
            </p>
                    
            <p>
                <input type="file" class="form-control" name="product-image" value="{{$product->image}}">
            </p>
            @endforeach

            <p>
                <input type="submit" name="edit" value="Edit">
            </p>
        </form>
    </div>
</div>
@endsection