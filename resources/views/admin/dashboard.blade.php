@extends('layouts.admin_materialize')

@section('content_materialize_admin')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" ></script>
<style type="text/css">
	.now_date{
		font-size: 60px;
		color: rgb(14, 1, 1);
	}

</style>
<br>
<div class="container">
	<div class="row">
		<div class="col s4 offset-s2">
			<div class="card-panel hoverable red lighten-2">
				<table>
					<tbody>
						<tr>
							<td ><i class="fa fa-clock-o fa-5x" aria-hidden="true"></i></td>
							<td class="now_date">
								@php
				 		 			date_default_timezone_set('Asia/Jakarta');
									 echo  date("H:i");
								@endphp
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>


		<div class="col s3">
			<div class="card-panel hoverable red lighten-2">
				<table>
					<tbody>
						<tr>
							<td><i class="fa fa-bar-chart fa-5x " ></i></td>
							<td class="now_date">
								{{ $bookingPaid }}
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div class="col s3 ">
			<div class="card-panel hoverable red lighten-2">
				<table>

					<tbody>
						<tr>
							<td><i class="fa fa-line-chart fa-5x " ></i></i></td>
							<td class="now_date">
								{{ $bookingUnpaid }}
							</td>
						</tr>

					</tbody>
				</table>
			</div>
		</div>


		<div class="row">
			<div class="col s11 offset-s2">
				<div class="card-panel hoverable ">
        <canvas id="myChart" width="500" ></canvas>

				</div>
			</div>
		</div>

	</div>

	</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.5/sweetalert2.min.js"></script>

@include('sweet::alert')
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Paid", "Unpaid", "Total Booking","Total User"],
        datasets: [{
            label: 'Report Paket Wisata',
            data: [{{ $bookingPaid }},{{$bookingUnpaid}}, {{$bookings}},{{$user}}],
            backgroundColor: [
                'rgba(135, 67, 81, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(5, 11, 46, 0.2)',

            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',

            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>

@endsection
