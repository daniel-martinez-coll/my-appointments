@extends('layouts.panel')

@section('content')

<div class="card">
  <div class="card-body">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Nuevo Médico</h3>
        </div>
        <div class="col text-right">
          <a href="{{ url('doctors') }}" class="btn btn-sm btn-default">Cancelar</a>
        </div>
      </div>
    </div> 
    @if($errors->any())
      <ul>
        @foreach($errors->all() as $error)
          <div class="alert alert-danger" role="alert">{{$error}}</div>
        @endforeach
      </ul>
    @endif
    <form action="{{ url('doctors') }}" method="POST">
      @csrf
      <div class="form-group">
          <label class="form-control-label">Nombre del Médico</label>
          <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
      </div>
      <div class="form-group">
          <label class="form-control-label">E-mail</label>
          <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}">
      </div>
      <div class="form-group">
          <label class="form-control-label">DNI</label>
          <input class="form-control" type="text" name="dni" id="dni" value="{{ old('dni') }}">
      </div>
      <div class="form-group">
          <label class="form-control-label">Dirección</label>
          <input class="form-control" type="text" name="address" id="address" value="{{ old('address') }}">
      </div>
      <div class="form-group">
          <label class="form-control-label">Telefóno</label>
          <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone') }}">
      </div>
      <div class="form-group">
          <label class="form-control-label">Contraseña</label>
          <input class="form-control" type="text" name="password" id="password" value="{{ Str::random(8) }}">
      </div>
      <button type="submit" class="btn btn-success">Guardar</button>
    </form>
  </div>
</div>

@endsection
