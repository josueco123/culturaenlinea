@if (request()->is('convocatorias*'))

  <form id="filters" action="{{ route('frontend.calls.call', ['slug' => $slug]) }}" method="post">

    {{ csrf_field() }}

    <div class="row">
      <div class="col">
        <div class="card w-100 mt-1">
          <div class="card-body">
            <div class="col-12">
              <h5 class="mt-0">Área</h5>
              <hr class="ml-0 w-15 mb-0">
            </div>
            <div class="col">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  @foreach ($areas as $area)
                    <div class="custom-control custom-checkbox pt-2">
                      <input type="checkbox" id="area_{{ $area->id }}" class="custom-control-input" name="areas[]" value="{{ $area->id }}"
                      @if (isset($_POST['areas']) && in_array($area->id, $_POST['areas'])) checked @endif
                      >
                      <label class="custom-control-label" for="area_{{ $area->id }}">{{ $area->name }}</label>
                    </div>
                  @endforeach
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="card w-100 mt-5">
          <div class="card-body">
              <div class="col-12">
                <h5 class="mt-0">Tipo de usuario</h5>
                <hr class="ml-0 w-15 mb-0">
              </div>
              <div class="col">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    @foreach ($user_types as $user_type)
                      <div class="custom-control custom-checkbox  pt-2">
                        <input type="checkbox" id="user_type_{{ $user_type->id }}" class="custom-control-input" name="user_types[]" value="{{ $user_type->id }}"
                        @if (isset($_POST['user_types']) && in_array($user_type->id, $_POST['user_types'])) checked @endif
                        >
                        <label class="custom-control-label" for="user_type_{{ $user_type->id }}">{{ $user_type->name }}</label>
                      </div>
                    @endforeach
                  </li>
                </ul>
              </div>
            </div>
          </div>
      </div>
    </div>

  </form>

@endif

@if (request()->is('panel*'))

  <div class="accordion card" id="backendMenu">

    <div class="list-group list-group-flush">

      @role('administrador|gestor-administrativo')
      <a href="{{ route('backend.index') }}" class="list-group-item list-group-item-action {{ request()->is('panel') ? 'active' : '' }}">
        <i class="fas fa-tachometer-alt fa-fw mr-1"></i> Panel de control
      </a>
      @endrole

      @role('administrador')
        <a href="#" class="list-group-item list-group-item-action  d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#access">
          <span><i class="fas fa-key fa-fw mr-1"></i> Gestión de usuarios</span>
          <i class="fas fa-angle-down text-primary"></i>
        </a>

        <div id="access" class="collapse {{ request()->is('panel/usuarios*') || request()->is('panel/permisos*') || request()->is('panel/roles*') ? 'show' : ''}}" data-parent="#backendMenu">

          <a href="{{ route('backend.users.index') }}" class="list-group-item list-group-item-action pl-5 {{ request()->is('panel/usuarios') ? 'active' : '' }}">
            <i class="fas fa-users fa-fw mr-1"></i> Usuarios
          </a>

          <a href="{{ route('backend.roles.index') }}" class="list-group-item list-group-item-action pl-5 {{ request()->is('panel/roles') ? 'active' : '' }}">
            <i class="fas fa-user-tag fa-fw mr-1"></i> Roles
          </a>

          <a href="{{ route('backend.permissions.index') }}" class="list-group-item list-group-item-action pl-5 {{ request()->is('panel/permisos') ? 'active' : '' }}">
             <i class="fas fa-user-lock fa-fw mr-1"></i> Permisos
          </a>

        </div>
      @endrole

      @permission('leer-convocatorias')


        <a href="#" class="list-group-item list-group-item-action  d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#calls">
          <span><i class="fas fa-bullhorn fa-fw mr-1"></i> Gestión convocatorias</span>
          <i class="fas fa-angle-down text-primary"></i>
        </a>

        <div id="calls" class="collapse {{request()->is('panel/convocatorias*') ||   request()->is('panel/areas*') || request()->is('panel/lineas-de-accion*') ||  request()->is('panel/formularios*') || request()->is('panel/tipos-de-usuario*') ? 'show' : ''}}" data-parent="#backendMenu">

          <a href="{{ route('backend.calls.index') }}" class="list-group-item list-group-item-action pl-5 {{ request()->is('panel/convocatorias') ? 'active' : '' }}">
            <i class="fas fa-calendar fa-fw mr-1"></i> Convocatorias
          </a>

          @permission('leer-tipos-de-usuario')
            <a href="{{ route('backend.userTypes.index') }}" class="list-group-item list-group-item-action pl-5  {{ request()->is('panel/tipos-de-usuario') ? 'active' : '' }}">
              <i class="fas fa-users fa-fw mr-1"></i> Tipos de usuario
            </a>
          @endpermission

          @permission('leer-formularios')
            <a href="{{ route('backend.forms.index') }}" class="list-group-item list-group-item-action pl-5 {{ request()->is('panel/formularios*') ? 'active' : '' }}">
              <i class="fas fa-list-ol fa-fw mr-1"></i> Formularios
            </a>
          @endpermission

          @permission('leer-areas')
            <a href="{{ route('backend.areas.index') }}" class="list-group-item list-group-item-action pl-5 {{ request()->is('panel/areas') ? 'active' : '' }}">
              <i class="fas fa-layer-group fa-fw mr-1"></i> Áreas
            </a>
          @endpermission

          @permission('leer-lineas-de-accion')
            <a href="{{ route('backend.linesAction.index') }}" class="list-group-item list-group-item-action pl-5 {{ request()->is('panel/lineas-de-accion') ? 'active' : '' }}">
              <i class="fas fa-grip-lines fa-fw mr-1"></i> Líneas de acción
            </a>
          @endpermission

        </div>

      @endpermission

      @permission('leer-estimulos')

        <a href="#" class="list-group-item list-group-item-action  d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#incentives">
          <span><i class="fas fa-hand-holding-heart fa-fw mr-1"></i> Gestión estímulos</span>
          <i class="fas fa-angle-down text-primary"></i>
        </a>

        <div id="incentives" class="collapse {{ request()->is('panel/estimulos*') || request()->is('panel/criteria*') || request()->is('panel/tipos-de-estimulo*') || request()->is('panel/areas*') || request()->is('panel/lineas-de-accion*') ||  request()->is('panel/formularios*') || request()->is('panel/tipos-de-usuario*') ? 'show' : ''}}" data-parent="#backendMenu">

          <a href="{{ route('backend.incentives.index') }}" class="list-group-item list-group-item-action pl-5 {{ request()->is('panel/estimulos') ? 'active' : '' }}">
            <i class="fas fa-heart fa-fw mr-1"></i> Estímulos
          </a>
        @permission('leer-formularios-estimulos')
          <a href="{{ route('estimulos.forms.index')  }}" class="list-group-item list-group-item-action pl-5 {{ request()->is('panel/estimulos/formularios*') ? 'active' : '' }}">
            <i class="fas fa-list-ol fa-fw mr-1"></i> Formulario Estimulo
          </a>
        @endpermission
          <a href="{{ route('backend.criteria.index') }}" class="list-group-item list-group-item-action pl-5 {{ request()->is('panel/criteria*') ? 'active' : '' }}">
            <i class="fas fa-clipboard fa-fw mr-1"></i> Criterios estímulo
          </a>

          @permission('leer-tipos-de-estimulo')
            <a href="{{ route('backend.incentiveTypes.index') }}" class="list-group-item list-group-item-action pl-5 {{ request()->is('panel/tipos-de-estimulo') ? 'active' : '' }}">
               <i class="fas fa-trophy fa-fw mr-1"></i> Tipos de estímulo
            </a>
          @endpermission



        </div>

      @endpermission

      <a href="#" class="list-group-item list-group-item-action  d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#applications">
        <span><i class="fas fa-share-square fa-fw mr-1"></i> Gestión de aplicaciones</span>
        <i class="fas fa-angle-down text-primary"></i>
      </a>

      <div id="applications" class="collapse {{ request()->is('panel/aplicaciones*') || request()->is('panel/export-aplicaciones*') || request()->is('panel/calificar-aplicaciones*') || request()->is('panel/jurados*')  ? 'show' : ''}}" data-parent="#backendMenu">

        @permission('leer-aplicaciones')
          <a href="{{ route('backend.applications.index') }}" class="list-group-item list-group-item-action pl-5 {{ request()->is('panel/aplicaciones*') ? 'active' : '' }}">
            <i class="fas fa-check fa-fw mr-1"></i> Gestionar aplicaciones
          </a>

          <a href="{{ route('backend.applications.export') }}" class="list-group-item list-group-item-action pl-5 {{ request()->is('panel/export-aplicaciones*') ? 'active' : '' }}">
            <i class="fas fa-file-download fa-fw mr-1"></i> Exportar aplicaciones
          </a>

        @endpermission

        @permission('calificar-aplicaciones')
          <a href="{{ route('backend.gradeApplications.index') }}" class="list-group-item list-group-item-action pl-5 {{ request()->is('panel/calificar-aplicaciones*') ? 'active' : '' }}">
            <i class="fas fa-clipboard fa-fw mr-1"></i> Calificar aplicaciones
          </a>
        @endpermission

        @permission('asignar-juez')
        <a href="{{ route('backend.judges.index') }}" class="list-group-item list-group-item-action pl-5 {{ request()->is('panel/jurados*') ? 'active' : '' }}">
            <i class="fas fa-user-graduate fa-fw mr-1"></i> Asignar jurados
        </a>
        @endpermission

      </div>


      @role('aspirante-a-estimulo')

        <a href="{{ route('backend.myAplications.index') }}" class="list-group-item list-group-item-action {{ request()->is('panel/mis-aplicaciones*') ? 'active' : '' }}">
          <i class="fas fa-check fa-fw mr-1"></i> Mis aplicaciones
        </a>

        <a href="{{ route('backend.notifications.index') }}" class="list-group-item list-group-item-action {{ request()->is('panel/notificaciones') ? 'active' : '' }}">
          <i class="far fa-comment-alt fa-fw mr-1"></i> Notificaciones
        </a>

      @endrole

    </div>

  </div>

@endif
