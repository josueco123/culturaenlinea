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
          <h1 class="text-white">Calificar aplicaciones</h1>
          <p class="lead text-light mb-0">Consulta las aplicaciones asignadas para su calificación</p>
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
              <h3>Aplicaciones asignadas: <span class="font-weight-bold">{{ count($applications) }}</span></h3>
            </div>

            <div class="col-12">

              <div class="table-responsive">

                <table id="datatable" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Convocatoria / Estímulo</th>
                      <th>Tipo de usuario</th>
                      <th>Fecha de aplicación</th>
                      <th>Estado</th>
                      <th width="130px">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($applications as $application)
                      <tr>
                        <td class="align-middle">{{ $application->code}}</td>
                        <td class="align-middle"><b>{{ $application->call->name}}</b><br>{{ $application->incentive->code}} - {{ $application->incentive->name}}</td>
                        <td class="align-middle">{{ $application->user_type->name}}</td>
                        <td class="align-middle">{{ $application->created_at}}</td>



                        @if (count($application->grade_application) > 0)
                            @foreach ($application->grade_application as $key => $grade_application)
                                @if ($grade_application->user_id == Auth::user()->id)
                                    <td class="align-middle"><span class="badge badge-pending py-2 px-3">Calificado</span></td>
                                @endif
                            @endforeach
                        @else
                            <td class="align-middle"><span class="badge badge-postulate py-2 px-3">Sin calificar</span></td>
                        @endif
                        <td class=" text-center align-middle">
                          <a href="{{ route('backend.gradeApplications.show', ['id' => $application->id]) }}" class="btn btn-info btn-sm mb-1 mb-lg-0"><i class="far fa-eye"></i></a>
                          @if (count($application->grade_application) > 0)
                            @foreach ($application->grade_application as $key => $grade_application)
                                @if ($grade_application->user_id == Auth::user()->id)
                                     <a href=" {{ route('backend.gradeApplications.edit', ['id' => $application->id]) }} " class="btn btn-warning btn-sm mb-1 mb-lg-0" alt="Editar"><i class="far fa-edit"></i></i></a>
                                @endif
                            @endforeach
                          @endif
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

  @include('layouts.modals.applicationDelete')

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

      $('body').on('click', '.deleteApplication', function (event) {
        var url = $(this).data('url');
        $("#formDelete").attr('action', url);
      });

    });

  </script>

@endsection
