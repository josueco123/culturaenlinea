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
        <p class="lead text-light mb-0">Consulta de los datos registrados en la aplicación</p>
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
             
            <div class="col-12 text-center text-md-left mb-5">

              <form id="filters" action="{{ route('backend.applications.index') }}">
                @csrf
                <div class="form-row">
                  <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6 mb-2">
                    <label for=""><strong>Seleccionar la convocatoria</strong></label>
                    <select id="call" class="form-control" name="call">
                      <option value="0" selected>Todas las convocatorias</option>
                      @foreach ($calls as $call)
                        <option value="{{ $call->id }}" {{ \Request::get('call') == $call->id ? 'selected' : '' }}>{{ $call->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6 mb-2">
                    <label for=""><strong>Seleccionar el Estimulo</strong></label>
                    <select id="incentive" class="custom-select" name="incentive" disabled>
                      <option value="0" selected>Todos los estímulos</option>
                      @isset($incentives)
                        @foreach ($incentives as $incentive)
                          <option value="{{ $incentive->id }}" {{ \Request::get('incentive') == $incentive->id ? 'selected' : '' }}>{{ $incentive->name }}</option>
                        @endforeach
                      @endisset)
                    </select>
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6  mb-2">
                    <label for=""><strong>Seleccionar el Tipo de usuario</strong></label>
                    <select id="user_type" class="form-control" name="user_type">
                      <option value="0" selected>Todos los tipos de usuario</option>
                      @foreach ($user_types as $user_type)
                        <option value="{{ $user_type->id }}" {{ \Request::get('user_type') == $user_type->id ? 'selected' : '' }}>{{ $user_type->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6 mb-2 ">
                    <label for=""><strong>Seleccionar el Estado</strong></label>
                    <select id="status_type" class="form-control" name="status_type">
                      <option value="0" selected>Todos los estados</option>
                      @foreach ($status_types as $status_type)
                        <option value="{{ $status_type->id }}" {{ \Request::get('status_type') == $status_type->id ? 'selected' : '' }}>{{ $status_type->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-12 col-lg-auto">
                      <a onclick="btnbuscar()" class="btn btn-warning" style="margin-top: 25% !important;">Buscar</a>
                      <a href="{{ route('backend.applications.index', ['clearfilters' => 1]) }}" class="btn btn-danger" style="margin-top: 25% !important;">Borrar filtros</a>


                  </div>
                </div>

              </form>
             

            </div>

          </div>

          <div id="load" class="row">

            @include('backend.applications.load')

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

        $('#datatable').DataTable({
          'dom': 'Bfrtip',
          'buttons': [
              'copy', 'excel'
          ]
        });

        $('body').on('click', '.deleteApplication', function (event) {
          var url = $(this).data('url');
          $("#formDelete").attr('action', url);
        });

        // Ajax al cambiar la convocatoria
        $('#call').on('change', function(event) {
          
          event.preventDefault();

          $('#filters').submit( function(event) {
            event.preventDefault();
          });

          var call_id = $(this).val();

          if ($.trim(call_id) != '') {
            $.get('../ajax/incentives', {call_id: call_id}, function (data) {
              $('#incentive').empty();
              $('#incentive').prop('disabled', false);
              $('#incentive').append("<option selected>Seleccione una opción</option>");
              $('#incentive').append("<option>Todos los estímulos</option>");
              data.forEach(incentive => {
                $('#incentive').append("<option value=" +incentive.id+ ">" +incentive.name+ "</option>");
              });
            });
          }

        });

        // Ajax al cambiar el incentivo
        /*$('#incentive').on('change', function (event) {

          event.preventDefault();

          $('#filters').submit( function(event) {
            event.preventDefault();
          });

          var url = $(this).attr('href');
          var data = $('#filters').serialize();

          $.get(url, data, function (result) {
              $('#spiner').css('display','none');
              $('#load').html(result);
              $('#datatable').DataTable({
                'dom': 'Bfrtip',
                'buttons': [
                    'copy', 'excel'
                ]
              });
          })

        });*/

        // Ajax al cambiar el tipo de usuario
      /*  $('#user_type').on('change', function (event) {

          event.preventDefault();

          $('#filters').submit( function(event) {
            event.preventDefault();
          });

          var url = $(this).attr('href');
          var data = $('#filters').serialize();

          $.get(url, data, function (result) {
              $('#load').html(result);
              $('#datatable').DataTable({
                'dom': 'Bfrtip',
                'buttons': [
                    'copy', 'excel'
                ]
              });
          })

        });*/

        // Ajax al cambiar el status
        /*$('#status_type').on('change', function (event) {

          event.preventDefault();

          $('#filters').submit( function(event) {
            event.preventDefault();
          });

          var url = $(this).attr('href');
          var data = $('#filters').serialize();

          $.get(url, data, function (result) {
              $('#load').html(result);
              $('#datatable').DataTable({
                'dom': 'Bfrtip',
                'buttons': [
                    'copy', 'excel'
                ]
              });
          })

        });*/

      });

      function btnbuscar() {
           event.preventDefault();

          $('#filters').submit( function(event) {
            event.preventDefault();
          });

          var url = $(this).attr('href');
          var data = $('#filters').serialize();

          $.get(url, data, function (result) {
              $('#spiner').css('display','none');
              $('#load').html(result);
              $('#datatable').DataTable({
                'dom': 'Bfrtip',
                'buttons': [
                    'copy', 'excel'
                ]
              });
          });
        };


    </script>

@endsection
