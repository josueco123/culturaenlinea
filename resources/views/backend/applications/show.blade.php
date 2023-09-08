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
          <p class="lead mb-5 text-light">Consulta de los datos registrados en la aplicación</p>
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

          <div class="row">
            <div class="col">

              <div class="table-responsive">

                <table id="datatable" class="table table-bordered">
                  <thead class="bg-light">
                    <th class="d-none">Nombre del campo</th>
                    <th class="d-none">Respuesta</th>
                    <th class="d-none">Estado</th>
                  </thead>
                  <tbody>
                    @foreach ($forms as $form)
                      <tr class="bg-light">
                        <th colspan="3"><h5 class="mb-0">{{ $form->name }}</h5></th>
                        <td class="d-none"></td>
                        <td class="d-none"></td>
                      </tr>
                      @foreach ($form->fields as $field)
                        <tr>
                          @foreach ($registers as $register)
                            @if ($field->id == $register->field_id)
                              <td width="40%" class="align-middle">{{ $field->label }}</td>
                              <td class="align-middle">
                                @if ($field->type == 'file')
                                  <a href="{{ asset('storage/'.$register->data)}}" target="_blank" download="{{ $register->data  }}">{{ $register->data }}</a>
                                @else
                                  <p class="mb-0">{{ $register->data }}</p>
                                @endif
                              </td>
                              <td>
                                @if ($register->state == 1)
                                  <span class="badge badge-success px-4 py-2">Valido</span>
                                @else
                                  <span class="badge badge-success px-4 py-2">Invalido</span>
                                @endif
                            </td>
                            @endif
                          @endforeach
                        </tr>
                      @endforeach
                    @endforeach


                    @if (count($modulo_estimulos_registers) > 0)
                      <table id="datatable" class="table table-bordered ">
                        <thead>
                          <tr class="bg-light">
                            <th colspan="2" class="text-center"><h5 class="mb-0">Documentacion del Jurado</h5></th>
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
                                        @if ($register->state == 1)
                                          <span class="badge badge-success px-4 py-2">Valido</span>
                                        @else
                                          <span class="badge badge-danger px-4 py-2">Invalido</span>
                                        @endif
                                      </td>
                                                                                
                                  </tr>
                                  
                                @endif  

                              @endforeach
                            @endforeach
                        </tbody>
                      </table>
                    @endif
                    
 
                    @php
                        $haveMembers = false;
                        try {
                          if ($application->members->count() > 0) {
                            $haveMembers = true;
                          }
                        } catch (\Throwable $th) {
                          //throw $th;
                        }
                     @endphp                    
                    @if ($haveMembers)
                      <table id="datatable" class="table table-bordered ">
                          <thead>
                            <tr class="bg-light">
                              <th colspan="2" class="text-center"><h5 class="mb-0">Integrantes</h5></th>
                            </tr>
                          </thead>
                          <tbody>            
                            @if ($application->members->count() > 0)
                              @php $num_member = 1; @endphp
                              @foreach ($application->members as $member)

                                <tr class="bg-light">
                                  <th colspan="2"class="align-middle">Integrante - {{$num_member}}</td>
                                </tr>
                                <tr>
                                  <td width="40%" class="align-middle">Nombres</td>
                                  <td class="align-middle">{{$member->first_name}}</td>
                                </tr>
                                <tr>
                                  <td width="40%" class="align-middle">Apellidos</td>
                                  <td class="align-middle">{{$member->last_name}}</td>
                                </tr>
                                <tr>
                                  <td width="40%" class="align-middle">Tipo de identificación</td>
                                  <td class="align-middle">{{$member->id_type}}</td>
                                </tr>
                                <tr>
                                  <td width="40%" class="align-middle">Número de Identificación</td>
                                  <td class="align-middle">{{$member->id_number}}</td>
                                </tr>
                                <tr>
                                  <td width="40%" class="align-middle">Lugar de expedición del documento de identidad</td>
                                  <td class="align-middle">{{$member->expedition_place}}</td>
                                </tr>
                                <tr>
                                  <td width="40%" class="align-middle">Sexo de nacimiento</td>
                                  <td class="align-middle">{{$member->sexo}}</td>
                                </tr>
                                <tr>
                                  <td width="40%" class="align-middle">Fecha de nacimiento</td>
                                  <td class="align-middle">{{$member->birth_date}}</td>
                                </tr>
                                <tr>
                                  <td width="40%" class="align-middle">Edad </td>
                                  <td class="align-middle">{{$member->age}}</td>
                                </tr>
                                <tr>
                                  <td width="40%" class="align-middle">País de nacimiento</td>
                                  <td class="align-middle">{{$member->birth_country}}</td>
                                </tr>
                                <tr>
                                  <td width="40%" class="align-middle">Departamento de nacimiento</td>
                                  <td class="align-middle">{{$member->birth_state}}</td>
                                </tr>
                                <tr>
                                  <td width="40%" class="align-middle">Ciudad de nacimiento</td>
                                  <td class="align-middle">{{$member->birth_city}}</td>
                                </tr>
                                <tr>
                                  <td width="40%" class="align-middle">País de ubicación</td>
                                  <td class="align-middle">{{$member->location_country}}</td>
                                </tr>
                                <tr>
                                  <td width="40%" class="align-middle">Departamento de ubicación</td>
                                  <td class="align-middle">{{$member->location_state}}</td>
                                </tr>
                                <tr>
                                  <td width="40%" class="align-middle">Ciudad o municipio de ubicación</td>
                                  <td class="align-middle">{{$member->location_city}}</td>
                                </tr>
                                <tr>
                                  <td width="40%" class="align-middle">Área</td>
                                  <td class="align-middle">{{$member->area}}</td>
                                </tr>
                                <tr>
                                  <td width="40%" class="align-middle">Dirección de residencia</td>
                                  <td class="align-middle">{{$member->adress}}</td>
                                </tr>
                                <tr>
                                  <td width="40%" class="align-middle">Comuna de residencia</td>
                                  <td class="align-middle">{{$member->Comunity}}</td>
                                </tr>
                                <tr>
                                  <td width="40%" class="align-middle">Barrio de residencia</td>
                                  <td class="align-middle">{{$member->neighborhood}}</td>
                                </tr>
                                <tr>
                                  <td width="40%" class="align-middle">Número celular</td>
                                  <td class="align-middle">{{$member->cellphone_number}}</td>
                                </tr>
                                <tr>
                                  <td width="40%" class="align-middle">Número fijo de contacto</td>
                                  <td  class="align-middle">{{$member->phone_number}}</td>
                                </tr>
                                <tr>
                                  <td width="40%" class="align-middle">Correo electrónico</td>
                                  <td class="align-middle">{{$member->email}}</td>
                                </tr>

                                  @php $num_member = $num_member + 1; @endphp
                              @endforeach
                            @else
                              <tr>
                                <td colspan="4" class="align-middle">No existen registros :(</td>
                              </tr>
                            @endif

                          
                          </tbody>
                        </table>
                      @endif
                    
                    
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

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-html5-1.6.1/datatables.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>

  <script type="text/javascript">

    $(document).ready( function () {

      $('#summernote').summernote({
        height: 200,
        placeholder: 'Mensaje para el usuario...'
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
