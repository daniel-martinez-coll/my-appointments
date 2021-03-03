@extends('layouts.panel')

@section('content')

<div class="card">
  <div class="card-body">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Editar Especialidades</h3>
        </div>
        <div class="col text-right">
          <a href="{{ url('specialties') }}" class="btn btn-sm btn-default">Cancelar</a>
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
    <form action="/specialties/{{$specialty->id}}" method="POST">
      @csrf
      @method('PUT')      
      <div class="form-group">
          <label class="form-control-label">Nombre de la Especialidad</label>
          <input class="form-control" type="text" name="name" id="name" value="{{   old('name', $specialty->name)  }}">
      </div>
      <div class="form-group">
          <label class="form-control-label">Descripción</label>
          <input class="form-control" type="text" name="description" id="description" value="{{ old('description', $specialty->description ) }}">
      </div>
      <button type="submit" class="btn btn-success">Guardar</button>
    </form>
  </div>
</div>

@endsection