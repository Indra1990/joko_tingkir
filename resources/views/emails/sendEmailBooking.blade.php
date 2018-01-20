<!DOCTYPE html>
<html>
<head>
	<!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title></title>
</head>
<body>
	<div class="container">
		<div class="row">
	<h3>Hallo {{ $booking->user->name }}</h3>
	<h3>Selamat Anda Berhasil Pesan Paket Wisata Pantai Gunung Kidul</h3>
	<div class="col s6 offset-s3">
	<table class="bordered">
		<tbody>
			<tr>
				<td>Tanggal Liburan :</td>
				<td class="red-text red-lighten-2"><b>{{ $booking->tanggal_liburan }}</b></td>
			</tr>
      <tr>
				<td>Kode Booking :</td>
				<td class="red-text red-lighten-2"><b>{{ $booking->kode_booking }}</b></td>
			</tr>
			<tr>
			<tr>
				<td>Kuota :</td>
				@foreach ($booking->tours as $tour)
				<td class="red-text red-lighten-2"> <b>{{ $tour->kuota }}</b></td>
				@endforeach
			</tr>
			<tr>
				<td>Harga :</td>
				@foreach ($booking->tours as $tour)
				<td class="red-text red-lighten-2"><b> {{{ number_format((float) $tour->harga,0) }}}</b></td>
				@endforeach
			</tr>
		</tbody>
	</table>
	</div>
	<br>
		<div class="col s8">
		<p>
			Silakan Transfer Ke Nomor Rekening Ini <b>417987445649 Atas Nama Joko Saputro</b>
		</p>
		<br>
		<p>
			Setelah Transfer Silakan Konfirmasi Pembayaran melalui link ini
			<a href="http://localhost:8000/konfirmasi/{{ $booking->id }}">Konfirmasi Pembayaran</a>
		</p>
		</div>
	</div>
	</div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

</body>
</html>
