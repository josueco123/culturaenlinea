@extends('layouts.app')

{{-- Título de la página (Título único en cada página) con máximo 3 palabras clave (Palabra principal primero) y de máximo 70 catacteres --}}
@section ('page-title', 'Alcaldía de santiago de cali - Secretaría de cultura')

{{-- Descripción de la página (Descripción única en cada página) con máximo 3 palabras clave (Palabra principal primero) y entre 70 y 145 catacteres --}}
@section('page-description', 'Alcaldía de santiago de cali - Secretaría de cultura')

@section('style')

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">




@endsection

@section('content')

  <header class="bg-primary py-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12 text-center text-md-left">
          <h1 class="text-white">Gestión de aplicaciones</h1>
          <p class="lead text-light mb-0">Exportar de los datos registrados en la aplicación</p>
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

            <div class="col-12 text-center text-md-left mb-5">
              <form id="filters" action="{{ route('backend.applications.export') }}">
                @csrf
                <div class="form-row">
                  <div class="col-12 col-lg mb-2">
                    <select id="call" class="form-control" name="call">
                      <option value="0" selected>Todas las convocatorias</option>
                      @foreach ($calls as $call)
                        <option value="{{ $call->id }}"
                        @if (request('call') == $call->id)
                        selected
                        @endif
                        >{{ $call->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-12 col-lg mb-2 mb-lg-0">
                    <select id="user_type" class="form-control" name="user_type">
                      <option value="0" selected>Todos los tipos de usuario</option>
                      @foreach ($user_types as $user_type)
                        <option value="{{ $user_type->id }}"
                          @if (request('user_type') == $user_type->id)
                          selected
                          @endif
                        >{{ $user_type->name }}</option>
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

          <div id="load" class="row">
            @if (request('user_type') > 0)
              @include('backend.applications.exportLoad')
            @endif
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


  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>




  <script type="text/javascript">
      
      $(document).ready( function () {

        $('#datatable').show();

        $('#datatable').DataTable({
          'dom': 'Bfrtip',
          'buttons': [
              'copy', 'excel'
          ]
        });

      });

    </script>

@endsection
