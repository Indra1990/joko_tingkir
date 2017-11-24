@extends('layouts.admin_materialize')

@section('content_materialize_admin')
	<br>
<div class="container">
	<div class="row">
		<div class="col s8 offset-s2">
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
          </tr>
        </thead>
        <tbody>
					@foreach ($drivers as $driver)
	          <tr>
	            <td>{{ $driver->nama_driver}}</td>
	            <td>{{ $driver->alamat}}</td>
	          </tr>
					@endforeach

        </tbody>
      </table>

				</div>
		    <div id="test2" class="col s12">Test 2</div>

		  </div>

		</div>
	</div>
</div>

@endsection
