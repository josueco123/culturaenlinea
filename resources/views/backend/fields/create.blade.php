@extends('layouts.app')

{{-- Título de la página (Título único en cada página) con máximo 3 palabras clave (Palabra principal primero) y de máximo 70 catacteres --}}
@section ('page-title', 'Alcaldía de santiago de cali - Secretaría de cultura')

{{-- Descripción de la página (Descripción única en cada página) con máximo 3 palabras clave (Palabra principal primero) y entre 70 y 145 catacteres --}}
@section('page-description', 'Alcaldía de santiago de cali - Secretaría de cultura')

@section('style')

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">

@endsection

@section('content')

  <header class="bg-primary py-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12 text-center text-md-left">
          <h1 class="text-white">Crear campo</h1>
          <p class="lead text-light mb-0">Crear campo para un formulario</p>
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

          <form action="{{ route('backend.fields.storage') }}" method="post">

            @csrf

            <h4 class="text-center text-md-left mb-4">Formulario para la creación de campos</h4>
            <input type="hidden" name="call" value="{{$call}}">
            <input type="hidden" name="idusertypes" value="{{$idusertypes}}">

            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="type">Formulario </label>
                  <input type="text" class="form-control" value="{{$form->name}}" disabled>
                  <input type="hidden" name="form" value="{{$form->id}}">
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="type">Posición *</label>
                  <input type="number" id="order" class="form-control" name="order" value="{{ old('order') }}" placeholder="Posición del formulario" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="type">Nombre *</label>
                  <input type="text" id="name" class="form-control" name="label" value="{{ old('label') }}" placeholder="Nombre del campo" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="type">Identificador de la aplicación (Solo seleccionar para definir como identificador) *</label>
                  <select  class="custom-select" name="identification">
                    <option value="0">No</option>
                    <option value="1">Sí</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="type">Campo obligatorio *</label>
                  <select  class="custom-select" name="required">
                    <option value="0">No</option>
                    <option value="1">Sí</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="type">Tipo de campo *</label>
                  <select id="type" class="custom-select" name="type">
                    <option value="" selected>Seleccionar</option>
                    <option value="text">Campo de texto</option>
                    <option value="textarea">Campo de texto Largo</option>
                    <option value="radio">Radio</option>
                    <option value="select">Lista</option>
                    <option value="date">Fecha</option>
                    <option value="number">Número</option>
                    <option value="email">Correo</option>
                    <option value="file">Archivo</option>
                    <option value="participantes">Participantes</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row" id="options" style="display:none">
              <div class="col">
                <div class="form-group">
                  <label for="line">Opciones del campo, separadas por coma (,) *</label>
                  <textarea class="form-control" name="options" rows="3" placeholder="Opciones">{{ old('description') }}</textarea>
                </div>
              </div>
            </div>

            <div class="row" id="accept" style="display:none">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="type">Archivos permitidos *</label>
                  <input type="text" class="form-control" name="accept" value="{{ old('accept') }}" placeholder="Archivos permitidos">
                </div>
              </div>
            </div>

            <div class="row"  id="size" style="display:none">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="type">Tamaño del archivo *</label>
                  <select class="custom-select" name="size">
                    <option value="0">N/A</option>
                    <option value="10485760">10 mb</option>
                    <option value="20971520">20 mb</option>
                    <option value="52428800">50 mb</option>
                    <option value="104857600">100 mb</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row"  id="sizeTextarea" style="display:none">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="type">Cantidad de caracteres <b style="color: #D30404">*</b></label>
                  <input type="number" class="form-control" name="sizetextarea" placeholder="cantidad maxima de caracteres (10000)">
                </div>
              </div>
            </div>

            <div class="row"  id="sizeText" style="display:none">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="type">Cantidad de caracteres <b style="color: #D30404">*</b></label>
                  <input type="number" class="form-control" name="sizetext" max="150" placeholder="cantidad maxima de caracteres (150)">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label>Descripción del campo *</label>
                  <textarea id="" class="form-control @error('description') is-invalid @enderror" name="description" rows="6" placeholder="Información general del estímulo *">{{ old('description') }}</textarea>
                </div>
              </div>
            </div>

            <hr>

            <div class="row">

              <div class="col">
                <button type="submit" class="btn btn-success">Crear campo</button>
              </div>

            </div>

          </form>

        </div>

      </div>

    </div>

  </section>

@endsection

@section('script')

  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>

  <script type="text/javascript">

    $(document).ready( function () {
      $('#summernote').summernote({
        height: 200,
        placeholder: 'Información general del estímulo'
      });

      $("#type").on("change", function(){

          $('#options').hide();
          $('#accept').hide();
          $('#size').hide();
          $('#sizeTextarea').hide();
          $('#sizeText').hide();


          if ($(this).val() == 'radio' || $(this).val() == 'select'){
              $('#options').show();
          }
          if ($(this).val() == 'file'){
              $('#accept').show();
              $('#size').show();
          }
          if ($(this).val() == 'textarea') {
              $('#sizeTextarea').show();
              // alert('entro');
          }
          if ($(this).val() == 'text') {
              $('#sizeText').show();
          }


      });


    });

  </script>

@endsection
