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
          <h1 class="text-white">Crear formulario Estimulo</h1>
          <p class="lead text-light mb-0">Crear formularios para un Estimulo</p>
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

          <form action="{{ route('estimulos.forms.storage') }}" method="post">

            @csrf

            <h4 class="text-center text-md-left mb-4">Formulario para la creación de Jurados</h4>
            <div class="row">
              <div class="col-md-12">
               @if(Session::has('error'))
                 <div class="alert alert-danger fade show rounded-0">
                    <div class="container">
                      <div class="row">
                        <div class="col-auto order-sm-2">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="col order-sm-1">
                          <strong>Error!</strong> {{ Session::get('error') }}
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
              </div>
            </div>
            <div class="row" style="display: none;">

              <div class="col-md-8">
                <div class="form-group">
                  <label for="type">Posición *</label>
                  <input type="number" id="order" class="form-control" name="order" value="{{ old('order') }}" placeholder="Posición del formulario" required readonly>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-md-8">
                <div class="form-group">
                  <label for="type">Nombre *</label>
                  <input type="text" id="name" class="form-control" name="name" value="Formulario de Jurados" placeholder="Nombre del formulario" required readonly>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col">
                <div class="form-group">
                  <label for="line">Descripción corta del formulario </label>
                  <textarea id="description" class="form-control" name="description" rows="3" placeholder="Descripción corta del formulario" >{{ old('description') }}</textarea>
                </div>
              </div>

            </div>

            <div class="row" style="display:none;">
              <div class="col-12">
                <label for="">Estimulo ID *</label>
              </div>
              <input type="text" class="form-control" value="{{ $incentive->id }}" name="incentive" id="incentive">
            </div>

            <div class="row" style="display:none;">
              <div class="col-12">
                <label for="user_types">Tipos de usuarios *</label>
              </div>
              @foreach ($user_types as $user_type)
                <div class="col-md-6 col-xl-4">
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="user_type_{{ $user_type->id }}" class="custom-control-input @error('user_types') is-invalid @enderror" name="user_types_field[]" value="{{ $user_type->id }}"  checked="true">
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
                <button type="submit" class="btn btn-success">Crear formulario</button>
              </div>

            </div>

          </form>

        </div>

      </div>

    </div>

  </section>

@endsection
