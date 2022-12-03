@extends('backendsecond.main')
@section('content')

<!-- @if ($message=session()->get('danger'))
<div class="alert alert-danger">
  <strong>{{$message}}</strong>
</div>
@endif

@if ($message=session()->get('success'))
<div class="alert alert-danger">
  <strong>{{$message}}</strong>
</div>
@endif -->

<h1>List of users</h1>
<br>
<table class="table table-dark ">
  
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Address</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach($alluser as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->user_name}}</td>
      <td>{{$user->user_email}}</td>
      <td>{{$user->user_mobile}}</td>
      <td>{{$user->user_address}}</td>
      <td><a class="btn btn-success" href="{{route('edituser',$user->id)}}">Edit</a></td>
      <td><a class="btn btn-danger" href="{{route('deleteuser',$user->id)}}">Delete</a></td>
    </tr>
  
    @endforeach
  </tbody>
</table>

@endsection