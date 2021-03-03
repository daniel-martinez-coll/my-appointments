@extends('layouts.panel')

@section('content')

<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Pacientes</h3>
      </div>
      <div class="col text-right">
        <a href="{{ url('patients/create') }}" class="btn btn-sm btn-success">Nuevo Paciente</a>
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
        @foreach ($patients as $patient)
        <tr>
          <th scope="row">
            {{ $patient->name }}
          </th>
          <td>
            {{ $patient->email }}
          </td>
          <td>
            {{ $patient->dni }}
          </td>
          <td>
            <a href="/patients/{{$patient->id}}/edit" class="btn btn-primary btn-sm">Editar</a>
            <form action="/patients/{{$patient->id}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>              
            </form>            
          </td>          
        </tr>
        @endforeach        
      </tbody>
    </table>
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        {{ $patients->links() }}
      </ul>
    </nav>
  </div>
  

  
</div>

@endsection
