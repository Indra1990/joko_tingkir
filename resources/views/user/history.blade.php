@extends('layouts.app_materialize')

@section('content_materialize')
<style type="text/css">
	.display{
		display: none;
	}
</style>
<div class="container">
	<div class="row">
		@if(session('success'))
		<div class="card-panel teal lighten-2">
			<span>{{ session('success') }}</span>
		</div>
		@endif
		<div class="col s2">
			<h5 class="center-align">Kd Booking</h5>
			<div class="divider"></div>
			@foreach ($users->bookings as $booking)
				<div class="center-align">{{ $booking->kode_booking }}</div>
				<div class="divider"></div>
			@endforeach
		</div>

		<div class="col s2">
			<h5 class="center-align">Tgl Liburan</h5>
			<div class="divider"></div>
			@foreach ($users->bookings as $booking)
				<div class="center-align">{{ date('Y-m-d', strtotime($booking->tanggal_liburan)) }}
				</div>
				<div class="divider"></div>
			@endforeach
		</div>

		<div class="col s2">
			<h5 class="center-align">Status</h5>
			<div class="divider"></div>
			@foreach ($users->bookings as $booking)
				<div class="center-align">{{ $booking->status }}</div>
				<div class="divider"></div>
			@endforeach
		</div>

		<div class="col s2">
			<h5 class="center-align">Kuota</h5>
			<div class="divider"></div>
			@foreach ($users->bookings as $booking)
				@foreach ($booking->tours as $element)
					<div class="center-align">{{ $element->kuota }}</div>
						<div class="divider"></div>

				@endforeach
			@endforeach
		</div>

		<div class="col s2">
			<h5 class="center-align">Harga</h5>
				<div class="divider"></div>
			@foreach ($users->bookings as $booking)
				@foreach ($booking->tours as $element)
				<div class="center-align">{{{ number_format((float) $element->harga,0) }}}</div>
				<div class="divider"></div>
				@endforeach
			@endforeach
		</div>

		<div class="col s2">
			<h5 class="center-align">Pembayaran</h5>
			<div class="divider"></div>
			@foreach ($users->bookings as $booking)
				<div class="center-align">
					@if ($booking->status == 'Paid')
						<span class="green-text text-darken-2">
							Success Payment
						</span>

					@elseif($booking->payment()->exists())
						<span class="green-text text-darken-2">
							Waiting Confirm
						</span>

					@else
						<a href="/konfirmasi/{{ $booking->id }}" class="red accent-1"><span class="white-text text-darken-2" >Konfirmasi</span> </a>
					@endif
				</div>
				<div class="divider"></div>
			@endforeach
		</div>


	</div>
</div>
@endsection
