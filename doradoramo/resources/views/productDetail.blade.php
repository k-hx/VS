@extends('layouts.app')
@section('content')  
<div class="row" align="center">
    @foreach($products as $product)       
    <div class="col-md-6"><img src="{{ asset('images/') }}/{{$product->image}}" alt="" width="50%" class="img-fluid"> </div>
        <div class="col-md-6">
            <form action="{{ route('add.to.cart') }}" method="post">
                @csrf
                <h5 class="card-title">{{$product->description}}</h5>
                
                <input type="hidden" name="id" id="id" value="{{$product->id}}">
                
                <input type="hidden" id="name" name="name" value="{{$product->name}}">
                
                <input type="hidden" id="amount" name="amount" value="">
                           
                <div style="height: 100px">RM {{$product->price}} <button type="submit" style="float:right" class="btn btn-danger btn-xs">Add To Cart</button>
            </form>
        </div>
    @endforeach     
</div>
@endsection  