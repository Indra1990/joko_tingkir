@extends('layouts.admin_materialize')

@section('content_materialize_admin')
<div class="container">
	<div class="row">
		<div class="col s10 offset-s2">
			<div class="card-panel">
				<div class="section">
					<h4 class="center-align red-text  text-red lighten-2">Edit Daftar Paket</h4>
				</div>
				<div class="divider"></div>
				<br>
				<form method="POST" action="/admin/{{ $bookings->id }}/edit_daftar_paket">
					{{ csrf_field() }}
      				<input type="hidden" name="_method" value="PUT">
					<div class="row">

					<div class="input-field col s8">
						<select class="validate" name="status">
					     <option value="{{ $bookings->status }}">{{ $bookings->status }}</option>
					     <option value="paid">Paid</option>
					    </select>
						<label>Status</label>
					</div>

					<div class="input-field col s8 {{ $errors->has('tanggal_liburan') ? ' has-error' : '' }}">
						 <input type="text" name="tanggal_liburan" class="datepicker" value="{{ date('Y-m-d', strtotime($bookings->tanggal_liburan)) }}">
						 <label>Tanggal Liburan</label>
						 @if ($errors->has('tanggal_liburan'))
			                <span class="red-text  text-darken-4">
			                     <strong>{{ $errors->first('tanggal_liburan') }}</strong>
			                </span>
			            @endif
					</div>

					@foreach ($bookings->tours as $oldtour)
					<div class="input-field col s8">
						<select class="" name="tours[]">
							@foreach ($tours as $tour)
							<option value="{{ $tour->id }}" @if($oldtour->id == $tour->id)
							selected="selected" @endif>{{ $tour->kuota }}</option>
							@endforeach
						</select>
					</div>
					@endforeach

						

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
