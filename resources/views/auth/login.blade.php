@extends('auth.layouts.app')

@section('content')

  <div class="container">

    <div class="row justify-content-center">

      <div class="col-md-8 mt-5 mb-3">

        <div class="card">

          <div class="card-header">
            <h4 class="mb-0">Iniciar sesión en la plataforma</h4>
          </div>

          <div class="card-body">

            <form method="POST" action="{{ route('login') }}">

              @csrf


              <div class="row justify-content-center">
                <div class="form-group col-md-8">
                  <label for="email">Correo electrónico</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo electrónico" required>
                  @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row justify-content-center">
                <div class="form-group col-md-8">
                  <label for="password">Contraseña</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required>
                  @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row justify-content-center">
                <div class="col-md-8 mb-3">
                  <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                </div>
                <div class="col-md-8 text-center mb-2">
                  ¿No tienes cuenta? <a href="{{ route('register') }}">Registrarme a convocatorias</a>
                </div>
                <div class="col-md-8 text-center">
                  ¿Olvidaste tu contraseña? <a href="{{ route('password.request') }}"> Recuperar contraseña</a>
                </div>
              </div>

            </form>

          </div>

        </div>

      </div>

      <div class="col-md-8 text-center mb-4">
        <p><img src="{{ asset('img/layout/logos.jpeg') }}" alt="Alcaldía de cali"></p>
        <span class="text-muted">Secretaría de cultura <span class="d-none d-sm-inline">|</span> <br class="d-block d-sm-none">Alcaldía de santiago de cali<br/> Todos los derechos reservados © {{ date('Y') }} </span>
      </div>

    </div>

  </div>

@endsection
