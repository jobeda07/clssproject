@extends('backendsecond.main')
@section('content')
<h1>Create </h1>
{{-- validation error messages --}}
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
{{-- validation error messages --}}
<div class="container">
    <div class="mx-auto">
        <form class="form" action="{{route('updatecategory',$categoryEdit->id)}}" method="post" >
            @method('PUT')
            @csrf
            <div class="my-2">
                <label>Catgory Name</label>
                <input type="text" class="form-control" value="{{$categoryEdit->category_name}}" placeholder="Enter your category name" name="category_name">
            </div>
            <div class="my-2">
                <label>Catgory Details</label>
                <input type="text" class="form-control" value="{{$categoryEdit->category_details}}"  placeholder="Enter your category details" name="category_details">
            </div>
            <div class="my-2">
                <label>number</label>
                <input type="number" class="form-control" value="{{$categoryEdit->mobile}}"  placeholder="Enter your category details" name="mobile">
            </div>
            <div class="my-2">
                <button type="submit" class="btn btn-success">update</button>
            </div>
        </form>
    </div>
</div>

@endsection