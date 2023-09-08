@extends('layouts.app')

{{-- Título de la página (Título único en cada página) con máximo 3 palabras clave (Palabra principal primero) y de máximo 70 catacteres --}}
@section ('page-title', 'Lorem ipsum dolor, Lorem ipsum dolor sit amet. hogaly.com')

{{-- Descripción de la página (Descripción única en cada página) con máximo 3 palabras clave (Palabra principal primero) y entre 70 y 145 catacteres --}}
@section('page-description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis soluta ex rerum at ea dolores incidunt rem! Nulla.')

@section('content')

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
        <ul class="stepper stepper-vertical">

            @foreach ($user_type->forms as $form)

            <!-- First Step -->
            @if ($step > $form->order)
              <li class="done">
              	<a href="#!">
              		<span class="circle"><i class="fas fa-check"></i></span>
              		<span class="label">{{$form->name}}</span>
              	</a>
            @endif

            @if ($step == $form->order)
              <li class="active">
              	<a href="#!">
              		<span class="circle">{{$form->order}}</span>
              		<span class="label">{{$form->name}}</span>
              	</a>
            @endif

            @if ($step < $form->order)
              <li>
              	<a href="#!">
              		<span class="circle">{{$form->order}}</span>
              		<span class="label">{{$form->name}}</span>
              	</a>
            @endif

            @if (false)
              <li class="warning">
              	<a href="#!">
              		<span class="circle"><i class="fas fa-exclamation"></i></span>
              		<span class="label">{{$form->name}}</span>
              	</a>
            @endif


                <!-- Section Description -->
                <div class="step-content lighten-3">
                    <form class="" action="{{ route('backend.applications.storage') }} "
                        method="post" enctype="multipart/form-data">

                        <input type="hidden" name="application_id" value="{{$application_id}}">
                        <input type="hidden" name="incentive_id" value="{{$incentive->id}}">
                        <input type="hidden" name="user_type_id" value="{{$user_type->id}}">
                        <input type="hidden" name="form_id" value="{{$form->id}}">
                        <input type="hidden" name="step" value="{{$step}}">

                      <div class="row pl-4">

                        <div class="col mb-4">

                            @csrf
                                <div class="row">

                                      @foreach ($form->fields as $field)

                                        <div class="col-md-6">

                                          <div class="form-group">

                                            @if ($field->type == 'text')

                                              <label for="{{ $field->name }}">{{ $field->label }} @if ($field->required)<span class="text-danger">*</span>@endif</label>
                                              <input type="text" id="{{ $field->id }}" class="form-control" name="{{ $field->id }}" placeholder="{{ $field->placeholder }}"                        

                                              @if ($field->id == 3) value="{{ $incentive->name }}" disabled @endif @if ($field->id == 2) value="{{ $incentive->area->name }}" disabled @endif {{ $field->required ? 'required' : '' }}>
                                              @if ($field->id == 2)  <input type="hidden" name="{{$field->id}}" value="{{$incentive->area->name}}"> @endif
                                              @if ($field->id == 3)  <input type="hidden" name="{{$field->id}}" value="{{$incentive->name}}"> @endif
                                            @endif
                                            

                                            @if ($field->type == 'number')
                                              <label for="{{ $field->name }}">{{ $field->label }} @if ($field->required)<span class="text-danger">*</span>@endif</label>
                                              <input type="number" id="{{ $field->name }}" class="form-control" name="{{ $field->id }}" placeholder="{{ $field->placeholder }}" {{ $field->required ? 'required' : '' }}>
                                            @endif

                                            @if ($field->type == 'select')
                                              <label for="{{ $field->name }}">{{ $field->label }} @if ($field->required)<span class="text-danger">*</span>@endif</label>
                                              <select id="{{ $field->name }}" class="custom-select" name="{{ $field->id }}" {{ $field->required ? 'required' : '' }}>
                                                <option value="" selected disabled>{{ $field->placeholder }}</option>
                                                @foreach ($options = explode(",", $field->options) as $option)
                                                  <option>{{ $option }}</option>
                                                @endforeach
                                              </select>
                                            @endif

                                            @if ($field->type == 'radio')
                                              <label>{{ $field->label }} @if ($field->required)<span class="text-danger">*</span>@endif</label><br>
                                              @foreach ($options = explode(",", $field->options) as $option)
                                                <div class="custom-control custom-radio custom-control-inline">
                                                  <input type="radio" id="{{ $field->name . '_' . $option }}" class="custom-control-input" name="{{ $field->id }}" value="{{ $option }}" {{ $field->required ? 'required' : '' }}>
                                                  <label class="custom-control-label" for="{{ $field->name . '_' . $option }}">{{ $option }}</label>
                                                </div>
                                              @endforeach
                                            @endif

                                              <!-- Organizar tipo de campo -->
                                            @if ($field->type == 'date')
                                              <label for="{{ $field->name }}">{{ $field->label }} @if ($field->required)<span class="text-danger">*</span>@endif</label>
                                              <input type="text" id="{{ $field->name }}" class="form-control" name="{{ $field->id }}" placeholder="{{ $field->placeholder }}" {{ $field->required ? 'required' : '' }}>
                                            @endif

                                            <!-- Organizar tipo de campo file -->
                                            @if ($field->type == 'file')
                                              <label for="{{ $field->name }}">{{ $field->label }} @if ($field->required)<span class="text-danger">*</span>@endif</label>
                                              <div class="custom-file">
                                                <input type="file" id="{{ $field->name }}" class="custom-file-input" name="{{ $field->id }}" lang="es" {{ $field->required ? 'required' : '' }}>
                                                <label class="custom-file-label" for="{{ $field->name }}">Seleccione archivo</label>
                                              </div>
                                            @endif

                                            <!-- Organizar tipo de campo email -->
                                            @if ($field->type == 'email')
                                              <label for="{{ $field->name }}">{{ $field->label }} @if ($field->required)<span class="text-danger">*</span>@endif</label>
                                              <input type="text" id="{{ $field->name }}" class="form-control" name="{{ $field->id }}" placeholder="{{ $field->placeholder }}" {{ $field->required ? 'required' : '' }}>
                                            @endif

                                          </div>

                                        </div>

                                      @endforeach

                                        <div class="col-md-12 mt-5">
                                          <div class="form-group ">
                                              <button type="button" class="btn btn-primary mr-3">← Atras </button>
                                              <button type="submit" class="btn btn-primary float-right"> Siguiente →</button>
                                          </div>
                                        </div>

                                </div>



                        </div>

                      </div>



                      </form>

                    </div>
                  </li>


              @endforeach

            </ul>
            <!-- /.Stepers Wrapper -->

          </div>

        </div>

  </div>



@endsection

@section('script')

  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>

  <script type="text/javascript">

    $(document).ready(function() {
        bsCustomFileInput.init();
    });



  </script>

@endsection
