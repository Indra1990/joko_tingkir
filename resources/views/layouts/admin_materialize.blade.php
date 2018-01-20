<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <!-- Compiled and minified CSS -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Compiled and minified JavaScript -->
    <!-- jQuery is required by Materialize to function -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.5/sweetalert2.min.css">

</head>
<body>
  <nav>
  <ul id="slide-out" class="side-nav red lighten-2 fixed ">

    <li><a href=""><i class="tiny material-icons">account_circle</i> Hi {{ Auth::user()->name }}</a></li>
      <div class="divider"></div>

        @if (Auth::user()->username == "admin paket wisata" )

      <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> Home</a></li>
    <li><a href="{{url('admin/index')}}"><i class="fa fa-user" aria-hidden="true"></i>
 Daftar User</a></li>
    <li><a href="{{ url('admin/daftar_paket') }}"><i class="fa fa-info-circle" aria-hidden="true"></i>
 Daftar Pesanan Paket</a></li>
    <li><a href="{{ url('admin/daftar_harga_paket') }}"> <i class="fa fa-money " aria-hidden="true"></i> Harga Paket</a></li>
    <li><a href="{{url('admin/jadwal_driver')}}"><i class="fa fa-id-card" aria-hidden="true"></i> Daftar Driver</a></li>

      <div class="divider"></div>
   {{-- start dropdown laporan --}}
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header">Laporan<i class="fa fa-caret-down" aria-hidden="true"></i></a>
            <div class="collapsible-body">
              <ul>
                  <li><a href="{{ url('admin/laporan_daftar_paket') }}"><i class="fa fa-bar-chart " ></i> Daftar Paket</a></li>
                  <li><a href="{{ url('admin/pembayaran') }}"><i class="fa fa-bar-chart " ></i> Pembayaran</a></li>
              </ul>
            </div>
          </li>
        </ul>
      {{-- end dropdown laporan --}}

      <div class="divider"></div>
      @endif
      @if (Auth::user()->username == "pengemudi")
        <li><a href="{{url('admin/jadwal_driver')}}"><i class="fa fa-id-card" aria-hidden="true"></i> Daftar Driver</a></li>
        <div class="divider"></div>
      @endif


  <li><a href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <i class="tiny material-icons">exit_to_app</i> Logout
          </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
      </form></li>
    </li>
     </ul>

  <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="Medium material-icons">menu</i></a>
    </nav>
    @yield('content_materialize_admin')
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
    <script type="text/javascript">

        $(".button-collapse").sideNav();
        $('.collapsible').collapsible();

          {{-- show add driver --}}
    		$(document).ready(function() {
      		$('#addDriver').click(function() {
      				$('.driver').toggle("slide");
      		    });
    		});

        {{-- $(document).ready(function () {
          $('li').hover(function (argument) {
            $(this).css('background-color','#ffcdd2 ');
          });

          $('li').mouseout(function (argument) {
            $(this).css('background-color','#e57373');
          });

        }); --}}

        $('select').material_select();

        $('.datepicker').pickadate({
          selectMonths: true, // Creates a dropdown to control month
          selectYears: 15, // Creates a dropdown of 15 years to control year,
          today: 'Today',
          clear: 'Clear',
          close: 'Ok',
          closeOnSelect: false, // Close upon selecting a date,
          format: 'yyyy-m-d'
        });
    </script>

</body>
</html>
