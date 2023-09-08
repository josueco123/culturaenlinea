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
          <h1 class="text-white">Actualizar usuario</h1>
          <p class="lead text-light mb-0">Actualiza la información general del usuario</p>
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

          <form action="{{ route('backend.users.update', ['id' => $user->id]) }}" method="post">

            @csrf
            <input type="hidden" name="_method" value="put">

            <h4 class="text-center text-md-left mb-4">Formulario para la actualización del usuario</h4>

            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label for="name">Nombre completo *</label>
                  <input type="text" id="name" class="form-control @error('name') is-invalid @enderror @error('slug') is-invalid @enderror" name="name" value="{{ old('name') ? old('name') : $user->name }}" placeholder="Nombre del estímulo *" required>
                  @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="email">Correo electrónico *</label>
                  <input type="email" id="email" class="form-control @error('email') is-invalid @enderror @error('slug') is-invalid @enderror" name="email" value="{{ old('email') ? old('email') : $user->email }}" placeholder="Correo electrónico *" required>
                  @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

            </div>

            <hr>

            <div class="row">
              <div class="col-12">
                <label for="roles">Roles *</label>
              </div>
              @foreach ($roles as $role)
                <div class="col-md-6 col-xl-3">
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="role_{{ $role->id }}" class="custom-control-input @error('roles') is-invalid @enderror" name="roles[]" value="{{ $role->id }}"
                        {{ !old('roles') && in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'checked' : '' }}
                        {{ old('roles') && in_array($role->id, old('roles')) ? 'checked' : '' }}>
                      <label class="custom-control-label" for="role_{{ $role->id }}">{{ $role->name }}</label>
                    </div>
                  </div>
                </div>
              @endforeach
              @error('roles')
                <span class="col-12 text-danger small">{{ $message }}</span>
              @enderror
            </div>

            <hr>

            <div class="row">
              <div class="col-12">
                <label for="permissions">Permisos (Directos)</label>
              </div>
              @foreach ($permissions as $permission)
                <div class="col-md-6 col-xl-3">
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="permission_{{ $permission->id }}" class="custom-control-input @error('permissions') is-invalid @enderror" name="permissions[]" value="{{ $permission->id }}"
                        {{ !old('permissions') && in_array($permission->id, $user->permissions->pluck('id')->toArray()) ? 'checked' : '' }}
                        {{ old('permissions') && in_array($permission->id, old('permissions')) ? 'checked' : '' }}>
                      <label class="custom-control-label" for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                    </div>
                  </div>
                </div>
              @endforeach
              @error('permissions')
                <span class="col-12 text-danger small">{{ $message }}</span>
              @enderror
            </div>

            <hr>

            <div class="row">

              <div class="col">
                <button type="submit" class="btn btn-warning">Actualizar usuario</button>
              </div>

            </div>

          </form>

        </div>

      </div>

    </div>

  </section>

@endsection
