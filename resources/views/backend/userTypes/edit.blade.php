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
          <h1 class="text-white">Actualizar tipo de usuario</h1>
          <p class="lead text-light mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, explicabo.</p>
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

          <form action="{{ route('backend.userTypes.update', ['id' => $user_type->id]) }}" method="post">

            @csrf
            <input type="hidden" name="_method" value="put">

            <h4 class="text-center text-md-left mb-4">Formulario para la actualización del estímulo</h4>

            <div class="row">

              <div class="col-md-8">
                <div class="form-group">
                  <label for="type">Convocatoria </label>
                  <input type="text" id="call" class="form-control" value="{{$user_type->call->name}}" disabled>
                  <input type="hidden" name="call" value="{{$user_type->call->id}}">
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-md-8">
                <div class="form-group">
                  <label for="type">Nombre *</label>
                  <input type="text" id="name" class="form-control @error('name') is-invalid @enderror @error('slug') is-invalid @enderror" name="name" value="{{ old('name') ? old('name') : $user_type->name }}" placeholder="Nombre del tipo de usuario * (Máximo 40 caracteres)" required>
                  @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                  @error('slug')
                    <span class="invalid-feedback">Ya existe un tipo de usuario con el mismo nombre</span>
                  @enderror
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col">
                <div class="form-group">
                  <label for="line">Descripción corta del tipo de usuario *</label>
                  <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="3" placeholder="Descripción corta del tipo de usuario " required>{{ old('description') ? old('description') : $user_type->description }}</textarea>
                  @error('description')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

            </div>

            <hr>

            <div class="row">

              <div class="col">
                <button type="submit" class="btn btn-warning">Actualizar tipo de usuario</button>
              </div>

            </div>

          </form>

        </div>

      </div>

    </div>

  </section>

@endsection
