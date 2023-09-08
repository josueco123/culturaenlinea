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
          <h1 class="font-weight-bold display-4 text-white mt-5 mb-2">Actualizar aplicación</h1>
          <p class="lead mb-5 text-light">Consulta de los datos registrados en la aplicación</p>
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

            <div class="col text-center text-md-left mb-4">
              <h4 class="card-title d-inline mb-0">Estado de la aplicación: <span class="badge badge-{{ $application->status->color }} py-2 px-3">{{ $application->status->name }}</span></h4>
            </div>

            <div class="col-auto">
              <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modalApplicationUpdate">Actualizar aplicación</a>
            </div>

          </div>

          <div class="row">
            <div class="col">

              <form action="{{ route('backend.applications.update', ['id' => $application->id]) }}" method="post">

                @csrf
                <input type="hidden" name="_method" value="put">

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
                                    <a href="{{ asset('storage/'.$register->data)}}" target="_blank" download="{{ $register->data }}">{{ $register->data }}</a>
                                  @else
                                    <p class="mb-0">{{ $register->data }}</p>
                                  @endif
                                </td>
                                <td>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                  <label class="btn btn-outline-success {{ $register->state == 1 ? 'active' : '' }}">
                                    <input type="radio" name="{{ $register->id }}" value="1" {{ $register->state == 1 ? 'checked' : '' }}> Valido
                                  </label>
                                  <label class="btn btn-outline-danger {{ $register->state == 2 ? 'active' : '' }}">
                                    <input type="radio" name="{{ $register->id }}" value="2" {{ $register->state == 2 ? 'checked' : '' }}> Invalido
                                  </label>
                                </div>
                              </td>
                              @endif
                            @endforeach
                          </tr>
                        @endforeach
                      @endforeach
                    </tbody>
                  </table>

                </div>

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

                @include('layouts.modals.applicationUpdate')

              </form>

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
