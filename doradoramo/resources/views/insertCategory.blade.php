@extends('layouts.app') 
@section('content')
<div>
    <div style="text-align:center"> 
        <form method="post" action="{{ route('addCategory') }}" enctype="multipart/form-data">
            @csrf 
            <p>
                <label for="name" class="label">Name</label>
                <input type="text" name="name" id="name">
            </p>
                        
            <p>
                <input type="submit" name="insert" value="Insert">
            </p>
        </form>
    </div>
</div>
@endsection