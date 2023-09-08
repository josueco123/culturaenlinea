<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <!-- Meta-Tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>@yield('page-title')</title>
  <meta name="description" content="@yield('page-description')">
  <meta name="author" content="autor">

  <link rel="canonical" href="{{ url()->current() }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Icons -->
  {{-- ........ --}}

  <!-- Styles-->
  <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
  
  <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
  
  
  <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous"/>

  @yield('style')
</head>
<body>
    
    

  @include('layouts.nav')

  @yield('content')

  @include('layouts.footer')

  {{-- @include('frontend.layouts.alerts.privacy') --}}

  @auth

    @include('auth.layouts.modals.logout')

  @endauth

  <!-- Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script type="text/javascript" src="{{ asset('js/app.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/carousel.js') }}"></script>
  
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-166087164-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-166087164-1');
</script>
  
  
  @yield('script')
</body>
</html>
