@extends('layouts.app_materialize')

@section('content_materialize')
<br>
<div class="container">
    <div class="card-panel">
        <div class="row">
            <form class="col s12" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s10 {{ $errors->has('name') ? ' has-error' : '' }}">
                        <i class="material-icons prefix">person</i>
                        <input id="icon_prefix" type="text" name="name" class="validate" value="{{old('name')}}">
                        <label for="name">Nama</label>
                            @if ($errors->has('name'))
                                    <span class="red-text  text-darken-4">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                    </div>                    
                </div>

                <div class="row">
                    <div class="input-field col s10 {{ $errors->has('username') ? ' has-error' : '' }}">
                        <i class="material-icons prefix">account_box</i>
                        <input id="icon_prefix" type="text" name="username" class="validate" value="{{old('username')}}">
                        <label for="name">Username</label>
                            @if ($errors->has('username'))
                                    <span class="red-text  text-darken-4">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                    </div>                    
                </div>

                <div class="row">
                    <div class="input-field col s10 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <i class="material-icons prefix">email</i>
                        <input id="icon_prefix" type="email" name="email" class="validate" value="{{old('email')}}">
                        <label for="email">Email</label>
                            @if ($errors->has('email'))
                                    <span class="red-text  text-darken-4">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                    </div>                    
                </div>
                <div class="row">
                    <div class="input-field col s10  {{ $errors->has('password') ? ' has-error' : '' }}">
                        <i class="material-icons prefix">lock</i>
                        <input id="icon_prefix" type="password" name="password" class="validate" value="{{old('password')}}">
                        <label for="password">Password</label>
                            @if ($errors->has('password'))
                                    <span class="red-text  text-darken-4">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>                    
                </div>
                 <div class="row">
                    <div class="input-field col s10">
                        <i class="material-icons prefix">lock</i>
                        <input id="icon_prefix" type="password" name="password_confirmation" class="validate">
                        <label for="password_confirmation">Confirm Password</label>
                    </div>                    
                </div>
                <div class="row">
                <div class="col s6"> 
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>    
            </div>
            </form>
        </div>
    </div>
</div>

@include('footer')
@endsection 