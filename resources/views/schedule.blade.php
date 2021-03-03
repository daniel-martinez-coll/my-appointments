@extends('layouts.panel')

@section('content')   
<form action="{{ url('/schedule') }}" method="POST">
  @csrf
  <div class="card">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Gestoinar Horarios</h3>
        </div>
        <div class="col text-right">
          <button type="submit" class="btn btn-sm btn-success">Guardar Cambios</button>
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
      <table class="table align-items-center table-info">
        <thead class="thead-dark ">
          <tr>
            <th scope="col">Dia</th>
            <th scope="col">Activo</th>
            <th scope="col">Turno Mañana</th>
            <th scope="col">Turno Tarde</th>
          </tr>
        </thead>
        <tbody>
          @foreach($days as $key => $day)
            <tr>
              <th> {{ $day }}</th>
              <td>
                <label class="custom-toggle ">
                    <input type="checkbox" name="active[]" value="{{ $key }}">
                    <span class="custom-toggle-slider rounded-circle " ></span>
                </label>
              </td>
              <td>
                <div class="row">
                  <div class="col">
                    <select class="form-control form-control-sm" name="morning_start[]">
                      @for($i=5;$i<=13;$i++)
                        <option value="{{$i}}:00">{{$i}}:00 </option>
                        <option value="{{$i}}:30">{{$i}}:30 </option>
                      @endfor
                    </select>
                  </div>
                  <div class="col">
                    <select class="form-control form-control-sm" name="morning_end[]">
                      @for($i=5;$i<=13;$i++)
                        <option value="{{$i}}:00">{{$i}}:00 </option>
                        <option value="{{$i}}:30">{{$i}}:30 </option>
                      @endfor
                    </select>
                  </div>
                </div>                    
              </td>
              <td>
                <div class="row">
                  <div class="col">
                    <select class="form-control form-control-sm" name="afternoon_start[]">
                      @for($i=2;$i<=11;$i++)
                        <option value="{{$i+12}}:00">{{$i+12}}:00 </option>
                        <option value="{{$i+12}}:30">{{$i+12}}:30 </option>
                      @endfor
                    </select>
                  </div>
                  <div class="col">
                    <select class="form-control form-control-sm" name="afternoon_end[]">
                      @for($i=2;$i<=11;$i++)
                        <option value="{{$i+12}}:00">{{$i+12}}:00 </option>
                        <option value="{{$i+12}}:30">{{$i+12}}:30 </option>
                      @endfor
                    </select>
                  </div>
                </div>       
              </td>
            </tr>
          @endforeach
           
        </tbody>
      </table>
    </div>
  </div>
</form> 
@endsection
