@extends('layouts.app')

{{-- Título de la página (Título único en cada página) con máximo 3 palabras clave (Palabra principal primero) y de máximo 70 catacteres --}}
@section ('page-title', 'Alcaldía de santiago de cali - Secretaría de cultura')

{{-- Descripción de la página (Descripción única en cada página) con máximo 3 palabras clave (Palabra principal primero) y entre 70 y 145 catacteres --}}
@section('page-description', $incentive->code . ' - ' . $incentive->name)

@section('content')

  <header class="bg-primary py-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12 text-center text-md-left">
          <h1 class="text-white">Proceso de aplicación </h1>
          <p class="lead text-light mb-0">{{ $incentive->name }}, {{ $user_type->name }}</p>
        </div>
      </div>
    </div>
  </header>

@if (Session::has('danger'))
  <div class="container mt-5">
    <div class="alert alert-danger fade show">
      <div class="row">
        <div class="col-auto order-sm-2">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="col order-sm-1">
          <strong>Error: </strong> {!! Session::get('danger') !!}
        </div>
      </div>
    </div>
  </div>
@endif

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

<div class="container">
    <!-- Vertical Steppers -->
    <div class="row mt-1">
        <div class="col-md-12">


            <!-- Stepers Wrapper -->
            <ul class="stepper stepper-horizontal">

                @foreach ($user_type->forms as $form)

                  @php
                      $form_number = $user_type->forms->count() + 1;

                      if($application){
                          $step = $application->step;
                          $application_id = $application->id;
                          $changes = 0;

                          if($application->status_type_id == 3){
                            foreach ($registers as $register){
                                if($register->form_id == $form->id && $register->state == 2){
                                    $changes = 1;
                                }
                            }
                          }

                      }else{
                          $step = 1;
                          $application_id = 0;
                          $changes = 0;
                      }

                    @endphp

                    @if ($changes == 0)
                        <!-- First Step -->
                        @if ($step > $form->order)
                          <li class="done" title="{{$form->name}}">
                            <a class="pointer" onclick="hiddenContent({{$form->order}}, {{$step}} , {{$form_number}})" >
                                  @if ($form->order == 1) <span class="label pr-2">Inicio</span>@endif
                                  <span class="circle"><i class="fas fa-check"></i></span>
                            </a>
                          </li>
                        @endif
                        @if ($step == $form->order)
                            <li id="step-{{$form->order}}" class="active" title="{{$form->name}}">
                                <a  class="pointer" onclick="hiddenContent({{$form->order}}, {{$step}} , {{$form_number}})">
                                      @if ($form->order == 1) <span class="label">Inicio</span>@endif
                                    <span class="circle">{{$form->order}}</span>
                                </a>
                            </li>
                        @endif
                        @if ($step < $form->order)
                            <li title="{{$form->name}}">
                                <a>
                                    <span class="circle">{{$form->order}}</span>
                                </a>
                            </li>
                        @endif
                    @else
                      <li class="warning" title="{{$form->name}}">
                          <a class="pointer" onclick="hiddenContent({{$form->order}}, {{$step}} , {{$form_number}})">
                              <span class="circle"><i class="fas fa-exclamation"></i></span>
                          </a>
                      </li>
                    @endif

              @endforeach

                    <li @if ($step > $form->order) class="active" @endif title="Finalizar Proceso">
                        <a class="pointer" onclick="hiddenContent({{$form_number}}, {{$step}} , {{$form_number}})">
                          <span class="circle">{{$form_number}}</span>  <span class="label">Fin</span>
                        </a>
                    </li>
            </ul>



            @foreach ($user_type->forms as $form)


            <div id="step-content-{{$form->order}}" class="step-content lighten-3 " style=" @if ($step != $form->order) display: none; @endif">
                <form class="" action="{{ route('backend.postulations.storage') }} " method="post" enctype="multipart/form-data">

                    <div class="card  mb-5">

                        <input type="hidden" name="application_id" value="{{$application_id}}">
                        <input type="hidden" name="incentive_id" value="{{$incentive->id}}">
                        <input type="hidden" name="user_type_id" value="{{$user_type->id}}">
                        <input type="hidden" name="form_id" value="{{$form->id}}">
                        <input type="hidden" name="step" value="{{$form->order}}">

                        @csrf

                        <div class="card-body">
                            <h5 class="mt-0 mb-1">{{$form->name}}</h5>
                            <hr class="ml-0 w-15">
                            <div class="row">

                            @foreach ($form->fields as $field)

                                @php
                                    $pos = "-1";
                                    $skip_field = false;

                                    if (count($field->incentives->toArray()) > 0){
                                        $field_incentive = 0;
                                        $skip_field = true;
                                        foreach ($field->incentives as $key => $value) {
                                            if ($value->id == $incentive->id){
                                                $field_incentive = 1;
                                            }
                                        }
                                        if ($field_incentive == 1){
                                            $skip_field = false;
                                        }
                                    }

                                 
                                @endphp

                          @foreach ($registers as $element)
                            @if ($element->state == 2 && $field->id == $element->field_id && $form->id == $element->form_id)

                              <div class=" col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
                                <div class="form-group m-0">

                                  @if ($field->type == 'text')
                                    <label for="{{ $field->name }}">{{ $field->label }}
                                        @if ($field->required)<span class="text-danger">*</span>@endif
                                    </label>

                                    @if ($field->description != "") <br><label class="label-description ml-3 mr-3">{{ $field->description }}</label> @endif

                                    <input type="text" id="{{ $field->id }}" class="form-control ml-3 mr-3" name="{{ $field->id }}" placeholder="{{ $field->placeholder }} , Maximo de caracteres aceptados ({{ $field->size }})"
                                    @if ($pos> -1) value="{{$registers->toArray()[$pos]['data']}}" @endif

                                    @if ($field->id == 1) value="{{ $incentive->area->name }}" disabled @endif
                                    @if ($field->id == 2) value="{{ $incentive->name }}" disabled @endif

                                        {{ $field->required ? 'required' : '' }} maxlength="{{ $field->size }}">

                                    @if ($field->id == 1)<input type="hidden" name="{{$field->id}}" value="{{$incentive->area->name}}"> @endif
                                    @if ($field->id == 2) <input type="hidden" name="{{$field->id}}" value="{{$incentive->name}}">@endif
                                  @endif

                                  @if ($field->type == 'textarea')
                                    <label for="{{ $field->name }}">{{ $field->label }}
                                        @if ($field->required)<span class="text-danger">*</span>@endif
                                    </label>
                                    @if ($field->description != "") <br><label class="label-description ml-3 mr-3">{{ $field->description }}</label> 
                                    @endif

                                    <textarea name="{{ $field->id }}" id="{{ $field->name }}" cols="30" rows="10" class="form-control ml-3 mr-3" placeholder="{{ $field->placeholder }}, Maximo de caracteres aceptados ({{ $field->size }})" maxlength="{{ $field->size }}"></textarea>
                                   
                                  @endif

                                  @if ($field->type == 'number')
                                    <label for="{{ $field->name }}">{{ $field->label }}
                                      @if ($field->required)<span class="text-danger">*</span>@endif
                                    </label>
                                    @if ($field->description != "") <br><label class="label-description ml-3 mr-3">{{ $field->description }}</label> @endif
                                    <input type="number" min="1" id="{{ $field->name }}" class="form-control ml-3 mr-3" name="{{ $field->id }}" placeholder="{{ $field->placeholder }}" {{ $field->required ? 'required' : '' }}
                                    @if ($pos > -1) value="{{$registers->toArray()[$pos]['data']}}" @endif
                                    >
                                  @endif

                                  @if ($field->type == 'select')
                                    <label for="{{ $field->name }}">{{ $field->label }}
                                      @if ($field->required)<span class="text-danger">*</span>@endif
                                    </label>
                                    @if ($field->description != "") <br><label class="label-description ml-3 mr-3">{{ $field->description }}</label> @endif
                                      <select id="{{ $field->name }}" class="custom-select ml-3 mr-3" name="{{ $field->id }}" {{ $field->required ? 'required' : '' }}>
                                        {{-- <option value="" selected disabled>{{ $field->placeholder }}</option> --}}
                                        <option value="" selected disabled>Seleccionar</option>
                                        @foreach ($options = explode(",", $field->options) as $option)
                                            @if ($pos > -1 && $option == $registers->toArray()[$pos]['data'])
                                            <option selected>{{$registers->toArray()[$pos]['data']}}</option>
                                            @else
                                            <option>{{ $option }}</option>
                                            @endif
                                        @endforeach
                                      </select>
                                    @endif

                                    @if ($field->type == 'radio')
                                      <label>{{ $field->label }}
                                        @if ($field->required)<span class="text-danger">*</span>@endif
                                      </label>
                                      @if ($field->description != "") <br><label class="label-description ml-3 mr-3">{{ $field->description }}</label> @endif
                                      <br>
                                      @foreach ($options = explode(",", $field->options) as $option)
                                      <div class="custom-control custom-radio custom-control-inline ml-3 mr-3">
                                          <input type="radio" id="{{ $field->name . '_' . $option }}" class="custom-control-input " name="{{ $field->id }}" value="{{ $option }}" {{ $field->required ? 'required' : '' }}
                                            @if ($pos > -1 && $option == $registers->toArray()[$pos]['data']) checked @endif >
                                          <label class="custom-control-label" for="{{ $field->name . '_' . $option }}">{{ $option }}</label>
                                      </div>
                                      @endforeach
                                    @endif

                                    @if ($field->type == 'date')
                                    <label for="{{ $field->name }}">{{ $field->label }}
                                      @if ($field->required)<span class="text-danger">*</span>@endif
                                    </label>
                                    @if ($field->description != "") <br><label class="label-description ml-3 mr-3">{{ $field->description }}</label> @endif
                                    <input type="date" id="{{ $field->name }}" class="form-control ml-3 mr-3" name="{{ $field->id }}" placeholder="{{ $field->placeholder }}" {{ $field->required ? 'required' : '' }}
                                    @if ($pos > -1) value="{{$registers->toArray()[$pos]['data']}}" @endif
                                    > @endif

                                    @if ($field->type == 'file')
                                    <label for="{{ $field->name }}">{{ $field->label }}
                                      @if ($field->required)<span class="text-danger">*</span>@endif
                                    </label>
                                    @if ($field->description != "") <br><label class="label-description ml-3 mr-3">{!! $field->description !!}</label> @endif
                                    <div class="custom-file ml-3 mr-3">
                                        <input type="file"
                                        @if($field->accept != "")
                                          accept="{{$field->accept}}"
                                        @endif
                                        id="{{ $field->name }}" class="custom-file-input " name="{{ $field->id }}" lang="es" {{ $field->required ? 'required' : '' }}>
                                        <label class="custom-file-label" for="{{ $field->name }}">Seleccione archivo</label>
                                    </div>
                                    @if ($pos > -1)
                                      <label class="m-2 mt-4">
                                         <a class="m-2" href="{{Storage::url("" .$registers->toArray()[$pos]['data'])}}" target="_blank"><i class="fas fa-download"></i> {{$field->label}}</a> @endif
                                      </label>
                                    @endif

                                    @if ($field->type == 'email')
                                        <label for="{{ $field->name }}">{{ $field->label }}
                                          @if ($field->required)<span class="text-danger">*</span>@endif
                                        </label>
                                        @if ($field->description != "") <br><label class="label-description ml-3 mr-3">{{ $field->description }}</label> @endif
                                        <input type="email" id="{{ $field->name }}" class="form-control ml-3 mr-3" name="{{ $field->id }}" placeholder="{{ $field->placeholder }}" {{ $field->required ? 'required' : '' }}
                                        @if ($pos > -1) value="{{$registers->toArray()[$pos]['data']}}" @endif
                                        >
                                    @endif

                                    @if ($field->type == 'participantes' )


                                        <div id="membersGroup" {{-- style="display:none" --}}>
                                        <label for="{{ $field->name }}">{{ $field->label }}
                                          @if ($field->required)<span class="text-danger">*</span>@endif
                                        </label><br>
                                        @if ($field->description != "") <br><label class="label-description ml-3 mr-3">{{ $field->description }}</label> @endif

                                        <a href="#" class="btn btn-primary mt-2 ml-3 mr-3 showRegister" data-toggle="modal" data-target="#modalIncentiveShow"
                                        data-name="{{ $incentive->name }}"
                                        data-description="{{ $incentive->description }}"
                                        data-area="{{ $incentive->area->name }}"
                                        data-type="{{ $incentive->type->name }}"
                                        data-line="{{ $incentive->line_action->name }}"
                                        data-users="{{ $incentive->user_types->pluck('name') }}"
                                        >Registrar integrantes <i class="fa fa-users ml-3"></i></a>

                                        <table id="datatable" class="table table-bordered m-4">
                                          <thead>
                                            <tr>
                                              <th class="text-center" width="200px">Documento</th>
                                              <th class="text-center">Nombre</th>
                                              <th class="text-center">Apellido</th>
                                              <th class="text-center" width="130px">Eliminar</th>
                                            </tr>
                                          </thead>
                                          <tbody>

                                          @if ($application)
                                              @if ($application->members->count() > 0)
                                                @foreach ($application->members as $member)
                                                  <tr>
                                                    <td class="align-middle text-center">{{$member->id_number}}</td>
                                                    <td class="align-middle">{{$member->first_name}}</td>
                                                    <td class="align-middle">{{$member->last_name}}</td>
                                                    <td class="align-middle text-center">
                                                      <a href="#" class="btn btn-danger btn-sm mb-1 mb-lg-0 deleteMember" data-toggle="modal" data-target="#modalMemberDelete"
                                                       data-url="{{ route('backend.postulations.deleteMember', ['id' => $member->id]) }}"><i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                  </tr>
                                                @endforeach
                                              @else
                                                <tr>
                                                  <td colspan="4" class="align-middle">No existen registros :(</td>
                                                </tr>
                                              @endif
                                          @endif



                                          </tbody>
                                        </table>

                                      </div>
                                    @endif


                                </div>
                              </div>
                            @endif
                          @endforeach



                            @endforeach
                            </div>
                        </div>


                            <div class="card-footer">
                                <div class="form-group ">
                                    @if ($form->order < $form_number)
                                    <button type="submit" class="btn btn-primary float-right"> Guardar y Continuar</button>
                                    @endif
                                </div>
                            </div>

                    </div>
                </form>
            </div>
            @endforeach

            

            <div id="step-content-{{$form_number}}" class="step-content lighten-3 @if ($step != $form_number)d-none @endif">
              <form class="" action="{{ route('backend.postulations.postulate') }} " method="post">
                @csrf
                <div class="card  mb-5">
                    <div class="card-body">
                      <h5 class="mt-0 mb-1">Finalizar el proceso de postulación</h5>
                      <hr class="ml-0 w-15">
                        Al enviar el formulario terminará el proceso y deberá esperar a la evaluación respectiva por los jurados.
                    </div>

                    <input type="hidden" name="application_id" value="{{$application_id}}">
                    <input type="hidden" name="incentive_id" value="{{$incentive->id}}">
                    <input type="hidden" name="user_type_id" value="{{$user_type->id}}">
                    <input type="hidden" name="form_id" value="{{$form->id}}">
                    @if ($application)
                    <input type="hidden" name="status_id" value="{{$application->status->id}}">
                    @endif

                    <div class="card-footer">
                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary float-right"> Finalizar proceso</button>
                        </div>
                    </div>
                  </div>
                </form>
            </div>
            <!-- /.Stepers Wrapper -->

        </div>

    </div>

</div>

@endsection @section('script')

@include('layouts.modals.registerMember')

@include('layouts.modals.memberDelete')

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>

<script type="text/javascript">

    $(document).ready(function() {
        bsCustomFileInput.init();



        $('body').on('click', '.showRegister', function (event) {
          $(".incentive-name").empty();
          $(".incentive-description").empty();
          $(".incentive-area").empty();
          $(".incentive-type").empty();
          $(".incentive-line").empty();
          $(".incentive-users").empty();
          $(".incentive-name").append($(this).data('name'));
          $(".incentive-description").append($(this).data('description'));
          $(".incentive-area").append($(this).data('area'));
          $(".incentive-type").append($(this).data('type'));
          $(".incentive-line").append($(this).data('line'));
          $(".incentive-users").append($(this).data('users'));
        });


    });

    $('body').on('click', '.deleteMember', function (event) {
      var url = $(this).data('url');
      $("#formDelete").attr('action', url);
    });


    function hiddenContent(form, step, forms) {

        if (!($('#step-content-' + form).is(":visible")) && (form <= step) ){
            $('.step-content').hide(200);
            $('#step-content-' + form).show(200);
      }
    }

    if ($('#number_of_participants').val() > 0){
        $('#membersGroup').show(200);
    }

</script>

@endsection
