<!DOCTYPE html>
<html lang="en">

<head>
@include('backendsecond.maincss')


</head>

<body>


  @include('backendsecond.pages.partial.header')

  @include('backendsecond.pages.partial.sidebar')
  <main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

@yield('content')

</main><!-- End #main -->

  @include('backendsecond.pages.partial.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('backendsecond.mainscripts')

 

</body>

</html>