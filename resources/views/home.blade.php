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
      <h2 class="header red-text text-lighten-3">Wisata Pantai Gunung Kidul </h2>
      <p class="grey-text text-darken-3 lighten-3">Wisata Pantai Gunung Kidul – Jika anda ingin bernostalgia menikmati nuansa Pantai Kuta jaman dulu, Pantai Sepanjang dapat menjadi pilihan yang tepat untuk anda. Sepanjang memiliki garis pantai yang panjang dengan hamparan pasir putih yang kealamiannya masih terjaga. Selain itu, ombak di Pantai Sepanjang ini tidak terlalu besar sehingga menambah keindahan panoramanya. Ada banyak kegiatan yang dapat anda lakukan di pantai ini, mulai dari berjemur di bawah terik matahari, bermain papan selancar, atau hanya menyusuri bibir pantai sambil menikmati keindahannya. Semuanya dapat anda nikmati di Pantai yang jaraknya beberapa kilometer dari Pantai Sundak ini. Pantai Sepanjang adalah salah satu pantai yang belum lama dibuka.</p>
    </div>
  </div>

    <div class="parallax-container">
    <div class="parallax"><img src="{{ asset('image/lb2.jpg') }}"></div>
  </div>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.5/sweetalert2.min.js"></script>
  @include('sweet::alert')
@include('footer')

@endsection
