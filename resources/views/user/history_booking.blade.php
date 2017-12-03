@extends('layouts.app_materialize')

@section('content_materialize')

<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="card-panel">
				<h4 class="center-align red-text text-lighten-2">History Pemesanan Paket Wisata</h4>
			<div class="divider"></div>
			</div>
		</div>
		@foreach ($users->bookings as $booking)
		<div class="col s4">
				<div class="card-panel">
					<h6><span>Kode Booking</span> : {{$booking->kode_booking}}</h6>
					<h6><span>Status</span> : {{$booking->status}}</h6>
					<h6><span>Tgl Liburan</span> : {{ date('Y-m-d', strtotime($booking->tanggal_liburan)) }}</h6>
					@foreach ($booking->tours as $tour)
						<h6><span>Kuota</span> : {{ $tour->kuota}}</h6>
						<h6><span>Harga</span> : {{{ number_format((float) $tour->harga,0) }}}</h6>
					@endforeach
					<div class="divider"></div>
						<h6 class="center-align teal lighten-2">Driver</h6>
					<div class="divider"></div>
					@foreach ($booking->drivers as $driver)
						@if (!empty($booking->drivers()->exists()))
							<h6><span>Nama </span> : {{  $driver->nama_driver }}</h6>
							<h6><span>Telp </span> : {{ $driver->no_telp}}</h6>
						@endif
					@endforeach

					@empty ($booking->drivers()->exists())
						<h6><span>Nama </span> : -  </h6>
						<h6><span>Telp </span> : -	</h6>
					@endempty

					<div class="divider"></div>

					@if ($booking->status == 'Paid')
						<h6>Pembayaran :
						<span class="green-text text-darken-2">
							Success Payment
						</span></h6>

					@elseif($booking->payment()->exists())
						<h6>Pembayaran :
						<span class="green-text text-darken-2">
							Waiting Confirm
						</span></h6>

					@else
						<h6>Pembayaran :
						<a href="/konfirmasi/{{ $booking->id }}" class="red accent-1"><span class="white-text text-darken-2" >Konfirmasi</span> </a>
						</h6>
					@endif

				</div>
		</div>
	@endforeach
	</div>
</div>
@endsection
