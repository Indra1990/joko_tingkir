@extends('layouts.app_materialize')

@section('content_materialize')
    
<br>
<div class="container">
    <div class="card-panel">
    <div class="row">
        <form class="col s12" method="POST" action="{{ route('login') }}">
        @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="red-text red-lighten-1">{{ $error }}</li>
                    @endforeach
                </ul>
        @endif
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s10 {{ $errors->has('username') ? ' has-error' : '' }}">
                    <i class="material-icons prefix">email</i>
                    <input id="icon_prefix" type="text" name="username" class="validate" value="{{ old('username') }}">
                    <label for="Email">Email or Username</label>
                        @if ($errors->has('username'))
                            <span class="red-text  text-darken-4">
                                    <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                </div>
            </div>
            <div class="row">
                <div class="input-field col s10 {{ $errors->has('password') ? ' has-error' : '' }}">
                      <i class="material-icons prefix">lock</i>
                      <input id="password" type="password"  name="password" class="validate">
                      <label for="password">Password</label>
                       @if ($errors->has('password'))
                            <span class="red-text  text-darken-4">
                                    <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                </div>
            </div>
            <div class="row">
                <div class="col s10">
                     <input type="checkbox" id="Remember Me" name="remember" {{ old('remember') ? 'checked' : '' }}/>
                     <label for="Remember Me">Remember Me</label>
                </div>
            </div>
            <div class="row">
                <div class="col s6"> 
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>    
            </div>
        </form>
    </div>
    </div>
</div> 

@endsection
