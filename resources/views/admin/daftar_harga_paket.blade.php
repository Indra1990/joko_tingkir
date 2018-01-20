@extends('layouts.admin_materialize')

@section('content_materialize_admin')
<div class="container">
	<div class="row">
		<div class="col s10 offset-s1">
			<br>
			@if(session('success'))
				<div class="card-panel teal lighten-2">
					<span>{{ session('success') }}</span>
				</div>
			@endif
			<div class="right-align">
			<a class="waves-effect waves-light btn" href="/admin/create_paket_harga"><i class="fa fa-plus" aria-hidden="true"></i> Buat Harga Baru</a></div>
			<div class="card-panel">
				<table class="striped">
					<thead>
						<tr>
							<th class="center-align ">Kuota</th>
							<th class="center-align">Harga</th>
							<th class="center-align">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($tours as $tour)
						<tr>
							<td class="center-align">{{ $tour->kuota }}</td>
							<td class="center-align">{{{ number_format((float) $tour->harga,0) }}}</td>
							<td class="center-align"><a class="waves-effect waves-light btn" href="/admin/edit_paket_harga/{{ $tour->id }}"><i class="material-icons">create</i> Edit</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection
