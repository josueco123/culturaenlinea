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
        <h1 class="text-white">Convocatorias</h1>
        <p class="lead text-light mb-0">Consulta los estímulos que se encuentran disponibles en las convocatorias</p>
      </div>
    </div>
  </div>
</header>

  <div class="container pt-5  mb-5">

    <div class="row">

      <div class="col">

        <ul class="list-group list-group-flush">

          @foreach ($calls as $call)

         

            <li class="list-group-item " style="border: 1px solid rgba(0, 0, 0, 0.125);border-radius: 0.25rem;margin: 25px;">

              <div class="row">

                <div class="col-12">

                  <div class="row">
                    <div class="col-md mb-4">
                      <h3 class="card-title"> {{ $call->name }} </h3>
                      <hr>
                      <lead class="card-subtitle mb-0 text-muted"><i class="fas fa-bullhorn"></i> - {{ $call->description }}</lead><br>
                      {{-- <lead class="card-subtitle mb-0 text-muted"><i class="far fa-calendar-alt"></i>  Fecha inicio: {{ $call->start_at }} - <i class="far fa-calendar-alt"></i> Fecha fin: {{ $call->finish_at }}</lead> --}}
                    </div>
                    <div class="col-md-auto mb-4 mb-md-0">
                      <div class="lead">
                        <span class="badge badge-info">{{ $call->incentives->count() }}</span>  Estímulos

                      </div>
                    </div>
                  </div>

                  <div class="row">
                    @php
                      $call_areas = array();
                      $call_areas_num = array();

                      foreach ($call->incentives->sortBy('area') as $incentive){

                          $call_areas[$incentive->area->id] = $incentive->area;

                          // dd($call->incentive);
                          if (!isset($call_areas_num[$incentive->area->id])){
                            $call_areas_num[$incentive->area->id] = 1;
                          }else{
                            $call_areas_num[$incentive->area->id] = $call_areas_num[$incentive->area->id] + 1;
                          }

                      }
                      // rsort($call_areas);
                    @endphp
                    @foreach ($call_areas as $id => $call_area)

                    <div class="col-12 col-lg-6 mb-4" onclick="document.getElementById('{{$call->id . "-" . $call_area->id}}').submit();" style="cursor: pointer;">
                        <div class="card h-100">
                          <div class="card-body">
                              <form id="{{$call->id . "-" . $call_area->id}}" action="{{ route('frontend.calls.call', ['slug' => $call->slug]) }}" method="post">
                                  @csrf
                                  <input type="hidden" name="areas[]" value="{{ $call_area->id }}">
                                    <div class="row">
                                      <div class="col align-self-center">
                                        <h5 class=" btn-link text-info"> {{$call_area->name}} </h5>
                                      </div>
                                      <div class="col-auto">
                                        <span class="badge badge-info  float-right">{{ $call_areas_num[ $id] }}</span>
                                      </div>
                                    </div>
                              </form>
                          </div>
                        </div>
                    </div>

                    @endforeach
                  </div>
                  {{-- <a href="{{ route('frontend.calls.call', ['slug' => $call->slug]) }}" class="btn btn-info"><h5 class="pt-2">Ver todos los estímulos</h5></a> --}}

                </div>

              </div>

            </li>

          @endforeach

        </ul>

      </div>

    </div>

  </div>

@endsection

@section('script')

  <script type="text/javascript">

      $('[data-toggle="popover"]').popover();

  </script>

@endsection
