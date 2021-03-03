@extends('layouts.panel')

@section('content')

<div class="card">
  <div class="card-body">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Editar Paciente</h3>
        </div>
        <div class="col text-right">
          <a href="{{ url('patients') }}" class="btn btn-sm btn-default">Cancelar</a>
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
    <form action="{{ url('patients/'.$patient->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
          <label class="form-control-label">Nombre del Paciente</label>
          <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $patient->name ) }}">
      </div>
      <div class="form-group">
          <label class="form-control-label">E-mail</label>
          <input class="form-control" type="email" name="email" id="email" value="{{ old('email' , $patient->email) }}">
      </div>
      <div class="form-group">
          <label class="form-control-label">DNI</label>
          <input class="form-control" type="text" name="dni" id="dni" value="{{ old('dni', $patient->dni) }}">
      </div>
      <div class="form-group">
          <label class="form-control-label">Dirección</label>
          <input class="form-control" type="text" name="address" id="address" value="{{ old('address', $patient->address) }}">
      </div>
      <div class="form-group">
          <label class="form-control-label">Telefóno</label>
          <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', $patient->phone) }}">
      </div>
      <div class="form-group">
          <label class="form-control-label">Contraseña</label>
          <input class="form-control" type="text" name="password" id="password" value="">
          <p>Ingrese un valor si solo desea cambiar la contraseña</p>
      </div>
      <button type="submit" class="btn btn-success">Guardar</button>
    </form>
  </div>
</div>

@endsection
