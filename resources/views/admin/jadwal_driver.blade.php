@extends('layouts.admin_materialize')

@section('content_materialize_admin')
	<br>
<div class="container">
	<div class="row">
		<div class="col s12 offset-s1">
			<div class="row">
		    <div class="col s12">
		      <ul class="tabs">
		        <li class="tab col s3"><a href="#test1">Daftar Driver</a></li>
		        <li class="tab col s3"><a class="active" href="#test2">Jadwal Driver</a></li>
		      </ul>
		    </div>

		    <div id="test1" class="col s12">
					<br>
					<table class="centered bordered highlight">
        <thead class="teal lighten-2">
          <tr>
              <th>Nama Driver</th>
              <th>Alamat</th>
							<th>No Telp</th>
          </tr>
        </thead>
        <tbody>
					@foreach ($drivers as $driver)
	          <tr>
	            <td>{{ $driver->nama_driver}}</td>
	            <td>{{ $driver->alamat}}</td>
							<td>{{ $driver->no_telp}}</td>
	          </tr>
					@endforeach
        </tbody>
      </table>

				</div>
		    <div id="test2" class="col s12">
					<br>
					<table>
						<thead class="teal lighten-2">
							<tr>
								@if (Auth::user()->username == "admin paket wisata")
									<td>Add Driver</td>
								@endif
								<td>Nama</td>
								<td>Tgl Liburan</td>
								<td>Kuota</td>
								<td>Driver</td>
								<td>Alamat</td>
								<td>No_telp</td>

							</tr>
						</thead>
						<tbody>

							@foreach ($bookings as $booking)
							<tr>
								@if (Auth::user()->username == "admin paket wisata")
									<td><a href="/admin/add_driver/{{$booking->id}}" ><i class="fa fa-user-plus" aria-hidden="true"></i></a> || <a href=""> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></i></a></td>
								@endif

								<td>{{$booking->user->name}}</td>
								<td>{{ date('Y-m-d', strtotime($booking->tanggal_liburan)) }}</td>
								@foreach ($booking->tours as $tour)
									<td>{{$tour->kuota}}</td>
								@endforeach
								@foreach ($booking->drivers as $driver)
									<td>{{$driver->nama_driver }}</td>
									<td>{{$driver->alamat }}</td>
									<td>{{$driver->no_telp }}</td>
								@endforeach
							</tr>

						@endforeach

						</tbody>
					</table>
				</div>
		  </div>

		</div>
	</div>
</div>

@endsection
