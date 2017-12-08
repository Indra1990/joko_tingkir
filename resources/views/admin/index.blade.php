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
						<td class="red-text text-lighten-2">status</td>

				</tr>
				</thead>
					<tbody>
						@foreach ($users as $user)
						<tr>
							<td>{{ $user->id}}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->role }}</td>
							@if($user->isOnline())
    						<td><strong class="green-text text-darken-1">online</strong></td>
							@endif
							@if (!$user->isOnline())
								<td><strong class="red-text text-lighten-1">offline</strong></td>
							@endif

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
