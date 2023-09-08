@extends('layouts.app')

{{-- Título de la página (Título único en cada página) con máximo 3 palabras clave (Palabra principal primero) y de máximo 70 catacteres --}}
@section ('page-title', $call->name . ' - Alcaldía de santiago de cali - Secretaría de cultura')

{{-- Descripción de la página (Descripción única en cada página) con máximo 3 palabras clave (Palabra principal primero) y entre 70 y 145 catacteres --}}
@section('page-description', $call->name . '' . $call->description)

@section('content')

  <header class="bg-primary py-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12 text-center text-md-left">
          <h1 class="text-white">{{ $call->name }}</h1>
          <p class="lead text-light mb-0">{{ $call->description }}</p>
        </div>
      </div>
    </div>
  </header>

    <div class="container pt-5  mb-5">

      <div class="row">

        <div class="col-12 col-lg-5 col-xl-3">

          <div class="sticky-top mb-6 mb-lg-0 w-100">

            @include('layouts.sidebar')

          </div>

        </div>

        <div class="col-12 col-lg-7 col-xl-9">

          <div id="load" class="row">

            @include('frontend.calls.load')

          </div>

        </div>

      </div>

    </div>


@endsection


@section('script')
  <script type="text/javascript">

    // Ajax para los filtros
    $('body').on('change', '.custom-control-input', function() {

      $('body, html').animate({
        scrollTop: '0px'
      }, 200);

      setTimeout (function() {

        $('#filters').submit( function(event) {
          event.preventDefault();
        });

        var url = $(this).attr('href');
        var data = $('#filters').serialize();

        $.post(url, data, function (result) {
          $('#load').html(result);
        })

      }, 200);

    });

  </script>
@endsection
