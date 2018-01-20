@extends('layouts.admin_materialize')

@section('content_materialize_admin')
<style type="text/css">
	.btn1{
		width: 100% !important;
	}
</style>
<div class="container">
	<div class="row">
		<br>
		<div class="col s10 offset-s1 ">
			<nav>
				    <div class="nav-wrapper">
				      <form>
				        <div class="input-field">
				          <input id="search" type="search" name="search" required placeholder="Nama Bank, Tanggal Liburan, Keterangan">
				          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
				          <i class="material-icons">close</i>
				        </div>
				      </form>
				    </div>
  				</nav>
			<div class="card-panel">
				<table class="responsive-table">
					<thead>
						<tr>
							<th class="red-text text-lighten-2">Kd Booking</th>
							<th class="red-text text-lighten-2">Nama Bank</th>
							<th class="red-text text-lighten-2">Atas Nama</th>
							<th class="red-text text-lighten-2">Tgl Transfer</th>
							<th  class="red-text text-lighten-2">Bukti Trsfer</th>
							<th  class="red-text text-lighten-2">Keterangan</th>
							<th  class="red-text text-lighten-2">Tgl Liburan</th>
							<th  class="red-text text-lighten-2">Nama</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($payments as $payment)
						<tr>
							<td>{{ $payment->booking->kode_booking }}</td>
							<td>{{ $payment->nama_bank }}</td>
							<td>{{ $payment->atas_nama }}</td>
							<td>{{   date('Y-m-d', strtotime($payment->tgl_transfer)) }}</td>
							<td><img src="/transfers/images/{{ $payment->img }}" height="50px;" class="materialboxed"></td>
							<td>{{ $payment->subject }}</td>
							<td>{{   date('Y-m-d', strtotime($payment->booking->tanggal_liburan)) }}</td>
							<td>{{ $payment->user->name }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			@if (!empty($search)>0)
			<div class="right-align">
			<a class="waves-effect waves-light btn btn1" href="{{ url('admin/pembayaran') }}">Kembali</a>
			</div>
			@else

			<ul class="pagination">
			<li class="waves-effect"><?php  echo $payments->appends(['booking'=>'tanggal_liburan'])->render(); ?></li>
			</ul>

			@endif
		</div>
	</div>
</div>
@endsection
