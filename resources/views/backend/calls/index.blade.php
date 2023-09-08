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
        <h1 class="text-white">Gestión de convocatorias</h1>
        <p class="lead text-light mb-0">Gestión de las convocatorias que se abren en el portal</p>
      </div>
    </div>
  </div>
</header>

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

            <div class="col-12 col-md col-form-label text-center text-md-left mb-4">
              <h3>Convocatorias creadas: <span class="font-weight-bold">{{ count($calls) }}</span></h3>
            </div>

            @permission('crear-convocatorias')
              <div class="col-12 col-md-auto text-center text-md-left mb-4">
                  <a href="{{ route('backend.calls.create') }}" class="btn btn-success"><i class="fas fa-plus fa-fw"></i> Crear convocatoria</a>
              </div>
            @endpermission

          </div>

          <div class="row">

            <div class="col">

              <div class="table-responsive">

                <table id="datatable" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Inicio</th>
                      <th>Fin</th>
                      <th width="130px">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($calls as $call)
                      <tr>
                        <td class="align-middle">{{ $call->name }}</td>
                        <td class="align-middle">{{ $call->start_at }}</td>
                        <td class="align-middle">{{ $call->finish_at }}</td>
                        <td class="align-middle">
                          <a href="#" class="btn btn-info btn-sm mb-1 mb-lg-0 showCall" data-toggle="modal" data-target="#modalCallShow" data-name="{{ $call->name }}" data-description="{{ $call->description }}" data-start="{{ $call->start_at }}" data-finish="{{ $call->finish_at }}"><i class="far fa-eye"></i></a>
                          @permission('actualizar-convocatorias')
                            <a href="{{ route('backend.calls.edit', ['id' => $call->id]) }}" class="btn btn-warning btn-sm mb-1 mb-lg-0"><i class="fas fa-pencil-alt"></i></a>
                          @endpermission
                          @permission('borrar-convocatorias')
                            <a href="#" class="btn btn-danger btn-sm mb-1 mb-lg-0 deleteCall" data-toggle="modal" data-target="#modalCallDelete" data-url="{{ route('backend.calls.destroy', ['id' => $call->id]) }}"><i class="fas fa-trash-alt"></i></a>
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

  @include('layouts.modals.callShow')
  @include('layouts.modals.callDelete')

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

      $('body').on('click', '.showCall', function (event) {
        $(".call-name").empty();
        $(".call-description").empty();
        $(".call-start").empty();
        $(".call-finish").empty();
        $(".call-name").append($(this).data('name'));
        $(".call-description").append($(this).data('description'));
        $(".call-start").append($(this).data('start'));
        $(".call-finish").append($(this).data('finish'));
      });

      $('body').on('click', '.deleteCall', function (event) {
        var url = $(this).data('url');
        $("#formDelete").attr('action', url);
      });

    });

  </script>

@endsection
