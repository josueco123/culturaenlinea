@extends('layouts.app')

{{-- Título de la página (Título único en cada página) con máximo 3 palabras clave (Palabra principal primero) y de máximo 70 catacteres --}}
@section ('page-title', 'Alcaldía de santiago de cali - Secretaría de cultura')

{{-- Descripción de la página (Descripción única en cada página) con máximo 3 palabras clave (Palabra principal primero) y entre 70 y 145 catacteres --}}
@section('page-description', 'Alcaldía de santiago de cali - Secretaría de cultura')


@section('content')

  <header class="content py-0 py-md-5">
    <div class="container py-3 h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="font-weight-bold display-4 text-white mt-5 mb-2">Panel de control</h1>
          <p class="lead mb-5 text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque laborum dolorem temporibus aliquam molestiae quisquam.</p>
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

          <details>
            <summary>Some details</summary>
            <p>More info about the details.</p>
          </details>

        </div>

      </div>

    </div>

  </section>

@endsection
