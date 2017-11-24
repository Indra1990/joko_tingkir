@extends('layouts.app_materialize')

@section('content_materialize')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
{{-- https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css
 --}}
  <style type="text/css">
    .parallax-container {
      height: 570px;
    }
</style>
{{--@include('sweet::alert') --}}
  <div class="parallax-container">
      <div class="parallax"><img src="{{ asset('image/lb.jpg') }}"></div>
      <li>
        <div class="caption center-align">
            <h3 class="light grey-text text-lighten-3">Selamat Datang</h3>
            <h5 class="light grey-text text-lighten-3">Di Pantai Gunung Kidul (Yogyakarta)</h5>
        </div>
      </li>
    </div>

    <div class="section white">
    <div class="row container">
      <h2 class="header red-text text-lighten-3">Parallax</h2>
      <p class="grey-text text-darken-3 lighten-3">Parallax is an effect where the background content or image in this case, is moved at a different speed than the foreground content while scrolling.</p>
    </div>
  </div>

    <div class="parallax-container">
    <div class="parallax"><img src="{{ asset('image/lb2.jpg') }}"></div>
  </div>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.5/sweetalert2.min.js"></script>
  @include('sweet::alert')
@include('footer')

@endsection
