@extends('backendsecond.main')
@section('content')
<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
        </ul>
    </div>
    @endif -->

<h1>Employee  Information</h1>
<div class="container">
  <form action="{{route('employee.create')}}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Name</label>
  <input type="text" class="form-control" name="employee_name" id="exampleFormControlInput1" placeholder="your name">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">image uplode</label>
  <input type="file" class="form-control" name="employee_image" id="exampleFormControlInput1" >
</div>
<div class="mb-3">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>

  </form>
</div>

@endsection