@extends('layouts.app')

{{-- Título de la página (Título único en cada página) con máximo 3 palabras clave (Palabra principal primero) y de máximo 70 catacteres --}}
@section ('page-title', 'Alcaldía de santiago de cali - Secretaría de cultura')

{{-- Descripción de la página (Descripción única en cada página) con máximo 3 palabras clave (Palabra principal primero) y entre 70 y 145 catacteres --}}
@section('page-description', 'Alcaldía de santiago de cali - Secretaría de cultura')


@section('style')

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">


  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-html5-1.6.1/datatables.min.css"/>

@endsection

@section('content')

  <header class="content py-0 py-md-5">
    <div class="container py-3 h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="font-weight-bold display-4 text-white mt-5 mb-2">Información de la aplicación</h1>
          <p class="lead mb-5 text-light">Consulta las calificaciones registradas en la aplicación</p>
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

            <div class="col text-center text-md-left mb-4">
              <h4 class="card-title d-inline mb-0">Estado de la aplicación: <span class="badge badge-{{ $application->status->color }} py-2 px-3">{{ $application->status->name }}</span></h4>
            </div>

          </div>

          @php
            $n = 1;
          @endphp

          @foreach ($grade_application as $key => $grade)

          <h4>Calificación #{{$n}}</h4>
          @php
            $n = $n + 1;
          @endphp

          <hr>

          <div class="row">
            <div class="col">

                    <table class="table table-bordered">
                      <thead class="bg-light">
                        <tr>
                            <th >Criterio</th>
                            <th >Descripción</th>
                            <th >Puntos</th>
                            <th >Comentario</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($application->incentive->criteria as $criteria)
                            <tr>
                              <th >{{ $criteria->name }}</th>
                              <td >{{ $criteria->description }}</td>

                              @php
                                $score = 0;
                                $comment = "";
                                foreach ($grade->grade_criteria as $grade_criteria){
                                    if ($grade_criteria->criteria_id == $criteria->id){
                                        $score = $grade_criteria->score;
                                        $comment = $grade_criteria->comment;
                                    }
                                }
                              @endphp

                              <td class="text-center align-middle" style="width:120px">
                                  {{$score}}
                              </td >
                              <td class="text-center" style="width:250px">
                                  {{$comment}}
                              </td>
                            </tr>
                        @endforeach
                        <tr>
                            <th >Comentarío general</th>
                            <td Colspan="3">{!! $grade->comment !!}</td>
                        </tr>
                        <tr>
                            <th >Aplicación recomendada</th>
                            <td Colspan="3">
                              @if ($grade->recommend == 0)
                                  No la recomiendo
                              @else
                                  Sí la recomiendo
                              @endif
                            </td>
                        </tr>
                        <tr>
                            <th >Jurado</th>
                            <td Colspan="3">{{$grade->user->name}} / {{$grade->user->email}}</td>
                        </tr>


                      </tbody>
                    </table>
                  </div>
                  </div>
                  <br>


                    @endforeach
            </div>
          </div>
        </div>

      </div>

    </div>

  </section>



@endsection

@section('script')

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-html5-1.6.1/datatables.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>

@endsection
