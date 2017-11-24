@extends('layouts.admin_materialize')

@section('content_materialize_admin')
<br>
<div class="container">
	<div class="row">
		<div class="col s10 offset-s1">
			<div class="card-panel">
				<h4 class="center-align red-text red-lighten-2">Buat Harga Paket Baru</h4>
				<div class="divider"></div>
				<br>
				<form method="POST" action="{{ action('PaketController@storeHargaPaket') }}">
					   {{ csrf_field() }}
					 <div class="row">

				        <div class="input-field col s8 {{ $errors->has('kuota') ? ' has-error' : '' }}">
				          <input  id="first_name" type="text" name="kuota" class="validate">
				          <label for="first_name">Kuota</label>
				          	@if ($errors->has('kuota'))
				                <span class="red-text  text-darken-4">
				                     <strong>{{ $errors->first('kuota') }}</strong>
				                </span>
            				@endif
				        </div>

				        <div class="input-field col s8 {{ $errors->has('harga') ? ' has-error' : '' }}">
				          <input  id="first_name" type="text" name="harga" class="validate">
				          <label for="first_name">Harga</label>
				          	@if ($errors->has('harga'))
				                <span class="red-text  text-darken-4">
				                     <strong>{{ $errors->first('harga') }}</strong>
				                </span>
            				@endif
				        </div>

				        <div class="input-field col s8">
				          <button class="waves-effect waves-light btn"> submit</button>
				        </div>

				    </div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection