@extends('backendsecond.main')
@section('content')


<h3>Viral List</h3>
<a class="btn btn-secondary" href="{{route('viral.form')}}">Viral Issue</a>
<br>
<br>
<div class="container">
<table class="table table-dark ">
  
  <thead>
    
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($virallist as $viral)
    <tr>
      <th scope="row">{{$viral->id}}</th>
      <th scope="row">{{$viral->viral_name}}</th>
      <th scope="row">
        <img src="{{asset('/imagefile/viralpic/'.$viral->viral_image)}}" alt="img not found" height="70px" width="70px" class="rounded-circle">
      </th>
      
      
      <td><a class="btn btn-success" href="{{route('viral.editform',$viral->id)}}">Edit</a></td>
      <td><a class="btn btn-danger" href="{{route('viral.delete',$viral->id)}}">Delete</a></td>
    </tr>
   @endforeach
    
 
    
  </tbody>
</table>
</div>

@endsection