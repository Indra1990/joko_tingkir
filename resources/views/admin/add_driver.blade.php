@extends('layouts.admin_materialize')

@section('content_materialize_admin')
  <div class="container">

<div class="row">
<form action="/admin/add_driver/{{ $booking->id }}" method="POST">
  {{ csrf_field() }}
  <input type="hidden" name="_method" value="PUT">

<div class="input-field col s8 offset-s1">
  <div id="addDriver" class="card-panel teal lighten-2"><i class="fa fa-plus" aria-hidden="true"></i> Add Driver </div>
  <div class="driver" style="display: none;">
    <ul>
      <li>
          <select class="" name="drivers[]">
            <option value="0">-- Pilih Driver --</option>
            @foreach ($drivers as $driver)
            <option value="{{ $driver->id }}">{{ $driver->nama_driver }}</option>
            @endforeach
          </select>
    </li>
    </ul>
  </div>
</div>

<div class="input-field col s8 offset-s1">
  <p>@if(session('tours_error'))
      <span class="red-text text-darken-2"> {{ session('tours_error') }}</span>
  @endif</p>
</div>
<div class="input-field col s8 offset-s1 ">
  <button class="waves-effect waves-light btn">submit</button>
</div>
</form>
</div>
  </div>
@endsection
