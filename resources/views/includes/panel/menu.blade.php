<!-- Nav items -->
  <h6 class="navbar-heading p-0 text-muted">
    <span class="docs-normal">GESTIONAR DATOS</span>
  </h6>
<ul class="navbar-nav">

  @if(auth()->user()->role== 'admin')
  <li class="nav-item">
    <a class="nav-link active" href="/home">
      <i class="ni ni-tv-2 text-primary"></i>
      <span class="nav-link-text">Dashboard</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ url('specialties') }}">
      <i class="ni ni-planet text-orange"></i>
      <span class="nav-link-text">Especialidades</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ url('doctors') }}">
      <i class="ni ni-pin-3 text-primary"></i>
      <span class="nav-single-02">Médicos</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ url('patients') }}">
      <i class="ni ni-satisfied text-yellow"></i>
      <span class="nav-link-text">Pacientes</span>
    </a>
  </li>
  @elseif(auth()->user()->role== 'doctor')
   <li class="nav-item">
    <a class="nav-link" href="/schedule">
      <i class="ni ni-calendar-grid-58 text-danger"></i>
      <span class="nav-link-text">Gestionar Horarios</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="">
      <i class="ni ni-time-alarm text-default"></i>
      <span class="nav-link-text">Mis Citas</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="">
      <i class="ni ni-satisfied text-success"></i>
      <span class="nav-link-text">Mis Pacientes</span>
    </a>
  </li>
  @else
  <li class="nav-item">
    <a class="nav-link" href="">
      <i class="ni ni-laptop text-success"></i>
      <span class="nav-link-text">Reservar Cita</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="">
      <i class="ni ni-satisfied text-danger"></i>
      <span class="nav-link-text">Mis Citas</span>
    </a>
  </li>
  @endif


  <li class="nav-item">
    <a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <i class="ni ni-key-25 text-info"></i>
      <span class="nav-link-text">Cerrar Sesión</span>
    </a>
    <form action="{{ route('logout') }}" method="POST" style="display: none;" id="logout-form">
      @csrf
    </form>
  </li>  
</ul>
@if(auth()->user()->role== 'admin')
  <!-- Divider -->
  <hr class="my-3">
  <!-- Heading -->
  <h6 class="navbar-heading p-0 text-muted">
    <span class="docs-normal">REPORTES</span>
  </h6>
  <!-- Navigation -->
  <ul class="navbar-nav mb-md-3">
    <li class="nav-item">
      <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
        <i class="ni ni-collection"></i>
        <span class="nav-link-text">Frecuencia de citas</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html" target="_blank">
        <i class="ni ni-spaceship"></i>
        <span class="nav-link-text">Médicos más activos</span>
      </a>
    </li>  
  </ul>
@endif