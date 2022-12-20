@extends('backendsecond.main')
@section('content')


<h3>Employee List</h3>
<a class="btn btn-secondary" href="{{route('employee.form')}}">New employee</a>
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
    
  @foreach($employees as $views)
    <tr>
      <th scope="row">{{$views->id}}</th>
      <td>{{$views->employee_name}}</td>
      <td class="text-center">
        <img src="{{asset('/uploade/image/'.$views->employee_image)}}" alt="img not found" height="70px" width="70px" class="rounded-circle">
      </td>
    
      

      <td><a class="btn btn-success" href="{{route('employee.editform',$views->id)}}">Edit</a></td>


      <td>
        <a class="btn btn-danger" href="{{route('employee.delete',$views->id)}}">Delete</a>
      </td>
    </tr>
    
    @endforeach
 
    
  </tbody>
</table>
</div>

@endsection