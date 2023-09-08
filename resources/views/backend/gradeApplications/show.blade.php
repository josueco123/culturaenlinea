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

  <header class="bg-primary py-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12 text-center text-md-left">
          <h1 class="text-white">Información de la aplicación</h1>
          <p class="lead text-light mb-0">Consulta de los datos registrados en la aplicación</p>
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
            <div class="col">
                
              
              <div class="">
                   
                <table id="datatable" class="table table-bordered">
                  <tbody>
                    @foreach ($forms as $form)
                        @if ($form->id == 13)
                            <tr class="bg-light">
                              <th colspan="3" class="text-center"><h5 class="mb-0">{{ $form->name }}</h5></th>
                              <td class="d-none"></td>
                              <td class="d-none"></td>
                            </tr>
                            <tr>
                                  <td width="40%" class="align-middle">Estímulo</td>
                                  <td class="align-middle">{{ $application->incentive->code}} - {{ $application->incentive->name}}</td>
                                  <td class="align-middle"></td>
                            </tr>
                            @foreach ($form->fields as $field)
                              <tr>
                                @foreach ($registers as $register)
                                  @if ($field->id == $register->field_id)
                                    <td width="40%" class="align-middle">{{ $field->label }}</td>
                                    <td class="align-middle">
                                      @if ($field->type == 'file')
                                      <a href="{{Storage::url("" .$register->data)}}" target="_blank">{{ $register->data }}</a>
                                      @else
                                      <p class="mb-0">{{ $register->data }}</p>
                                      @endif
                                    </td>
                                    <td>
                                      @if ($register->state == 1 && $form->id == 13)
                                        <span class="badge badge-success px-4 py-2">Valido</span>
                                      @else
                                        <span class="badge badge-danger px-4 py-2">Invalido</span>
                                      @endif
                                  </td>
                                  @endif
                                @endforeach
                              </tr>
                            @endforeach
                        @endif
                    @endforeach
                  </tbody>
                </table>
               
                

              </div>

            </div>
          </div>
          <br>

            <div class="row">
            <div class="col">
                 @if (count($modulo_estimulos_registers) > 0)
                      <table id="datatable" class="table table-bordered ">
                        <thead>
                          <tr class="bg-light">
                            <th colspan="5" class="text-center"><h5 class="mb-0">Documentacion del Jurado</h5></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($modulo_estimulos_registers as $registers)
                              @foreach ($modulo_estimulos_field as $field)
                                @if ($registers->field_id == $field->id && $registers->form_id == $field->form_id )
                                  <tr>
                                     <td width="40%" class="align-middle">{{ $field->label }}</td>
                                      <td class="align-middle">
                                        @if ($field->type == 'file')
                                        {{-- <a href="{{ \Storage::url("" .$register->data)}}" target="_blank">{{ $register->data }}</a> --}}
                                        <a href="{{ asset('storage/'.$registers->data)}}" target="_blank" download>{{ $registers->data }}</a>
                                        @else
                                        <p class="mb-0">{{ $registers->data }}</p>
                                        @endif
                                      </td>
                                      <td>
                                        {{-- @if ($register->state == 1)
                                          <span class="badge badge-success px-4 py-2">Valido</span>
                                        @else
                                          <span class="badge badge-danger px-4 py-2">Invalido</span>
                                        @endif --}}
                                      </td>
                                                                                
                                  </tr>
                                  
                                @endif  

                              @endforeach
                            @endforeach
                        </tbody>
                      </table>
                    @endif
            </div>
          </div>
          <br>

          @if (count($grade_application) == 0)

              <div class="row">
                <div class="col">
                 <form id="filters" action="{{ route('backend.gradeApplications.grade') }}" method="post">
         			        @csrf
                      <input type="hidden" name="application_id" value="{{$application->id}}">
                      <div class="">
                        <table id="datatable" class="table table-bordered">

                          <thead class="bg-light">
                            <tr class="bg-light">
                              <th colspan="4" class="text-center"><h5 class="mb-0">Rúbrica de calificación</h5></th>
                              <td class="d-none"></td>
                              <td class="d-none"></td>
                            </tr>
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
                                  <td >{{ $criteria->name }}</td>
                                  <td >{{ $criteria->description }}</td>
                                  <td class="text-center align-middle" style="width:120px">
                                      <select id="value" name="value-{{$criteria->id}}">
                                        @for ($i=0; $i <= $criteria->value; $i++)
                                            <option value="{{ $i }}" >{{ $i }} </option>
                                        @endfor
                                      </select>
                                      {{ " / " . $criteria->value}}
                                  </td >
                                  <td class="text-center" style="width:250px">
                                      <textarea class="form-control" rows="2" name="comment-{{$criteria->id}}" minlength="200" maxlength="1000"></textarea>
                                  </td>
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>

                      <br>
                      <div class="row">
                           @if ($flag == 1)
                                <div class="alert alert-danger">{{ $mensaje }}</div>
                            @endif
                        <div class="col">
                          <div class="form-group">
                            <label>Comentarío general</label>
                           
                            <textarea {{-- id="summernote1" --}} minlength="200" maxlength="1000" class="form-control" name="information" rows="3" ></textarea>
                            
                          </div>
                        </div>

                      </div>

                      <br>
                      <div class="row">
                          <div class="col">
                          <div class="form-group m-0">
                              <label>¿Recomienda la aplicación para deliberaciones? </label>
                              <br />
                              <div class="custom-control custom-radio custom-control-inline ml-3 mr-3">
                                  <input type="radio" id="recommend1" class="custom-control-input" name="recommend" value="0" />
                                  <label class="custom-control-label" for="recommend1">No la recomiendo</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline ml-3 mr-3">
                                  <input type="radio" id="recommend2" class="custom-control-input" name="recommend" value="1" />
                                  <label class="custom-control-label" for="recommend2">Sí la recomiendo</label>
                              </div>
                          </div>
                          </div>
                      </div>


                      <br><center><input type="submit" class="btn btn-primary" value="Guardar Calificación"></center>

                  </form>
                </div>
              </div>
          @else

            <h4>Rúbrica de calificación</h4><br>
            <div class="row">
              <div class="col">

                      <table id="datatable" class="table table-bordered">
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
                                <td >{{ $criteria->name }}</td>
                                <td >{{ $criteria->description }}</td>

                                @php
                                  $score = 0;
                                  $comment = "";
                                  foreach ($grade_application[0]->grade_criteria as $grade_criteria){
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
                        </tbody>
                      </table>
                    </div>
                    </div>
                    <br>
                    <div class="row">

                      <div class="col">
                        <div class="form-group">
                          <label>Comentarío general</label><br>
                          <div class="ml-5">{!! $grade_application[0]->comment !!}</div>
                        </div>
                      </div>

                    </div>

                    <br>
                    <div class="row">
                        <div class="col">
                        <div class="form-group m-0">
                            <label>¿Recomienda la aplicación para deliberaciones? </label><br>
                            <div class="ml-5">
                            @if ($grade_application[0]->recommend == 0)
                                No la recomiendo
                            @else
                                Sí la recomiendo
                            @endif
                            </div>
                        </div>
                        </div>

                    </div>
              </div>
            </div>

          @endif
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

  <script type="text/javascript">

    $(document).ready( function () {


      $('#summernote1').summernote({
        height: 200,
     /*   minHeight:200,
        maxHeight:1000,*/
        minlength: 200,
        maxlength: 500,
        placeholder: 'Mensaje para el usuario, recuerda que como minimo solo se puede 200 Caracteres...'
      });


       $('#datatable').DataTable({
        "paging":   false,
        "ordering": false,
        "info":     false,
        dom: 'Bfrtip',
        buttons: [
          'excel', 'pdf'
        ],
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        }
      });

    });

  </script>

@endsection
