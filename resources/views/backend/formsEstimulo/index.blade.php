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
          <h1 class="text-white">Formularios para Estimulos</h1>
          <p class="lead text-light mb-0">Consulta formularios</p>
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
          @elseif(Session::has('error'))
           <div class="alert alert-danger fade show rounded-0">
              <div class="container">
                <div class="row">
                  <div class="col-auto order-sm-2">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="col order-sm-1">
                    <strong>Error!</strong> {{ Session::get('error') }}
                  </div>
                </div>
              </div>
            </div>
          @endif

          <div class="row">

            <div class="col-12 text-center text-md-left mb-5">
              <form id="filters" action="{{ route('estimulos.forms.index') }}" action="GET">
                @csrf
                <div class="form-row">
                  <div class="col-12 col-lg mb-2">
                    <select id="incentive" class="form-control" name="incentive">
                      <option value="0" selected>Seleccionar Estimulo</option>
                      @foreach ($incentives as $incentive)
                        <option value="{{ $incentive->id }}"
                        @if (request('incentive') == $incentive->id)
                        selected
                        @endif
                        >{{ $incentive->name }}</option>
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

          @if (count($forms) == 0)
          
          <div class="row">

            <div class="col-12 col-sm col-form-label text-center text-sm-left">

              <span class="lead">Formularios: <span class="font-weight-bold">{{ count($forms) }}</span></span>
            </div>

            <div class="col-12 col-sm-auto mb-4 text-center text-sm-left">
              @if (request('incentive'))
                  @permission('crear-formularios')
                    <a href="{{ route('estimulos.forms.create', [ 'incentive' => request('incentive')]) }}" class="btn btn-success"><i class="fas fa-plus fa-fw"></i> Crear formulario </a>
              @else
                    <a href="#" class="btn btn-success disabled"><i class="fas fa-lock"></i> Crear formulario</a>
                  @endpermission
              @endif
            </div>

          </div>
          @endif


          <div class="row">

            <div class="col">

              <div class="table-responsive">

                <table id="datatable" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Orden</th>
                      <th>Nombre</th>
                      <th>Descripción</th>
                      {{-- <th>Tipos de usuario</th> --}}
                      <th width="130px">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($forms as $form)
                      <tr>
                        <td class="align-middle text-center">{{ $form->form_order }}</td>
                        <td class="align-middle">{{ $form->form_name }}</td>
                        <td class="align-middle">{!! $form->form_description !!}</td>
                        {{-- <td class="align-middle">{!! $form->user_types_name !!}</td> --}}
                        <td class="align-middle text-center">
                          <a href="#" class="btn btn-info btn-sm mb-1 mb-lg-0 showUserType" data-toggle="modal" data-target="#modalUserTypeShow" data-name="{{ $form->form_name }}" data-description="{{ $form->form_description }}"><i class="far fa-eye"></i></a>
                          @permission('actualizar-formularios')
                            <a href="{{ route('estimulos.forms.edit', ['id' => $form->form_id, 'call' => $form->call_id, 'idincentive' => $form->idusertypes ]) }}" class="btn btn-warning btn-sm mb-1 mb-lg-0"><i class="fas fa-pencil-alt"></i></a>
                          @endpermission
                          @permission('leer-campos')
                            <a href="{{ route('backend.fields.index', ['id' => $form->form_id, 'call' => $form->call_id]) }}" class="btn btn-success btn-sm mb-1 mb-lg-0"><i class="fas fa-list-alt"></i>
                            </a>
                          @endpermission
                          @permission('borrar-formularios')
                            <a href="#" class="btn btn-danger btn-sm mb-1 mb-lg-0 deleteUserType" data-toggle="modal" data-target="#modalUserTypeDelete" data-url="{{ route('estimulos.forms.destroy', ['id' => $form->form_id, 'call' => $form->call_id]) }}"><i class="fas fa-trash-alt"></i></a>
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

  @include('layouts.modals.userTypeShow')
  @include('layouts.modals.userTypeDelete')

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

    $('body').on('click', '.showUserType', function (event) {

      $(".userType-name").empty();
      $(".userType-name").append($(this).data('name'));

      $(".userType-description").empty();
      $(".userType-description").append($(this).data('description'));

    });

    $('body').on('click', '.deleteUserType', function (event) {
      var url = $(this).data('url');
      $("#formDelete").attr('action', url);
    });

  });

  </script>

@endsection
