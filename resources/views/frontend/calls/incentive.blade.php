@extends('layouts.app') {{-- Título de la página (Título único en cada página) con máximo 3 palabras clave (Palabra principal primero) y de máximo 70 catacteres --}} @section ('page-title', 'Alcaldía de santiago de cali - Secretaría de
cultura') {{-- Descripción de la página (Descripción única en cada página) con máximo 3 palabras clave (Palabra principal primero) y entre 70 y 145 catacteres --}} @section('page-description', $incentive->code . ' - ' . $incentive->name)
@section('content')

  <header class="bg-primary py-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12 text-center text-md-left">
          <h1 class="text-white">Información del estímulo</h1>
          <p class="lead text-light mb-0">{{ $incentive->code }} - {{ $incentive->name }}</p>
        </div>
      </div>
    </div>
  </header>

<div class="container pt-5 mb-5">

    @if ($incentive->information != '')
        <div class="row">
            <div class="col mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        {!! $incentive->information !!}
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="mb-0">Area de aplicación</h4>
                    <hr />
                    <h5>{{ $incentive->area->name }}</h5>
                    {{ $incentive->area->description }}
                </div>
            </div>
        </div>

        <div class="col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="mb-0">Tipo de incentivo</h4>
                    <hr />
                    <h5>{{ $incentive->type->name }}</h5>
                    {{ $incentive->type->description }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="mb-0">Línea de acción</h4>
                    <hr />
                    <h5>{{ $incentive->line_action->name }}</h5>
                    {{ $incentive->line_action->description }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="mb-0">Público objetivo</h4>
                    <hr />
                    @foreach ($incentive->user_types as $user_type)
                    <h5>{{ $user_type->name }}</h5>
                    <p>{{ $user_type->description }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="mb-0">Información general</h4>
                    <hr />
                    {!! $incentive->description !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 col-lg-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="mb-0">Valor</h4>
                    <hr />
                    <span class="lead">{{ $incentive->value }} <small>COP</small></span>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="mb-0">Cantidad</h4>
                    <hr />
                    <span class="lead">{{ $incentive->quantity }} Estímulos</span>
                </div>
            </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="mb-0">Apertura convocatoria</h4>
                    <hr />
                    <span class="lead">{{ $incentive->start_at }}</span>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="mb-0">Cierre Convocatoria</h4>
                    <hr />
                    <span class="lead">{{ $incentive->finish_at }}</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="mb-0">Ejecución inicio</h4>
                    <hr />
                    <span class="lead">{{ $incentive->execution_start }}</span>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="mb-0">Ejecución fin</h4>
                    <hr />
                    <span class="lead">{{ $incentive->execution_finish }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row text-center text-md-left">
                        <div class="col-md align-self-center mb-4 mb-md-0">
                            <span class="h4 m-0">¿Estas listo para aplicar a este estímulo?</span>
                        </div>

                        <div class="col-md-auto">
                            @if(strtotime($incentive->start_at) < strtotime(date("d-m-Y H:i:00",time())) && strtotime(date("d-m-Y H:i:00",time())) <= strtotime($incentive->finish_at) + 86400)

                            <p class="lead">Aplicar como:</p>
                            @foreach ($incentive->user_types as $user_type) @auth
                            <a href=" {{ route('backend.postulations.form', [ 'incentive_slug' => $incentive->slug, 'userType_slug' => $user_type->slug ]) }} " class="btn btn-primary btn-lg">{{ $user_type->name }}</a>
                            @else
                            <a href=" {{ route('login', [ 'redirect_to' => route('backend.postulations.form', [ 'incentive_slug' => $incentive->slug, 'userType_slug' => $user_type->slug ]) ]) }} " class="btn btn-primary btn-lg">
                                {{ $user_type->name }}
                            </a>
                            @endauth @endforeach @else
                            <spam class="text-muted">
                                Cerrado
                                <h2><i class="fas fa-lock float-right"></i></h2>
                            </spam>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection @section('script')

<script type="text/javascript">
    $('[data-toggle="popover"]').popover();
</script>

@endsection
