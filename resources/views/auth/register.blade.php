@extends('auth.layouts.app')

@section('content')

  <div class="container">

    <div class="row justify-content-center">

      <div class="col-md-8 mt-5 mb-3">

        <div class="card">

          <div class="card-header">
            <h4 class="mb-0">Registro de usuarios para convocatorias</h4>
          </div>

          <div class="card-body">

            <form method="POST" action="{{ route('register') }}">

              @csrf

              <div class="row justify-content-center">
                <div class="form-group col-md-8">
                  <label for="name">Nombre completo o seudónimo</label>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nombre completo o seudónimo" required>
                  @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

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
                  <label for="email">Confirmar correo electrónico</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email_confirmation" value="{{ old('email') }}" placeholder="Confirmar correo electrónico" required>
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
                <div class="form-group col-md-8">
                  <label for="password-confirm">Confirmar contraseña</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña" required>
                </div>
              </div>

              <div class="row justify-content-center">
                <div class="col-md-8">
                  <button type="submit" class="btn btn-primary btn-block mb-3">Registrarme</button>
                </div>
                <div class="col-md-8 text-center">
                  ¿Ya tienes cuenta? <a href="{{ route('login') }}">Iniciar sesión</a>
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
