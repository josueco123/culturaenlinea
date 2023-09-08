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
          <h1 class="text-white">Líneas de acción</h1>
          <p class="lead text-light mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, explicabo.</p>
        </div>
      </div>
    </div>
  </header>

  @if (Session::has('success'))

    <div class="alert alert-success fade show rounded-0">
      <div class="container">
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

  <section class="py-5">

    <div class="container">

      <div class="row">

        <div class="col col-md-4 col-lg-3 mb-4">
          <div class="sticky-top">
            @include('layouts.sidebar')
          </div>
        </div>

        <div class="col-md-8 col-lg-9">

          <div class="row">

            <div class="col-12 col-sm col-form-label text-center text-sm-left">
              <span class="lead">Líneas de acción creadas: <span class="font-weight-bold">{{ count($lines_action) }}</span></span>
            </div>

            <div class="col-12 col-sm-auto mb-4 text-center text-sm-left">
              @permission('crear-lineas-de-accion')
                <a href="{{ route('backend.linesAction.create') }}" class="btn btn-success"><i class="fas fa-plus fa-fw"></i> Crear línea de acción</a>
              @else
                <a href="#" class="btn btn-success disabled"><i class="fas fa-lock"></i> Crear línea de acción</a>
              @endpermission
            </div>

          </div>

          <div class="row">

            <div class="col">

              <div class="table-responsive">

                <table id="datatable" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Línea de acción</th>
                      <th width="130px">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($lines_action as $line_action)
                      <tr>
                        <td class="align-middle">{{ $line_action->name }}</td>
                        <td class="align-middle">
                          <a href="#" class="btn btn-info btn-sm mb-1 mb-lg-0 showLineAction" data-toggle="modal" data-target="#modalLineActionShow" data-name="{{ $line_action->name }}" data-description="{{ $line_action->description }}"><i class="far fa-eye"></i></a>
                          @permission('actualizar-lineas-de-accion')
                            <a href="{{ route('backend.linesAction.edit', ['id' => $line_action->id]) }}" class="btn btn-warning btn-sm mb-1 mb-lg-0"><i class="fas fa-pencil-alt"></i></a>
                          @endpermission
                          @permission('borrar-lineas-de-accion')
                            <a href="#" class="btn btn-danger btn-sm mb-1 mb-lg-0 deleteLineAction" data-toggle="modal" data-target="#modalLineActionDelete" data-url="{{ route('backend.linesAction.destroy', ['id' => $line_action->id]) }}"><i class="fas fa-trash-alt"></i></a>
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

  @include('layouts.modals.lineActionShow')
  @include('layouts.modals.lineActionDelete')

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

      $('body').on('click', '.showLineAction', function (event) {
        $(".lineAction-name").empty();
        $(".lineAction-description").empty();
        $(".lineAction-name").append($(this).data('name'));
        $(".lineAction-description").append($(this).data('description'));
      });

      $('body').on('click', '.deleteLineAction', function (event) {
        var url = $(this).data('url');
        $("#formDelete").attr('action', url);
      });

    });

  </script>

@endsection
