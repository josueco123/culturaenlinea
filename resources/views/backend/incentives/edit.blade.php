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
          <h1 class="text-white">Actualizar estímulo</h1>
          <p class="lead text-light mb-0">Actualizar la información de los estímulos</p>
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

          <form action="{{ route('backend.incentives.update', ['id' => $incentive->id]) }}" method="post">

            @csrf
            <input type="hidden" name="_method" value="put">

            <h4 class="text-center text-md-left mb-4">Formulario para la actualización del estímulo</h4>

            <div class="row">


              <div class="col-md-6">
                <div class="form-group">
                  <label for="call">Convocatoria *</label>
                  <select class="custom-select @error('call') is-invalid @enderror" name="call" required>
                    <option {{ old('call') ? '' : 'selected' }} disabled>Convocatoria *</option>
                    @foreach ($calls as $call)
                      <option value="{{ $call->id }}"  {{ !old('call') && $incentive->call->id == $call->id ? 'selected' : '' }} {{ old('call') == $call->id ? 'selected' : '' }}>{{ $call->name }}</option>

                    @endforeach
                  </select>
                  @error('call')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="area">Área *</label>
                  <select class="custom-select @error('area') is-invalid @enderror" name="area" required>
                    <option {{ old('area') ? '' : 'selected' }} disabled>Area *</option>
                    @foreach ($areas as $area)
                      <option value="{{ $area->id }}" {{ !old('area') && $incentive->area->id == $area->id ? 'selected' : '' }} {{ old('area') == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
                    @endforeach
                  </select>
                  @error('area')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="incentive_type">Tipo de estímulo *</label>
                  <select class="custom-select @error('incentive_type') is-invalid @enderror" name="incentive_type" required>
                    <option {{ old('incentive_type') ? '' : 'selected' }} disabled>Tipo de estímulo *</option>
                    @foreach ($incentive_types as $incentive_type)
                      <option value="{{ $incentive_type->id }}" {{ !old('incentive_type') && $incentive->type->id == $incentive_type->id ? 'selected' : '' }} {{ old('incentive_type') == $incentive_type->id ? 'selected' : '' }}>{{ $incentive_type->name }}</option>
                    @endforeach
                  </select>
                  @error('incentive_type')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="lines_action">Línea de acción *</label>
                  <select class="custom-select @error('line_action') is-invalid @enderror" name="line_action" required>
                    <option {{ old('line_action') ? '' : 'selected' }} disabled>Línea de acción *</option>
                    @foreach ($lines_action as $line_action)
                      <option value="{{ $line_action->id }}" {{ !old('line_action') && $incentive->line_action->id == $line_action->id ? 'selected' : '' }} {{ old('line_action') == $line_action->id ? 'selected' : '' }}>{{ $line_action->name }}</option>
                    @endforeach
                  </select>
                  @error('line_action')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label for="type">Código *</label>
                  <input type="text" id="code" class="form-control @error('code') is-invalid @enderror @error('slug') is-invalid @enderror" name="code" value="{{ old('code') ? old('code') : $incentive->code }}" placeholder="Código estímulo *" required>
                  @error('code')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                  @error('slug')
                    <span class="invalid-feedback">Ya existe un estímulo con el mismo nombre</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="type">Nombre *</label>
                  <input type="text" id="name" class="form-control @error('name') is-invalid @enderror @error('slug') is-invalid @enderror" name="name" value="{{ old('name') ? old('name') : $incentive->name }}" placeholder="Nombre del estímulo *" required>
                  @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                  @error('slug')
                    <span class="invalid-feedback">Ya existe un estímulo con el mismo nombre</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="type">Fecha inicio *</label>
                  <input type="date" id="start_at" class="form-control @error('start_at') is-invalid @enderror @error('slug') is-invalid @enderror" name="start_at" value="{{ old('start_at') ? old('start_at') : $incentive->start_at }}" required>
                  @error('start_at')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="type">Fecha fin *</label>
                  <input type="date" id="finish_at" class="form-control @error('finish_at') is-invalid @enderror @error('slug') is-invalid @enderror" name="finish_at" value="{{ old('finish_at') ? old('finish_at') : $incentive->finish_at }}" required>
                  @error('finish_at')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="type">Valor *</label>
                  <input type="text" id="value" class="form-control @error('value') is-invalid @enderror @error('slug') is-invalid @enderror" name="value" value="{{ old('value') ? old('value') : $incentive->value }}" placeholder="Valor del estimulo *" required>
                  @error('value')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                  @error('slug')
                    <span class="invalid-feedback">Ya existe un estímulo con el mismo nombre</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="type">Cantidad *</label>
                  <input type="text" id="quantity" class="form-control @error('quantity') is-invalid @enderror @error('slug') is-invalid @enderror" name="quantity" value="{{ old('quantity') ? old('quantity') : $incentive->quantity }}" placeholder="Cantidad estimulo" required>
                  @error('quantity')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                  @error('slug')
                    <span class="invalid-feedback">Ya existe un estímulo con el mismo nombre</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="type">Ejecución inicio *</label>
                  <input type="date" id="execution_start" class="form-control @error('execution_start') is-invalid @enderror @error('slug') is-invalid @enderror" name="execution_start" value="{{ old('execution_start') ? old('execution_start') : $incentive->execution_start }}" required>
                  @error('execution_start')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="type">Ejecución fin *</label>
                  <input type="date" id="execution_finish" class="form-control @error('execution_finish') is-invalid @enderror @error('slug') is-invalid @enderror" name="execution_finish" value="{{ old('execution_finish') ? old('execution_finish') : $incentive->execution_finish }}" required>
                  @error('execution_finish')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col">
                <div class="form-group">
                  <label>Información general del estímulo *</label>
                  <textarea id="summernote" class="form-control @error('description') is-invalid @enderror" name="description" rows="3" placeholder="Información general del estímulo *" required>{{ old('description') ? old('description') : $incentive->description }}</textarea>
                  @error('description')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col">
                <div class="form-group">
                  <label>Información complementaría (Se visualiza al inicio de cada estimulo)</label>
                  <textarea id="summernote2" class="form-control @error('information') is-invalid @enderror" name="information" rows="3" placeholder="Información complementaría" >{{ old('information') ? old('information') : $incentive->information }}</textarea>
                  @error('information')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-12">
                <label for="user_types">Tipos de usuarios *</label>
              </div>
              @foreach ($user_types as $user_type)
                <div class="col-md-6 col-xl-4">
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="user_type_{{ $user_type->id }}" class="custom-control-input @error('user_types') is-invalid @enderror" name="user_types[]" value="{{ $user_type->id }}"
                        {{ !old('user_types') && in_array($user_type->id, $incentive->user_types->pluck('id')->toArray()) ? 'checked' : '' }}
                        {{ old('user_types') && in_array($user_type->id, old('user_types')) ? 'checked' : '' }}>
                      <label class="custom-control-label" for="user_type_{{ $user_type->id }}">{{ $user_type->name }}</label>
                    </div>
                  </div>
                </div>
              @endforeach
              @error('user_types')
                <span class="col-12 text-danger small">{{ $message }}</span>
              @enderror
            </div>

            <hr>

            <div class="row">

              <div class="col">
                <button type="submit" class="btn btn-warning">Actualizar estímulo</button>
              </div>

            </div>

          </form>

        </div>

      </div>

    </div>

  </section>

@endsection

@section('script')

  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>

  <script type="text/javascript">

    $(document).ready( function () {

      $('#summernote').summernote({
        height: 500,
        placeholder: 'Información general del estímulo'
      });

      $('#summernote2').summernote({
        height: 200,
        placeholder: 'Información general del estímulo'
      });

    });

  </script>

@endsection
