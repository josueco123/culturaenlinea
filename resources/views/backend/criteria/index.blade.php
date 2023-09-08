@extends('layouts.app')

{{-- Título de la página (Título único en cada página) con máximo 3 palabras clave (Palabra principal primero) y de máximo 70 catacteres --}}
@section ('page-title', 'Alcaldía de santiago de cali - Secretaría de cultura')

{{-- Descripción de la página (Descripción única en cada página) con máximo 3 palabras clave (Palabra principal primero) y entre 70 y 145 catacteres --}}
@section('page-description', 'Alcaldía de santiago de cali - Secretaría de cultura')


@section('style')

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">

@endsection

@section('content')

  <header class="bg-primary py-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12 text-center text-md-left">
          <h1 class="text-white">Crear criterios de calificación</h1>
          <p class="lead text-light mb-0">Crear los criterios de calificación del estimulo</p>
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
            <strong>Nota: </strong> {!! Session::get('success') !!}
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
			   <form id="filters" action="{{ route('backend.criteria.show') }}" method="post">
			   @csrf
					<div class="row mb-3 ">
					   <div class="col-md-2 text-right">
							<label for="call">Convocatoria</label>
					   </div>
					   <div class="col-md-10">
						   <select id="call" class="form-control" name="call">
							   <option value='0' selected>Todas las convocatorias</option>
							   @foreach ($calls as $call)
							   <option
							   value="{{ $call->id }}"
							   @if(request('call'))
							   @if (request('call') == $call->id)
							   selected
							   @endif
							   @endif
							   >{{ $call->name }}
							   </option>
							   @endforeach
						   </select>
					   </div>
				   </div>
				   <div class="row mb-5">
						<div class="col-md-2 text-right">
							<label for="incentive">Estímulos</label>
					   </div>
					   <div class="col-md-10">
						   <select id="incentive" class="custom-select" name="incentive" >
							   <option selected>Seleccione una opción</option>
							   @isset($incentives)
							   @foreach ($incentives as $incentive)
							   <option value="{{ $incentive->id }}"
							   @if(request('incentive'))
							   @if (request('incentive') == $incentive->id)
							   selected
							   @endif
							   @endif
							   >{{ $incentive->code }} - {{ $incentive->name }}</option>
							   @endforeach
							   @endisset
						   </select>
					   </div>
				   </div>
			   </form>
			   	<div class="row">
				<div class="col">
				   <div class="table-responsive">
					  @isset($criteria)
                <h4 class="text-center text-md-left mb-4">Criterios del estímulo: </h4>
    					  @if ($criteria->count() > 0)
    					  <table id="datatable" class="table table-bordered">
    						 <thead>
    							<tr>
    							   <th>Nombre</th>
    							   <th>Descripción</th>
    							   <th>Puntos</th>
    							   <th>Acciones</th>
    							</tr>
    						 </thead>
    						 <tbody>
    							@foreach ($criteria as $criterion)
    							<tr>
    							   <td>{{$criterion->name}}</td>
    							   <td>{{$criterion->description}}</td>
    							   <td class="text-center" style="width:30px">{{$criterion->value}}</td>
    							   <td class="text-center" style="width:30px">
    								  <a href="#" class="btn btn-danger btn-sm mb-1 mb-lg-0 deleteCriteria" data-toggle="modal" data-target="#modalDeleteCriteria" data-url="{{ route('backend.criteria.destroy', ['id' => $criterion->id]) }}"><i class="fas fa-trash-alt"></i></a>
    							   </td>
    							</tr>
    							@endforeach
    						 </tbody>
    					  </table>
    					  @else
    					  <p>Actualmente no existen criterios</p>
    					  @endif
    					  <br>
    					  <center><a href="#" class="btn btn-danger createCriteria" data-toggle="modal" data-target="#modalCreateCriteria">Crear Criterio</a></center>
					  @endisset
				   </div>
				</div>
			 </div>
			</div>
		 </div>
	  </div>
  </section>

  @include('layouts.modals.criteriaCreate')
  @include('layouts.modals.criteriaDelete')

@endsection

@section('script')

  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>

  <script type="text/javascript">

    $(document).ready( function () {

      $('#summernote').summernote({
        height: 500,
        placeholder: 'Información general del estímulo'
      });

      $('body').on('click', '.deleteCriteria', function (event) {
        var url = $(this).data('url');
        $("#formDelete").attr('action', url);
      });

      // Ajax al cambiar la convocatoria
      $('#call').on('change', function() {

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

      $('#incentive').on('change', function() {
          $('#filters').submit();
      });

    });

  </script>

@endsection
