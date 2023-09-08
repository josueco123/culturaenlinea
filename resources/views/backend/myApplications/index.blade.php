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
        <h1 class="text-white">Mis aplicaciones</h1>
        <p class="lead text-light mb-0">Consulta las aplicaciones realizadas en nuestro portal</p>
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
              <h3>Aplicaciones realizadas: <span class="font-weight-bold">{{ count($applications) }}</span></h3>
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
                        <td class="align-middle"><span class="badge badge-{{ $application->status->color }} py-2 px-3">{{ $application->status->name }}</span></td>
                        <td class="align-middle">
                          <a href="{{ route('backend.myApplications.show', ['id' => $application->id]) }}" class="btn btn-info btn-sm mb-1 mb-lg-0"><i class="far fa-eye"></i></a>

                          @php
                            $score = 0;
                            $grade= 0;
                            if (count($application->grade_application) > 0) {
                                foreach ($application->grade_application as $key => $grade_application) {
                                  $score = $score + $grade_application->score;
                                  $grade = $grade + 1;
                                }

                                $score = ($score / $grade);
                            }


                          @endphp

                         
                          @if ($grade > 0 && $application->status->name == 'En estudio' && Auth::User()->hasRole('aspirante-a-estimulo'))
                          
                          @elseif($grade > 0 && $application->status->name == 'Participación finalizada' && Auth::User()->hasRole('aspirante-a-estimulo'))
                              <a href="{{ route('backend.myApplications.grade', ['id' => $application->id]) }}" class="btn btn-sended btn-sm mb-1 mb-lg-0"><i class="far fa-clipboard"></i></a>
                          @elseif($grade > 0 && $application->status->name == 'Candidato a ganador' && Auth::User()->hasRole('aspirante-a-estimulo'))
                              <a href="{{ route('backend.myApplications.grade', ['id' => $application->id]) }}" class="btn btn-sended btn-sm mb-1 mb-lg-0"><i class="far fa-clipboard"></i></a>
                          @elseif($grade > 0 && $application->status->name == 'Candidato a suplente' && Auth::User()->hasRole('aspirante-a-estimulo'))
                              <a href="{{ route('backend.myApplications.grade', ['id' => $application->id]) }}" class="btn btn-sended btn-sm mb-1 mb-lg-0"><i class="far fa-clipboard"></i></a>
                          @elseif($grade > 0 && $application->status->name == 'Ganador' && Auth::User()->hasRole('aspirante-a-estimulo'))
                              <a href="{{ route('backend.myApplications.grade', ['id' => $application->id]) }}" class="btn btn-sended btn-sm mb-1 mb-lg-0"><i class="far fa-clipboard"></i></a>
                          @elseif($grade > 0 && Auth::User()->hasRole('administrador'))
                            <a href="{{ route('backend.myApplications.grade', ['id' => $application->id]) }}" class="btn btn-sended btn-sm mb-1 mb-lg-0"><i class="far fa-clipboard"></i></a>
                          @endif
                          

                          @if(strtotime($application->incentive->start_at) < strtotime(date("d-m-Y H:i:00",time())) && strtotime(date("d-m-Y H:i:00",time())) <= strtotime($application->incentive->finish_at) + 86400 )
                              @if ($application->status_type_id == 1 || $application->status_type_id == 3)
                                  <a href="{{ route('backend.postulations.form', ['incentive_slug' => $application->incentive->slug, 'userType_slug' => $application->user_type->slug]) }}" class="btn btn-warning btn-sm mb-1 mb-lg-0"><i class="fas fa-pencil-alt"></i></a>
                              @endif
                              @if ($application->status_type_id < 5)
                                  <a href="#" class="btn btn-danger btn-sm mb-1 mb-lg-0 deleteApplication" data-toggle="modal" data-target="#modalApplicationDelete" data-url="{{ route('backend.applications.destroy', ['id' => $application->id]) }}"><i class="fas fa-trash-alt"></i></a>
                              @endif
                          @else
                              @if ($application->status_type_id == 3)
                                @php
                                    $fecha = "";
                                    foreach ($application->updated_at as $key => $updated_at) {
                                      if ($key == 'date') {
                                        $fecha = date( "d-m-Y", ( strtotime(date( "m/d/Y", strtotime($updated_at))) + 345600));
                                      }
                                    }
                                @endphp
                                @if(strtotime($fecha) > strtotime(date("d-m-Y H:i:00",time())))
                                    <a href="{{ route('backend.postulations.form', ['incentive_slug' => $application->incentive->slug, 'userType_slug' => $application->user_type->slug]) }}" class="btn btn-warning btn-sm mb-1 mb-lg-0"><i class="fas fa-pencil-alt"></i></a>
                                @endif
                             @endif
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
