@extends('layouts.form')

@section('title','Registro')

@section('subtitle','Ingrese tus datos para registrarte')

@section('content')
<div class="container mt--8 pb-5">
  <!-- Table -->
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">
      <div class="card bg-secondary border-0">
        <div class="card-body px-lg-5 py-lg-5">

            @if($errors->any())
                <div class="text-center text-muted mb-4">
                    <small>Oops! Se encontro un error!!</small>
                </div>
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first()}}
                </div>
            @endif
          
          <form role="form" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
              <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                </div>
                <input  placeholder="Nombre" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                </div>
                <input  placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-merge input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input  placeholder="Contraseña" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group input-group-merge input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input  placeholder="Repetir contraseña"  id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
            </div>

              
            <div class="text-center">
              <button type="submit" class="btn btn-primary mt-4">Crear Cuenta</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
