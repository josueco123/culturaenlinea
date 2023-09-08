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
          <h1 class="text-white">Actualizar rol</h1>
          <p class="lead text-light mb-0">Actualiza la información general del rol</p>
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

          <form action="{{ route('backend.roles.update', ['id' => $role->id]) }}" method="post">

            @csrf
            <input type="hidden" name="_method" value="put">

            <h4 class="text-center text-md-left mb-4">Formulario para la actualización del rol</h4>


            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label for="type">Nombre *</label>
                  <input type="text" id="name" class="form-control @error('name') is-invalid @enderror @error('slug') is-invalid @enderror" name="name" value="{{ old('name') ? old('name') : $role->name }}" placeholder="Nombre del rol *" required>
                  @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                  @error('slug')
                    <span class="invalid-feedback">Ya existe un rol con el mismo nombre</span>
                  @enderror
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-12">
                <label for="permissions">Permisos *</label>
              </div>
              @foreach ($permissions as $permission)
                <div class="col-md-6 col-xl-3">
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="permission_{{ $permission->id }}" class="custom-control-input @error('permissions') is-invalid @enderror" name="permissions[]" value="{{ $permission->id }}"
                        {{ !old('permissions') && in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}
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
                <button type="submit" class="btn btn-warning">Actualizar rol</button>
              </div>

            </div>

          </form>

        </div>

      </div>

    </div>

  </section>

@endsection
