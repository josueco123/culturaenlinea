<div class="col-12 animated fadeIn">
  <h4 class="my-4 mt-xl-0" >Estímulos encontrados: <span class="font-weight-bold">{{ $call->incentives->count() }}</span></h4>
</div>

<div class="col-12 animated fadeIn">

  <ul class="list-unstyled">

    @forelse ($call->incentives as $incentive)

      <li class=" ">

        <div class="card mb-4">
          <div class="card-body">
              <div class="row">
                  <div class="col align-self-center">
                      <h5 class="mt-0 mb-1"> {{ $incentive->code }} - {{ $incentive->name }}</h5>
                  </div>
                  <div class="col-auto ">
                      @if(strtotime($incentive->start_at) < strtotime(date("d-m-Y H:i:00",time()))
                        && strtotime(date("d-m-Y H:i:00",time())) <= strtotime($incentive->finish_at) + 86400 )
                        <spam class="text-muted">  Abierto <h4><i class="fas fa-folder-open float-right "></i></h4></spam>
                      @else
                        <spam class="text-muted"> Cerrado <h4><i class="fas fa-lock float-right "></i></h4></spam>
                      @endif
                  </div>
              </div>
          </div>
            <div class="card-footer ">
            <div class="row">
              <div class="col align-self-center">
                @foreach ($user_types as $user_type)
                  @if (in_array($user_type->id, $incentive->user_types->pluck('id')->toArray()))<span class="badge badge-info py-1 px-2">{{ $user_type->name }}</span>@endif
                @endforeach
                @foreach ($areas as $area)
                  @if ($area->id == $incentive->area_id)<span class="badge badge-success py-1 px-2">{{ $area->name }}</span>@endif
                @endforeach
              </div>
              <div class="col-auto">
                <a href="{{ route('frontend.call.incentive', ['call_slug' => $slug, 'incentive_slug' => $incentive->slug]) }}" class="btn btn-primary">Ver estímulo</a>
              </div>
            </div>
          </div>
        </div>

      </li>

    @empty

      <div class="alert alert-info animated fadeIn mx-5">
        <h4 class="alert-heading">Sin resultados!</h4>
        <p>Lo sentimos, no hemos logrado encontrar un estímulo con los filtros aplicados.</p>
      </div>

    @endforelse

  </ul>

</div>
