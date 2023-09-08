@extends('layouts.app') {{-- Título de la página (Título único en cada página) con máximo 3 palabras clave (Palabra principal primero) y de máximo 70 catacteres --}} @section ('page-title', 'Lorem ipsum dolor, Lorem ipsum dolor sit amet. hogaly.com') {{-- Descripción de la página (Descripción única en cada página) con máximo 3 palabras clave (Palabra principal primero) y entre 70 y 145 catacteres --}} @section('page-description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis soluta ex rerum at ea dolores incidunt rem! Nulla.') @section('content')

<header class="bg-primary py-5 mb-5">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-12">
                <h1 class="display-4 text-white mt-5 mb-2">Proceso de aplicación</h1>
                <p class="lead mb-5 text-white-50">{{ $incentive->name }}, {{ $user_type->name }}</p>
            </div>
        </div>
    </div>
</header>

<div class="container">

    <!-- Vertical Steppers -->
    <div class="row mt-1">
        <div class="col-md-12">

            <!-- Stepers Wrapper -->
            <ul class="stepper stepper-horizontal">

              <li class="done">
                  <a >
                      <span class="label">Inicio</span>
                  </a>
              </li>

                @foreach ($user_type->forms as $form)
                  @php $form_number = $user_type->forms->count() + 1; @endphp

                    <!-- First Step -->
                    @if ($step > $form->order)
                    <li class="done">
                        <a class="pointer" onclick="hiddenContent({{$form->order}}, {{$form_number}})">
                            <span class="circle"><i class="fas fa-check"></i></span>
                        </a>
                    @endif
                    @if ($step == $form->order)
                        <li id="step-{{$form->order}}" class="active">
                            <a class="pointer" onclick="hiddenContent({{$form->order}}, {{$form_number}})">
                                <span class="circle">{{$form->order}}</span>
                            </a>
                    @endif
                    @if ($step < $form->order)
                        <li>
                            <a>
                                <span class="circle">{{$form->order}}</span>
                            </a>
                    @endif
                    @if (false)
                    <li class="warning">
                        <a>
                            <span class="circle">{{$form_number + 1}}</span>
                        </a>
                    @endif
                    </li>
              @endforeach

                    <li class="done">
                        <a class="pointer" onclick="hiddenContent({{$form_number}}, {{$form_number}})">
                            <span class="label">Fin</span>
                        </a>
                    </li>
            </ul>

            @foreach ($user_type->forms as $form)
            <!-- Section Description -->
            <div id="step-content-{{$form->order}}" class="step-content lighten-3" style=" @if ($step != $form->order) display: none; @endif">
                <form class="" action="{{ route('backend.applications.storage') }} " method="post" enctype="multipart/form-data">

                    <div class="card  mb-5">
                        <h5 class="card-header">{{$form->name}}</h5>

                        <input type="hidden" name="application_id" value="{{$application_id}}">
                        <input type="hidden" name="incentive_id" value="{{$incentive->id}}">
                        <input type="hidden" name="user_type_id" value="{{$user_type->id}}">
                        <input type="hidden" name="form_id" value="{{$form->id}}">
                        <input type="hidden" name="step" value="{{$step}}">

                        @csrf

                        <div class="card-body">

                            <div class="row">
                            @foreach ($form->fields as $field)
                              @php
                                $pos = "-1";
                                if (!is_null($registers)){
                                  $pos = array_search($field->id, $registers->pluck('field_id')->toArray(), true);
                                }
                              @endphp

                            <div class="col-md-6 form-field">
                                <div class="form-group m-0">

                                  @if ($field->type == 'text')
                                    <label for="{{ $field->name }}">{{ $field->label }}
                                        @if ($field->required)<span class="text-danger">*</span>@endif
                                    </label>
                                    <input type="text" id="{{ $field->id }}" class="form-control" name="{{ $field->id }}" placeholder="{{ $field->placeholder }}"
                                    @if ($pos> -1) value="{{$registers->toArray()[$pos]['data']}}" @endif
                                    @if ($field->id == 3) value="{{ $incentive->name }}" disabled @endif
                                    @if ($field->id == 2) value="{{ $incentive->area->name }}" disabled @endif
                                        {{ $field->required ? 'required' : '' }} >

                                    @if ($field->id == 2)<input type="hidden" name="{{$field->id}}" value="{{$incentive->area->name}}"> @endif
                                    @if ($field->id == 3) <input type="hidden" name="{{$field->id}}" value="{{$incentive->name}}">@endif
                                  @endif
                                 

                                  @if ($field->type == 'number')
                                    <label for="{{ $field->name }}">{{ $field->label }}
                                      @if ($field->required)<span class="text-danger">*</span>@endif
                                    </label>
                                    <input type="number" id="{{ $field->name }}" class="form-control" name="{{ $field->id }}" placeholder="{{ $field->placeholder }}" {{ $field->required ? 'required' : '' }}
                                    @if ($pos > -1) value="{{$registers->toArray()[$pos]['data']}}" @endif
                                    >
                                  @endif

                                  @if ($field->type == 'select')
                                    <label for="{{ $field->name }}">{{ $field->label }}
                                      @if ($field->required)<span class="text-danger">*</span>@endif
                                    </label>
                                      <select id="{{ $field->name }}" class="custom-select" name="{{ $field->id }}" {{ $field->required ? 'required' : '' }}>
                                        <option value="" selected disabled>{{ $field->placeholder }}</option>
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
                                      <br>
                                      @foreach ($options = explode(",", $field->options) as $option)
                                      <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" id="{{ $field->name . '_' . $option }}" class="custom-control-input" name="{{ $field->id }}" value="{{ $option }}" {{ $field->required ? 'required' : '' }}
                                            @if ($pos > -1 && $option == $registers->toArray()[$pos]['data']) checked @endif >
                                          <label class="custom-control-label" for="{{ $field->name . '_' . $option }}">{{ $option }}</label>
                                      </div>
                                      @endforeach
                                    @endif
                                    <!-- Organizar tipo de campo -->
                                    @if ($field->type == 'date')
                                    <label for="{{ $field->name }}">{{ $field->label }}
                                      @if ($field->required)<span class="text-danger">*</span>@endif
                                    </label>
                                    <input type="text" id="{{ $field->name }}" class="form-control" name="{{ $field->id }}" placeholder="{{ $field->placeholder }}" {{ $field->required ? 'required' : '' }}> @endif

                                    <!-- Organizar tipo de campo file -->
                                    @if ($field->type == 'file')
                                    <label for="{{ $field->name }}">{{ $field->label }}
                                      @if ($field->required)<span class="text-danger">*</span>@endif
                                    </label>
                                    <div class="custom-file">
                                        <input type="file" id="{{ $field->name }}" class="custom-file-input" name="{{ $field->id }}" lang="es" {{ $field->required ? 'required' : '' }}>
                                        <label class="custom-file-label" for="{{ $field->name }}">Seleccione archivo</label>
                                    </div>
                                    @if ($pos > -1) <a href="{{Route('backend.applications.getfile', ['application_id' => $application_id ,'file' => $registers->toArray()[$pos]['data']])}}" target="_blank">{{$field->name}}</a> @endif
                                    @endif

                                    <!-- Organizar tipo de campo email -->
                                    @if ($field->type == 'email')
                                    <label for="{{ $field->name }}">{{ $field->label }}
                                      @if ($field->required)<span class="text-danger">*</span>@endif
                                    </label>
                                    <input type="text" id="{{ $field->name }}" class="form-control" name="{{ $field->id }}" placeholder="{{ $field->placeholder }}" {{ $field->required ? 'required' : '' }}>
                                  @endif


                                </div>
                            </div>

                            @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group ">
                                @if ($form->order < $form_number)
                                <button type="submit" class="btn btn-primary float-right"> Guardar</button>
                                @endif
                            </div>
                        </div>

                    </div>

                </form>
            </div>
            @endforeach

            <div id="step-content-{{$form_number}}" class="step-content lighten-3 @if ($step != $form_number)d-none @endif">
              <div class="card  mb-5">
                  <h5 class="card-header">Finalizar el proceso de postulación</h5>
                  <div class="card-body">
                      Al enviar el formulario terminará el proceso y deberá esperar a la evaluación respectiva por los jurados.
                  </div>
                  <div class="card-footer">
                      <div class="form-group ">
                          <button type="button" class="btn btn-primary float-right"> Finalizar proceso</button>
                      </div>
                  </div>
                </div>
            </div>
            <!-- /.Stepers Wrapper -->

        </div>

    </div>

</div>

@endsection @section('script')

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });

    function hiddenContent(form, forms) {
        if (!($('#step-content-' + form).is(":visible"))){
            $('.step-content').hide(200);
            $('#step-content-' + form).show(200);
      }
    }
</script>

@endsection
