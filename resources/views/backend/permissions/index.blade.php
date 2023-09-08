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
          <h1 class="text-white">Permisos de la aplicación</h1>
          <p class="lead text-light mb-0">Consulta todos los permisos de la aplicación</p>
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

            <div class="col-12 col-sm col-form-label text-center text-sm-left">
              <span class="lead">Permisos creados: <span class="font-weight-bold">{{ count($permissions) }}</span></span>
            </div>

          </div>

          <div class="row m-4">

            @foreach ($permissions as $permission)

                <div class="col-12 col-xl-3" style="border: 1px solid #dddddd;padding: 10px; ">
                  {{ $permission->name }}
                </div>

            @endforeach

          </div>

        </div>

      </div>

    </div>

  </section>

@endsection
