<!DOCTYPE html>
<html>
<head>

 <style type="text/css">
          body{
    display: flex;
    height: 100%;
    min-height: 100vh;

    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }
  </style>
	  <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.5/sweetalert2.min.css">

      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title> Joko</title>

</head>
<body>
	{{-- dropdown navbar --}}
	<ul id="dropdown1" class="dropdown-content">
	    <li class="divider"></li>
      @if (Auth::check())
      <li><a href="/user/history_booking/{{ Auth::user()->id }}"><i class="fa fa-history" aria-hidden="true"></i>riwayat</a></li>
    {{--  <li><a href="/user/history/{{ Auth::user()->id }}"><i class="fa fa-history" aria-hidden="true"></i>History</a></li>--}}
	    <li><a href="/user/profile/{{ Auth::user()->id }}"><i class="small material-icons">account_circle</i> Profile</a></li>
      @endif

	    <li><a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="small material-icons">exit_to_app</i> Logout
            </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
        </form></li>
  	</ul>
	{{-- end dropdown navbar --}}

	{{--navbar--}}
	<nav>
    <div class="nav-wrapper">
      <div class="container">
      <a href="{{ url('/') }}" class="brand-logo"></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li><a href="{{ url('/paket_harga') }}">Paket Harga</a></li>
        <li><a href="{{ url('/gallery') }}">Gallery</a></li>
        @if (Auth::guest())
          <li><a href="{{ url('/login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>
            Login</a></li>
          <li><a href="{{ url('/register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>
          Register</a></li>
        @else
        	<li><a href="#" class="dropdown-button" data-activates="dropdown1"> {{ Auth::user()->name }} <i class="material-icons right">arrow_drop_down</i></a></li>
        @endif
      </ul>
    {{--end navbar--}}

    {{--navbar mobile--}}
      <ul class="side-nav" id="mobile-demo">
        <li><a href="{{ url('home') }}"><i class="material-icons">home</i> Home</a></li>
        @if (Auth::check())
        <li><a href="/user/profile/{{ Auth::user()->id }}"><i class="material-icons"> account_circle</i> Profile</a></li>
	        <li><a href="{{ route('logout') }}"
	            onclick="event.preventDefault();
	            document.getElementById('logout-form').submit();">
	            <i class="small material-icons">exit_to_app</i> Logout
	            </a>

	        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	        {{ csrf_field() }}
	        </form></li>
        @endif
        <li><a href="{{ url('/login') }}"><i class="material-icons">home</i> Login</a></li>
        <li><a href="{{ url('/register') }}"><i class="material-icons">home</i> Register</a></li>
      </ul>
    {{--end navbar mobile--}}


      </div>
    </div>
  	</nav>
    @yield('content_materialize')

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script type="text/javascript">
          $(".button-collapse").sideNav();

          $(".dropdown-button").dropdown({
          	hover :true,
          	constrainWidth: false,
          	alignment: 'left',
          });

       $(document).ready(function(){
      $('.parallax').parallax();
    });

  $(document).ready(function(){

    $('.modal').modal();
  });

  $(document).ready(function(){
    $('.collapsible').collapsible();
  });

  $('select').material_select();


  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false, // Close upon selecting a date,
    format: 'yyyy-m-d'
    //date :'now',
  });
    </script>
</body>
</header>
</html>
