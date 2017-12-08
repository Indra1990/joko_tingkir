@extends('layouts.admin_materialize')

@section('content_materialize_admin')
<style type="text/css">
	.btn1{
		width: 100% !important;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col s12 offset-s1">
			<br>
			@if(session('success'))
				<div class="card-panel teal lighten-2">
					<span>{{ session('success') }}</span>
				</div>
			@endif

				<nav>
				    <div class="nav-wrapper">
				      <form>
				        <div class="input-field">
				          <input id="search" type="search" name="search" required placeholder="Tangga Liburan">
				          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
				          <i class="material-icons">close</i>
				        </div>
				      </form>
				    </div>
  				</nav>
					<br>
			<div class="card-panel">

				<table class="responsive-table">
					<thead class="teal lighten-2">
						<tr>
							<td >Nama</td>
							<td >Kd Booking</td>
							<td >Tgl Liburan</td>
							<td >Status</td>
							<td >Kuota</td>
							<td >Harga</td>
							<td >Aksi</td>
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
							<td><a  href="/admin/{{ $booking->id }}/edit_daftar_paket" class="waves-effect waves-light btn"><i class="material-icons">border_color</i> Edit</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

			@if (!empty($search)>0)
			<div class="right-align">
			<a class="waves-effect waves-light btn btn1" href="{{ url('admin/daftar_paket') }}">Kembali</a>
			</div>
			@else
			<ul class="pagination">
			<li class="waves-effect"><?php  echo $bookings->appends(['booking'=>'tanggal_liburan'])->render(); ?></li>
			</ul>
			@endif

			</div>
		</div>
	</div>
</div>
@endsection
