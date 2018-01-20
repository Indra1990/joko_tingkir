@extends('layouts.app_materialize')

@section('content_materialize')

<div class="container">
	<div class="row">
		<div class="col s8 offset-s2">
			@if(session('success'))
			<div class="card-panel teal lighten-2">
				<span>{{ session('success') }}</span>
			</div>
			@endif
			<div class="card-panel">
				<div class="section">
					<h4 class="center-align red-text  text-red lighten-2">Pesan Paket Wisata</h4>
				</div>
				<div class="divider"></div>
				<br>
				<form method="POST" action="{{ action('PaketController@store') }}">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row">
					<div class="input-field col s8">
						<select class="validate" name="tours[]">
					      <option value="0"> Pilih Paket</option>
					      @foreach ($tours as $tour)
					      <option value="{{ $tour->id }}">{{ $tour->kuota }}</option>
					      @endforeach
					    </select>
						<label>Pilih Paket</label>
						@if(session('tours_error'))
                       		<span class="red-text text-darken-2"> {{ session('tours_error') }}</span>
                		@endif
					</div>
						
					<div class="input-field col s8 {{ $errors->has('tanggal_liburan') ? ' has-error' : '' }}">						
						 <input type="text" name="tanggal_liburan" class="datepicker">
						 <label>Tanggal Liburan</label>
						 @if ($errors->has('tanggal_liburan'))
			                <span class="red-text  text-darken-4">
			                     <strong>{{ $errors->first('tanggal_liburan') }}</strong>
			                </span>
			            @endif
					</div>	

					<div class="input-field col s8">
					<button class="waves-effect waves-light btn">submit</button>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection