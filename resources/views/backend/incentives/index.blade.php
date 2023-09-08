@extends('layouts.app')

{{-- Título de la página (Título único en cada página) con máximo 3 palabras clave (Palabra principal primero) y de máximo 70 catacteres --}}
@section ('page-title', 'Alcaldía de santiago de cali - Secretaría de cultura')

{{-- Descripción de la página (Descripción única en cada página) con máximo 3 palabras clave (Palabra principal primero) y entre 70 y 145 catacteres --}}
@section('page-description', 'Alcaldía de santiago de cali - Secretaría de cultura')


@section('style')

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@endsection

@section('content')

  <header class="bg-primary py-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12 text-center text-md-left">
          <h1 class="text-white">Gestión de estímulos</h1>
          <p class="lead text-light mb-0">Administrar la información de los estímulos</p>
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

          <div class="row">

            <div class="col-12 text-center text-md-left mb-5">
              <form id="filters" action="{{ route('backend.incentives.index') }}" action="GET">
                @csrf
                <div class="form-row">
                  <div class="col-12 col-lg mb-2">
                    <select id="call" class="form-control" name="call">
                      <option value="0" selected>Seleccionar convocatoria</option>
                      @foreach ($calls as $call)
                        <option value="{{ $call->id }}" 

                       
                        @if (request('call') == $call->id)
                        selected
                        @endif
                        >{{ $call->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="col-12 col-lg-auto">
                    <input class="btn btn-primary" type="submit" value="Consultar">
                  </div>
                </div>

              </form>
            </div>

          </div>

          <div class="row">

            <div class="col-12 col-sm col-form-label text-center text-sm-left">
              <span class="lead">Estímulos creados: <span class="font-weight-bold">{{ count($incentives) }}</span></span>
            </div>

            <div class="col-12 col-sm-auto mb-4 text-center text-sm-left">
              @permission('crear-estimulos')
                <a href="{{ route('backend.incentives.create',$valSelectId) }}" class="btn btn-success"><i class="fas fa-plus fa-fw"></i> Crear estímulo</a> 
              @else
                <a href="#" class="btn btn-success disabled"><i class="fas fa-lock"></i> Crear estímulo</a>
              @endpermission
            </div>

          </div>

          <div class="row">

            <div class="col">

              <div class="table-responsive">

                <table id="datatable" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Convocatoria</th>
                      <th>Código</th>
                      <th>Estímulo</th>
                      <th>Área</th>
                      <th>Línea de acción</th>
                      <th width="130px">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($incentives as $incentive)
                      <tr>
                        <td class="align-middle">{{ $incentive->call->name }}</td>
                      	<td class="align-middle">{{ $incentive->code }}</td>
                        <td class="align-middle">{{ $incentive->name }}</td>
                        <td class="align-middle">{{ $incentive->area->name }}</td>
                        <td class="align-middle">{{ $incentive->line_action->name }}</td>
                        <td class="align-middle">
                          <a href="#" class="btn btn-info btn-sm mb-1 mb-lg-0 showIncentive" data-toggle="modal" data-target="#modalIncentiveShow"
                          data-name="{{ $incentive->name }}"
                          data-description="{{ $incentive->description }}"
                          data-area="{{ $incentive->area->name }}"
                          data-type="{{ $incentive->type->name }}"
                          data-line="{{ $incentive->line_action->name }}"
                          data-users="{{ $incentive->user_types->pluck('name') }}"
                          >
                          <i class="far fa-eye"></i></a>
                          @permission('actualizar-estimulos')
                            <a href="{{ route('backend.incentives.edit', ['id' => $incentive->id]) }}" class="btn btn-warning btn-sm mb-1 mb-lg-0"><i class="fas fa-pencil-alt"></i></a>
                          @endpermission
                          @permission('borrar-estimulos')
                            <a href="#" class="btn btn-danger btn-sm mb-1 mb-lg-0 deleteIncentive" data-toggle="modal" data-target="#modalIncentiveDelete" data-url="{{ route('backend.incentives.destroy', ['id' => $incentive->id]) }}"><i class="fas fa-trash-alt"></i></a>
                          @endpermission
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </section>

  @include('layouts.modals.incentiveDelete')
  @include('layouts.modals.incentiveShow')

@endsection

@section('script')

  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript">

    $(document).ready( function () {

      $('#datatable').DataTable({
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        }
      });

      $('body').on('click', '.showIncentive', function (event) {
        $(".incentive-name").empty();
        $(".incentive-description").empty();
        $(".incentive-area").empty();
        $(".incentive-type").empty();
        $(".incentive-line").empty();
        $(".incentive-users").empty();
        $(".incentive-name").append($(this).data('name'));
        $(".incentive-description").append($(this).data('description'));
        $(".incentive-area").append($(this).data('area'));
        $(".incentive-type").append($(this).data('type'));
        $(".incentive-line").append($(this).data('line'));
        $(".incentive-users").append($(this).data('users'));
      });

      $('body').on('click', '.deleteIncentive', function (event) {
        var url = $(this).data('url');
        $("#formDelete").attr('action', url);
      });

    });

  </script>

@endsection
