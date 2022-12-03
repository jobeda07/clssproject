@extends('backendsecond.main')
@section('content')
@if ($message =session()->get('danger'))
<div class="alert alert-danger">
    <strong>{{$message}}</strong>
</div>
@endif

@if ($message =session()->get('success'))
<div class="alert alert-success">
    <strong>{{$message}}</strong>
</div>
@endif

<h1>category</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Category Name</th>
            <th scope="col">category Details</th>
            <th scope="col">number</th>
            <th scope="col">update</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $singleCategory)
        <tr>
            <th>{{$singleCategory->id}}</th>
            <th>{{$singleCategory->category_name}}</th>
            <td>{{$singleCategory->category_details}}</td>
            <td>{{$singleCategory->mobile}}</td>
            <td><a class="btn btn-success" href="{{route('category.edit',$singleCategory->id)}}">Update</a></td>
            <td><a class="btn btn-danger" href="{{route('deletecategory',$singleCategory->id)}}">Delete</a></td>
            
        </tr>
        @endforeach
    </tbody>
</table>
@endsection


