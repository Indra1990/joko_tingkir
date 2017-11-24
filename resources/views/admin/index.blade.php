@extends('layouts.admin_materialize')

@section('content_materialize_admin')
<div class="container">
	<div class="row">
		<div class="col s8 offset-s2">

			<div class="card-panel">
			<table class="responsive-table">
				<thead>
				<tr>
						<td class="red-text text-lighten-2">Id</td>
						<td class="red-text text-lighten-2">Nama</td>
						<td class="red-text text-lighten-2">Email</td>
						<td class="red-text text-lighten-2">Role</td>

				</tr>
				</thead>
					<tbody>
						@foreach ($users as $user)
						<tr>
							<td>{{ $user->id}}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->role }}</td>
						</tr>
						@endforeach
					</tbody>
			</table>
			<div class="divider"></div>
			<h6 class="red-text text-lighten-2">Jumlah User : {{ $userCount }}</h6>
			</div>
		</div>
	</div>
</div>
 
@endsection
