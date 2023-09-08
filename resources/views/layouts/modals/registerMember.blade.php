<div class="modal fade" id="modalIncentiveShow" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Registrar participante</h4>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <form class="" action="{{ route('backend.postulations.registerMember') }} " method="post">

              <input type="hidden" name="application_id" value="{{$application_id}}">
              <input type="hidden" name="incentive_id" value="{{$incentive->id}}">
              <input type="hidden" name="user_type_id" value="{{$user_type->id}}">

              @csrf
              <div class="row">
                  <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
                      <div class="form-group m-0">
                          <label for="first_name">Nombres <span class="text-danger">*</span> </label>
                          <input type="text" class="form-control ml-3 mr-3" name="first_name" placeholder="Nombres" required="" />
                      </div>
                  </div>

                  <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
                      <div class="form-group m-0">
                          <label for="last_name">Apellidos <span class="text-danger">*</span> </label>
                          <input type="text" class="form-control ml-3 mr-3" name="last_name" placeholder="Apellidos" required="" />
                      </div>
                  </div>

                  <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
                      <div class="form-group m-0">
                          <label for="id_type">Tipo de identificación <span class="text-danger">*</span> </label>
                          <select class="custom-select ml-3 mr-3" name="id_type" required="">
                              <option value="" selected="" disabled="">Seleccione tipo de identificación</option>
                              <option>Cédula de Ciudadanía</option>
                              <option>Cédula de Extranjería</option>
                              <option>Pasaporte</option>
                          </select>
                      </div>
                  </div>

                  <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
                      <div class="form-group m-0">
                          <label for="id_number">Número de Identificación <span class="text-danger">*</span> </label>

                          <br />
                          <label class="label-description ml-3 mr-3">Digite el número de identificación sin puntos comas o dígitos de verificación</label>
                          <input type="text" class="form-control ml-3 mr-3" name="id_number" placeholder="Número de Identificación" required="" />
                      </div>
                  </div>

                  <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
                      <div class="form-group m-0">
                          <label for="expedition_place">Lugar de expedición del documento de identidad <span class="text-danger">*</span> </label>

                          <input type="text"  class="form-control ml-3 mr-3" name="expedition_place" placeholder="Lugar de expedición del documento de identidad" required="" />

                      </div>
                  </div>

                  <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">

                      <div class="form-group m-0">
                          <label>Sexo <span class="text-danger">*</span> </label>
                          <br />
                          <div class="custom-control custom-radio custom-control-inline ml-3 mr-3">
                              <input type="radio" id="msexo_Femenino" class="custom-control-input" name="sexo" value="Femenino" required="" />
                              <label class="custom-control-label" for="msexo_Femenino">Femenino</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline ml-3 mr-3">
                              <input type="radio" id="msexo_Masculino" class="custom-control-input" name="sexo" value="Masculino" required="" />
                              <label class="custom-control-label" for="msexo_Masculino">Masculino</label>
                          </div>
                      </div>


                  </div>

              	    <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
                      <div class="form-group m-0">
                          <label for="birth_date">Fecha de nacimiento <span class="text-danger">*</span> </label>
                          <br />
                          <label class="label-description ml-3 mr-3">Digite su fecha de nacimiento Mes, día, año, puede hacer uso del teclado numerico</label>
                          <input type="date" class="form-control ml-3 mr-3" name="birth_date" placeholder="Fecha de nacimiento" required="" />
                      </div>
                  </div>

                  <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
                      <div class="form-group m-0">
                          <label for="age">Edad <span class="text-danger">*</span> </label>
                          <input type="number" class="form-control ml-3 mr-3" name="age" placeholder="Edad" required="" />
                      </div>
                  </div>

                  <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
                      <div class="form-group m-0">
                          <label for="birth_country">País de nacimiento <span class="text-danger">*</span> </label>
                          <input type="text" class="form-control ml-3 mr-3" name="birth_country" placeholder="País de nacimiento" required="" />
                      </div>
                  </div>

                  <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
                      <div class="form-group m-0">
                          <label for="birth_state">Departamento de nacimiento <span class="text-danger">*</span> </label>
                          <input type="text" class="form-control ml-3 mr-3" name="birth_state" placeholder="Departamento de nacimiento" required="" />
                      </div>
                  </div>

                  <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
                      <div class="form-group m-0">
                          <label for="birth_city">Ciudad de nacimiento <span class="text-danger">*</span> </label>
                          <input type="text" class="form-control ml-3 mr-3" name="birth_city" placeholder="Ciudad de nacimiento" required="" />
                      </div>
                  </div>

              	<div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
                      <div class="form-group m-0">
                          <label for="location_country">País de ubicación <span class="text-danger">*</span> </label>

                          <input type="text" class="form-control ml-3 mr-3" name="location_country" placeholder="País" required="" />
                      </div>
                  </div>

                  <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
                      <div class="form-group m-0">
                          <label for="location_state">Departamento de ubicación <span class="text-danger">*</span> </label>

                          <input type="text" class="form-control ml-3 mr-3" name="location_state" placeholder="Departamento de ubicación" required="" />
                      </div>
                  </div>

                  <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
                      <div class="form-group m-0">
                          <label for="location_city">Ciudad o municipio de ubicación <span class="text-danger">*</span> </label>

                          <input type="text" class="form-control ml-3 mr-3" name="location_city" placeholder="Ciudad o municipio de ubicación" required="" />
                      </div>
                  </div>

                  <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
                      <div class="form-group m-0">
                          <label for="area">Área <span class="text-danger">*</span> </label>
                          <br />
                          <label class="label-description ml-3 mr-3">Tipo de área de ubicación</label>
                          <select  class="custom-select ml-3 mr-3" name="area" required="">
                              <option value="" selected="" disabled="">Área</option>
                              <option>Rural</option>
                              <option>Urbano</option>
                          </select>
                      </div>
                  </div>

                  <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
                      <div class="form-group m-0">
                          <label for="adress">Dirección de residencia <span class="text-danger">*</span> </label>

                          <input type="text"  class="form-control ml-3 mr-3" name="adress" placeholder="Dirección de residencia" required="" />
                      </div>
                  </div>

                  <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
                      <div class="form-group m-0">
                          <label for="Comunity">Comuna de residencia <span class="text-danger">*</span> </label>
                          <select class="custom-select ml-3 mr-3" name="Comunity" required="">
                              <option value="" selected="" disabled="">Dirección de residencia</option>
                              <option>Comuna 1</option>
                              <option>Comuna 2</option>
                              <option>Comuna 3</option>
                              <option>Comuna 4</option>
                              <option>Comuna 5</option>
                              <option>Comuna 6</option>
                              <option>Comuna 7</option>
                              <option>Comuna 8</option>
                              <option> Comuna 9</option>
                              <option>Comuna 10</option>
                              <option>Comuna 11</option>
                              <option>Comuna 12</option>
                              <option>Comuna 13</option>
                              <option>Comuna 14</option>
                              <option>Comuna 15</option>
                              <option>Comuna 16</option>
                              <option>Comuna 17</option>
                              <option> Comuna 18</option>
                              <option>Comuna 19</option>
                              <option>Comuna 20</option>
                              <option>Comuna 21</option>
                              <option>Comuna 22</option>
                              <option>Corregimiento El Hormiguero (Cali)</option>
                              <option> Corregimiento El Saladito (Cali)</option>
                              <option>Corregimiento Felidia (Cali)</option>
                              <option>Corregimiento Golondrinas (Cali)</option>
                              <option> Corregimiento La Buitrera (Cali)</option>
                              <option>Corregimiento La Castilla (Cali)</option>
                              <option>Corregimiento La Elvira (Cali)</option>
                              <option> Corregimiento La Leonera (Cali)</option>
                              <option>Corregimiento La Paz (Cali)</option>
                              <option>Corregimiento Los Andes (Cali)</option>
                              <option> Corregimiento Montebello (Cali)</option>
                              <option>Corregimiento Navarro (Cali)</option>
                              <option>Corregimiento Pance (Cali)</option>
                              <option> Corregimiento Pichindé (Cali)</option>
                              <option>Corregimiento Villacarmelo (Cali)</option>
                              <option>Otro</option>
                          </select>
                      </div>
                  </div>

                  <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
                      <div class="form-group m-0">
                          <label for="neighborhood">Barrio de residencia <span class="text-danger">*</span> </label>
                          <select id="neighborhood" class="custom-select ml-3 mr-3" name="neighborhood" required="">
                              <option value="" selected="" disabled="">Barrio de residencia</option>
                              <option>Terrón Colorado</option>
                              <option>Vista Hermosa</option>
                              <option>Sector Patio Bonito</option>
                              <option>Aguacatal</option>
                              <option>Santa Rita</option>
                              <option>Santa Teresita</option>
                              <option>Arboledas</option>
                              <option>Normandía</option>
                              <option>Juanambú</option>
                              <option>Centenario</option>
                              <option>Granada</option>
                              <option>Versalles</option>
                              <option>San Vicente</option>
                              <option>Santa Mónica </option>
                              <option>Prados del Norte</option>
                              <option>La Flora</option>
                              <option>La Campiña</option>
                              <option>La Paz</option>
                              <option>El Bosque</option>
                              <option>Menga</option>
                              <option>Ciudad Los Álamos</option>
                              <option>Chipichape</option>
                              <option>Brisas de los Álamos</option>
                              <option>Urbanización La Merced</option>
                              <option>Vipasa</option>
                              <option>Urbanización La Flora</option>
                              <option>Altos de Menga</option>
                              <option>Sector Altos Normandía - Bataclán </option>
                              <option>Área en desarrollo - Parque del Amor</option>
                              <option>El Nacional</option>
                              <option>El Peñón</option>
                              <option>San Antonio</option>
                              <option>San Cayetano</option>
                              <option>Los Libertadores</option>
                              <option>San Juan Bosco</option>
                              <option>Santa Rosa</option>
                              <option>La Merced</option>
                              <option>San Pascual</option>
                              <option>El Calvario</option>
                              <option>San Pedro</option>
                              <option>San Nicolás</option>
                              <option>El Hoyo</option>
                              <option>El Piloto</option>
                              <option>Navarro - La Chanca</option>
                              <option>Jorge Isaacs</option>
                              <option>Santander</option>
                              <option>Porvenir</option>
                              <option>Las Delicias</option>
                              <option>Manzanares</option>
                              <option>Salomia</option>
                              <option>Fátima</option>
                              <option>Sultana - Berlín - San Francisco </option>
                              <option>Popular</option>
                              <option>Ignacio Rengifo</option>
                              <option>Guillermo Valencia</option>
                              <option>La Isla</option>
                              <option>Marco Fidel Suárez</option>
                              <option>Evaristo García</option>
                              <option>La Esmeralda</option>
                              <option>Bolivariano</option>
                              <option>Barrio Olaya Herrera</option>
                              <option>Unidad Residencial Bueno Madrid</option>
                              <option>Flora Industrial</option>
                              <option>Calima</option>
                              <option>Industria de Licores</option>
                              <option>La Alianza</option>
                              <option>El Sena</option>
                              <option>Los Andes</option>
                              <option>Los Guayacanes</option>
                              <option>Chiminangos Segunda Etapa</option>
                              <option>Chiminangos Primera Etapa</option>
                              <option>Metropolitano del Norte</option>
                              <option>Los Parques - Barranquilla</option>
                              <option>Villa del Sol</option>
                              <option>Paseo de Los Almendros</option>
                              <option>Los Andes B - La Riviera</option>
                              <option>Torres de Comfandi</option>
                              <option>Villa del Prado - El Guabito</option>
                              <option>San Luís</option>
                              <option>Jorge Eliecer Gaitán</option>
                              <option>Paso del Comercio</option>
                              <option>Los Alcázares</option>
                              <option>Petecuy Primera Etapa</option>
                              <option>Petecuy Segunda Etapa</option>
                              <option>La Rivera I</option>
                              <option>Los Guaduales</option>
                              <option>Petecuy Tercera Etapa</option>
                              <option>Ciudadela Floralia</option>
                              <option>Fonaviemcali</option>
                              <option>San Luís II</option>
                              <option>Urbanización Calimio</option>
                              <option>Sector Puente del Comercio</option>
                              <option>Alfonso López 1° Etapa</option>
                              <option>Alfonso López 2° Etapa</option>
                              <option>Alfonso López 3° Etapa</option>
                              <option>Puerto nuevo</option>
                              <option>Puerto Mallarino</option>
                              <option>Urbanización El Ángel del Hogar</option>
                              <option>Siete de Agosto</option>
                              <option>Los Pinos</option>
                              <option>San Marino</option>
                              <option>Las Ceibas</option>
                              <option>Base Aérea</option>
                              <option>Parque de la Caña</option>
                              <option>Fepicol</option>
                              <option>Primitivo Crespo</option>
                              <option>Simón Bolívar</option>
                              <option>Saavedra Galindo</option>
                              <option>Rafael Uribe Uribe</option>
                              <option>Santa Mónica Popular</option>
                              <option>La Floresta</option>
                              <option>Benjamín Herrera</option>
                              <option>Municipal</option>
                              <option>Industrial</option>
                              <option>El Troncal</option>
                              <option>Las Américas</option>
                              <option>Atanasio Girardot</option>
                              <option>Santa Fe</option>
                              <option>Chapinero</option>
                              <option>Villa Colombia</option>
                              <option>EL Trébol</option>
                              <option>La Base</option>
                              <option>Urbanización La Nueva Base</option>
                              <option>Alameda</option>
                              <option>Bretaña</option>
                              <option>Junín</option>
                              <option>Guayaquil</option>
                              <option>Aranjuez</option>
                              <option>Manuel María Buenaventura</option>
                              <option>Santa Mónica Belalcázar</option>
                              <option>Belalcázar</option>
                              <option>Sucre</option>
                              <option>Barrio Obrero</option>
                              <option>El Dorado</option>
                              <option>El Guabal</option>
                              <option>La Libertad</option>
                              <option>Santa Elena</option>
                              <option>Las Acacias</option>
                              <option>Santo Domingo</option>
                              <option>Jorge Zawadsky</option>
                              <option>Olímpico</option>
                              <option>Cristóbal Colón</option>
                              <option>La Selva</option>
                              <option>Barrio Departamental</option>
                              <option>Pasoancho</option>
                              <option>Panamericano</option>
                              <option>Colseguros Andes</option>
                              <option>San Cristóbal</option>
                              <option>Las Granjas</option>
                              <option>San Judas Tadeo I</option>
                              <option>San Judas Tadeo II</option>
                              <option>Barrio San Carlos</option>
                              <option>Maracaibo</option>
                              <option>La Independencia</option>
                              <option>La Esperanza</option>
                              <option>Urbanización Boyacá</option>
                              <option>El Jardín</option>
                              <option>La Fortaleza</option>
                              <option>El Recuerdo</option>
                              <option>Aguablanca</option>
                              <option>El Prado</option>
                              <option>20 de Julio</option>
                              <option>Prados de Oriente</option>
                              <option>Los Sauces</option>
                              <option>Villa del Sur</option>
                              <option>José Holguín Garcés</option>
                              <option>León XIII</option>
                              <option>José María Córdoba</option>
                              <option>San Pedro Claver</option>
                              <option>Los Conquistadores</option>
                              <option>La Gran Colombia</option>
                              <option>San Benito</option>
                              <option>Primavera</option>
                              <option>Villanueva</option>
                              <option>Asturias</option>
                              <option>Eduardo Santos</option>
                              <option>Barrio Alfonso Barberena A.</option>
                              <option>El Paraíso</option>
                              <option>Fenalco Kennedy</option>
                              <option>Nueva Floresta</option>
                              <option>Julio Rincón</option>
                              <option>Doce de Octubre</option>
                              <option>El Rodeo</option>
                              <option>Sindical</option>
                              <option>Bello Horizonte</option>
                              <option>Ulpiano Lloreda</option>
                              <option>El Vergel</option>
                              <option>El Poblado I</option>
                              <option>El Poblado II</option>
                              <option>Los Comuneros II Etapa</option>
                              <option>Ricardo Balcázar</option>
                              <option>Omar Torrijos</option>
                              <option>El Diamante</option>
                              <option>Lleras Restrepo</option>
                              <option>Villa del Lago</option>
                              <option>Los Robles</option>
                              <option>Rodrigo Lara Bonilla</option>
                              <option>Charco Azul</option>
                              <option>Villablanca</option>
                              <option>Calipso</option>
                              <option>Yira Castro</option>
                              <option>Lleras Restrepo II Etapa</option>
                              <option>Marroquín III</option>
                              <option>Los Lagos</option>
                              <option>Sector Laguna del Pondaje</option>
                              <option>El Pondaje</option>
                              <option>Sect. Asprosocial-Diamante</option>
                              <option>Alfonso Bonilla Aragón</option>
                              <option>Alirio Mora Beltrán</option>
                              <option>Manuela Beltrán</option>
                              <option>Las Orquídeas</option>
                              <option>José Manuel Marroquín II Etapa</option>
                              <option>José Manuel Marroquín I Etapa</option>
                              <option>Puerta del Sol</option>
                              <option>Los Naranjos I</option>
                              <option>Promociones Populares B</option>
                              <option>Los Naranjos II</option>
                              <option>El Retiro</option>
                              <option>Los Comuneros I Etapa</option>
                              <option>Laureano Gómez</option>
                              <option>El Vallado</option>
                              <option>Ciudad Córdoba</option>
                              <option>Mojíca</option>
                              <option>El Morichal</option>
                              <option>Mariano Ramos</option>
                              <option>República de Israel</option>
                              <option>Unión de Vivienda Popular</option>
                              <option>Antonio Nariño</option>
                              <option>Brisas del Limonar</option>
                              <option>Ciudad 2000</option>
                              <option>La Alborada</option>
                              <option>La Playa</option>
                              <option>Primero de Mayo</option>
                              <option>Ciudadela Comfandi</option>
                              <option>Ciudad Universitaria</option>
                              <option>Caney</option>
                              <option>Lili</option>
                              <option>Santa Anita - La Selva</option>
                              <option>El Ingenio</option>
                              <option>Mayapan - Las Vegas</option>
                              <option>Las Quintas de Don Simón</option>
                              <option>Ciudad Capri</option>
                              <option>La Hacienda</option>
                              <option>Los Portales - Nuevo Rey</option>
                              <option>Cañaverales - Los Samanes</option>
                              <option>El Limonar</option>
                              <option>Bosques del Limonar</option>
                              <option>El Gran Limonar - Cataya</option>
                              <option>El Gran Limonar</option>
                              <option>Unicentro Cali</option>
                              <option>Ciudadela Pasoancho</option>
                              <option>Prados del Limonar</option>
                              <option>Urbanización San Joaquín</option>
                              <option>Buenos Aires</option>
                              <option>Barrio Caldas</option>
                              <option>Los Chorros</option>
                              <option>Meléndez</option>
                              <option>Los Farallones</option>
                              <option>Francisco Eladio Ramírez</option>
                              <option>Prados del Sur</option>
                              <option>Horizontes</option>
                              <option>Mario Correa Rengifo</option>
                              <option>Lourdes</option>
                              <option>Colinas del Sur</option>
                              <option>Alférez Real</option>
                              <option>Nápoles</option>
                              <option>El Jordán</option>
                              <option>Cuarteles Nápoles</option>
                              <option>Sector Alto de Los Chorros</option>
                              <option>Polvorines</option>
                              <option>Sector Meléndez</option>
                              <option>Sector Alto Jordán</option>
                              <option>Alto Nápoles </option>
                              <option>El Refugio</option>
                              <option>La Cascada</option>
                              <option>El Lido</option>
                              <option>Urbanización Tequendama</option>
                              <option>Barrio Eucarístico</option>
                              <option>San Fernando Nuevo</option>
                              <option>Urbanización Nueva Granada</option>
                              <option>Santa Isabel</option>
                              <option>Bellavista</option>
                              <option>San Fernando Viejo</option>
                              <option>Miraflores</option>
                              <option>3 de Julio</option>
                              <option>El Cedro</option>
                              <option>Champagnat</option>
                              <option>Urbanización Colseguros</option>
                              <option>Los Cambujos</option>
                              <option>El Mortiñal</option>
                              <option>Urbanización Militar</option>
                              <option>Cuarto de Legua - Guadalupe</option>
                              <option>Nueva Tequendama </option>
                              <option>Camino Real - Joaquín Borrero Sinisterra</option>
                              <option>Camino Real - Los Fundadores</option>
                              <option>Santa Bárbara</option>
                              <option>Sector Altos de Santa Isabel</option>
                              <option>Tejares - Cristales</option>
                              <option>Unidad Residencial Santiago de Cali</option>
                              <option>Unidad Residencial El Coliseo</option>
                              <option>Cañaveralejo - Seguros Patria</option>
                              <option>Cañaveral</option>
                              <option>Pampa Linda</option>
                              <option>Sector Cañaveralejo Guadalupe Antigua</option>
                              <option>Sector Bosque Municipal</option>
                              <option>Unidad Deportiva Alberto Galindo Plaza de Toros</option>
                              <option>El Cortijo</option>
                              <option>Belisario Caicedo</option>
                              <option>Siloé</option>
                              <option>Lleras Camargo</option>
                              <option>Belén</option>
                              <option>Brisas de Mayo</option>
                              <option>Tierra Blanca</option>
                              <option>Pueblo Joven</option>
                              <option>Cementerio - Carabineros</option>
                              <option>Venezuela - Urbanización Cañaveralejo</option>
                              <option>La Sultana</option>
                              <option>Pízamos I</option>
                              <option>Pízamos II</option>
                              <option>Calimio Desepaz</option>
                              <option>El Remanso</option>
                              <option>Los Lideres</option>
                              <option>Desepaz Invicali</option>
                              <option>Compartir</option>
                              <option>Ciudad Talanga</option>
                              <option>Villamercedes I-Villa Luz- Las Garzas</option>
                              <option>Pízamos III - Las Dalias</option>
                              <option>Potrero Grande</option>
                              <option>Ciudadela del Río - CVC</option>
                              <option>Valle Grande</option>
                              <option>Planta de Tratamiento</option>
                              <option>Urbanización Ciudad Jardín</option>
                              <option>Parcelaciones Pance</option>
                              <option>Urbanización Río Lili</option>
                              <option>Ciudad Campestre</option>
                              <option>Club Campestre</option>
                              <option>Navarro</option>
                              <option>Navarro (Cabecera)</option>
                              <option>El Estero</option>
                              <option>Las Vegas</option>
                              <option>Meléndez</option>
                              <option>Jarillón Navarro</option>
                              <option>El Hormiguero</option>
                              <option>El Hormiguero (Cabecera)</option>
                              <option>Morgan</option>
                              <option>La Paila</option>
                              <option>Cauca Viejo</option>
                              <option>Cascajal</option>
                              <option>Valle del Lili</option>
                              <option>Pance</option>
                              <option>La Vorágine</option>
                              <option>Pance (Cabecera)</option>
                              <option>San Pablo</option>
                              <option>La Castellana</option>
                              <option>El Trueno</option>
                              <option>El Pato</option>
                              <option>El Topacio</option>
                              <option>El Porvenir</option>
                              <option>San Francisco</option>
                              <option>El Jardín</option>
                              <option>Pico de Águila</option>
                              <option>Chorro de Plata</option>
                              <option>Pance Suburbano</option>
                              <option>La Buitrera</option>
                              <option>La Buitrera (Cabecera)</option>
                              <option>La Riverita</option>
                              <option>El Rosario</option>
                              <option>El Otoño</option>
                              <option>Alto de los Mangos</option>
                              <option>La Luisa</option>
                              <option>La Sirena </option>
                              <option>Parque de la Bandera</option>
                              <option>Cantaclaro</option>
                              <option>Club Campestre</option>
                              <option>Villacarmelo</option>
                              <option>Villacarmelo (Cabecera)</option>
                              <option>La Fonda</option>
                              <option>Dos Quebradas</option>
                              <option>La Candelaria</option>
                              <option>El Carmen</option>
                              <option>Alto de los Mangos</option>
                              <option>Los Andes</option>
                              <option>Los Andes (Cabecera)</option>
                              <option>Los Cárpatos</option>
                              <option>Quebrada Honda</option>
                              <option>Pueblo Nuevo</option>
                              <option>El Faro</option>
                              <option>El Mango - La Reforma</option>
                              <option>La Carolina - Los Andes Bajo</option>
                              <option>El Cabuyal</option>
                              <option>Atenas</option>
                              <option>El Mameyal</option>
                              <option>Mónaco</option>
                              <option>Pichindé</option>
                              <option>Pichindé (Cabecera)</option>
                              <option>Peñas Blancas</option>
                              <option>Loma de la Cajita</option>
                              <option>La Leonera</option>
                              <option>La Leonera (Cabecera)</option>
                              <option>El Pato</option>
                              <option>El Porvenir</option>
                              <option>El Pajuil</option>
                              <option>Felidia</option>
                              <option>Felidia (Cabecera)</option>
                              <option>La Esperanza</option>
                              <option>Las Nieves</option>
                              <option>El Diamante</option>
                              <option>El Cedral</option>
                              <option>La Soledad</option>
                              <option>El Saladito</option>
                              <option>El Saladito (Cabecera)</option>
                              <option>San Antonio</option>
                              <option>San Pablo</option>
                              <option>San Miguel</option>
                              <option>Montañuelas</option>
                              <option>El Palomar</option>
                              <option>Las Nieves del Saladito</option>
                              <option>La Elvira</option>
                              <option>La Elvira (Cabecera)</option>
                              <option>Los Laureles</option>
                              <option>Alto Aguacatal</option>
                              <option>Kilometro 18 (Vía al Mar)</option>
                              <option>La Castilla</option>
                              <option>La Castilla (Cabecera)</option>
                              <option>Las Palmas</option>
                              <option>Los Limones</option>
                              <option>Montañitas</option>
                              <option>Las Brisas</option>
                              <option>El Futuro - Gorgona</option>
                              <option>El Pinar</option>
                              <option>La Paz</option>
                              <option>La Paz (Cabecera)</option>
                              <option>El Rosario</option>
                              <option>Lomitas</option>
                              <option>Montebello</option>
                              <option>Montebello (Cabecera)</option>
                              <option>Campoalegre</option>
                              <option>Golondrinas</option>
                              <option>Golondrinas (Cabecera)</option>
                              <option>Filo - Laguna</option>
                              <option>La María</option>
                              <option>Santa Mónica - Chipichape</option>
                              <option>Otro</option>
                          </select>
                      </div>
                  </div>

                  <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
                      <div class="form-group m-0">
                          <label for="cellphone_number">Número celular <span class="text-danger">*</span> </label>
                          <input type="number" id="cellphone_number" class="form-control ml-3 mr-3" name="cellphone_number" placeholder="Número celular" required="" />
                      </div>
                  </div>

                  <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
                      <div class="form-group m-0">
                          <label for="phone_number">Número fijo de contacto </label>
                          <input type="number" id="phone_number" class="form-control ml-3 mr-3" name="phone_number" placeholder="Número fijo de contacto" />
                      </div>
                  </div>

                  <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
                      <div class="form-group m-0">
                          <label for="email">Correo electrónico </label>

                          <input type="text" id="53" class="form-control ml-3 mr-3" name="email" placeholder="Correo electrónico" />
                      </div>
                  </div>

              </div>

    			<div class="modal-footer">
    				  <button type="submit" class="btn btn-primary float-right"> Registrar </button>
    			</div>

        </form>
        </div>

      </div>


    </div>
</div>
