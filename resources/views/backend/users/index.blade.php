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
          <h1 class="text-white">Gestión de usuarios</h1>
          <p class="lead text-light mb-0">Administra la información general de los usuarios</p>
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

            <div class="col-12 col-sm col-form-label text-center text-sm-left">
              <span class="lead">Usuarios creados: <span class="font-weight-bold">{{ count($users) }}</span></span>
            </div>

            <div class="col-12 col-sm-auto mb-4 text-center text-sm-left">
              <a href="{{ route('backend.users.create') }}" class="btn btn-success"><i class="fas fa-plus fa-fw"></i> Crear Usuario</a>
            </div>

          </div>

          <div class="row">

            <div class="col">

              <div class="table-responsive">

                <table id="datatable" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Roles</th>
                      <th>Permisos (Directos)</th>
                      <th width="130px">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($users as $user)
                      <tr>
                        <td class="align-middle">{{ $user->name }}</td>
                        <td class="align-middle">
                          @foreach ($user->roles as $role)
                            <span class="badge badge-info">{{ $role->name }}</span>
                          @endforeach
                        </td>
                        <td class="align-middle">
                          @foreach ($user->permissions as $permission)
                            <span class="badge badge-info">{{ $permission->name }}</span>
                          @endforeach
                        </td>
                        <td class="align-middle">
                          <a href="{{ route('backend.users.edit', ['id' => $user->id]) }}" class="btn btn-warning btn-sm mb-1 mb-lg-0"><i class="fas fa-pencil-alt"></i></a>
                          <a href="#" class="btn btn-danger btn-sm mb-1 mb-lg-0 deleteuser" data-toggle="modal" data-target="#modalUserDelete" data-url="{{ route('backend.users.destroy', ['id' => $user->id]) }}"><i class="fas fa-trash-alt"></i></a>
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

  @include('layouts.modals.userDelete')

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

      $('body').on('click', '.deleteuser', function (event) {
        var url = $(this).data('url');
        $("#formDelete").attr('action', url);
      });

    });

  </script>

@endsection
