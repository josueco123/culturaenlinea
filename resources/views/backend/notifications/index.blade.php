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
        <h1 class="text-white">Notificaciones</h1>
        <p class="lead text-light mb-0">Consulta las notificaciones de nuestro portal</p>
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

          <div class="row">

            <div class="col-12 text-center text-md-left mb-4">
              <h3>Aplicaciones realizadas: <span class="font-weight-bold">{{ count($notifications) }}</span></h3>
            </div>

          </div>

          <div class="row">

            <div class="col">

              <div class="table-responsive">

                <table id="datatable" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Título de la notificación</th>
                      <th width="130px">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($notifications as $notification)
                      {{-- @if ($notification->title == 'Aplicación Calificada')
                      @else --}}
                      <tr>
                        <td class="align-middle">
                          @if ($notification->viewed)
                            {{ $notification->title }}
                          @else
                            <b>{{ $notification->title }}</b>
                          @endif
                        </td>
                        <td class="align-middle">
                          <a href="{{ route('backend.notifications.show', ['id' => $notification->id]) }}" class="btn btn-info btn-sm mb-1 mb-lg-0"><i class="far fa-eye"></i></a>
                        </td>
                      </tr>
                      {{-- @endif --}}
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

    });

  </script>

@endsection
