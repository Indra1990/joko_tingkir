@extends('layouts.app_materialize')

@section('content_materialize')
<div class="container">
	<div class="row">
    <form class="col s12" method="POST" action="{{ url('user/edit',$user->id) }}">
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="PUT">
    <div class="card-panel">
      <div class="row">
        <span class="row center"><h4 class="red-text text-lighten-2">Edit Profile</h4></span>
        <div class="input-field col s8 {{ $errors->has('name') ? ' has-error' : '' }}">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" name="name" class="validate" value="{{ $user->name }}">
          <label for="icon_prefix">Nama</label>
          	@if ($errors->has('name'))
                <span class="red-text  text-darken-4">
                     <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="input-field col s8 {{ $errors->has('email') ? ' has-error' : '' }}">
          <i class="material-icons prefix">email</i>
          <input id="icon_telephone" type="email" name="email" class="validate" value="{{ $user->email }}">
          <label for="icon_telephone">Email</label>
          	@if ($errors->has('email'))
                <span class="red-text  text-darken-4">
                     <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="col s8">
        <button class="waves-effect waves-light btn">edit</button>
        </div>
      </div>
      </div>
    </form>
  </div>      
</div>
@endsection