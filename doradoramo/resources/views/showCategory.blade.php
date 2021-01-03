@extends('layouts.app')
@section('content')
<div>
    <table>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Action</td>
        </tr>

        @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td><a href="{{ route('deleteCategory', ['id' => $category->id]) }}" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">Delete</a></td>                      
        </tr>
        @endforeach
    </table>
</div>
@endsection