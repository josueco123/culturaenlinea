@extends('layouts.app')

{{-- Título de la página (Título único en cada página) con máximo 3 palabras clave (Palabra principal primero) y de máximo 70 catacteres --}}
@section ('page-title', 'Alcaldía de santiago de cali - Secretaría de cultura')

{{-- Descripción de la página (Descripción única en cada página) con máximo 3 palabras clave (Palabra principal primero) y entre 70 y 145 catacteres --}}
@section('page-description', 'Alcaldía de santiago de cali - Secretaría de cultura')

@section('content')
<link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
<section id="container-slider">	
   <a href="javascript: fntExecuteSlide('prev');" class="arrowPrev"><i class="fas fa-chevron-circle-left"></i></a>
   <a href="javascript: fntExecuteSlide('next');" class="arrowNext"><i class="fas fa-chevron-circle-right"></i></a>
   <ul class="listslider">
     <li><a itlist="itList_0" href="#" class="item-select-slid"></a></li>
     <li><a itlist="itList_1" href="#"></a></li>
     <li><a itlist="itList_2" href="#"></a></li>
   </ul>
   <ul id="slider">
     <li style="background-image: url('https://www.culturaenlineacali.com/img/layout/BANNER-FITCALI-CONVOCATORIA-LOCAL.jpg'); z-index:0; opacity: 1;">
       <div class="content_slider" >
         <div>
          
	   <a href="https://www.cali.gov.co/cultura/publicaciones/176050/seleccionados-19-grupos-locales-para-el-festival-internacional-de-teatro/" target=”_blank” class="btnSlider">Ver más</a>
	 </div>
       </div>
     </li>
     <li style="background-image: url('https://www.culturaenlineacali.com/img/layout/3-Cabezote_de _salsa.jpg'); ">
       <div class="content_slider" >
         <div>
          
	   <a href="https://fms2023.culturaenlineacali.com/" target=”_blank” class="btnSlider">Ver más</a>
	 </div>
       </div>
     </li>
     <li style="background-image: url('https://www.culturaenlineacali.com/img/layout/BANNER-PETRONIO-2023.jpg'); ">
       
	 </div>
       </div>
     </li>
  </ul>
</section>

<section class="py-0 pt-md-5">
  <div class="container pt-3">
    <div class="row align-items-xl-end align-items-md-end">
      <div class="col-12 col-lg-6">
        <br> <img class="img-fluid" src="{{ asset('img/layout/la-cultura-de-cali-2022.jpg') }}" alt="Convocatoria unidos por la vida">
      </div>
      <div class="col-12 col-lg-6 text-center text-lg-left pb-2">
        <h2 class="font-weight-bold display-5 mt-5 mb-4" SIZE=7>La cultura de Cali <br>llega a lo digital</h2>
        <p>Está pensada en tres (3) etapas:</p>
          
<p>1.	Pegáte al movimiento: Convoca a los artistas de la ciudad para participar en varias líneas de financiación de sus producciones artísticas: Estímulos, Concertación, Ley de Espectáculos públicos y plan de Choque de circulación. En esta primera etapa, los artistas podrán acceder a una especie de bolsa de recursos públicos que abarcarán a las distintas disciplinas del arte y la cultura </p>
          
        <p>2.	Cali Se Mueve: comenzarán a entregarse los resultados de las convocatorias, pero además se dará inicio al plan de circulación de choque, en el que artistas de la ciudad tendrán presentaciones garantizadas en centros comerciales, restaurantes, hoteles, bares, y parques públicos de la ciudad.</p>
          
        <p>3.  Movéte que estamos en Festival será dedicada a la Temporada de Festivales de Cali. Conectar con el mundo desde la oferta cultural de la ciudad y proporcionar un mensaje de confianza y de apropiación biosegura de los espacios culturales. Aporta a la reactivación económica del sector. </p>
      </div>
    </div>
  </div>
</section>

<section class="content__red py-5">
  <div class="container py-3 py-md-5">
    <div class="row justify-content-center">
      <div class="col-xl-8 py-md-5 text-light text-center">
        <h2 class="font-weight-bold display-4 mb-4">Plan de Reactivación Económica <br>del sector cultura <br>'Cali se mueve'</h2>
      </div>
    </div>
  </div>
</section>

<section class="py-0 py-md-5">
  <div class="container py-3">
    <div class="row align-items-center">
      <div class="col-12 col-lg-6 text-center text-lg-right">
        <h2 class="font-weight-bold display-4 mb-4">Sistema General de <br> Convocatorias <br> "Pégate al movimiento" </h2>
        <p class="mb-4">Desde la secretaría de cultura se han desarrollado estrategias y dinámicas de trabajo en conjunto que permitan facilitar y modernizar la aplicación de los artistas a las diferentes convocatorias ofrecidas por este organismo. Con el fin de atender al sector cultural en sus proyectos, iniciativas y creaciones. Todo esto con el fin de impulsar a que artistas, portadores y gestores puedan fortalecer sus labores.</p>
        <a href="https://culturaenlineacali.com/convocatorias" class="btn btn-info btn-lg mb-5 mb-lg-0">Ver convocatorias</a>
      </div>
      <div class="col-12 col-lg-6 text-center">
        <img class="img-fluid" src="{{ asset('img/layout/pegate-al-movimiento-2023.png') }}" alt="Convocatoria unidos por la vida">
      </div>
    </div>
  </div>
</section>

<section class="content__blue py-0 py-md-5">
  <div class="container py-3">
    <div class="row align-items-center">
      
      <div class="col-12 col-lg-6 py-5">
        <img class="img-fluid" src="{{ asset('img/layout/cultura-en-linea-2022.png') }}" alt="Convocatoria unidos por la vida">
      </div>
      <div class="col-12 col-lg-6 text-center text-lg-left text-light">
        <h2 class="font-weight-bold display-4 mb-4">Estrategias <br>que nos conectan</h2>
        <p class="mb-4">Cultura Viral, nace como una estrategia de circulación y visibilización para los artistas, consolidándose como un programa online transmitido por el fan page de la Secretaría de Cultura, el cual cuenta con contenidos culturales, pedagógicos, artísticos y de memoria en el marco de las estrategias de prevención propuestas por la Alcaldía de Santiago de Cali.</p>
 
<p>Como plataforma de contenidos, Cultura Viral  es un espacio solidario en el que los artistas pueden elevar su voz en favor de una causa común, donde ellos desde su lenguaje artístico pueden llegar a las comunidades a enviar mensajes de prevención, para así mitigar las secuelas de la crisis actual y continuar conectados al público. </p>
      </div>
    </div>
  </div>
</section>



@endsection

@section('script')

  <script type="text/javascript">

      $('[data-toggle="popover"]').popover();

  </script>

@endsection