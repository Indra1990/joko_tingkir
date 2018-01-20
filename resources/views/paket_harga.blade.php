@extends('layouts.app_materialize')

@section('content_materialize')
<main>
<div class="container">
	<div class="row">
		<div class="col s12">
		@if(session('success'))
		<div class="card-panel teal lighten-2">
			<span>{{ session('success') }}</span>
		</div>
		@endif
		  	<ul class="collapsible popout" data-collapsible="accordion">
			    <li>
			      <div class="collapsible-header"><i class="material-icons">filter_drama</i>Daftar Harga Paket</div>
			      <div class="collapsible-body">
			      		<table class="striped">
			      			<thead>
			      				<tr>
			      					<th>Kuota</th>
			      					<th>Harga</th>
			      				</tr>
			      			</thead>
			      			<tbody>
			      				@foreach ($tours as $tour)
			      				<tr>
			      					<td>{{ $tour->kuota }}</td>
			      					<td>{{{ number_format((float) $tour->harga,0) }}}</td>
			      				</tr>
			      				@endforeach
			      			</tbody>
			      		</table>
			      		<br>
			      	<span><a href="{{ url('/pesan_paket') }}" class="waves-effect waves-light btn">Pesan Paket</a> </span>
			      </div>
			    </li>
		  	</ul>
		</div>
	</div>
</div>
</main>
@endsection
