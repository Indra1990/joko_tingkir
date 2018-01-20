@extends('layouts.app_materialize')

@section('content_materialize')
	<style media="screen">
	.bar {
	height: 18px;
	background: green;
}
	</style>
<div class="container">
	<div class="row">
		<div class="col s8 offset-s2">
			<div class="card-panel">
				<div class="section">
					<h4 class="center-align red-text  text-red lighten-2">Konfirmasi Pembayaran</h4>
				</div>
				<div class="divider"></div>
				<form method="POST" action="/konfirmasi/{{ $booking->id }}" enctype="multipart/form-data" >
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">

						<div class="input-field col s8 {{ $errors->has('nama_bank') ? ' has-error' : '' }}">
							<input type="text" name="nama_bank">
							<label>Nama Bank</label>
							@if ($errors->has('nama_bank'))
			                <span class="red-text  text-darken-4">
			                     <strong>{{ $errors->first('nama_bank') }}</strong>
			                </span>
			           		 @endif
						</div>

						<div class="input-field col s8 {{ $errors->has('atas_nama') ? ' has-error' : '' }}">
							<input type="text" name="atas_nama">
							<label>Atas Nama</label>
							@if ($errors->has('atas_nama'))
											<span class="red-text  text-darken-4">
													 <strong>{{ $errors->first('atas_nama') }}</strong>
											</span>
									 @endif
						</div>

						<div class="input-field col s8 {{ $errors->has('tgl_transfer') ? ' has-error' : '' }}">
						 <input type="text" name="tgl_transfer" class="datepicker">
						 <label>Tanggal Transfer</label>
						 @if ($errors->has('tgl_transfer'))
			                <span class="red-text  text-darken-4">
			                     <strong>{{ $errors->first('tgl_transfer') }}</strong>
			                </span>
			            @endif
						</div>

						<div class="input-field col s8 {{ $errors->has('subject') ? ' has-error' : '' }}">
							<input type="text" name="subject">
							<label>Keterangan</label>
							@if ($errors->has('subject'))
			                <span class="red-text  text-darken-4">
			                     <strong>{{ $errors->first('subject') }}</strong>
			                </span>
			           		@endif
						</div>

			<div class="file-field input-field col s8 {{ $errors->has('img') ? ' has-error' : '' }}">

							<div class="btn">
						        <span>File</span>

						        <input type="file" name="img" >
						 </div>

						 <div class="file-path-wrapper">

						        <input class="file-path validate " type="text" placeholder="Bukti Pembayaran">

						 </div>

						      @if ($errors->has('img'))
			                <span class="red-text  text-darken-4">
			                     <strong>{{ $errors->first('img') }}</strong>
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
