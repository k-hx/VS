@extends('layouts.app')
@section('content')
<div>
    <div style="text-align:center"> 
        <form method="post" action="{{ route('addProduct') }}" enctype="multipart/form-data">
            @csrf 
            <p>
                <label for="name" class="label">Name</label>
                <input type="text" name="name" id="name">
            </p>
                    
            <p>
                <label for="description" class="label">Description</label>
                <input type="text" name="description" id="description">
            </p>
                    
            <select name="category" id="category" class="form-control">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
                    
            <p>
                <label for="price" class="label">Price</label>
                <input type="number" name="price" id="Price">
            </p>
                    
            <p>
                <input type="file" class="form-control" name="product-image" value="">
            </p>
                    
            <p>
                <input type="submit" name="insert" value="Insert">
            </p>
        </form>
    </div>
</div>
@endsection