@extends('layouts.app_materialize')

@section('content_materialize')
  <div class="container">
    <div class="row">
      @if (session('error'))
        <div class="card-panel red-text text-lighten-2">
        {{ session('error') }}
        </div>
      @endif
      @if (session('success'))
        <div class="card-panel green-text text-lighten-1">
        {{ session('success') }}
        </div>
      @endif
        <form class="col s12" action="{{ url('/user/changePassword') }}" method="POST">
          {{ csrf_field() }}

          <div class="card-panel">
            <div class="row">

              <div class="input-field col s8 {{ $errors->has('current-password') ? ' has-error' : '' }}">
                <i class="material-icons prefix">lock</i>
                <input id="icon_prefix" type="password" name="current-password" class="validate" value="{{ old('current-password') }}" required>
                <label for="icon_prefix">Current Password</label>
                  @if ($errors->has('current-password'))
                      <span class="red-text  text-darken-4">
                           <strong>{{ $errors->first('current-password') }}</strong>
                      </span>
                  @endif
              </div>

              <div class="input-field col s8 {{ $errors->has('new-password') ? ' has-error' : '' }}">
                <i class="material-icons prefix">lock</i>
                <input id="icon_prefix" type="password" name="new-password" class="validate" value="{{ old('new-password') }}" required>
                <label for="icon_prefix">New Password</label>
                  @if ($errors->has('new-password'))
                      <span class="red-text  text-darken-4">
                           <strong>{{ $errors->first('new-password') }}</strong>
                      </span>
                  @endif
              </div>

              <div class="input-field col s8">
                <i class="material-icons prefix">lock</i>
                <input id="icon_prefix" type="password" name="new-password_confirmation" class="validate"  value="{{ old('new-password_confirmation') }}" required>
                <label for="icon_prefix">Confirm New Password</label>

              </div>

              <div class="col s8">
              <button class="waves-effect waves-light btn">Change Password</button>
              </div>

            </div>
          </div>
        </form>
    </div>
  </div>
@endsection
