@extends('layouts.app_materialize')

@section('content_materialize')
<div class="container">
	{{-- collapse user and history --}}
	<div class="row ">
		<div class="col s8 offset-s2 ">

		@if(session('success'))
		<div class="card-panel teal lighten-2">
			<span>{{ session('success') }}</span>
		</div>
		@endif

			<ul class="collapsible popout" data-collapsible="accordion">	
			    <li>
			      <div class="collapsible-header"><i class="material-icons">account_circle</i> Profile</div>
			      <div class="collapsible-body">
			      	<span>
			      		<table class="highlight bordered"> 
			      			<tr>
			      				<th>Nama</th>
			      				<th>Email</th>
			      				<th>Action</th>
			      			</tr>
			      			<tr>
			      				<td>{{ $user->name }}</td>
			      				<td>{{ $user->email }}</td>
			      				<td><a href="/user/edit/{{ Auth::user()->id }}" class="waves-effect waves-light btn"><i class="material-icons">border_color</i>Edit</a></td>
			      			</tr>
			      		</table>		
			      	</span>
			      </div>
			    </li>
			    
  			</ul>
  		</div>
	</div>
	{{--end collapse user and history --}}	
</div>
@endsection	