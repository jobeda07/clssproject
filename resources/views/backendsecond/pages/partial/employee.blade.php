@extends('backendsecond.main')
@section('content')


<h1>Employee  Information</h1>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Name</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="your name">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Mobile</label>
  <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="your mobile number">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<div class="container">
    <div class="max-auto">
        <a href="" class="btn btn-primary">Submit</a>
    </div>
</div>

@endsection