@extends('layouts.admin_materialize')

@section('content_materialize_admin')
<style type="text/css">
	.btn1{
		width: 100% !important;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col s10 offset-s2">
			<br>
				<form method="GET" action="{{ action('AdminController@laporanDaftarPaket') }}" role="search">
					 {{ csrf_field() }}
				<div class="row">
					<div class="input-field col s4">
						<input placeholder="Tanggal" type="text" class="datepicker" name="tanggalDari">
          				<label for="first_name" >Dari</label>
					</div>
					<div class="input-field col s1"></div>
					<div class="input-field col s4">
						<input placeholder="Tanggal" type="text" class="datepicker" name="tanggalKe">
          				<label for="first_name">Ke</label>
					</div>

					<div class="input-field col s3">
						<button class="waves-effect waves-light btn-large"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
					</div>
				</div>
				</form>

			<div class="card-panel">
				<table class="responsive-table">
					<thead>
						<tr>
							<td class="red-text text-lighten-2">Nama</td>
							<td class="red-text text-lighten-2">Kd Booking</td>
							<td class="red-text text-lighten-2">Tgl Liburan</td>
							<td class="red-text text-lighten-2">Status</td>
							<td class="red-text text-lighten-2">Kuota</td>
							<td class="red-text text-lighten-2">Harga</td>
							<td class="red-text text-lighten-2">Drivers</td>

						</tr>
					</thead>
					<tbody>
						@foreach($bookings as $booking )
						<tr>
							<td>{{ $booking->user->name }}</td>
							<td>{{ $booking->kode_booking }}</td>
 							<td>{{ date('Y-m-d', strtotime($booking->tanggal_liburan)) }}</td>
 							<td>{{ $booking->status }}</td>
							@foreach( $booking->tours as $tour)
							<td>{{ $tour->kuota }}</td>
							<td>{{{ number_format((float) $tour->harga,0) }}}</td>
							@endforeach
							@foreach( $booking->drivers as $driver)
							<td>{{ $driver->nama_driver }}</td>
							@endforeach
						</tr>
						@endforeach
					</tbody>
				</table>

			</div>
			<ul class="pagination">
			<li class="waves-effect"><?php  echo $bookings->appends(['booking'=>'tanggal_liburan'])->render(); ?></li>
			</ul>
			@if (count($bookings)>0)
			<div class="right-align">
			<a class="waves-effect waves-light btn btn1" href="{{ url('admin/laporan_daftar_paket') }}">Kembali</a>
			</div>
			@endif
		</div>
	</div>
</div>
@endsection
