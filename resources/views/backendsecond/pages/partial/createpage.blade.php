@extends('backendsecond.main')
@section('content')
<h1>Create </h1>
<div class="container">
    <div class="mx-auto">

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

        <form class="form" action="{{route('create')}}" method="post" >
            @csrf
            <div class="my-2">
                <label>Catgory Name</label>
                <input type="text" class="form-control" placeholder="Enter your category name" name="category_name">
            </div>
            <div class="my-2">
                <label>Catgory Details</label>
                <input type="text" class="form-control" placeholder="Enter your category details" name="category_details">
            </div>
            <div class="my-2">
                <label>number</label>
                <input type="number" class="form-control" placeholder="Enter your category details" name="mobile">
            </div>
            <div class="my-2">
                <button type="submit" class="btn btn-success">create</button>
            </div>
        </form>
    </div>
</div>

@endsection