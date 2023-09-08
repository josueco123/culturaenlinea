@extends('layouts.app') {{-- Título de la página (Título único en cada página) con máximo 3 palabras clave (Palabra principal primero) y de máximo 70 catacteres --}} @section ('page-title', 'Lorem ipsum dolor, Lorem ipsum dolor sit amet. hogaly.com') {{-- Descripción de la página (Descripción única en cada página) con máximo 3 palabras clave (Palabra principal primero) y entre 70 y 145 catacteres --}} @section('page-description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis soluta ex rerum at ea dolores incidunt rem! Nulla.') @section('content')

  <header class="bg-primary py-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12 text-center text-md-left">
          <h1 class="text-white">Proceso de aplicación</h1>
          <p class="lead text-light mb-0">{{ $incentive->name }}, {{ $user_type->name }}</p>
        </div>
      </div>
    </div>
  </header>

<div class="container">

      <div class="row mt-3">
       <div class="col-md-12">
           <div class="card mt-3 mb-5">
             <div class="card-body">
               <h5 class="mt-0 mb-1">Aplicaciones a convocatorias</h5>

               <hr class="ml-0 w-15">


               <div class="row m-3">

                   @if ($application->status->id > 1)
                     <div class="col-md-2 p-3">
                         <h5 class="mt-0 mb-1">Código de aplicación:</h5>
                     </div>
                     <div class="col-md-10 p-3">
                       <h5 class="mt-0 mb-1">{{$application->code}}</h5>
                     </div>
                   @endif

                   <div class="col-md-2 p-3">
                       <h5 class="mt-0 mb-1">Área:</h5>
                   </div>
                   <div class="col-md-10 p-3">
                     <h5 class="mt-0 mb-1">{{$application->incentive->area->name}}</h5>
                   </div>
                   <div class="col-md-2 p-3">
                     <h5 class="mt-0 mb-1">Estimulo:</h5>
                   </div>
                   <div class="col-md-10 p-3">
                     <h5 class="mt-0 mb-1">{{$application->incentive->name}}</h5>
                   </div>
                   <div class="col-md-2 p-3">
                     <h5 class="mt-0 mb-1">Tipo de usuario:</h5>
                   </div>
                   <div class="col-md-10 p-3">
                     <h5 class="mt-0 mb-1">{{$application->user_type->name}}</h5>
                   </div>
                   <div class="col-md-2 p-3" >
                     <h5 class="mt-0 mb-1">Estado aplicación:</h5>
                   </div>
                   <div class="col-md-10 p-3">
                     <h5 class="badge badge-{{ $application->status->color }} py-3 px-4">{{$application->status->name}}</h5>
                   </div>

               </div>
             </div>

             @if ($application->status->id == 1 || $application->status->id == 3)
               <div class="card-footer">
                   <a href=" {{ route('backend.postulations.form', [ 'incentive_slug' => $application->incentive->slug, 'userType_slug' => $user_type->slug ]) }} " class="btn btn-primary btn-lg float-right">Continuar</a>
               </div>
             @else
               <div class="card-footer">
                   <small class="text-muted">* Recuerde que solo puede aplicar a un estimilo por convocatoría.</small>
               </div>
             @endif

           </div>
       </div>
    </div>

</div>

@endsection @section('script')

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>

@endsection
