@extends('layouts.app')

{{-- Título de la página (Título único en cada página) con máximo 3 palabras clave (Palabra principal primero) y de máximo 70 catacteres --}}
@section ('page-title', 'Alcaldía de santiago de cali - Secretaría de cultura')

{{-- Descripción de la página (Descripción única en cada página) con máximo 3 palabras clave (Palabra principal primero) y entre 70 y 145 catacteres --}}
@section('page-description', 'Alcaldía de santiago de cali - Secretaría de cultura')


@section('content')

  <header class="bg-primary py-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12 text-center text-md-left">
          <h1 class="text-white">Actualizar convocatoria</h1>
          <p class="lead text-light mb-0">Actualizar convocatorias que se abren en el portal</p>
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

          <form action="{{ route('backend.calls.update', ['id' => $call->id]) }}" method="post">

            @csrf
            <input type="hidden" name="_method" value="put">

            <div class="row">
              <div class="col-12 col-md col-form-label text-center text-md-left mb-4">
                <h3>Formulario para la actualización de la convocatoria</h3>
              </div>
            </div>

            <div class="row">

              <div class="col-md-8">
                <div class="form-group">
                  <label for="type">Nombre *</label>
                  <input type="text" id="name" class="form-control @error('name') is-invalid @enderror @error('slug') is-invalid @enderror" name="name" value="{{ old('name') ? old('name') : $call->name }}" placeholder="Nombre del convocatoria * (Máximo 40 caracteres)" required>
                  @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                  @error('slug')
                    <span class="invalid-feedback">Ya existe una convocatoria con el mismo nombre</span>
                  @enderror
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col">
                <div class="form-group">
                  <label for="line">Descripción corta del convocatoria *</label>
                  <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="3" placeholder="Descripción corta del convocatoria (Máximo 120 caracteres)" required>{{ old('description') ? old('description') : $call->description }}</textarea>
                  @error('description')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label for="type">Fecha de inicio *</label>
                  <input type="date" id="start_at" class="form-control @error('start_at') is-invalid @enderror" name="start_at" value="{{ old('start_at') ? old('start_at') : $call->start_at }}" required min="{{  $call->start_at < date("Y-m-d") ?  $call->start_at : date("Y-m-d") }}">
                  @error('start_at')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="type">Fecha de fin *</label>
                  <input type="date" id="finish_at" class="form-control @error('finish_at') is-invalid @enderror" name="finish_at" value="{{ old('finish_at') ? old('finish_at') : $call->finish_at }}" required>
                  @error('finish_at')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

            </div>

            <hr>

            <div class="row">

              <div class="col">
                <button type="submit" class="btn btn-warning">Actualizar convocatoria</button>
              </div>

            </div>

          </form>

        </div>

      </div>

    </div>

  </section>

@endsection
