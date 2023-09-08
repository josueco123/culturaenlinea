@php
  if (Auth::user()) {
      $applications = App\Application::select('id')->where('user_id', \Auth::user()->id)->get();
      $newNotifications = App\Notification::whereIn('application_id', $applications)->where('viewed', 0)
                      ->where('title', '<>','Aplicación Calificada')
                      ->get();
  }
@endphp
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom fixed-top">
  <div class="container">
    <a class="navbar-brand" href="{{ route('frontend.index') }}">
        <img class="mr-3" src="{{ asset('img/layout/logos.jpeg') }}" alt="Alcaldía de cali"> <span class="d-none d-md-inline">Cultura <span class="font-weight-bold">en línea</span></span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

      <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ request()->is('convocatorias*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('frontend.calls.index') }}">Convocatorias</a>
        </li>
        <li class="nav-item {{ request()->is('convocatorias*') ? 'active' : '' }}">
          <a class="nav-link" href="https://agenda.culturaenlineacali.com">Agenda Cultural</a>
        </li>
        <li class="nav-item {{ request()->is('convocatorias*') ? 'active' : '' }}">
          <a class="nav-link" href="https://directorio.culturaenlineacali.com">Directorio</a>
        </li>
        <li class="nav-item {{ request()->is('convocatorias*') ? 'active' : '' }}">
          <a class="nav-link" href="http://www.editorialbonaventuriana.usb.edu.co/libros/2022/transmedia-caligrafias/index.html">Semilleros 2022</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="#">COVID-19</a>
        </li> --}}
      </ul>

      <ul class="navbar-nav ml-auto">
        @auth

          @if (isset($newNotifications) && count($newNotifications) > 0)

            <li class="nav-item dropdown">
              <a class="nav-link" href="#" data-toggle="dropdown">
                <span><i class="fas fa-bell fa-fw"></i><span class="badge badge-warning badge-sm">{{ count($newNotifications) }}</span></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right border-top-0">
                <div class="dropdown-header border-bottom pb-3 mb-2">
                  <div class="media">
                    <i class="fas fa-bell fa-fw fa-2x align-self-center text-primary mr-2"></i>
                    <div class="media-body">
                      <h6 class="font-weight-normal text-dark mb-0">Notificaciones</h6>
                      @if (count($newNotifications) > 1)
                        Tienes {{ count($newNotifications) }} notificaciones nuevas
                      @else
                        Tienes {{ count($newNotifications) }} notificación nueva
                      @endif
                    </div>
                  </div>
                </div>
                @foreach ($newNotifications as $newNotification)
                  @if ($newNotification->title == 'Aplicación Calificada')
                  @else
                    <a class="dropdown-item" href="{{ route('backend.notifications.show', ['id' => $newNotification->id]) }}">{{ $newNotification->title }}</a>
                  @endif
                @endforeach
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('backend.notifications.index') }}">Todas las notificaciones</a>
              </div>
            </li>

          @endif

          <li class="nav-item dropdown">
            <a class="nav-link" href="#" data-toggle="dropdown">
              <div class="media">
                <i class="fas fa-user fa-fw fa-lg align-self-center mr-1"></i>
                <div class="media-body">
                  <p class="font-weight-normal mb-0">{{ Auth::user()->name }}</p>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right border-top-0">
              <div class="dropdown-header border-bottom pb-3 mb-2">
                <div class="media">
                  <i class="fas fa-user fa-fw fa-2x text-primary align-self-center mr-2"></i>
                  <div class="media-body align-self-center">
                    <h6 class="font-weight-normal text-dark mb-0">{{ Auth::user()->name }}</h6>
                    {{ Auth::user()->email }}
                  </div>
                </div>
              </div>
              <a class="dropdown-item {{ request()->is('panel') ? 'active' : '' }}" href="{{ route('backend.index') }}"><i class="fas fa-grip-horizontal fa-fw mr-2"></i> Panel de control</a>
              {{-- <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#"><i class="fas fa-cog fa-fw mr-2"></i> Editar perfil</a>
              <a class="dropdown-item" href="#"><i class="fas fa-key fa-fw mr-2"></i> Cambiar contraseña</a> --}}
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalLogout"><i class="fas fa-fw fa-sign-out-alt"></i> Cerrar sesión</a>
            </div>
          </li>
        @else
          <li class="nav-item {{ request()->is('login') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('login') }} "><i class="fas fa-fw fa-sign-in-alt mr-1"></i> Iniciar sesión</a>
          </li>
          {{-- <li class="nav-item {{ request()->is('register') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('register') }} " ><i class="fas fa-fw fa-user-plus mr-1"></i> Registrarme</a>
          </li> --}}
        @endauth

      </ul>
    </div>
  </div>
</nav>
