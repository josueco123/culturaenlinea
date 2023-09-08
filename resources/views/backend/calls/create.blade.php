@extends('layouts.app')

{{-- Título de la página (Título único en cada página) con máximo 3 palabras clave (Palabra principal primero) y de máximo 70 catacteres --}}
@section('page-title', 'Lorem ipsum dolor, Lorem ipsum dolor sit amet. hogaly.com')

{{-- Descripción de la página (Descripción única en cada página) con máximo 3 palabras clave (Palabra principal primero) y entre 70 y 145 catacteres --}}
@section('page-description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis soluta ex rerum at ea dolores incidunt rem! Nulla.')


@section('content')

  <header class="bg-primary py-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12 text-center text-md-left">
          <h1 class="text-white">Crear convocatoria</h1>
          <p class="lead text-light mb-0">Crear una nueva convocatoria al público</p>
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

          <form action="{{ route('backend.calls.storage') }}" method="post">

            @csrf

            <div class="row">
              <div class="col-12 col-md col-form-label text-center text-md-left mb-4">
                <h3>Formulario para la creación de la convocatoria</h3>
              </div>
            </div>

            <div class="row">

              <div class="col-md-8">
                <div class="form-group">
                  <label for="type">Nombre *</label>
                  <input type="text" id="name" class="form-control @error('name') is-invalid @enderror @error('slug') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nombre de la convocatoria * (Máximo 200 caracteres)" required>
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
                  <label for="line">Descripción corta de la convocatoria *</label>
                  <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="3" placeholder="Descripción corta de la convocatoria" required>{{ old('description') }}</textarea>
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
                  <input type="date" id="start_at" class="form-control @error('start_at') is-invalid @enderror" name="start_at" value="{{ old('start_at') ? old('start_at') : date("Y-m-d") }}" required min="{{ date("Y-m-d") }}">
                  @error('start_at')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="type">Fecha de fin *</label>
                  <input type="date" id="finish_at" class="form-control @error('finish_at') is-invalid @enderror" name="finish_at" value="{{ old('finish_at') }}" required>
                  @error('finish_at')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

            </div>

            <hr>

            <div class="row">

              <div class="col">
                <button type="submit" class="btn btn-success">Crear convocatoria</button>
              </div>

            </div>

          </form>

        </div>

      </div>

    </div>

  </section>

@endsection
