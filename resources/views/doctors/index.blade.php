@extends('layouts.panel')

@section('content')

<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Médicos</h3>
      </div>
      <div class="col text-right">
        <a href="{{ url('doctors/create') }}" class="btn btn-sm btn-success">Nuevo Médico</a>
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
          <th scope="col">E-mail</th>
          <th scope="col">DNI</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($doctors as $doctor)
        <tr>
          <th scope="row">
            {{ $doctor->name }}
          </th>
          <td>
            {{ $doctor->email }}
          </td>
          <td>
            {{ $doctor->dni }}
          </td>
          <td>
            <a href="/doctors/{{$doctor->id}}/edit" class="btn btn-primary btn-sm">Editar</a>
            <form action="/doctors/{{$doctor->id}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>              
            </form>            
          </td>          
        </tr>
        @endforeach        
      </tbody>
    </table>
  </div>
</div>

@endsection
