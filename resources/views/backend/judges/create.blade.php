@extends('layouts.app')

{{-- Título de la página (Título único en cada página) con máximo 3 palabras clave (Palabra principal primero) y de máximo 70 catacteres --}}
@section ('page-title', 'Alcaldía de santiago de cali - Secretaría de cultura')

{{-- Descripción de la página (Descripción única en cada página) con máximo 3 palabras clave (Palabra principal primero) y entre 70 y 145 catacteres --}}
@section('page-description', 'Alcaldía de santiago de cali - Secretaría de cultura')

@section('style')

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@endsection

@section('content')



  <header class="content py-0 py-md-5">
    <div class="container py-3 h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="font-weight-bold display-4 text-white mt-5 mb-2">Asignar aplicaciones</h1>
          <p class="lead mb-5 text-light">Asigna aplicaciones a los jurados</p>
        </div>
      </div>
    </div>
  </header>

  <section class="py-5">

    <div class="container">

      <div class="row">

        <div class="col col-md-4 col-lg-3 mb-4">

          <div class="sticky-top">

            @include('layouts.sidebar')

          </div>

        </div>

        <div class="col-md-8 col-lg-9">

          @if (Session::has('error'))
            <div class="container mt-5">
              <div class="alert alert-danger fade show">
                <div class="row">
                  <div class="col-auto order-sm-2">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="col order-sm-1">
                    <strong>Error!</strong> {{ Session::get('error') }}
                  </div>
                </div>
              </div>
            </div>
          @endif

          @if (Session::has('success'))
            <div class="container mt-5">
              <div class="alert alert-success fade show">
                <div class="row">
                  <div class="col-auto order-sm-2">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="col order-sm-1">
                    <strong>Exito!</strong> {{ Session::get('success') }}
                  </div>
                </div>
              </div>
            </div>
          @endif

          <form id="Jueces" action="{{ route('backend.judges.storage') }}" method="post">
            @csrf
            <h4 class="text-center text-md-left mb-4">Formulario para la asignación de aplicaciones</h4>
            <input type="hidden" name="user_id" value="{{$id}}">
            <input id="applicaciones" name="aplicaciones[]" type="hidden" value="">
            <div class="row">

              <div class="col">
                <table id="datatable" class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="d-none">Id</th>
                      <th>Código</th>
                      <th>Nombre de usuario</th>
                      <th>Estímulo</th>
                      <th>Tipo de usuario</th>
                      <th>Estado</th>
                      <th width="130px">Seleccionar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      echo '<script type="text/javascript" >
                        var dato = [];
                      </script>';
                    @endphp

                    @foreach ($applications as $application)
                      <tr>
                        <td class="align-middle d-none">{{ $application->id }}</td>
                        <td class="align-middle">{{ $application->code }}</td>
                        <td class="align-middle">{{ $application->user->name }}</td>
                        <td class="align-middle">{{ $application->incentive->code}} - {{ $application->incentive->name}}</td>
                        <td class="align-middle">{{ $application->user_type->name}}</td>
                        <td class="align-middle">
                          <span class="badge badge-{{ $application->status->color }} py-2 px-3">{{ $application->status->name }}</span>
                        </td>
                        <td class="align-middle">
                          <div class="custom-control custom-checkbox">
                            @if (count($application->judges) > 0)
                              @foreach ($application->judges as $key => $value)
                                  @if ($value->id == $id)
                                    <input id="{{$application->id}}" type="checkbox" class="custom-control-input esta_seleccionado" name="appications[]" onchange="cambiarEstado({{$application->id}})" value="{{ $application->id }}" checked>
                                    <label class="custom-control-label" for="{{ $application->id }}"></label>
                                    @php
                                      // $checked[$application->id] = $application->id;
                                      echo '<script type="text/javascript" >
                                        dato.push ('. $application->id . ');
                                      </script>';
                                    @endphp
                                  @else
                                    <input id="{{$application->id}}" type="checkbox" class="custom-control-input" name="appications[]" onchange="cambiarEstado({{$application->id}})" value="{{ $application->id }}" >
                                    <label class="custom-control-label" for="{{ $application->id }}"></label>
                                  @endif
                              @endforeach
                            @else
                              <input type="checkbox" class="custom-control-input" id="{{ $application->id }}" name="appications[]" onchange="cambiarEstado({{$application->id}})" value="{{ $application->id }}" >
                              <label class="custom-control-label" for="{{ $application->id }}"></label>
                            @endif

                          </div>
                        </td>
                      </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>

            </div>

            <hr>

            <div class="row">

              <div class="col">
                <button type="button" onclick="enviarJueces()" class="btn btn-success">Asignar aplicaciones</button>
              </div>

            </div>

          </form>

        </div>

      </div>

    </div>

  </section>

@endsection

@section('script')

  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript">

  function cambiarEstado(id) {
    var resultado = $.inArray(id, dato);
    if (resultado == -1){
      dato.push(id);
    }else{
      dato.splice(resultado,1);
    }
  }

  function enviarJueces(){

    $( "#applicaciones" ).val(dato);
    $( "#Jueces" ).submit();
    console.log(dato);
  }

  $(document).ready( function () {
     $('#datatable').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
      }
    });
  });

  </script>

@endsection
