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
  <form action="{{route('viral.updated',$viraledit->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
  <div class="mb-3">
  <label for="name" class="form-label">Name</label>
  <input type="text" class="form-control" name="viral_name" value="{{$viraledit->viral_name}}" id="name">
</div>
<div class="mb-3">
  <label for="ff" class="form-label">old image</label>
  <img style="width:140px ;" class="mb-3" src="" alt="">
  <input type="file" class="form-control" name="viral_image" id="ff">

  <img src="{{asset('/imagefile/viralpic/'.$viraledit->viral_image)}}" alt="img not found" height="70px" width="70px" class="rounded-circle">

</div>
<div class="mb-3">
  <button type="submit" class="btn btn-primary">Update</button>
</div>

  </form>
</div>

@endsection