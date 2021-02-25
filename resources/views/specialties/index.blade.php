@extends('layouts.panel')

@section('content')

<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Especialidades</h3>
      </div>
      <div class="col text-right">
        <a href="{{ url('specialties/create') }}" class="btn btn-sm btn-success">Nueva Especialidad</a>
      </div>
    </div>
  </div>

  @if (session('notification'))
  <div class="card-body">
    <div class="alert alert-success" role="alert" >
        <strong>{{ session('notification') }}</strong>
    </div>
  </div>
  @endif 

  <div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Descripción</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($specialities as $specialty)
        <tr>
          <th scope="row">
            {{ $specialty->name }}
          </th>
          <td>
            {{ $specialty->description }}
          </td>
          <td>
            
            <form action="/specialties/{{$specialty->id}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
            </form>
            <a href="/specialties/{{$specialty->id}}/edit" class="btn btn-primary btn-sm">Editar</a>
            
          </td>          
        </tr>
        @endforeach        
      </tbody>
    </table>
  </div>
</div>

@endsection
