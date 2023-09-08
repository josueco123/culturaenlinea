<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use App\Form;
use App\Field;

class FormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Formulario 1
        Form::create([
          // 'name' => 'INFORMACIÓN DEL ESTÍMULO',
            'name' => 'Información del estímulo',
            'description' => '',
            'order' => 1,
        ]);

        Field::create([
            'form_id' => 1,
            'label' => 'Área del estímulo',
            'slug' => 'area-del-estímulo',
            'type' => 'text',
            'name' => 'area_name',
            'description' => '',
            'placeholder' => 'Área del estímulo',
            'options' => null,
            'required' => true,
            'order' => 1,
        ]);

        Field::create([
            'form_id' => 1,
            'label' => 'Nombre del estímulo',
            'slug' => 'nombre-del-estimulo',
            'type' => 'text',
            'name' => 'incentive_name',
            'description' => '',
            'placeholder' => 'Nombre del estímulo',
            'options' => null,
            'required' => true,
            'order' => 2,
        ]);

        // Campos del formulario 1
        Field::create([
            'form_id' => 1,
            'label' => 'Título del proyecto u obra',
            'slug' => 'titulo-del-proyecto-u-obra',
            'type' => 'text',
            'name' => 'project_name',
            'description' => '',
            'placeholder' => 'Título del proyecto u obra',
            'options' => null,
            'required' => true,
            'order' => 3,
        ]);

        Field::create([
            'form_id' => 1,
            'label' => 'Nombre del tutor',
            'slug' => 'nombre-del-tutor',
            'type' => 'text',
            'name' => 'tutor_name',
            'description' => '',
            'placeholder' => 'Nombre del tutor',
            'options' => null,
            'required' => false,
            'order' => 4,
        ]);


        DB::table('form_user_type')->insert([
          'form_id' => 1,
          'user_type_id' => 1,
        ]);

        DB::table('form_user_type')->insert([
          'form_id' => 1,
          'user_type_id' => 2,
        ]);

        DB::table('form_user_type')->insert([
          'form_id' => 1,
          'user_type_id' => 3,
        ]);

        /* ======================================================================================================== */


        // Formulario 2
        Form::create([
          // 'name' => 'INFORMACIÓN DE REPRESENTANTE',
            'name' => 'Información de representante',
            'description' => '',
            'order' => 2,
        ]);

        // Campos del formulario 2
        Field::create([
            'form_id' => 2,
            'label' => 'Nombres',
            'slug' => 'nombres',
            'type' => 'text',
            'name' => 'first_name',
            'description' => '',
            'placeholder' => 'Nombres',
            'options' => null,
            'required' => true,
            'order' => 1,
        ]);

        Field::create([
            'form_id' => 2,
            'label' => 'Apellidos',
            'slug' => 'apellidos',
            'type' => 'text',
            'name' => 'last_name',
            'description' => '',
            'placeholder' => 'Apellidos',
            'options' => null,
            'required' => true,
            'order' => 2,
        ]);

        Field::create([
            'form_id' => 2,
            'label' => 'Sexo',
            'slug' => 'sexo',
            'type' => 'radio',
            'name' => 'sexo',
            'description' => '',
            'placeholder' => 'Sexo',
            'options' => 'Femenino,Masculino',
            'required' => true,
            'order' => 6,
        ]);

        Field::create([
            'form_id' => 2,
            'label' => 'Tipo de identificación',
            'slug' => 'tipo-de-identificacion',
            'type' => 'select',
            'name' => 'id_type',
            'description' => '',
            'placeholder' => 'Seleccione tipo de identificación',
            'options' => 'Cédula de Ciudadanía,Cédula de Extranjería,Pasaporte',
            'required' => true,
            'order' => 3,
        ]);

        Field::create([
            'form_id' => 2,
            'label' => 'Número de Identificación',
            'slug' => 'numero-de-identificacion',
            'type' => 'text',
            'name' => 'id_number',
            'description' => 'Digite su numero de identificación sin puntos comas o dígitos de verificación',
            'placeholder' => 'Número de Identificación',
            'options' => null,
            'required' => true,
            'order' => 4,
        ]);

        Field::create([
            'form_id' => 2,
            'label' => 'Lugar de expedición del documento de identidad',
            'slug' => 'lugar-de-expedicion-del-documento-de-identidad',
            'type' => 'text',
            'name' => 'expedition_place',
            'description' => '',
            'placeholder' => 'Lugar de expedición del documento de identidad',
            'options' => null,
            'required' => true,
            'order' => 5,
        ]);

        DB::table('form_user_type')->insert([
          'form_id' => 2,
          'user_type_id' => 1,
        ]);

        DB::table('form_user_type')->insert([
          'form_id' => 2,
          'user_type_id' => 2,
        ]);

        DB::table('form_user_type')->insert([
          'form_id' => 2,
          'user_type_id' => 3,
        ]);


        /* ======================================================================================================== */


        // Formulario 3
        Form::create([
          // 'name' => 'INFORMACIÓN DE NACIMIENTO',
            'name' => 'Información de nacimiento',
            'description' => '',
            'order' => 3,
        ]);

        Field::create([
            'form_id' => 3,
            'label' => 'Fecha de nacimiento',
            'slug' => 'fecha-de-nacimiento',
            'type' => 'date',
            'name' => 'birth_date',
            'description' => 'Digite su fecha de nacimiento Mes, día, año, puede hacer uso del teclado numerico',
            'placeholder' => 'Fecha de nacimiento',
            'options' => null,
            'required' => true,
            'order' => 1,
        ]);

        Field::create([
            'form_id' => 3,
            'label' => 'Edad',
            'slug' => 'edad',
            'type' => 'number',
            'name' => 'age',
            'description' => '',
            'placeholder' => 'Edad',
            'options' => null,
            'required' => true,
            'order' => 2,
        ]);

        Field::create([
            'form_id' => 3,
            'label' => 'País de nacimiento',
            'slug' => 'pais-de-nacimiento',
            'type' => 'text',
            'name' => 'birth_country',
            'description' => '',
            'placeholder' => 'País de nacimiento',
            'options' => null,
            'required' => true,
            'order' => 3,
        ]);

        Field::create([
            'form_id' => 3,
            'label' => 'Departamento de nacimiento',
            'slug' => 'departamento-de-nacimiento',
            'type' => 'text',
            'name' => 'birth_state',
            'description' => '',
            'placeholder' => 'Departamento de nacimiento',
            'options' => null,
            'required' => true,
            'order' => 4,
        ]);

        Field::create([
            'form_id' => 3,
            'label' => 'Ciudad de nacimiento',
            'slug' => 'ciudad-de-nacimiento',
            'type' => 'text',
            'name' => 'birth_city',
            'description' => '',
            'placeholder' => 'Ciudad de nacimiento',
            'options' => null,
            'required' => true,
            'order' => 5,
        ]);

        DB::table('form_user_type')->insert([
          'form_id' => 3,
          'user_type_id' => 1,
        ]);

        DB::table('form_user_type')->insert([
          'form_id' => 3,
          'user_type_id' => 2,
        ]);

        DB::table('form_user_type')->insert([
          'form_id' => 3,
          'user_type_id' => 3,
        ]);

        /* ======================================================================================================== */

        // Formulario 4
        Form::create([
          // 'name' => 'INFORMACIÓN GENERAL PERSONA NATURAL',
            'name' => 'Información general',
            'description' => '',
            'order' => 4,
        ]);

        Field::create([
            'form_id' => 4,
            'label' => 'País de ubicación',
            'slug' => 'pais-de-ubicacion',
            'type' => 'text',
            'name' => 'location_country',
            'description' => '',
            'placeholder' => 'País',
            'options' => null,
            'required' => true,
            'order' => 1,
        ]);

        Field::create([
            'form_id' => 4,
            'label' => 'Departamento de ubicación',
            'slug' => 'departamento-de-ubicacion',
            'type' => 'text',
            'name' => 'location_state',
            'description' => '',
            'placeholder' => 'Departamento de ubicación',
            'options' => null,
            'required' => true,
            'order' => 2,
        ]);

        Field::create([
            'form_id' => 4,
            'label' => 'Ciudad o municipio de ubicación',
            'slug' => 'ciudad-o-municipio-de-ubicacion',
            'type' => 'text',
            'name' => 'location_city',
            'description' => '',
            'placeholder' => 'Ciudad o municipio de ubicación',
            'options' => null,
            'required' => true,
            'order' => 3,
        ]);

        Field::create([
            'form_id' => 4,
            'label' => 'Área',
            'slug' => 'area',
            'type' => 'select',
            'name' => 'area',
            'description' => 'Tipo de área de ubicación',
            'placeholder' => 'Área',
            'options' => 'Rural,Urbano',
            'required' => true,
            'order' => 4,
        ]);

        Field::create([
            'form_id' => 4,
            'label' => 'Dirección de residencia',
            'slug' => 'direccion-de-residencia',
            'type' => 'text',
            'name' => 'adress',
            'description' => '',
            'placeholder' => 'Dirección de residencia',
            'options' => null,
            'required' => true,
            'order' => 5,
        ]);

        Field::create([
            'form_id' => 4,
            'label' => 'Comuna de residencia',
            'slug' => 'comuna-de-residencia',
            'type' => 'select',
            'name' => 'Comunity',
            'description' => '',
            'placeholder' => 'Dirección de residencia',
            'options' => 'Comuna 1,Comuna 2,Comuna 3,Comuna 4,Comuna 5,Comuna 6,Comuna 7,Comuna 8,
             Comuna 9,Comuna 10,Comuna 11,Comuna 12,Comuna 13,Comuna 14,Comuna 15,Comuna 16,Comuna 17,
             Comuna 18,Comuna 19,Comuna 20,Comuna 21,Comuna 22,Corregimiento El Hormiguero (Cali),
             Corregimiento El Saladito (Cali),Corregimiento Felidia (Cali),Corregimiento Golondrinas (Cali),
             Corregimiento La Buitrera (Cali),Corregimiento La Castilla (Cali),Corregimiento La Elvira (Cali),
             Corregimiento La Leonera (Cali),Corregimiento La Paz (Cali),Corregimiento Los Andes (Cali),
             Corregimiento Montebello (Cali),Corregimiento Navarro (Cali),Corregimiento Pance (Cali),
             Corregimiento Pichindé (Cali),Corregimiento Villacarmelo (Cali),Otro',
            'required' => true,
            'order' => 6,
        ]);


        Field::create([
            'form_id' => 4  ,
            'label' => 'Barrio de residencia',
            'slug' => 'barrio-de-residencia',
            'type' => 'select',
            'name' => 'neighborhood',
            'description' => '',
            'placeholder' => 'Barrio de residencia',
 'options' => 'Terrón Colorado,Vista Hermosa,Sector Patio Bonito,Aguacatal,Santa Rita,Santa Teresita,Arboledas,Normandía,Juanambú,Centenario,Granada,Versalles,San Vicente,Santa Mónica ,Prados del Norte,La Flora,La Campiña,La Paz,El Bosque,Menga,Ciudad Los Álamos,Chipichape,Brisas de los Álamos,Urbanización La Merced,Vipasa,Urbanización La Flora,Altos de Menga,Sector Altos Normandía - Bataclán ,Área en desarrollo - Parque del Amor,El Nacional,El Peñón,San Antonio,San Cayetano,Los Libertadores,San Juan Bosco,Santa Rosa,La Merced,San Pascual,El Calvario,San Pedro,San Nicolás,El Hoyo,El Piloto,Navarro - La Chanca,Jorge Isaacs,Santander,Porvenir,Las Delicias,Manzanares,Salomia,Fátima,Sultana - Berlín - San Francisco ,Popular,Ignacio Rengifo,Guillermo Valencia,La Isla,Marco Fidel Suárez,Evaristo García,La Esmeralda,Bolivariano,Barrio Olaya Herrera,Unidad Residencial Bueno Madrid,Flora Industrial,Calima,Industria de Licores,La Alianza,El Sena,Los Andes,Los Guayacanes,Chiminangos Segunda Etapa,Chiminangos Primera Etapa,Metropolitano del Norte,Los Parques - Barranquilla,Villa del Sol,Paseo de Los Almendros,Los Andes B - La Riviera,Torres de Comfandi,Villa del Prado - El Guabito,San Luís,Jorge Eliecer Gaitán,Paso del Comercio,Los Alcázares,Petecuy Primera Etapa,Petecuy Segunda Etapa,La Rivera I,Los Guaduales,Petecuy Tercera Etapa,Ciudadela Floralia,Fonaviemcali,San Luís II,Urbanización Calimio,Sector Puente del Comercio,Alfonso López 1° Etapa,Alfonso López 2° Etapa,Alfonso López 3° Etapa,Puerto nuevo,Puerto Mallarino,Urbanización El Ángel del Hogar,Siete de Agosto,Los Pinos,San Marino,Las Ceibas,Base Aérea,Parque de la Caña,Fepicol,Primitivo Crespo,Simón Bolívar,Saavedra Galindo,Rafael Uribe Uribe,Santa Mónica Popular,La Floresta,Benjamín Herrera,Municipal,Industrial,El Troncal,Las Américas,Atanasio Girardot,Santa Fe,Chapinero,Villa Colombia,EL Trébol,La Base,Urbanización La Nueva Base,Alameda,Bretaña,Junín,Guayaquil,Aranjuez,Manuel María Buenaventura,Santa Mónica Belalcázar,Belalcázar,Sucre,Barrio Obrero,El Dorado,El Guabal,La Libertad,Santa Elena,Las Acacias,Santo Domingo,Jorge Zawadsky,Olímpico,Cristóbal Colón,La Selva,Barrio Departamental,Pasoancho,Panamericano,Colseguros Andes,San Cristóbal,Las Granjas,San Judas Tadeo I,San Judas Tadeo II,Barrio San Carlos,Maracaibo,La Independencia,La Esperanza,Urbanización Boyacá,El Jardín,La Fortaleza,El Recuerdo,Aguablanca,El Prado,20 de Julio,Prados de Oriente,Los Sauces,Villa del Sur,José Holguín Garcés,León XIII,José María Córdoba,San Pedro Claver,Los Conquistadores,La Gran Colombia,San Benito,Primavera,Villanueva,Asturias,Eduardo Santos,Barrio Alfonso Barberena A.,El Paraíso,Fenalco Kennedy,Nueva Floresta,Julio Rincón,Doce de Octubre,El Rodeo,Sindical,Bello Horizonte,Ulpiano Lloreda,El Vergel,El Poblado I,El Poblado II,Los Comuneros II Etapa,Ricardo Balcázar,Omar Torrijos,El Diamante,Lleras Restrepo,Villa del Lago,Los Robles,Rodrigo Lara Bonilla,Charco Azul,Villablanca,Calipso,Yira Castro,Lleras Restrepo II Etapa,Marroquín III,Los Lagos,Sector Laguna del Pondaje,El Pondaje,Sect. Asprosocial-Diamante,Alfonso Bonilla Aragón,Alirio Mora Beltrán,Manuela Beltrán,Las Orquídeas,José Manuel Marroquín II Etapa,José Manuel Marroquín I Etapa,Puerta del Sol,Los Naranjos I,Promociones Populares B,Los Naranjos II,El Retiro,Los Comuneros I Etapa,Laureano Gómez,El Vallado,Ciudad Córdoba,Mojíca,El Morichal,Mariano Ramos,República de Israel,Unión de Vivienda Popular,Antonio Nariño,Brisas del Limonar,Ciudad 2000,La Alborada,La Playa,Primero de Mayo,Ciudadela Comfandi,Ciudad Universitaria,Caney,Lili,Santa Anita - La Selva,El Ingenio,Mayapan - Las Vegas,Las Quintas de Don Simón,Ciudad Capri,La Hacienda,Los Portales - Nuevo Rey,Cañaverales - Los Samanes,El Limonar,Bosques del Limonar,El Gran Limonar - Cataya,El Gran Limonar,Unicentro Cali,Ciudadela Pasoancho,Prados del Limonar,Urbanización San Joaquín,Buenos Aires,Barrio Caldas,Los Chorros,Meléndez,Los Farallones,Francisco Eladio Ramírez,Prados del Sur,Horizontes,Mario Correa Rengifo,Lourdes,Colinas del Sur,Alférez Real,Nápoles,El Jordán,Cuarteles Nápoles,Sector Alto de Los Chorros,Polvorines,Sector Meléndez,Sector Alto Jordán,Alto Nápoles ,El Refugio,La Cascada,El Lido,Urbanización Tequendama,Barrio Eucarístico,San Fernando Nuevo,Urbanización Nueva Granada,Santa Isabel,Bellavista,San Fernando Viejo,Miraflores,3 de Julio,El Cedro,Champagnat,Urbanización Colseguros,Los Cambujos,El Mortiñal,Urbanización Militar,Cuarto de Legua - Guadalupe,Nueva Tequendama ,Camino Real - Joaquín Borrero Sinisterra,Camino Real - Los Fundadores,Santa Bárbara,Sector Altos de Santa Isabel,Tejares - Cristales,Unidad Residencial Santiago de Cali,Unidad Residencial El Coliseo,Cañaveralejo - Seguros Patria,Cañaveral,Pampa Linda,Sector Cañaveralejo Guadalupe Antigua,Sector Bosque Municipal,Unidad Deportiva Alberto Galindo Plaza de Toros,El Cortijo,Belisario Caicedo,Siloé,Lleras Camargo,Belén,Brisas de Mayo,Tierra Blanca,Pueblo Joven,Cementerio - Carabineros,Venezuela - Urbanización Cañaveralejo,La Sultana,Pízamos I,Pízamos II,Calimio Desepaz,El Remanso,Los Lideres,Desepaz Invicali,Compartir,Ciudad Talanga,Villamercedes I-Villa Luz- Las Garzas,Pízamos III - Las Dalias,Potrero Grande,Ciudadela del Río - CVC,Valle Grande,Planta de Tratamiento,Urbanización Ciudad Jardín,Parcelaciones Pance,Urbanización Río Lili,Ciudad Campestre,Club Campestre,Navarro,Navarro (Cabecera),El Estero,Las Vegas,Meléndez,Jarillón Navarro,El Hormiguero,El Hormiguero (Cabecera),Morgan,La Paila,Cauca Viejo,Cascajal,Valle del Lili,Pance,La Vorágine,Pance (Cabecera),San Pablo,La Castellana,El Trueno,El Pato,El Topacio,El Porvenir,San Francisco,El Jardín,Pico de Águila,Chorro de Plata,Pance Suburbano,La Buitrera,La Buitrera (Cabecera),La Riverita,El Rosario,El Otoño,Alto de los Mangos,La Luisa,La Sirena ,Parque de la Bandera,Cantaclaro,Club Campestre,Villacarmelo,Villacarmelo (Cabecera),La Fonda,Dos Quebradas,La Candelaria,El Carmen,Alto de los Mangos,Los Andes,Los Andes (Cabecera),Los Cárpatos,Quebrada Honda,Pueblo Nuevo,El Faro,El Mango - La Reforma,La Carolina  - Los Andes Bajo,El Cabuyal,Atenas,El Mameyal,Mónaco,Pichindé,Pichindé (Cabecera),Peñas Blancas,Loma de la Cajita,La Leonera,La Leonera (Cabecera),El Pato,El Porvenir,El Pajuil,Felidia,Felidia (Cabecera),La Esperanza,Las Nieves,El Diamante,El Cedral,La Soledad,El Saladito,El Saladito (Cabecera),San Antonio,San Pablo,San Miguel,Montañuelas,El Palomar,Las Nieves del Saladito,La Elvira,La Elvira (Cabecera),Los Laureles,Alto Aguacatal,Kilometro 18 (Vía al Mar),La Castilla,La Castilla (Cabecera),Las Palmas,Los Limones,Montañitas,Las Brisas,El Futuro - Gorgona,El Pinar,La Paz,La Paz (Cabecera),El Rosario,Lomitas,Montebello,Montebello (Cabecera),Campoalegre,Golondrinas,Golondrinas (Cabecera),Filo - Laguna,La María,Santa Mónica - Chipichape,Otro',
            'required' => true,
            'order' => 7,
        ]);

        Field::create([
            'form_id' => 4,
            'label' => 'Número celular',
            'slug' => 'numero-celular',
            'type' => 'number',
            'name' => 'cellphone_number',
            'description' => '',
            'placeholder' => 'Número celular',
            'options' => null,
            'required' => true,
            'order' => 8,
        ]);

        Field::create([
            'form_id' => 4,
            'label' => 'Número fijo de contacto',
            'slug' => 'numero-fijo-de-contacto',
            'type' => 'number',
            'name' => 'phone_number',
            'description' => '',
            'placeholder' => 'Número fijo de contacto',
            'options' => null,
            'required' => false,
            'order' => 9,
        ]);

        Field::create([
            'form_id' => 4,
            'label' => 'Correo electrónico',
            'slug' => 'correo-electronico',
            'type' => 'text',
            'name' => 'email',
            'description' => '',
            'placeholder' => 'Correo electrónico',
            'options' => null,
            'required' => false,
            'order' => 10,
        ]);


        DB::table('form_user_type')->insert([
          'form_id' => 4,
          'user_type_id' => 1,
        ]);

        /* ======================================================================================================== */

        // Formulario 5
        Form::create([
          // 'name' => 'INFORMACIÓN GENERAL PERSONA JURIDICA',
            'name' => 'Información general',
            'description' => '',
            'order' => 4,
        ]);

        Field::create([
            'form_id' => 5,
            'label' => 'Razón Social',
            'slug' => 'razon-social',
            'type' => 'text',
            'name' => 'social reason',
            'description' => '',
            'placeholder' => 'Razón Social',
            'options' => null,
            'required' => true,
            'order' => 1,
        ]);

        Field::create([
            'form_id' => 5,
            'label' => 'Codigo CIIU',
            'slug' => 'codigo-ciiu',
            'type' => 'text',
            'name' => 'ciiu_code',
            'description' => '',
            'placeholder' => 'Codigo CIIU',
            'options' => null,
            'required' => true,
            'order' => 2,
        ]);


        Field::create([
            'form_id' => 5,
            'label' => 'NIT Número',
            'slug' => 'NIT-Numero',
            'type' => 'text',
            'name' => 'nit',
            'description' => '',
            'placeholder' => 'NIT Número',
            'options' => null,
            'required' => true,
            'order' => 3,
        ]);

        Field::create([
            'form_id' => 5,
            'label' => 'Naturaleza',
            'slug' => 'naturaleza',
            'type' => 'radio',
            'name' => 'nature',
            'description' => '',
            'placeholder' => 'Naturaleza',
            'options' => 'Pública,Privada',
            'required' => true,
            'order' => 4,
        ]);

        Field::create([
            'form_id' => 5,
            'label' => 'País de ubicación',
            'slug' => 'pais-de-ubicacion',
            'type' => 'text',
            'name' => 'location_country',
            'description' => '',
            'placeholder' => 'País',
            'options' => null,
            'required' => true,
            'order' => 5,
        ]);

        Field::create([
            'form_id' => 5,
            'label' => 'Departamento de ubicación',
            'slug' => 'departamento-de-ubicacion',
            'type' => 'text',
            'name' => 'location_state',
            'description' => '',
            'placeholder' => 'Departamento de ubicación',
            'options' => null,
            'required' => true,
            'order' => 6,
        ]);

        Field::create([
            'form_id' => 5,
            'label' => 'Ciudad o municipio de ubicación',
            'slug' => 'ciudad-o-municipio-de-ubicacion',
            'type' => 'text',
            'name' => 'location_city',
            'description' => '',
            'placeholder' => 'Ciudad o municipio de ubicación',
            'options' => null,
            'required' => true,
            'order' => 7,
        ]);

        Field::create([
            'form_id' => 5,
            'label' => 'Área',
            'slug' => 'area',
            'type' => 'select',
            'name' => 'area',
            'description' => 'Tipo de área de ubicación',
            'placeholder' => 'Área',
            'options' => 'Rural,Urbano',
            'required' => true,
            'order' => 8,
        ]);

        Field::create([
            'form_id' => 5,
            'label' => 'Dirección de residencia',
            'slug' => 'direccion-de-residencia',
            'type' => 'text',
            'name' => 'adress',
            'description' => '',
            'placeholder' => 'Dirección de residencia',
            'options' => null,
            'required' => true,
            'order' => 9,
        ]);

        Field::create([
            'form_id' => 5,
            'label' => 'Comuna de residencia',
            'slug' => 'comuna-de-residencia',
            'type' => 'select',
            'name' => 'Comunity',
            'description' => '',
            'placeholder' => 'Dirección de residencia',
            'options' => 'Comuna 1,Comuna 2,Comuna 3,Comuna 4,Comuna 5,Comuna 6,Comuna 7,Comuna 8,
             Comuna 9,Comuna 10,Comuna 11,Comuna 12,Comuna 13,Comuna 14,Comuna 15,Comuna 16,Comuna 17,
             Comuna 18,Comuna 19,Comuna 20,Comuna 21,Comuna 22,Corregimiento El Hormiguero (Cali),
             Corregimiento El Saladito (Cali),Corregimiento Felidia (Cali),Corregimiento Golondrinas (Cali),
             Corregimiento La Buitrera (Cali),Corregimiento La Castilla (Cali),Corregimiento La Elvira (Cali),
             Corregimiento La Leonera (Cali),Corregimiento La Paz (Cali),Corregimiento Los Andes (Cali),
             Corregimiento Montebello (Cali),Corregimiento Navarro (Cali),Corregimiento Pance (Cali),
             Corregimiento Pichindé (Cali),Corregimiento Villacarmelo (Cali),Otro',
            'required' => true,
            'order' => 10,
        ]);


        Field::create([
            'form_id' => 5  ,
            'label' => 'Barrio de residencia',
            'slug' => 'barrio-de-residencia',
            'type' => 'select',
            'name' => 'neighborhood',
            'description' => '',
            'placeholder' => 'Barrio de residencia',
 'options' => 'Terrón Colorado,Vista Hermosa,Sector Patio Bonito,Aguacatal,Santa Rita,Santa Teresita,Arboledas,Normandía,Juanambú,Centenario,Granada,Versalles,San Vicente,Santa Mónica ,Prados del Norte,La Flora,La Campiña,La Paz,El Bosque,Menga,Ciudad Los Álamos,Chipichape,Brisas de los Álamos,Urbanización La Merced,Vipasa,Urbanización La Flora,Altos de Menga,Sector Altos Normandía - Bataclán ,Área en desarrollo - Parque del Amor,El Nacional,El Peñón,San Antonio,San Cayetano,Los Libertadores,San Juan Bosco,Santa Rosa,La Merced,San Pascual,El Calvario,San Pedro,San Nicolás,El Hoyo,El Piloto,Navarro - La Chanca,Jorge Isaacs,Santander,Porvenir,Las Delicias,Manzanares,Salomia,Fátima,Sultana - Berlín - San Francisco ,Popular,Ignacio Rengifo,Guillermo Valencia,La Isla,Marco Fidel Suárez,Evaristo García,La Esmeralda,Bolivariano,Barrio Olaya Herrera,Unidad Residencial Bueno Madrid,Flora Industrial,Calima,Industria de Licores,La Alianza,El Sena,Los Andes,Los Guayacanes,Chiminangos Segunda Etapa,Chiminangos Primera Etapa,Metropolitano del Norte,Los Parques - Barranquilla,Villa del Sol,Paseo de Los Almendros,Los Andes B - La Riviera,Torres de Comfandi,Villa del Prado - El Guabito,San Luís,Jorge Eliecer Gaitán,Paso del Comercio,Los Alcázares,Petecuy Primera Etapa,Petecuy Segunda Etapa,La Rivera I,Los Guaduales,Petecuy Tercera Etapa,Ciudadela Floralia,Fonaviemcali,San Luís II,Urbanización Calimio,Sector Puente del Comercio,Alfonso López 1° Etapa,Alfonso López 2° Etapa,Alfonso López 3° Etapa,Puerto nuevo,Puerto Mallarino,Urbanización El Ángel del Hogar,Siete de Agosto,Los Pinos,San Marino,Las Ceibas,Base Aérea,Parque de la Caña,Fepicol,Primitivo Crespo,Simón Bolívar,Saavedra Galindo,Rafael Uribe Uribe,Santa Mónica Popular,La Floresta,Benjamín Herrera,Municipal,Industrial,El Troncal,Las Américas,Atanasio Girardot,Santa Fe,Chapinero,Villa Colombia,EL Trébol,La Base,Urbanización La Nueva Base,Alameda,Bretaña,Junín,Guayaquil,Aranjuez,Manuel María Buenaventura,Santa Mónica Belalcázar,Belalcázar,Sucre,Barrio Obrero,El Dorado,El Guabal,La Libertad,Santa Elena,Las Acacias,Santo Domingo,Jorge Zawadsky,Olímpico,Cristóbal Colón,La Selva,Barrio Departamental,Pasoancho,Panamericano,Colseguros Andes,San Cristóbal,Las Granjas,San Judas Tadeo I,San Judas Tadeo II,Barrio San Carlos,Maracaibo,La Independencia,La Esperanza,Urbanización Boyacá,El Jardín,La Fortaleza,El Recuerdo,Aguablanca,El Prado,20 de Julio,Prados de Oriente,Los Sauces,Villa del Sur,José Holguín Garcés,León XIII,José María Córdoba,San Pedro Claver,Los Conquistadores,La Gran Colombia,San Benito,Primavera,Villanueva,Asturias,Eduardo Santos,Barrio Alfonso Barberena A.,El Paraíso,Fenalco Kennedy,Nueva Floresta,Julio Rincón,Doce de Octubre,El Rodeo,Sindical,Bello Horizonte,Ulpiano Lloreda,El Vergel,El Poblado I,El Poblado II,Los Comuneros II Etapa,Ricardo Balcázar,Omar Torrijos,El Diamante,Lleras Restrepo,Villa del Lago,Los Robles,Rodrigo Lara Bonilla,Charco Azul,Villablanca,Calipso,Yira Castro,Lleras Restrepo II Etapa,Marroquín III,Los Lagos,Sector Laguna del Pondaje,El Pondaje,Sect. Asprosocial-Diamante,Alfonso Bonilla Aragón,Alirio Mora Beltrán,Manuela Beltrán,Las Orquídeas,José Manuel Marroquín II Etapa,José Manuel Marroquín I Etapa,Puerta del Sol,Los Naranjos I,Promociones Populares B,Los Naranjos II,El Retiro,Los Comuneros I Etapa,Laureano Gómez,El Vallado,Ciudad Córdoba,Mojíca,El Morichal,Mariano Ramos,República de Israel,Unión de Vivienda Popular,Antonio Nariño,Brisas del Limonar,Ciudad 2000,La Alborada,La Playa,Primero de Mayo,Ciudadela Comfandi,Ciudad Universitaria,Caney,Lili,Santa Anita - La Selva,El Ingenio,Mayapan - Las Vegas,Las Quintas de Don Simón,Ciudad Capri,La Hacienda,Los Portales - Nuevo Rey,Cañaverales - Los Samanes,El Limonar,Bosques del Limonar,El Gran Limonar - Cataya,El Gran Limonar,Unicentro Cali,Ciudadela Pasoancho,Prados del Limonar,Urbanización San Joaquín,Buenos Aires,Barrio Caldas,Los Chorros,Meléndez,Los Farallones,Francisco Eladio Ramírez,Prados del Sur,Horizontes,Mario Correa Rengifo,Lourdes,Colinas del Sur,Alférez Real,Nápoles,El Jordán,Cuarteles Nápoles,Sector Alto de Los Chorros,Polvorines,Sector Meléndez,Sector Alto Jordán,Alto Nápoles ,El Refugio,La Cascada,El Lido,Urbanización Tequendama,Barrio Eucarístico,San Fernando Nuevo,Urbanización Nueva Granada,Santa Isabel,Bellavista,San Fernando Viejo,Miraflores,3 de Julio,El Cedro,Champagnat,Urbanización Colseguros,Los Cambujos,El Mortiñal,Urbanización Militar,Cuarto de Legua - Guadalupe,Nueva Tequendama ,Camino Real - Joaquín Borrero Sinisterra,Camino Real - Los Fundadores,Santa Bárbara,Sector Altos de Santa Isabel,Tejares - Cristales,Unidad Residencial Santiago de Cali,Unidad Residencial El Coliseo,Cañaveralejo - Seguros Patria,Cañaveral,Pampa Linda,Sector Cañaveralejo Guadalupe Antigua,Sector Bosque Municipal,Unidad Deportiva Alberto Galindo Plaza de Toros,El Cortijo,Belisario Caicedo,Siloé,Lleras Camargo,Belén,Brisas de Mayo,Tierra Blanca,Pueblo Joven,Cementerio - Carabineros,Venezuela - Urbanización Cañaveralejo,La Sultana,Pízamos I,Pízamos II,Calimio Desepaz,El Remanso,Los Lideres,Desepaz Invicali,Compartir,Ciudad Talanga,Villamercedes I-Villa Luz- Las Garzas,Pízamos III - Las Dalias,Potrero Grande,Ciudadela del Río - CVC,Valle Grande,Planta de Tratamiento,Urbanización Ciudad Jardín,Parcelaciones Pance,Urbanización Río Lili,Ciudad Campestre,Club Campestre,Navarro,Navarro (Cabecera),El Estero,Las Vegas,Meléndez,Jarillón Navarro,El Hormiguero,El Hormiguero (Cabecera),Morgan,La Paila,Cauca Viejo,Cascajal,Valle del Lili,Pance,La Vorágine,Pance (Cabecera),San Pablo,La Castellana,El Trueno,El Pato,El Topacio,El Porvenir,San Francisco,El Jardín,Pico de Águila,Chorro de Plata,Pance Suburbano,La Buitrera,La Buitrera (Cabecera),La Riverita,El Rosario,El Otoño,Alto de los Mangos,La Luisa,La Sirena ,Parque de la Bandera,Cantaclaro,Club Campestre,Villacarmelo,Villacarmelo (Cabecera),La Fonda,Dos Quebradas,La Candelaria,El Carmen,Alto de los Mangos,Los Andes,Los Andes (Cabecera),Los Cárpatos,Quebrada Honda,Pueblo Nuevo,El Faro,El Mango - La Reforma,La Carolina  - Los Andes Bajo,El Cabuyal,Atenas,El Mameyal,Mónaco,Pichindé,Pichindé (Cabecera),Peñas Blancas,Loma de la Cajita,La Leonera,La Leonera (Cabecera),El Pato,El Porvenir,El Pajuil,Felidia,Felidia (Cabecera),La Esperanza,Las Nieves,El Diamante,El Cedral,La Soledad,El Saladito,El Saladito (Cabecera),San Antonio,San Pablo,San Miguel,Montañuelas,El Palomar,Las Nieves del Saladito,La Elvira,La Elvira (Cabecera),Los Laureles,Alto Aguacatal,Kilometro 18 (Vía al Mar),La Castilla,La Castilla (Cabecera),Las Palmas,Los Limones,Montañitas,Las Brisas,El Futuro - Gorgona,El Pinar,La Paz,La Paz (Cabecera),El Rosario,Lomitas,Montebello,Montebello (Cabecera),Campoalegre,Golondrinas,Golondrinas (Cabecera),Filo - Laguna,La María,Santa Mónica - Chipichape,Otro',
            'required' => true,
            'order' => 11,
        ]);

        Field::create([
            'form_id' => 5,
            'label' => 'Número celular',
            'slug' => 'numero-celular',
            'type' => 'number',
            'name' => 'cellphone_number',
            'description' => '',
            'placeholder' => 'Número celular',
            'options' => null,
            'required' => true,
            'order' => 12,
        ]);

        Field::create([
            'form_id' => 5,
            'label' => 'Número fijo de contacto',
            'slug' => 'numero-fijo-de-contacto',
            'type' => 'number',
            'name' => 'phone_number',
            'description' => '',
            'placeholder' => 'Número fijo de contacto',
            'options' => null,
            'required' => false,
            'order' => 13,
        ]);

        Field::create([
            'form_id' => 5,
            'label' => 'Correo electrónico',
            'slug' => 'correo-electronico',
            'type' => 'email',
            'name' => 'email',
            'description' => '',
            'placeholder' => 'Correo electrónico',
            'options' => null,
            'required' => false,
            'order' => 14,
        ]);


        Field::create([
            'form_id' => 5,
            'label' => 'Página web',
            'slug' => 'pagina-web',
            'type' => 'text',
            'name' => 'web',
            'description' => '',
            'placeholder' => 'Página web',
            'options' => null,
            'required' => false,
            'order' => 15,
        ]);

        DB::table('form_user_type')->insert([
          'form_id' => 5,
          'user_type_id' => 2,
        ]);


        /* ======================================================================================================== */

        // Formulario 6
        Form::create([
          // 'name' => 'INFORMACIÓN GENERAL GRUPOS',
            'name' => 'Información general',
            'description' => '',
            'order' => 4,
        ]);

        Field::create([
            'form_id' => 6,
            'label' => 'Nombre del grupo constituido',
            'slug' => 'nombre-del-grupo-constituido',
            'type' => 'text',
            'name' => 'name_of_the_constituted_goup',
            'description' => '',
            'placeholder' => 'Nombre del grupo constituido',
            'options' => null,
            'required' => true,
            'order' => 1,
        ]);

        Field::create([
            'form_id' => 6,
            'label' => 'Número de integrantes',
            'slug' => 'nmero-de-integrantes',
            'type' => 'number',
            'name' => 'number_of_participants',
            'description' => '',
            'placeholder' => 'Número de integrantes',
            'options' => null,
            'required' => true,
            'order' => 2,
        ]);

        Field::create([
            'form_id' => 6,
            'label' => '',
            'slug' => 'nmero-de-integrantes',
            'type' => 'buttom',
            'name' => 'number_of_participants',
            'description' => '',
            'placeholder' => '',
            'options' => null,
            'required' => false,
            'order' => 3,
        ]);

        Field::create([
            'form_id' => 6,
            'label' => 'País de ubicación',
            'slug' => 'pais-de-ubicacion',
            'type' => 'text',
            'name' => 'location_country',
            'description' => '',
            'placeholder' => 'País',
            'options' => null,
            'required' => true,
            'order' => 4,
        ]);

        Field::create([
            'form_id' => 6,
            'label' => 'Departamento de ubicación',
            'slug' => 'departamento-de-ubicacion',
            'type' => 'text',
            'name' => 'location_state',
            'description' => '',
            'placeholder' => 'Departamento de ubicación',
            'options' => null,
            'required' => true,
            'order' => 5,
        ]);

        Field::create([
            'form_id' => 6,
            'label' => 'Ciudad o municipio de ubicación',
            'slug' => 'ciudad-o-municipio-de-ubicacion',
            'type' => 'text',
            'name' => 'location_city',
            'description' => '',
            'placeholder' => 'Ciudad o municipio de ubicación',
            'options' => null,
            'required' => true,
            'order' => 6,
        ]);

        Field::create([
            'form_id' => 6,
            'label' => 'Área',
            'slug' => 'area',
            'type' => 'select',
            'name' => 'area',
            'description' => 'Tipo de área de ubicación',
            'placeholder' => 'Área',
            'options' => 'Rural,Urbano',
            'required' => true,
            'order' => 7,
        ]);

        Field::create([
            'form_id' => 6,
            'label' => 'Dirección de residencia',
            'slug' => 'direccion-de-residencia',
            'type' => 'text',
            'name' => 'adress',
            'description' => '',
            'placeholder' => 'Dirección de residencia',
            'options' => null,
            'required' => true,
            'order' => 8,
        ]);

        Field::create([
            'form_id' => 6,
            'label' => 'Comuna de residencia',
            'slug' => 'comuna-de-residencia',
            'type' => 'select',
            'name' => 'Comunity',
            'description' => '',
            'placeholder' => 'Dirección de residencia',
            'options' => 'Comuna 1,Comuna 2,Comuna 3,Comuna 4,Comuna 5,Comuna 6,Comuna 7,Comuna 8,
             Comuna 9,Comuna 10,Comuna 11,Comuna 12,Comuna 13,Comuna 14,Comuna 15,Comuna 16,Comuna 17,
             Comuna 18,Comuna 19,Comuna 20,Comuna 21,Comuna 22,Corregimiento El Hormiguero (Cali),
             Corregimiento El Saladito (Cali),Corregimiento Felidia (Cali),Corregimiento Golondrinas (Cali),
             Corregimiento La Buitrera (Cali),Corregimiento La Castilla (Cali),Corregimiento La Elvira (Cali),
             Corregimiento La Leonera (Cali),Corregimiento La Paz (Cali),Corregimiento Los Andes (Cali),
             Corregimiento Montebello (Cali),Corregimiento Navarro (Cali),Corregimiento Pance (Cali),
             Corregimiento Pichindé (Cali),Corregimiento Villacarmelo (Cali),Otro',
            'required' => true,
            'order' => 9,
        ]);


        Field::create([
            'form_id' => 6,
            'label' => 'Barrio de residencia',
            'slug' => 'barrio-de-residencia',
            'type' => 'select',
            'name' => 'neighborhood',
            'description' => '',
            'placeholder' => 'Barrio de residencia',
 'options' => 'Terrón Colorado,Vista Hermosa,Sector Patio Bonito,Aguacatal,Santa Rita,Santa Teresita,Arboledas,Normandía,Juanambú,Centenario,Granada,Versalles,San Vicente,Santa Mónica ,Prados del Norte,La Flora,La Campiña,La Paz,El Bosque,Menga,Ciudad Los Álamos,Chipichape,Brisas de los Álamos,Urbanización La Merced,Vipasa,Urbanización La Flora,Altos de Menga,Sector Altos Normandía - Bataclán ,Área en desarrollo - Parque del Amor,El Nacional,El Peñón,San Antonio,San Cayetano,Los Libertadores,San Juan Bosco,Santa Rosa,La Merced,San Pascual,El Calvario,San Pedro,San Nicolás,El Hoyo,El Piloto,Navarro - La Chanca,Jorge Isaacs,Santander,Porvenir,Las Delicias,Manzanares,Salomia,Fátima,Sultana - Berlín - San Francisco ,Popular,Ignacio Rengifo,Guillermo Valencia,La Isla,Marco Fidel Suárez,Evaristo García,La Esmeralda,Bolivariano,Barrio Olaya Herrera,Unidad Residencial Bueno Madrid,Flora Industrial,Calima,Industria de Licores,La Alianza,El Sena,Los Andes,Los Guayacanes,Chiminangos Segunda Etapa,Chiminangos Primera Etapa,Metropolitano del Norte,Los Parques - Barranquilla,Villa del Sol,Paseo de Los Almendros,Los Andes B - La Riviera,Torres de Comfandi,Villa del Prado - El Guabito,San Luís,Jorge Eliecer Gaitán,Paso del Comercio,Los Alcázares,Petecuy Primera Etapa,Petecuy Segunda Etapa,La Rivera I,Los Guaduales,Petecuy Tercera Etapa,Ciudadela Floralia,Fonaviemcali,San Luís II,Urbanización Calimio,Sector Puente del Comercio,Alfonso López 1° Etapa,Alfonso López 2° Etapa,Alfonso López 3° Etapa,Puerto nuevo,Puerto Mallarino,Urbanización El Ángel del Hogar,Siete de Agosto,Los Pinos,San Marino,Las Ceibas,Base Aérea,Parque de la Caña,Fepicol,Primitivo Crespo,Simón Bolívar,Saavedra Galindo,Rafael Uribe Uribe,Santa Mónica Popular,La Floresta,Benjamín Herrera,Municipal,Industrial,El Troncal,Las Américas,Atanasio Girardot,Santa Fe,Chapinero,Villa Colombia,EL Trébol,La Base,Urbanización La Nueva Base,Alameda,Bretaña,Junín,Guayaquil,Aranjuez,Manuel María Buenaventura,Santa Mónica Belalcázar,Belalcázar,Sucre,Barrio Obrero,El Dorado,El Guabal,La Libertad,Santa Elena,Las Acacias,Santo Domingo,Jorge Zawadsky,Olímpico,Cristóbal Colón,La Selva,Barrio Departamental,Pasoancho,Panamericano,Colseguros Andes,San Cristóbal,Las Granjas,San Judas Tadeo I,San Judas Tadeo II,Barrio San Carlos,Maracaibo,La Independencia,La Esperanza,Urbanización Boyacá,El Jardín,La Fortaleza,El Recuerdo,Aguablanca,El Prado,20 de Julio,Prados de Oriente,Los Sauces,Villa del Sur,José Holguín Garcés,León XIII,José María Córdoba,San Pedro Claver,Los Conquistadores,La Gran Colombia,San Benito,Primavera,Villanueva,Asturias,Eduardo Santos,Barrio Alfonso Barberena A.,El Paraíso,Fenalco Kennedy,Nueva Floresta,Julio Rincón,Doce de Octubre,El Rodeo,Sindical,Bello Horizonte,Ulpiano Lloreda,El Vergel,El Poblado I,El Poblado II,Los Comuneros II Etapa,Ricardo Balcázar,Omar Torrijos,El Diamante,Lleras Restrepo,Villa del Lago,Los Robles,Rodrigo Lara Bonilla,Charco Azul,Villablanca,Calipso,Yira Castro,Lleras Restrepo II Etapa,Marroquín III,Los Lagos,Sector Laguna del Pondaje,El Pondaje,Sect. Asprosocial-Diamante,Alfonso Bonilla Aragón,Alirio Mora Beltrán,Manuela Beltrán,Las Orquídeas,José Manuel Marroquín II Etapa,José Manuel Marroquín I Etapa,Puerta del Sol,Los Naranjos I,Promociones Populares B,Los Naranjos II,El Retiro,Los Comuneros I Etapa,Laureano Gómez,El Vallado,Ciudad Córdoba,Mojíca,El Morichal,Mariano Ramos,República de Israel,Unión de Vivienda Popular,Antonio Nariño,Brisas del Limonar,Ciudad 2000,La Alborada,La Playa,Primero de Mayo,Ciudadela Comfandi,Ciudad Universitaria,Caney,Lili,Santa Anita - La Selva,El Ingenio,Mayapan - Las Vegas,Las Quintas de Don Simón,Ciudad Capri,La Hacienda,Los Portales - Nuevo Rey,Cañaverales - Los Samanes,El Limonar,Bosques del Limonar,El Gran Limonar - Cataya,El Gran Limonar,Unicentro Cali,Ciudadela Pasoancho,Prados del Limonar,Urbanización San Joaquín,Buenos Aires,Barrio Caldas,Los Chorros,Meléndez,Los Farallones,Francisco Eladio Ramírez,Prados del Sur,Horizontes,Mario Correa Rengifo,Lourdes,Colinas del Sur,Alférez Real,Nápoles,El Jordán,Cuarteles Nápoles,Sector Alto de Los Chorros,Polvorines,Sector Meléndez,Sector Alto Jordán,Alto Nápoles ,El Refugio,La Cascada,El Lido,Urbanización Tequendama,Barrio Eucarístico,San Fernando Nuevo,Urbanización Nueva Granada,Santa Isabel,Bellavista,San Fernando Viejo,Miraflores,3 de Julio,El Cedro,Champagnat,Urbanización Colseguros,Los Cambujos,El Mortiñal,Urbanización Militar,Cuarto de Legua - Guadalupe,Nueva Tequendama ,Camino Real - Joaquín Borrero Sinisterra,Camino Real - Los Fundadores,Santa Bárbara,Sector Altos de Santa Isabel,Tejares - Cristales,Unidad Residencial Santiago de Cali,Unidad Residencial El Coliseo,Cañaveralejo - Seguros Patria,Cañaveral,Pampa Linda,Sector Cañaveralejo Guadalupe Antigua,Sector Bosque Municipal,Unidad Deportiva Alberto Galindo Plaza de Toros,El Cortijo,Belisario Caicedo,Siloé,Lleras Camargo,Belén,Brisas de Mayo,Tierra Blanca,Pueblo Joven,Cementerio - Carabineros,Venezuela - Urbanización Cañaveralejo,La Sultana,Pízamos I,Pízamos II,Calimio Desepaz,El Remanso,Los Lideres,Desepaz Invicali,Compartir,Ciudad Talanga,Villamercedes I-Villa Luz- Las Garzas,Pízamos III - Las Dalias,Potrero Grande,Ciudadela del Río - CVC,Valle Grande,Planta de Tratamiento,Urbanización Ciudad Jardín,Parcelaciones Pance,Urbanización Río Lili,Ciudad Campestre,Club Campestre,Navarro,Navarro (Cabecera),El Estero,Las Vegas,Meléndez,Jarillón Navarro,El Hormiguero,El Hormiguero (Cabecera),Morgan,La Paila,Cauca Viejo,Cascajal,Valle del Lili,Pance,La Vorágine,Pance (Cabecera),San Pablo,La Castellana,El Trueno,El Pato,El Topacio,El Porvenir,San Francisco,El Jardín,Pico de Águila,Chorro de Plata,Pance Suburbano,La Buitrera,La Buitrera (Cabecera),La Riverita,El Rosario,El Otoño,Alto de los Mangos,La Luisa,La Sirena ,Parque de la Bandera,Cantaclaro,Club Campestre,Villacarmelo,Villacarmelo (Cabecera),La Fonda,Dos Quebradas,La Candelaria,El Carmen,Alto de los Mangos,Los Andes,Los Andes (Cabecera),Los Cárpatos,Quebrada Honda,Pueblo Nuevo,El Faro,El Mango - La Reforma,La Carolina  - Los Andes Bajo,El Cabuyal,Atenas,El Mameyal,Mónaco,Pichindé,Pichindé (Cabecera),Peñas Blancas,Loma de la Cajita,La Leonera,La Leonera (Cabecera),El Pato,El Porvenir,El Pajuil,Felidia,Felidia (Cabecera),La Esperanza,Las Nieves,El Diamante,El Cedral,La Soledad,El Saladito,El Saladito (Cabecera),San Antonio,San Pablo,San Miguel,Montañuelas,El Palomar,Las Nieves del Saladito,La Elvira,La Elvira (Cabecera),Los Laureles,Alto Aguacatal,Kilometro 18 (Vía al Mar),La Castilla,La Castilla (Cabecera),Las Palmas,Los Limones,Montañitas,Las Brisas,El Futuro - Gorgona,El Pinar,La Paz,La Paz (Cabecera),El Rosario,Lomitas,Montebello,Montebello (Cabecera),Campoalegre,Golondrinas,Golondrinas (Cabecera),Filo - Laguna,La María,Santa Mónica - Chipichape,Otro',
            'required' => true,
            'order' => 10,
        ]);

        Field::create([
            'form_id' => 6,
            'label' => 'Número celular',
            'slug' => 'numero-celular',
            'type' => 'number',
            'name' => 'cellphone_number',
            'description' => '',
            'placeholder' => 'Número celular',
            'options' => null,
            'required' => true,
            'order' => 11,
        ]);

        Field::create([
            'form_id' => 6,
            'label' => 'Número fijo de contacto',
            'slug' => 'numero-fijo-de-contacto',
            'type' => 'number',
            'name' => 'phone_number',
            'description' => '',
            'placeholder' => 'Número fijo de contacto',
            'options' => null,
            'required' => false,
            'order' => 12,
        ]);

        Field::create([
            'form_id' => 6,
            'label' => 'Correo electrónico',
            'slug' => 'correo-electronico',
            'type' => 'text',
            'name' => 'email',
            'description' => '',
            'placeholder' => 'Correo electrónico',
            'options' => null,
            'required' => false,
            'order' => 13,
        ]);


        DB::table('form_user_type')->insert([
          'form_id' => 6,
          'user_type_id' => 3,
        ]);

        // fileds
        /* ======================================================================================================== */

        // Formulario 7
        Form::create([
          // 'name' => 'OTRA INFORMACIÓN',
            'name' => 'Otra información',
            'description' => '',
            'order' => 5,
        ]);

        Field::create([
            'form_id' => 7,
            'label' => '¿Posee alguna discapacidad física?',
            'slug' => 'posee-alguna-discapacidad-fisica',
            'type' => 'radio',
            'name' => 'physical_disability',
            'description' => '',
            'placeholder' => '¿Posee alguna discapacidad física?',
            'options' => 'Si,No',
            'required' => true,
            'order' => 1,
        ]);

        Field::create([
            'form_id' => 7,
            'label' => 'Indique aquí cual es su discapacidad',
            'slug' => 'indique-aqui-cual-es-su-discapacidad',
            'type' => 'text',
            'name' => 'physical_disability_indication',
            'description' => '',
            'placeholder' => 'Indique aquí cual es su discapacidad',
            'options' => null,
            'required' => false,
            'order' => 2,
        ]);

        Field::create([
            'form_id' => 7,
            'label' => '¿Pertenece a alguno de estos grupos étnicos o poblacionales?',
            'slug' => 'Pertenece-a-alguno-de-estos-grupos-etnicos-o-poblacionales',
            'type' => 'select',
            'name' => 'ethnicity',
            'description' => '',
            'placeholder' => '¿Pertenece a alguno de estos grupos étnicos o poblacionales?',
            'options' => 'Pueblo Raizal,Pueblo Rrom/Gitano,Comunidad Rural y Campesina,Comunidad LGBTI,Pueblos Indígenas,Personas en condición de discapacidad,Mujeres,Artesanos,Afrodescendientes,Negritudes y palenque,Víctimas,Otro,No pertenesco ninguna',
            'required' => true,
            'order' => 3,
        ]);

        Field::create([
            'form_id' => 7,
            'label' => 'Grupo poblacional especial',
            'slug' => 'Grupo-poblacional-especial',
            'type' => 'file',
            'name' => 'poblational_group',
            'description' => 'En caso pertenezca a algún grupo poblacional y requiera tratamiento especifico, deberá anexar copia de un documento acreditado por una autoridad pertinente que lo avale como miembro de esa comunidad.',
            'placeholder' => 'Grupo poblacional especial',
            'options' => null,
            'required' => false,
            'order' => 3,
        ]);

        Field::create([
            'form_id' => 7,
            'label' => '¿Pertenece a alguna organización artística o cultural?',
            'slug' => 'Pertenece-a-alguna-organizacion-artistica-o-cultural',
            'type' => 'radio',
            'name' => 'cultural_organization',
            'description' => '',
            'placeholder' => '¿Pertenece a alguna organización artística o cultural?',
            'options' => 'Si,No',
            'required' => true,
            'order' => 4,
        ]);

        Field::create([
            'form_id' => 7,
            'label' => '¿Cuál es su organización artística o cultural?',
            'slug' => 'Cual-es-su-organización-artistica-o-cultural',
            'type' => 'text',
            'name' => 'cultural_organization_specification',
            'description' => '',
            'placeholder' => '¿Cuál es su organización artística o cultural?',
            'options' => null,
            'required' => false,
            'order' => 5,
        ]);

        Field::create([
            'form_id' => 7,
            'label' => '¿Ha recibido recursos del Estado para el desarrollo del su proyecto u obra que esta presente en esta convocatoria?',
            'slug' => 'Ha-recibido-recursos-del-estado-para-el-desarrollo-del-su-proyecto-u-obra-que-esta-presente-en-esta-convocatoria',
            'type' => 'radio',
            'name' => 'previously_help_resources_consult',
            'description' => '',
            'placeholder' => '¿Ha recibido recursos del Estado para el desarrollo del su proyecto u obra que esta presenta en esta convocatoria?',
            'options' => 'Si,No',
            'required' => true,
            'order' => 6,
        ]);

        Field::create([
            'form_id' => 7,
            'label' => '¿Indique qué apoyos ha recibido y de que entidades?',
            'slug' => 'Indique-que-apoyos-ha-recibido-y-de-que-entidades',
            'type' => 'text',
            'name' => 'help_resources_received',
            'description' => '',
            'placeholder' => '¿Indique qué apoyos ha recibido y de que entidades?',
            'options' => null,
            'required' => false,
            'order' => 7,
        ]);

        DB::table('form_user_type')->insert([
          'form_id' => 7,
          'user_type_id' => 1,
        ]);

        DB::table('form_user_type')->insert([
          'form_id' => 7,
          'user_type_id' => 3,
        ]);



        // fileds
        /* ======================================================================================================== */

        // Formulario 8
        Form::create([
          // 'name' => 'OTRA INFORMACIÓN - GRUPOS',
            'name' => 'Otra información - grupos',
            'description' => '',
            'order' => 5,
        ]);

        Field::create([
            'form_id' => 8,
            'label' => '¿La persona jurídica ha recibido recursos del Estado para el desarrollo del proyecto u obra que presenta?',
            'slug' => 'la-persona-juridica-ha-recibido-recursos-del-estado-para-el-desarrollo-del-proyecto-u-obra-que-presenta',
            'type' => 'radio',
            'name' => 'help_resources_received_juridic_person',
            'description' => '',
            'placeholder' => '¿La persona jurídica ha recibido recursos del Estado para el desarrollo del proyecto u obra que presenta?',
            'options' => 'Si,No',
            'required' => false,
            'order' => 1,
        ]);

        Field::create([
            'form_id' => 8,
            'label' => '¿Cúal?',
            'slug' => 'cual',
            'type' => 'text',
            'name' => 'Which',
            'description' => '',
            'placeholder' => '¿Cúal?',
            'options' => null,
            'required' => false,
            'order' => 2,
        ]);

        DB::table('form_user_type')->insert([
          'form_id' => 8,
          'user_type_id' => 2,
        ]);


        // fileds
        /* ======================================================================================================== */


        // Formulario 9
        Form::create([
          // 'name' => 'TÉRMINOS Y CONDICIONES',
            'name' => 'Términos y condiciones',
            'description' => '',
            'order' => 6,
        ]);

        Field::create([
            'form_id' => 9,
            'label' => 'Autorización de uso y declaración de conocimiento',
            'slug' => 'autorizacion-de-uso-y-declaracion-de-conocimiento',
            'type' => 'radio',
            'name' => 'use_&_knowledge_declaration_autorization',
            'description' => 'Declaro que no tengo inhabilidad o incompatibilidad para participar en las Convocatorias de Estímulos Cali y que he leído los requisitos generales y específicos de participación de la convocatoria en la cual participo. Autorizo a la Secretaría de Cultura para que las copias del proyecto o la obra de mi propiedad que no sean reclamadas durante el mes siguiente a la expedición del acto administrativo que acredita a los ganadores, sean destruidas. convocatoria junto con los documentos usados para la inscripción una vez vencido el termino para su retiro Manifiesto que en caso de renuncia al estímulo o apoyo, declinación o incumplimiento en el desarrollo del proyecto, reintegraré toda suma de dinero que me sea entregada junto con sus intereses, actualizaciones y/o subrogado pecuniario en caso de no tratarse de sumas de dinero, y pólizas (si aplica) en el caso que sea pertinente, sin perjuicio de las acciones judiciales que pueda iniciar la Secretaría de Cultura de Cali. Con la firma del presente formulario doy constancia que conozco y acepto todas las disposiciones y condiciones que rigen en esta convocatoria, incluyendo la autorización a la Secretaría de Cultura, para hacer uso del nombre e imagen mía o de mi organización cultural y la creación o producción apoyada mediante esta convocatoria, para efectos de publicidad o información de las entidades que ejecutan el contrato o convenio que da lugar a estos apoyos al sector cultural; y que los datos consignados en este formulario y sus respectivos soportes (anexos) son veraces y auténticos. Manifiesto que eximo de cualquier responsabilidad a la Secretaría de Cultura de Cali, de cualquier tipo de acción adelantada por terceros en su contra, derivada de la ejecución o incumplimiento en el desarrollo del proyecto. Manifiesto que en caso de que mi proyecto sea seleccionado como ganador, y se presente una causal de incompatibilidad y/o inhabilidad sobreviniente la informaré de inmediato a la Secretaría de Cultura de Cali, entendiendo que los tiempos y plazos para la ejecución de los proyectos, hace inminente que algunos proyectos se cancelen, cediendo el cupo a proyectos suplentes para ser beneficiarios. Autorizo a la Secretaría de Cultura de Cali, a ingresar, utilizar o reproducir la información contenida en este documento, a través de diferentes medios, para los fines estrictos de la convocatoria y para la elaboración de informes y reportes estadísticos, publicaciones impresas y digitales que pretendan recuperar, salvaguardar y difundir la memoria de los proyectos presentados que se considere necesarias.',
            'placeholder' => 'Autorización de uso y declaración de conocimiento',
            'options' => 'Leí y acepto los términos y condiciones',
            'required' => true,
            'order' => 1,
        ]);

        Field::create([
            'form_id' => 9,
            'label' => 'Protección de datos habeas data',
            'slug' => 'Protección-de-datos-habeas-data',
            'type' => 'radio',
            'name' => 'habeas_data',
            'description' => 'De acuerdo a lo estimado en el Decreto 1377 de 2013, reglamentario de la Ley 1581 de 2012 para efectos del tratamiento de los datos personales aquí recolectados, al diligenciar este formulario usted autoriza a la SECRETARIA DE CULTURA DE CALI a recolectar, transferir, almacenar, usar, circular, suprimir, compartir, actualizar y transmitir, de acuerdo con el Procedimiento para el tratamiento de los datos personales en procura de cumplir con las siguientes finalidades: (1) validar la información en cumplimiento de la exigencias legales de la convocatoria (2) adelantar las acciones de sistematización de la información para fines estadísticos, protocolos comunicativos, de referencia y selección a los que hubiera lugar (3) para el tratamiento de los datos personales protegidos por nuestro ordenamiento jurídico, (4) para el tratamiento y protección de los datos de contacto (direcciones de correo físico, electrónico, redes sociales y teléfono), (5) para solicitar y recibir de las personas naturales o jurídicas que se refirieran, las constancias o validaciones a las que hubiere lugar. El alcance de la autorización comprende la facultad para que el SECRETARIA DE CULTURA DE CALI le envíe mensajes con contenidos institucionales, notificaciones y demás información relativa a la convocatoria o procesos afines, a través de correo electrónico y/o mensajes de texto al teléfono móvil. Los titulares podrán ejercer sus derechos de conocer, actualizar, rectificar y suprimir sus datos personales, a través de los canales dispuestos por el SECRETARIA DE CULTURA DE CALI para la atención al público. Las condiciones previamente estipuladas se aplicarán también en el caso en el que el representante legal de un menor de edad (padre o tutor) otorgare datos personales de este a la SECRETARIA DE CULTURA DE CALI, caso en el cual la entidad se compromete a tratarlos conforme a la norma y solo tratándose de aquellos datos personales de naturaleza publica atendiendo a las prohibiciones de ley.',
            'placeholder' => 'Protección de datos habeas data',
            'options' => 'Leí y acepto los términos y condiciones',
            'required' => true,
            'order' => 2,
        ]);

        Field::create([
            'form_id' => 9,
            'label' => 'Aceptación de conocimiento y obligación',
            'slug' => 'aceptacion-de-conocimiento-y-obligacion',
            'type' => 'radio',
            'name' => 'knowledge_&_obligation_acceptance',
            'description' => 'Con mi firma acepto y me obligo plenamente a cumplir con las condiciones de esta convocatoria las cuales se encuentran establecidas en los términos de referencia y en las normas legales vigentes que le sean aplicables, incluidas las obligaciones que me correspondan en caso de resultar beneficiario',
            'placeholder' => 'Aceptación de conocimiento y obligación',
            'options' => 'Leí y acepto los términos y condiciones',
            'required' => true,
            'order' => 3,
        ]);

        Field::create([
            'form_id' => 9,
            'label' => 'Aceptacion consideraciones especiales - COVID 19',
            'slug' => 'aceptacion-de-conocimiento-Covid-19',
            'type' => 'radio',
            'name' => 'knowledge_&_obligation_covid',
            'description' => 'Sobre la situación actual Estado de Emergencia Económica, Social y Ecológica" según el Decreto 417 del 17 de marzo de 2020

La presente convocatoria se realiza en el marco de una declaratoria de "Estado de Emergencia Económica, Social y Ecológica" según el Decreto 417 del 17 de marzo de 2020 y los que se deriven de este, por lo cual la ejecución de los proyectos presentados y seleccionados como ganadores, deberán tener en cuenta para su ejecución, las directrices del gobierno nacional y local respecto al Estado de Emergencia y a la pandemia por el COVID-19."

Bajo ninguna circunstancia se podrán realizar actividades financiadas con los montos del estímulo si van en contra de alguna de las directrices nacionales, departamentales o locales.

En caso de ser necesario y estar justificado por las nuevas directrices nacionales o locales derivadas del COVID 19 y no poder llevar a cabo la actividad artística o cultural ganadora, se buscarán rutas para el desarrollo de la propuesta, pero en caso de resultar imposible el ganador deberá regresar el monto consignado.

De igual forma aquellos estímulos que por su naturaleza deben desarrollar actividades de manera presencial, en caso de que los decretos o lineamientos actuales o  futuros impidan el desarrollo de sus actividades y la imposibilidad de no poder plantear un mecanismo valido para su desarrollo, el dinero otorgado por la convocatoria no le será entregado, dado la posibilidad y el riesgo de no poder efectuar la actividad.',
            'placeholder' => 'Aceptación de conocimiento y obligación',
            'options' => 'Leí y acepto los términos y condiciones',
            'required' => true,
            'order' => 4,
        ]);

        DB::table('form_user_type')->insert([
          'form_id' => 9,
          'user_type_id' => 1,
        ]);

        DB::table('form_user_type')->insert([
          'form_id' => 9,
          'user_type_id' => 2,
        ]);

        DB::table('form_user_type')->insert([
          'form_id' => 9,
          'user_type_id' => 3,
        ]);


        // fileds
        /* ======================================================================================================== */


        // Formulario 10
        Form::create([
          // 'name' => 'DOCUMENTOS ADMINISTRATIVOS PERSONA NATURAL',
            'name' => 'Documentos administrativos',
            'description' => 'Lista de chequeo documentos administrativos persona natural',
            'order' => 7,
        ]);

        Field::create([
            'form_id' => 10,
            'label' => 'Copia del documento de identidad',
            'slug' => 'copia-del-documento-de-identidad',
            'type' => 'file',
            'name' => 'dni',
            'description' => 'Anexe copia del documento de identidad, se aceptan documentos en PDF máximo de 10 MB.',
            'placeholder' => 'Copia del documento de identidad',
            'options' => null,
            'required' => true,
            'order' => 1,
        ]);

        Field::create([
            'form_id' => 10,
            'label' => 'Copia del Registro Único Tributario RUT',
            'slug' => 'copia-del-registro-unico-tributario-rut',
            'type' => 'file',
            'name' => 'rut',
            'description' => 'Anexe copia del Registro Único tributario RUT , se aceptan documentos en PDF máximo de 10 MB, en caso de no tener este documento o necesitar actualizarlo, puede hacerlo a través de la pagina web https://muisca.dian.gov.co/',
            'placeholder' => 'Copia del Registro Único Tributario RUT',
            'options' => null,
            'required' => true,
            'order' => 2,
        ]);

        DB::table('form_user_type')->insert([
          'form_id' => 10,
          'user_type_id' => 1,
        ]);


        // Formulario 11
        Form::create([
          // 'name' => 'DOCUMENTOS ADMINISTRATIVOS PERSONA JURIDICA',
            'name' => 'Documentos administrativos',
            'description' => 'Copia legible del documento de identidad de la persona proponente. Nota: En caso de que en la convocatoria esté habilitada la opción para extranjeros, los documentos de identidad válidos para ellos son la cédula de extranjería o la visa de residencia.',
            'order' => 7,
        ]);

        Field::create([
            'form_id' => 11,
            'label' => 'Copia del documento de identidad',
            'slug' => 'copia-del-documento-de-identidad',
            'type' => 'file',
            'name' => 'dni',
            'description' => 'Anexe copia del documento de identidad , se aceptan documentos en PDF máximo de 10 MB.',
            'placeholder' => 'Copia del documento de identidad',
            'options' => null,
            'required' => true,
            'order' => 1,
        ]);

        Field::create([
            'form_id' => 11,
            'label' => 'Copia del Registro Único Tributario RUT',
            'slug' => 'copia-del-registro-unico-tributario-rut',
            'type' => 'file',
            'name' => 'rut',
            'description' => 'Anexe copia del Registro Único tributario RUT , se aceptan documentos en PDF máximo de 10 MB, en caso de no tener este documento o necesitar actualizarlo, puede hacerlo a través de la pagina web https://muisca.dian.gov.co/',
            'placeholder' => 'Copia del Registro Único Tributario RUT',
            'options' => null,
            'required' => true,
            'order' => 2,
        ]);

        DB::table('form_user_type')->insert([
          'form_id' => 11,
          'user_type_id' => 2,
        ]);


        // Formulario 12
        Form::create([
          // 'name' => 'DOCUMENTOS ADMINISTRATIVOS GRUPOS CONSTITUIDOS',
            'name' => 'Documentos administrativos',
            'description' => 'Copia legible del documento de identidad de la persona proponente. Nota: En caso de que en la convocatoria esté habilitada la opción para extranjeros, los documentos de identidad válidos para ellos son la cédula de extranjería o la visa de residencia.',
            'order' => 7,
        ]);

        Field::create([
            'form_id' => 12,
            'label' => 'Copia del documento de identidad',
            'slug' => 'copia-del-documento-de-identidad',
            'type' => 'file',
            'name' => 'dni',
            'description' => 'Anexe copia del documento de identidad , se aceptan documentos en PDF máximo de 10 MB.',
            'placeholder' => 'Copia del documento de identidad',
            'options' => null,
            'required' => true,
            'order' => 1,
        ]);

        Field::create([
            'form_id' => 12,
            'label' => 'Copia del Registro Único Tributario RUT',
            'slug' => 'copia-del-registro-unico-tributario-rut',
            'type' => 'file',
            'name' => 'rut',
            'description' => 'Anexe copia del Registro Único tributario RUT , se aceptan documentos en PDF máximo de 10 MB, en caso de no tener este documento o necesitar actualizarlo, puede hacerlo a través de la pagina web https://muisca.dian.gov.co/',
            'placeholder' => 'Copia del Registro Único Tributario RUT',
            'options' => null,
            'required' => true,
            'order' => 2,
        ]);

        DB::table('form_user_type')->insert([
          'form_id' => 12,
          'user_type_id' => 3,
        ]);
                // fileds
        /* ======================================================================================================== */


        // Formulario 13
        Form::create([
          // 'name' => 'DOCUMENTOS PARA EL JURADO',
            'name' => 'Documentos para el jurado',
            'description' => 'Revise de manera minuciosa las condiciones específicas de cada convocatoria; en ellas encontrará la descripción de los documentos que debe adjuntar a su propuesta para el jurado.
                              Descargue aquí documento que contiene términos de referencia de la convocatoria Estímulos Alcaldía de Cali - <a href="https://www.cali.gov.co/cultura/loader.php?lServicio=Tools2&lTipo=descargas&lFuncion=descargar&idFile=45200" target="_blank">Descargue Términos de Referencia de la convocatoria Pública Unidos por la vida de a Alcaldía de Santiago de Cali vigencia 2020</a>',
            'order' => 8,
        ]);

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries1',
            'description' => '•	Propuesta en formato escrito, video y/o audio, que incluya lo siguiente: <br>
                o	¿Cuál es mi práctica u oficio en el sector cultura? <br>
                o	¿Qué saber quiero compartir en medio de esta crisis? <br>
                o	¿Cuál es el aporte de ese saber en mi comunidad? <br>
                o	¿Qué experiencia tengo compartiendo mi saber? <br>
                o	¿Cómo quiero compartir ese saber?  <br>
                o	¿Cuál sería el resultado entregable que me gustaría tener? <br>
                o	¿Tengo dificultades para el uso o puesta en medios digitales de mi contenido?<br>
                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 1,
        ]);

        DB::table('incentive_field')->insert([
          'incentive_id' => 1,
          'field_id' => 74,
        ]);

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries2',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Hoja de vida del participante y/o grupo constituido, de máximo tres (3) páginas. <br>
o	Propuesta conceptual, narrativa y metodológica para la circulación en plataformas digitales del producto cultural a desarrollar con la beca, el cual cuente con la descripción de las etapas de ejecución, la proyección del alcance y la determinación de las plataformas digitales a vincular en el desarrollo del proyecto. <br>

o	Propuesta de medición del alcance del proyecto a desarrollar con la beca, con descripción de fechas de exposición digital, segmento de público impactado, interacción con la estrategia (caracterización del público y cantidad) entre otros.<br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 2,
        ]);

        DB::table('incentive_field')->insert([
          'incentive_id' => 2,
          'field_id' => 75,
        ]);

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries3',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

            o	Propuesta artística de circulación de contenidos.<br>
            o	Descripción y detalle de los artistas que circularán en la programación, con sus respectivas cartas de aceptación las cuales deberán indicar los montos honorarios asignados y la narrativa o actividad cultural a desarrollar.<br>
            o	Especificar claramente cuál será el producto entregable resultado de la implementación del proyecto, y cuáles serán los canales de difusión y circulación.<br>
            o	Soportes de trayectoria: Listado de actividades desarrolladas en los últimos dos años, que incluya evidencias de la realización de las mismas.<br>

            Tratamiento Estético y visual para el desarrollo de la propuesta.<br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 3,
        ]);

        DB::table('incentive_field')->insert([
          'incentive_id' => 3,
          'field_id' => 76,
        ]);

        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries4',
            'description' => '•	Proyecto que contenga <br>

o	Carta de intención que contenga, motivaciones de trabajo por la eliminación de toda forma de discriminación, motivación del trabajo con personas con discapacidad, recuento cronológico de la trayectoria del participante en acciones o proyectos encaminadas a la eliminación de las formas de discriminación para la población.<br>
o	Descripción clara y detallada de la narrativa a utilizar, donde evidencie el proceso creativo, la vinculación de la población, el tipo de narrativa a utilizar. <br>
o	Hoja de vida de los participantes del proyecto<br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 4,
        ]);

        DB::table('incentive_field')->insert([
          'incentive_id' => 4,
          'field_id' => 77,
        ]);

        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries5',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Portafolio de su trabajo con mínimo cinco (5) y máximo diez (10) imágenes escaneadas o fotografías legibles de dibujos, caricaturas, ilustraciones, bocetos, apuntes gráficos, esbozos, retratos o trabajos similares (terminados o en proceso) realizados en entre 2018 y 2020. <br>
o	Propuesta metodológica para la circulación en plataformas virtuales del proyecto a desarrollar con la beca, con descripción de cuáles canales utilizará, fechas de exposición digital, alcance esperado con la exhibición (caracterización del público y cantidad) y tipo de mensajes que utilizará para acompañar las publicaciones.<br>
o	Hoja de vida del participante, de máximo tres (3) páginas. <br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 5,
        ]);

        DB::table('incentive_field')->insert([
          'incentive_id' => 5,
          'field_id' => 78,
        ]);


        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries6',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Propuesta de serie fotográfica, de producto desarrollado entre 2018 y 2020. Deberá describir el objeto de la serie y proceso de creación desarrollado. <br>
o	Propuesta metodológica para la circulación en plataformas virtuales del proyecto a desarrollar con la beca, con descripción de cuáles canales utilizará, fechas de exposición digital, alcance esperado con la exhibición (caracterización del público y cantidad) y tipo de mensajes que utilizará para acompañar las publicaciones.<br>
o	Portafolio de su trabajo con máximo 20 imágenes. <br>
o	Hoja de vida del participante, de máximo tres (3) páginas. <br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 6,
        ]);

        DB::table('incentive_field')->insert([
          'incentive_id' => 6,
          'field_id' => 79,
        ]);

        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries7',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Metodología del laboratorio, donde se evidencien las fases, o etapas que vinculara la exploración, (Debe contemplar, entre otros, la convocatoria para seleccionar a los participantes (asistentes) a los laboratorios).<br>
o	Reseña y Hoja de Vida de la persona natural participante o de cada uno de los integrantes del equipo de trabajo (agrupación) que desarrollará el proyecto.<br>
o	Propuesta de socialización en donde se presente el proceso y resultados del laboratorio; que describa las actividades y/o acciones para socializar su experiencia y aprendizaje en caso de ser ganador del estímulo, deberá incluir la construcción de un manifiesto como herramienta de visibilización del proceso de investigación – creación. <br>
o	Carta de intención del participante (colectivo, persona natural)<br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 7,
        ]);

        DB::table('incentive_field')->insert([
          'incentive_id' => 7,
          'field_id' => 80,
        ]);

        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries8',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Nombre de la obra<br>
o	Descripción clara y detallada de la propuesta artística que contenga:<br>
o	Aspectos constitutivos de la propuesta, donde se describe el concepto, la técnica, los materiales, entre otros, para la realización de la propuesta.<br>
o	Enfoque temático y su descripción para el abordaje de la propuesta. <br>
o	Bocetos de la propuesta artística a realizar, color, acorde a las dimensiones del espacio. <br>
o	Texto Curatorial inicial. (Si aplica)<br>
o	Propuesta de zona a intervenir, la relación de interés personal del artista con la zona, descripción de la comunidad que habita, el acercamiento del artista con la comunidad, (si aplica), proceso de sensibilización de la intervención artística con la comunidad. <br>
o	Actividad de Socialización con la comunidad donde use una narrativa cultural para socializar y apropiar a la comunidad con la intervención<br>
o	Estrategia de difusión digital de la intervención realizada. <br>
o	Portafolio de su trabajo con máximo 05 imágenes de intervenciones similares a la propuesta que espera desarrollar. <br>


                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 8,
        ]);

        DB::table('incentive_field')->insert([
          'incentive_id' => 8,
          'field_id' => 81,
        ]);

        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries9',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Descripción general de la exposición que incluya un título tentativo, enfoque temático o conceptual preliminar y del tipo de obras que serán incluidas (escala, materiales, medios, etc.) de máximo una (1) página.<br>
o	Plan de producción de la muestra de las obras en la sala de exhibición del Centro Cultural de Cali (Se debe acordar con la coordinación del espacio para dimensiones y tamaños).<br>
o	Propuesta de socialización del proyecto.<br>
o	Para personas naturales, hoja de vida del proponente. Para grupos constituidos, hojas de vida de cada uno de sus integrantes (máximo tres [3] páginas) con sus respectivos soportes, tales como: certificaciones de participación en proyectos artísticos, copias de publicaciones o artículos de prensa, entre otros.  No se permiten enlaces a páginas web, portafolios online o vínculos a redes sociales; los soportes deben adjuntarse a la propuesta remitida.  En el caso de los grupos constituidos, deberá presentarse la hoja de vida artística de cada uno de sus integrantes y los soportes correspondientes.<br>
o	Portafolio de la obra que reúna imágenes, fichas técnicas y nivel de avance de la obra o las obras, propuestas donde se incluya bocetos o imágenes (según corresponda) que den cuenta de la obra que se pretende presentar.<br>


                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 9,
        ]);

        DB::table('incentive_field')->insert([
          'incentive_id' => 9,
          'field_id' => 82,
        ]);

        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries10',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):	<br>
o	¿En qué consiste la gestión que ha realizado?<br>
o	¿Cuál es el impacto que ha generado? <br>
o	¿Cuánto tiempo lleva desarrollando la actividad?<br>
o	Soportes que comprueben el proyecto que lidera exigido en el perfil, por ejemplo, publicaciones impresas o virtuales, exposiciones en muestras individuales o colectivas, etc. No se permiten enlaces a páginas web, portafolios online o vínculos a redes sociales. Los soportes deben ser parte integral de la propuesta. <br>
o	Hoja de vida del participante, de máximo tres (3) páginas. <br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 10,
        ]);

        DB::table('incentive_field')->insert([
          'incentive_id' => 10,
          'field_id' => 83,
        ]);


        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries11',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Propuesta metodológica para la circulación en plataformas virtuales del proyecto a desarrollar con la beca, con descripción de cuáles canales utilizará, fechas de exposición digital, alcance esperado con la exhibición (caracterización del público y cantidad) y tipo de mensajes que utilizará para acompañar las publicaciones.<br>
o	Descripción de los principales conocimientos en manejo de plataformas virtuales y las herramientas con los que cuenta para desarrollar el proceso.<br>
o	Portafolio de su trabajo con mínimo 5 y máximo 10 imágenes escaneadas o fotografías legibles de producto terminado, bocetos, apuntes, esbozos, retratos o trabajos similares (terminados o en proceso) realizados  entre 2018 y 2020. <br>
o	Hoja de vida del participante, de máximo tres (3) páginas. <br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 11,
        ]);

        DB::table('incentive_field')->insert([
          'incentive_id' => 11,
          'field_id' => 84,
        ]);

        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries12',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Título del proyecto.<br>
o	Descripción del colectivo de marketing digital y artesano participante.<br>
o	Planteamiento de estrategia de marketing digital, publico al que se dirige la propuesta, canales de exhibición <br>
o	Público Objeto al que se dirige.<br>
o	Soportes de experiencia de trabajo de marketing digital.<br>
o	Soportes de experiencia de un (1) artesano, que contengan 3 líneas de creación de productos artesanales de una misma tipología.<br>
o	Justificación y pertinencia del proyecto ¿cómo la innovación que sugiere el laboratorio aportará al mejoramiento de la Calidad de los productos artesanales? <br>
o	Hoja de vida de los expertos que fortalecen el producto. <br>
o	Hoja de vida de los artesanos y cartas de aceptación, debidamente firmadas con soportes de trayectoria del artesano con mínimo cinco (5) años en el campo de las artesanías, requisito habilitante en la propuesta. <br>
<br>
                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 12,
        ]);

        DB::table('incentive_field')->insert([
          'incentive_id' => 12,
          'field_id' => 85,
        ]);

        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries13',
            'description' => '• Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Título del proyecto.<br>
o	Descripción de los artesanos portadores (Nombre, producto artesanal, materiales, técnicas)<br>
o	Portafolios de los productos artesanales elaborados por el portador<br>
o	Nombres de la línea de productos a intervenir para cada uno de los portadores<br>
o	Justificación y pertinencia del proyecto ¿cómo la innovación que sugiere el laboratorio aportará al mejoramiento de la Calidad de los productos artesanales? (máximo setecientas [700] palabras).<br>
o	Hoja de vida de los expertos que fortalecen el producto <br>
o	Hoja de vida de los artesanos y cartas de aceptación, debidamente firmadas con soportes de trayectoria del artesano con mínimo cinco (5) años en el campo de las artesanías, requisito habilitante en la propuesta. <br>
o	Plan de difusión de las líneas de productos una vez concluida la vigencia del estímulo.<br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 13,
        ]);

        DB::table('incentive_field')->insert([
          'incentive_id' => 13,
          'field_id' => 86,
        ]);

        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries14',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>
o	Carta de intención en la cual manifiesta<br>
	Motivación de la postulación un máximo de 700 palabras<br>
	Descripción de la técnica o saber artesanal que maneja. <br>
o	Hoja de vida del participante, de máximo tres (3) páginas. <br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 14,
        ]);

        DB::table('incentive_field')->insert([
          'incentive_id' => 14,
          'field_id' => 87,
        ]);

        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries15',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>
o	Carta de intención en la cual manifiesta<br>
	Motivación de la postulación un máximo de 700 palabras<br>
	Descripción de la técnica o saber artesanal que maneja. <br>
o	Hoja de vida del participante, de máximo tres (3) páginas. <br>


                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 15,
        ]);

        DB::table('incentive_field')->insert([
          'incentive_id' => 15,
          'field_id' => 88,
        ]);

        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries16',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Nombre o título del proyecto.<br>
o	Descripción de los recursos artísticos de la propuesta, concepto, sinopsis (esquema o exposición de los puntos generales del producto a desarrollar), etapas del proceso creativo, guion (se estructuran los diálogos o mensajes que tiene el producto), justificación (Como será la relación a la temática de prevención de violencias de género.)  <br>
o	Descripción de los personajes.<br>
o	Guion o escaleta, (Obligatorio para participar)<br>
o	Plan de difusión de la obra una vez concluida la vigencia del estímulo.<br>
o	Descripción del abordaje, prevención de violencias de género, ¿cuál es el aporte del producto artístico para la construcción de un mensaje positivo sobre la prevención de las violencias de género? <br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 16,
        ]);

        DB::table('incentive_field')->insert([
          'incentive_id' => 16,
          'field_id' => 89,
        ]);


        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries17',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):  <br>

o	Nombre del proyecto.  <br>
o	Descripción clara y detallada del proyecto radiofónico que contenga:  <br>
	Tema de la serie; describa en máximo veinte (20) líneas el tema que abordará la narrativa.  <br>
	Justificación: describa en máximo treinta (30) líneas por qué es importante que se realice esta narrativa.  <br>
	Propósito; describa en máximo veinte (20) líneas lo que pretende lograr con la propuesta en relación con el tema y el público al que se dirige.  <br>
	Sinopsis; describa en un párrafo claro y preciso, de máximo diez (10) líneas, la idea central y la forma como se desarrolla en los capítulos que componen la serie.  <br>
	Tratamiento; describa en máximo treinta (30) líneas el formato y los componentes más significativos de la estética de la serie.  <br>
	Estructura; describa en máximo treinta (30) líneas el mapa de contenidos de la narrativa, la secuencia de los mismos y la duración de los capítulos que componen la serie.  <br>
o	Circulación de contenidos; describa en máximo veinte (20) líneas la estrategia que implementará para garantizar la circulación de los contenidos en diferentes plataformas y medios digitales.  <br>
o	Equipo de trabajo; relacione el equipo básico que tendrá a cargo la ejecución del proyecto. (Nombre, Profesión/Oficio, Rol/Responsabilidad).  <br>
o	Investigación; enuncie las principales fuentes de investigación, las metodologías empleadas y los hallazgos para cada uno de los siguientes elementos, en aproximadamente veinte [20] líneas para cada uno, donde demuestre los adelantos en la investigación, si se tienen, así como el plan de investigación.  <br>
o	Soportes con mínimo (3) tres productos audiovisuales a nombre de los miembros del grupo constituido o la persona jurídica   <br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 17,
        ]);

        DB::table('incentive_field')->insert([
          'incentive_id' => 17,
          'field_id' => 90,
        ]);



        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries18',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Título de la narrativa sonora.<br>
o	Tema de la narrativa sonora; describa en máximo veinte (20) líneas el tema que abordará la narrativa.<br>
o	Justificación; describa en máximo treinta (30) líneas por qué es importante que se realice esta narrativa.<br>
o	Propósito; describa en máximo veinte (20) líneas lo que pretende lograr con la narrativa en relación con el tema y el público al que se dirige.<br>
o	Sinopsis; describa en un párrafo claro y preciso, de máximo diez (10) líneas, la idea central de la narrativa y la forma como se desarrolla en los capítulos que componen la serie.<br>
o	Tratamiento; describa en máximo treinta (30) líneas el formato y los componentes más significativos de la propuesta narrativa y estética de la serie.<br>
o	Estructura; describa en máximo treinta (30) líneas el mapa de contenidos de la narrativa, la secuencia de los mismos y la duración de los capítulos que componen la serie.<br>
o	Público; describa en máximo veinte (20) líneas el público al que se dirige la narrativa.<br>
o	Territorio; describa en máximo veinte (20) líneas el tratamiento con el territorio que se involucrarán en el desarrollo de la narrativa.<br>
o	Circulación digital de contenidos; describa en máximo veinte (20) líneas la estrategia que implementará para garantizar la circulación de los contenidos en diferentes plataformas y medios digitales.<br>
o	Emisora aliada; presente en máximo veinte (20) líneas la emisora comunitaria o de interés público que emitirá la serie. Tenga en cuenta aspectos como localización, trayectoria, cobertura, públicos y características de la programación, además deberá incluir una carta de aceptación por dicha emisora.<br>
o	Equipo de trabajo; relacione el equipo básico que tendrá a cargo la ejecución del proyecto. (nombre, profesión/oficio, rol/responsabilidad).<br>
o	Hojas de vida artísticas del equipo de trabajo.<br>
o	¿Qué obtendrá el público cuando escuche la producción sonora?. En aproximadamente seis [6] líneas, describa lo que pretende con su proyecto en relación con el público al que se dirige, cómo cautivará al público, cuál es el resultado esperado en cuanto a las emociones o percepciones que busca en el público objeto.<br>
o	Investigación; enuncie las principales fuentes de investigación, las metodologías empleadas y los hallazgos para cada uno de los siguientes elementos,eEn aproximadamente veinte [20] líneas para cada uno,donde demuestre los adelantos en la investigación, si se tienen, así como el plan de investigación.<br>
o	Soportes con mínimo (3) tres productos audiovisuales donde  nombre los miembros del grupo constituido o la persona jurídica.<br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 18,
        ]);

        DB::table('incentive_field')->insert([
          'incentive_id' => 18,
          'field_id' => 91,
        ]);


        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries19',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):
            <br>
            o	Título del producto audiovisual.<br>
            o	Formato en el que se desarrollará su propuesta (cortometraje, largometraje, serie, animación o proyecto multiplataforma. <br>
            o	Género (Ficción y/o no ficción)<br>
            o	Tagline del producto audiovisual (máximo una [1] línea).<br>
            o	Storyline; idea central del producto audiovisual (en aproximadamente seis [6] líneas, describa de manera clara y concisa de qué se trata el producto audiovisual propuesto ¿qué se va a contar?)<br>
            o	Sinopsis; elabore un [1] párrafo claro y preciso, de quince [15] líneas aproximadamente, en el que evidencien qué historia va a contar, cuáles son sus conflictos, quiénes son sus protagonistas y cómo se transforman.<br>
            o	Argumento, escaleta o guion que describa la secuencia de la propuesta narrativa (teaser o piloto). <br>
            o	Propuesta estética; en un párrafo de aproximadamente treinta [30] líneas enuncie la propuesta estética del producto audiovisual: fotografía, montaje, diseño sonoro.<br>
            o	¿Cuál es o son las temáticas que aborda el proyecto audiovisual (máximo una [1] línea).<br>
            o	Público objetivo: ¿A quién está dirigida el producto audiovisual? En aproximadamente cinco [5] líneas indique el grupo etario y descríbalo.<br>
            o	¿Qué obtendrá  el público con el producto audiovisual?. En aproximadamente seis [6] líneas, describa lo que pretende con su proyecto en relación con el público al que se dirige, cómo cautivará al público, cuál es el resultado esperado en cuanto a las emociones o percepciones que busca en el público objetivo.<br>

            <br>
            o	Para series:<br>
            -Cantidad de capítulos, proyecte cuántos capítulos puede tener la primera temporada de la serie, preliminarmente.<br>
            -Duración de cada capítulo o producto audiovisual, proyecte la duración de cada capítulo, preliminarmente.<br>
            -Perfil preliminar de los protagonistas del producto audiovisual; en aproximadamente quince [15] líneas describa las principales características de los protagonistas.<br>
            <br>
            o	Para multiplataforma:<br>
            - Propuesta de cantidad de interacciones y los canales proyectados con el público objetivo.<br>
            -Niveles de profundidad y la implicación de cada usuario. En tres [3] líneas exponga los niveles de profundidad y la proyección de implicación con los usuarios.<br>
            <br>
            o	Para cortometraje de animación:<br>
            -Bocetos de diseño de escenarios principales y bocetos de diseño de personajes principales,  debe incluir imágenes de frente, perfil, espalda, expresiones faciales y corporales de los personajes.<br>
            -Descripción de la técnica de animación. (máximo una [1] línea)<br>
            <br>
            o	Duración del producto audiovisual o de los capítulos de la serie, proyecte cuánto durará el producto final.<br>
            o	Investigación; enuncie las principales fuentes de investigación, las metodologías empleadas y los hallazgos, en aproximadamente veinte [20] líneas para cada uno. Es necesario saber cuáles han sido los adelantos en la investigación, si se tienen, así como el plan de investigación.<br>
            <br>
            o	Equipo de trabajo: mencione los antecedentes y la experiencia previa del equipo de trabajo a cargo del proyecto, como mínimo se debe relacionar el director, el productor y el investigador. En aproximadamente treinta [30] líneas. <br>
            o	Hoja de vida artística donde describa la trayectoria del equipo (director, productor, guionista). Se pueden relacionar en las hojas de vida vínculos a proyectos realizados que se encuentren en Internet que den cuenta de la trayectoria del equipo, enlaces.<br>
            o	Describir los Perfiles del equipo  técnico a necesidad del proyecto (dirección de fotografía, dirección de sonido, director de arte, programadores, animadores, entre otros).<br>
            o	Plan de difusión del producto audiovisual una vez concluida la vigencia del estímulo<br>
            o	Soportes de mínimo cinco (5) productos audiovisuales a nombre de las personas naturales, miembros del grupo constituido o la persona jurídica.<br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 19,
        ]);

        DB::table('incentive_field')->insert([
          'incentive_id' => 19,
          'field_id' => 92,
        ]);

        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries20',
            'description' => 'Nota: El siguiente documento NO puede revelar la identidad del concursante, bajo causal de no aceptación. El documento sólo hará alusión al seudónimo o al título del guion, no se permite la participación de proyectos en coautorías y el resultado final de la obra deberá registrase ante la Dirección Nacional de Derechos de Autor. <br>
            <br>
•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Seudónimo<br>
o	Título del guion<br>
o	Sinopsis de máximo una (1) página tamaño carta a 12 puntos, a doble espacio.<br>
o	Argumento con estructura dramática en máximo ocho (8) páginas a doble espacio.<br>
o	Público de su proyecto (considere el objeto del estímulo: público infantil de tema libre, enfoque de género “Mujeres narran su territorio”, tema y público libre)<br>
o	Justificación (pertinencia de la temática a desarrollar en relación al público mencionado en el punto anterior) <br>
o	Carta de motivación proponente, en articulación al público o tema de interés (considere el objeto del estímulo). <br>
o	Una secuencia dialogada. <br>
o	Cuando el guion sea una adaptación de una obra, carta de autorización del titular de los derechos.<br>
o	Hoja de vida del tutor y carta de aceptación del mismo, debidamente firmada.  El proponente deberá postular al especialista que hará la tutoría, cuya labor consistirá en apoyar el proceso de realización del proyecto hasta lograr el resultado final. El tutor tendrá a su cargo la responsabilidad de certificar la autenticidad de la creación artística. Sobre este punto el Comité Técnico hará verificación. El tutor reportará al Comité Técnico de la Convocatoria Estímulos Cali a través del correo de electrónico convocatoriaestimulos@cali.gov.co, mediante conceptos escritos, el cumplimiento o no de los objetivos del proyecto.<br>
o	Plan de promoción, circulación y divulgación de la experiencia de escritura, diseñado y concertado, mediante todos los canales que estén a su alcance, posterior al estímulo.<br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 20,
        ]);

        DB::table('incentive_field')->insert([
          'incentive_id' => 20,
          'field_id' => 93,
        ]);

        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries21',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Título del proyecto de curaduría audiovisual.<br>
o	Descripción de la ficha técnica de cada obra que integra la curaduría audiovisual (nombre, dirección, duración, país, año, género, formato de proyección (DVD, Blu-ray, DCP, 35 mm, entre otros).<br>
o	Descripción clara y detallada de la propuesta conceptual de curaduría audiovisual, máximo una (1) página tamaño carta letra 12.<br>
o	Justificación donde argumente la pertinencia del proyecto curatorial y su contribución a la construcción de identidad y apropiación del territorio en el municipio máximo una (1) página tamaño carta letra 12.<br>
o	Descripción de avances a la fecha de presentación del proyecto de la gestión de los derechos de exhibición (máximo quinientas [500] palabras).   <br>
o	Metodología (máximo quinientas [500] palabras). <br>
o	Hoja de vida de la persona a cargo de la dirección de la curaduría, en la que se especifique la experiencia o trayectoria en la realización de curadurías o programación de obras audiovisuales en muestras, festivales, ciclos de cine (máximo quinientas [500] palabras). <br>
o	Certificados que respalden la experiencia donde evidencie que el proponente haya dirigido mínimamente dos (2) ciclos en cine clubes, festivales, muestras, o afines. <br>
o	Cartas de intención que demuestren avance en la gestión de los derechos de exhibición de las obras audiovisuales que integrarán la propuesta. (si aplica)<br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 21,
        ]);

        DB::table('incentive_field')->insert([
          'incentive_id' => 21,
          'field_id' => 94,
        ]);

        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries22',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):	<br>
o	¿En qué consiste la gestión que ha realizado?<br>
o	¿Cuál es el impacto que ha generado? <br>
o	¿Cuánto tiempo lleva desarrollando la actividad?<br>
o	Soportes que comprueben el proyecto que lidera exigido en el perfil, por ejemplo; publicaciones impresas o virtuales, exposiciones en muestras individuales o colectivas, etc. No se permiten enlaces a páginas web, portafolios online o vínculos a redes sociales. Los soportes deben ser parte integral de la propuesta. <br>
o	Hoja de vida del participante, de máximo tres (3) páginas. <br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 22,
        ]);

        DB::table('incentive_field')->insert([
          'incentive_id' => 22,
          'field_id' => 95,
        ]);

        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries23',
            'description' => '•	Un documento en PDF que contenga la descripción general del proyecto (en este mismo orden):<br>

o	Título del producto<br>
o	Descripción clara y detallada de la propuesta a desarrollar en artes escénicas, que incluya, sinopsis, argumento de la obra con estructura, justificación de la propuesta para el sector, etapas del proceso creativo. <br>
o	Recursos artísticos a emplear en el desarrollo de la propuesta. <br>
o	Descripción de la franja a la cual va dirigido el proyecto, ¿Por qué es importante este proyecto para el público objeto?<br>
o	Cuando sea una adaptación de una obra, carta de autorización del titular de los derechos.<br>
o	Propuesta metodológica para la circulación en plataformas virtuales, con descripción de canales que se usaran para circular el contenido, listado de fechas de circulación, alcance esperado con el  público objetivo, estrategia de difusión, tono comunicacional que se usara en la promoción.<br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 23,
        ]);

        DB::table('incentive_field')->insert([
          'incentive_id' => 23,
          'field_id' => 96,
        ]);


        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries24',
            'description' => '•	Un documento en PDF que contenga la descripción general del proyecto (en este mismo orden):<br>
o	Carta de intención de cada uno de los integrantes que indique la motivación de los proponentes, (una por cada proponente), dando respuesta a las siguientes preguntas: ¿Cuál es el aporte disciplinar para la co-creación? ¿Por qué considera que es importante el trabajo de estas dos disciplinas, justifique? ¿Cuál es el aporte a la innovación de las artes escénicas, justifique? ¿Describa las motivaciones personales para el trabajo conjunto entre los proponentes, donde indique que le aporta esa o esas personas al proyecto? (a manera de ejemplo, si son tres (3) los integrantes, la propuesta deberá tener en el documento en PDF tres (3) cartas de intención las cuales identifiquen con claridad el nombre de cada uno de ellos y el área disciplinas de las artes escénicas.)<br>
o	Listado de las disciplinas que confluirán para el desarrollo de la propuesta. <br>
o	Descripción general del proyecto donde indique, título, cuales son los objetivos generales y específicos del proyecto que aportan a la innovación de la propuesta, argumento histórico o narrativo en el que se enfocara la obra, tema o temática, metodología planteada para el desarrollo de la fase de escritura,  características de la publicación del documento, entre otros.<br>
o	Hoja de vida del tutor, que incluya perfil y experiencia en el desarrollo y financiación de proyectos de orden artístico y cultural. Es necesario asignar un 10% del presupuesto asignado.  <br>

                <br><br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 24,
        ]);

        DB::table('incentive_field')->insert([
            'incentive_id' => 24,
            'field_id' => 97,
          ]);
        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries25',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden): <br>
o	Nombre/título de la propuesta<br>
o	Objetivos del proceso de formación virtual<br>
o	Justificación de la propuesta donde se resalten los elementos metodológicos en el proceso de formación, la estrategia de convocatoria a aprendices virtuales, los criterios de selección del público objetivo y el nivel avance en el proceso formativo mínimo para acceder al curso. <br>
o	Marco metodológico del proceso formativo virtual con descripción de la etapa introductoria y los resultados esperados al final del proceso.<br>
o	Descripción del uso de la plataforma de comunicación web, donde describa los apoyos a utilizar. <br>
o	Propuesta de visibilización final del proceso.<br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 25,
        ]);

        DB::table('incentive_field')->insert([
            'incentive_id' => 25,
            'field_id' => 98,
        ]);

        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries26',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Propuesta metodológica para la circulación en plataformas virtuales del proyecto a desarrollar con la beca, con descripción de cuáles canales utilizará, fechas de exposición digital, alcance esperado con la exhibición (caracterización del público y cantidad) y tipo de mensajes que utilizará para acompañar las publicaciones.<br>
o	Hoja de vida del participante y/o grupo constituido, de máximo tres (3) páginas. <br>
o	Soportes que comprueben su trayectoria en el quehacer cultural exigido en el perfil, por ejemplo; publicaciones impresas o virtuales, exposiciones en muestras individuales o colectivos, etc. No se permiten enlaces a páginas web, portafolios online o vínculos a redes sociales. Los soportes deben ser parte integral de la propuesta. <br>
o	Portafolio de su trabajo con máximo 20 imágenes. <br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 26,
        ]);

        DB::table('incentive_field')->insert([
            'incentive_id' => 26,
            'field_id' => 99,
        ]);


        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries27',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Nombre de la propuesta o del concierto<br>
o	Reseña del proponente<br>
o	Listado de los artistas que participarán en la propuesta y el rol que desempeñan, de la siguiente manera:<br>
Para grupos constituidos, reseña de  una [1] página y hoja de vida de todos sus integrantes, máximo un [1] párrafo por integrante. Para personas jurídicas, hoja de vida de la entidad máximo una [1] página y hoja de vida de los artistas que participarán en el evento máximo un [1] párrafo por artista.<br>
Soportes de su trayectoria artística y su participación en eventos, festivales y conciertos.<br>
Adjuntar videos de la agrupación que realizará el concierto.<br>
Repertorio a interpretar, indicando nombre de la obra, nombre del compositor, duración total del programa.<br>
Rider técnico<br>


                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 27,
        ]);

        DB::table('incentive_field')->insert([
            'incentive_id' => 27,
            'field_id' => 100,
        ]);

        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries28',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Nombre de la propuesta artística.<br>
o	Reseña del proponente.<br>
o	Listado de los artistas que participarán en la propuesta y el rol que desempeñan, de la siguiente manera:<br>
o	Para grupos constituidos, reseña del grupo máximo una [1] página y hoja de vida de todos sus integrantes máximo un [1] párrafo por integrante. Para personas jurídicas, hoja de vida de la entidad, máximo una [1] página y de los artistas que participarán en el evento, máximo un [1] párrafo por artista.<br>
o	Soportes de  la trayectoria artística y  la participación en eventos, festivales y conciertos.<br>
o	Adjuntar videos de la agrupación que realizará la presentación.<br>
o	Repertorio a interpretar, indicando nombre de la obra, nombre del compositor, duración total del programa.<br>


                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 28,
        ]);

        DB::table('incentive_field')->insert([
            'incentive_id' => 28,
            'field_id' => 101,
        ]);

        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries29',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Intención de la propuesta.<br>
o	Introducción<br>
o	Antecedentes<br>
o	Objeto general<br>
o	Objetos específicos<br>
o	Justificación de la importancia de la investigación<br>
o	Metodología de investigación <br>
o	Productos a entregar: acopio de materiales, acercamiento de diálogos, temática, perspectiva dramática, referentes, estilo de escritura. <br>
o	Hoja de vida con los soportes respectivos (mínimo tres [3] soportes) y certificaciones que den cuenta de la experiencia de la persona relacionada con el estímulo. Socialización del proceso de investigación.<br>


                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 29,
        ]);

        DB::table('incentive_field')->insert([
            'incentive_id' => 29,
            'field_id' => 102,
        ]);

        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries30',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):	<br>
o	¿En qué consiste la gestión que ha realizado?<br>
o	¿Cuál es el impacto que ha generado? <br>
o	¿Cuánto tiempo lleva desarrollando la actividad?<br>
o	Soportes que comprueben el proyecto que lidera exigido en el perfil, por ejemplo; publicaciones impresas o virtuales, exposiciones en muestras individuales o colectivas, etc. No se permiten enlaces a páginas web, portafolios online o vínculos a redes sociales. Los soportes deben ser parte integral de la propuesta. <br>
o	Hoja de vida del participante, de máximo tres (3) páginas. <br>


                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 30,
        ]);

        DB::table('incentive_field')->insert([
            'incentive_id' => 30,
            'field_id' => 103,
        ]);

        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries31',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Título de la obra que se publicará.<br>
o	Área en la que se enmarca el libro a publicar: literatura (cuento, poesía, novela, ensayo, crónica, investigación sobre literatura y lectura), difusión de temáticas culturales y artísticas, o circulación de resultados de investigación sobre temáticas culturales y artísticas.<br>
o	Lengua en la que está escrita la obra: castellano, lenguas nativas colombianas, otras.<br>
o	Descripción clara y detallada del contenido de la obra que se publicará, especificando sus aspectos constitutivos (máximo 700 palabras).<br>
o	Texto final de la obra a publicar (presentar en texto plano, no se requiere diagramación).<br>
o	Características del libro: tiraje, número de páginas, tipo de papel, número de tintas, dimensiones, tipo de cubierta, tipo de encuadernación y otra información que se considere pertinente.<br>
o	Público al que va dirigida la obra.<br>
o	Aporte del libro a la oferta editorial del país: describa cómo contribuye a la oferta editorial existente en el país, qué necesidades satisface o atiende (máximo quinientas [500] palabras).<br>
o	Listado de personas involucradas en el desarrollo de la obra: escritores, compiladores, ilustradores, diseñadores, traductores (nombre y rol que desempeña)<br>
o	Plan de difusión del libro publicado que incluya al menos públicos potenciales, formas de acceso, alternativas de mercadeo (precio, distribuidores, si aplica) y resultados esperados.<br>
o	Registro nacional de derecho de autor de la obra. En el momento de presentarse a la convocatoria se aceptará certificado de que el registro se encuentra en trámite. En caso de resultar ganador se exigirá el registro expedido para la firma de la carta de compromiso.<br>
o	Para persona natural, hoja de vida del proponente que indique las actividades que ha desarrollado en el campo de la creación literaria, (máximo quinientas [500] palabras). Para grupos constituidos, hojas de vida de cada uno de sus integrantes (máximo doscientas cincuenta [250] palabras).<br>
o	Soportes de trayectoria de los proponentes en el campo de la circulación de contenidos a través de libros.<br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 31,
        ]);

        DB::table('incentive_field')->insert([
            'incentive_id' => 31,
            'field_id' => 104,
        ]);


        /* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries32',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Título de la obra que se publicará.<br>
o	Área en la que se enmarca el libro a publicar: Literatura (cuento, poesía, novela), Ensayo, Crónica, Investigación sobre literatura.<br>
o	Lengua en la que está escrita la obra: castellano, lenguas nativas colombianas, otras<br>
o	Descripción clara y detallada del contenido de la obra que se publicará, especificando sus aspectos constitutivos. (Máximo 700 palabras).<br>
o	Justificación formato eBook. Texto que sustente la pertinencia de la utilización del formato eBook, y se dé cuenta de la narrativa, la estructura multimedial, la usabilidad y la propuesta gráfica del libro digital.<br>
o	Público al que va dirigida la obra.<br>
o	Aporte del libro a la oferta editorial del país: describa cómo contribuye a la oferta editorial existente en el país, qué necesidades y público satisface o atiende. (máximo quinientas [500] palabras)<br>
o	Listado de personas involucradas en el desarrollo de la obra: escritores, compiladores, ilustradores, diseñadores, traductores (nombre y rol que desempeña)<br>
o	Plan de difusión del libro publicado que incluya al menos públicos potenciales, formas de acceso, alternativas de mercadeo (precio, distribuidores, si aplica) y resultados esperados.<br>
o	Texto final de la obra a publicar en formato digital (PDF) y con anexos a color si aplica (ilustraciones, fotografías, gráficos, etc.).<br>
o	Para persona natural, hoja de vida del proponente que indique las actividades que ha desarrollado en el campo de la creación literaria, (máximo quinientas [500] palabras). Para grupos constituidos, hojas de vida de cada uno de sus integrantes (máximo doscientas cincuenta [250] palabras).<br>
o	Registro nacional de derecho de autor de la obra al momento de presentarse a la convocatoria.<br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 32,
        ]);

        DB::table('incentive_field')->insert([
            'incentive_id' => 32,
            'field_id' => 105,
        ]);


        Field::create([
                    'form_id' => 13,
                    'label' => 'Documento anexo que sera enviado a los jurados',
                    'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
                    'type' => 'file',
                    'name' => 'document_to_juries33',
                    'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Título de la obra que se publicará.<br>
o	Área en la que se enmarca el libro a publicar.<br>
o	Descripción clara y detallada del contenido de la obra que se publicará, especificando sus aspectos constitutivos (máximo setecientos [700] palabras).<br>
o	Texto final de la obra a publicar (presentar en texto plano, no se requiere diagramación). En el caso de publicaciones que incluyan imágenes (comic, novela gráfica, otros), estas deben presentarse como adjuntos sin diagramación.<br>
o	Características del libro: tiraje, número de páginas, tipo de papel, número de tintas, dimensiones, tipo de cubierta, tipo de encuadernación y otra información que se considere pertinente.<br>
o	Departamento y municipio de edición de la publicación.<br>
o	Público al que va dirigida la publicación.<br>
o	Aporte de la publicación a la oferta editorial del país: describa cómo contribuye a la oferta editorial existente en el país, qué necesidades satisface o atiende (máximo quinientas [500] palabras).<br>
o	Listado de personas involucradas en el desarrollo de la obra: escritores, compiladores, ilustradores, diseñadores, traductores (nombre y rol que desempeña)<br>
o	Plan de difusión de la publicación que incluya al menos públicos potenciales, formas de acceso, alternativas de mercadeo (precio, distribuidores, si aplica) y resultados esperados.<br>
o	Para persona natural, hoja de vida del proponente que indique las actividades que ha desarrollado en el campo de la creación literaria, (máximo quinientas [500] palabras). Para grupos constituidos, hojas de vida de cada uno de sus integrantes (máximo doscientas cincuenta [250] palabras por cada integrante).<br>

                        <br> Máximo 100 MB',
                    'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
                    'options' => null,
                    'required' => true,
                    'order' => 33,
                ]);

                DB::table('incentive_field')->insert([
                    'incentive_id' => 33,
                    'field_id' => 106,
                ]);

/* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries34',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Carta de intención de participación en el estímulo, (entre trescientas [300] y quinientas [500] palabras). El proponente explicará en este texto, ¿cómo se encuentra constituido el club de lectura? (Cantidad de personas, rangos de edad, roles), ¿por qué considera pertinente que sean beneficiados con el estímulo?, ¿Cuáles son los intereses literarios del grupo? y los objetivos de impacto frente a las lecturas realizadas, (¿cómo beneficia al grupo de personas pertenecientes?).<br>
o	Un ensayo no superior a quinientas [500] palabras en donde exponga la última obra literaria que hubiese leído y sus reflexiones sobre un elemento que considere relevante en dicha obra.<br>
o	Listado de libros a adquirir con el monto del estímulo.<br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 34,
        ]);

        DB::table('incentive_field')->insert([
            'incentive_id' => 34,
            'field_id' => 107,
        ]);

        /* ======================================================================================================== */

                Field::create([
                    'form_id' => 13,
                    'label' => 'Documento anexo que sera enviado a los jurados',
                    'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
                    'type' => 'file',
                    'name' => 'document_to_juries35',
                    'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	¿En qué consiste la gestión que ha realizado?<br>
o	¿Cuál es el impacto que ha generado? <br>
o	¿Cuánto tiempo lleva desarrollando la actividad?<br>
o	Soportes que comprueben el proyecto que lidera exigido en el perfil, por ejemplo, publicaciones impresas o virtuales, exposiciones en muestras individuales o colectivas, etc. No se permiten enlaces a páginas web, portafolios online o vínculos a redes sociales. Los soportes deben ser parte integral de la propuesta. <br>
o	Hoja de vida del participante, de máximo tres (3) páginas. <br>
o	Soportes que comprueben su trayectoria en el quehacer cultural exigido en el perfil, por ejemplo, publicaciones impresas o virtuales, exposiciones en muestras individuales o colectivas, etc. No se permiten enlaces a páginas web, portafolios online o vínculos a redes sociales. Los soportes deben ser parte integral de la propuesta. <br>

                        <br> Máximo 100 MB',
                    'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
                    'options' => null,
                    'required' => true,
                    'order' => 35,
                ]);

                DB::table('incentive_field')->insert([
                    'incentive_id' => 35,
                    'field_id' => 108,
                ]);

/* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries36',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Carta de intención de participación en el estímulo, (entre trescientas [300] y quinientas [500] palabras). El proponente explicará en este texto, ¿cómo se encuentra constituido el club de lectura? (Cantidad de personas, rangos de edad, roles), ¿por qué considera pertinente que sean beneficiados con el estímulo?, ¿Cuáles son los intereses literarios del grupo? y los Objetos de impacto frente a las lecturas realizadas, (¿cómo beneficia al grupo de personas pertenecientes?).<br>
o	Un ensayo no superior a quinientas [500] palabras en donde exponga la última obra literaria que hubiese leído y sus reflexiones sobre un elemento que considere relevante en dicha obra.<br>
o	Listado de libros a adquirir con el monto del estímulo.<br>
o	Soportes de trayectoria que demuestren como mínimo un (1) año de realización de actividades<br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 36,
        ]);

        DB::table('incentive_field')->insert([
            'incentive_id' => 36,
            'field_id' => 109,
        ]);

        /* ======================================================================================================== */

                Field::create([
                    'form_id' => 13,
                    'label' => 'Documento anexo que sera enviado a los jurados',
                    'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
                    'type' => 'file',
                    'name' => 'document_to_juries37',
                    'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Nombre de la propuesta y descripción general del proyecto<br>
o	Justificación y pertinencia<br>
o	Tabla de contenidos.<br>
o	Descripción de los fondos o grupo documental del patrimonio documental del municipio sobre el cual se realizará el proceso de apropiación.<br>
o	Metodología<br>
o	Resultado final esperado como producto de la beca <br>
o	Plan de difusión de la obra una vez concluida la vigencia del estímulo.<br>
o	Para personas naturales, hoja de vida del proponente. Para grupos constituidos, hoja de vida de cada uno de los integrantes. Para personas jurídicas, hoja de vida de la entidad, en la que se especifique su trayectoria. En todos los casos, se debe adjuntar la copia del título universitario, salvo para las autoridades indígenas, afrocolombianas o romaníes, acreditadas como tal. <br>
o	Soportes que acrediten la trayectoria académica e investigativa durante al menos los últimos tres (3) años. Entre estos se cuentan: publicaciones, investigaciones, asistencias de investigación, etc.<br>

                        <br> Máximo 100 MB',
                    'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
                    'options' => null,
                    'required' => true,
                    'order' => 37,
                ]);

                DB::table('incentive_field')->insert([
                    'incentive_id' => 37,
                    'field_id' => 110,
                ]);

/* ======================================================================================================== */

        Field::create([
            'form_id' => 13,
            'label' => 'Documento anexo que sera enviado a los jurados',
            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
            'type' => 'file',
            'name' => 'document_to_juries38',
            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Nombre del evento y de la Manifestación Cultural a Salvaguardar. <br>
o	Actividad o actividades Culturales con la que se orientará a la protección de la salvaguarda de la manifestación.  <br>
o	¿Por qué se hará el evento?: descripción clara y detallada de los Objetos del evento, <br>
la justificación de la importancia del evento o actividad e impacto para la población beneficiada y la pertinencia del evento a la salvaguarda de la manifestación (máximo setecientas [700] palabras). *<br>
o	¿Cuándo se hará el evento?: descripción clara y detallada de los tiempos en los que se desarrollará el evento en todas sus etapas (máximo setecientas [700] palabras). <br>
o	¿Dónde se hará el evento?: descripción clara y detallada de los espacios en los que se desarrollará el evento en todas sus etapas. Incluya fotografías, planos y documentación de soporte que ilustre los avances (máximo setecientas [700] palabras).<br>
o	¿Con quiénes se hará el evento? Descripción clara y detallada de las personas que participarán en el evento en todas sus etapas. Incluya aquí población beneficiada, artistas, invitados, organizadores, productores, etc. es requisito presentar un organigrama.<br>
o	¿Cómo se desarrollará el evento? Descripción clara y detallada de los contenidos del evento en todas sus etapas. Incluya aquí detalles de la programación, perfil de los invitados, fotografías de obras a presentar, repertorios, líneas de continuidad, entre otros. (máximo setecientas [700] palabras). <br>
o	Hojas de vida de las personas inscritas en el organigrama.<br>
o	En caso de persona jurídica proponente (máximo doscientas cincuenta [250] palabras) y hojas de vida de las personas que participarán en el desarrollo del evento en Calidad de coordinadores de área. Ejemplo: (área artística, comunicaciones, producción, administrativa, logística, etc. máximo doscientas cincuenta [250] palabras por persona).<br>
o	Hoja de vida del grupo constituido proponente (máximo doscientas cincuenta [250] palabras) y hojas de vida de las personas que participarán en el desarrollo del evento en Calidad de coordinadores de área. Ejemplo: (área artística, comunicaciones, producción, administrativa, logística, etc, máximo doscientas cincuenta [250] palabras por persona). <br>
o	Soportes que certifiquen el número de versiones realizadas del evento, donde se vea claramente el nombre del evento, la fecha y el lugar de realización (copias de programas de mano, certificados, constancias, fotografías donde se identifique el evento, etc.). <br>

                <br> Máximo 100 MB',
            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
            'options' => null,
            'required' => true,
            'order' => 38,
        ]);

        DB::table('incentive_field')->insert([
            'incentive_id' => 38,
            'field_id' => 111,
        ]);

        /* ======================================================================================================== */

                Field::create([
                    'form_id' => 13,
                    'label' => 'Documento anexo que sera enviado a los jurados',
                    'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
                    'type' => 'file',
                    'name' => 'document_to_juries39',
                    'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Nombre del evento. <br>
o	Manifestación Cultural a proteger<br>
o	Descripción del arraigo cultural de la organización, que va a desarrollar el proyecto (máximo setecientas [700] palabras), donde describan cuál es su vínculo con la manifestación expresada demostrado a través de aval: Para comunidades indígenas, a través del cabildo municipal, comunidades NARP, (Consejos comunitarios y organizaciones con personería jurídica ante el Ministerio del Interior, confederación de colonias), para pueblos ROM (reconocidos y avalados por el Ministerio del Interior).<br>

NOTA: para todos los casos aplica la certificación expedida por el la Subsecretaria de poblaciones y etnias de la Secretaría de Bienestar social<br>

o	Actividad o actividades Culturales con la que se orientará a la protección de la salvaguarda de la manifestación.  <br>
o	¿Por qué se hará el evento?: descripción clara y detallada de los Objetos del evento, justificación de la importancia del evento o actividad e impacto para la población beneficiada (máximo setecientas [700] palabras). <br>
o	¿Cuándo se hará el evento?: descripción clara y detallada de los tiempos en los que se desarrollará el evento en todas sus etapas (máximo setecientas [700] palabras). <br>
o	¿Dónde se hará el evento?: descripción clara y detallada de los espacios en los que se desarrollará el evento en todas sus etapas. Incluya fotografías, planos y documentación de soporte que ilustre los avances (máximo setecientas [700] palabras).<br>
o	¿Con quiénes se hará el evento? Descripción clara y detallada de las personas que participarán en el evento en todas sus etapas. Incluya aquí población beneficiada, artistas, invitados, organizadores, productores, etc. <br>
o	¿Cómo se desarrollará el evento? Descripción clara y detallada de los contenidos del evento en todas sus etapas. Incluya aquí detalles de la programación, perfil de los invitados, fotografías de obras a presentar, repertorios, líneas de continuidad, entre otros. (máximo setecientas [700] palabras). <br>
o	Hojas de vida: para persona jurídica proponente (máximo doscientas cincuenta [250] palabras) y hojas de vida de las personas que participarán en el desarrollo del evento en Calidad de coordinadores de área. Ejemplo: (área artística, comunicaciones, producción, administrativa, logística, etc.) (máximo doscientas cincuenta [250] palabras por persona). Para grupo constituido proponente (máximo doscientas cincuenta [250] palabras) y hojas de vida de las personas que participarán en el desarrollo<br> del evento en Calidad de coordinadores de área. Ejemplo: (área artística, comunicaciones, producción, administrativa, logística, etc.) (máximo doscientas cincuenta [250] palabras por persona).

                        <br> Máximo 100 MB',
                    'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
                    'options' => null,
                    'required' => true,
                    'order' => 39,
                ]);

                DB::table('incentive_field')->insert([
                    'incentive_id' => 39,
                    'field_id' => 112,
                ]);

                /* ======================================================================================================== */

                        Field::create([
                            'form_id' => 13,
                            'label' => 'Documento anexo que sera enviado a los jurados',
                            'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
                            'type' => 'file',
                            'name' => 'document_to_juries40',
                            'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Título de la investigación (se sugiere un título corto y descriptivo)<br>
o	Problema de investigación (máximo quinientas [500] palabras)<br>
o	Objetos generales y específicos (máximo cien [100] palabras).<br>
o	Antecedentes (máximo quinientas [500] palabras). <br>
o	Marco teórico (máximo quinientas [500] palabras)<br>
o	Justificación (máximo quinientas [500] palabras).<br>
o	Metodología y actividades de investigación (máximo quinientas [500] palabras). <br>
o	Consideraciones éticas (manejo de la información, autorización de los participantes, posibles impactos del estudio propuesto, etc.) (máximo doscientas cincuenta [250] palabras).<br>
o	Borrador de la propuesta de divulgación del resultado de la investigación. (máximo quinientas [500] palabras)  <br>
o	Bibliografía<br>
o	Planteamiento inicial de la estrategia de divulgación y planteamiento de herramienta de apropiación del conocimiento. <br>
o	Documentos que demuestren el avance de la investigación propuesta (indagaciones preliminares, revisiones bibliográficas, investigaciones y publicaciones del proponente relacionadas con el tema, etc.).<br>
<br>
o	Para persona natural, hoja de vida del proponente que indique las actividades que ha desarrollado en el campo investigativo pertinente para la propuesta presentada. (máximo quinientas [500] palabras). Para grupos constituidos, hojas de vida de cada uno de sus integrantes (máximo doscientas cincuenta [250] palabras por persona).<br>


                                <br> Máximo 100 MB',
                            'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
                            'options' => null,
                            'required' => true,
                            'order' => 40,
                        ]);

                        DB::table('incentive_field')->insert([
                            'incentive_id' => 40,
                            'field_id' => 113,
                        ]);


/* ======================================================================================================== */

Field::create([
    'form_id' => 13,
    'label' => 'Documento anexo que sera enviado a los jurados',
    'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
    'type' => 'file',
    'name' => 'document_to_juries41',
    'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Título de la investigación (se sugiere un título corto y descriptivo que haga alusión a la manifestación abordada)<br>
o	Fase del Proyecto (Investigación o publicación) <br>
o	Problema de investigación (máximo quinientas [500] palabras)<br>
o	Objetos generales y específicos (máximo cien [100] palabras).<br>
o	Antecedentes (máximo quinientas [500] palabras). <br>
o	Marco teórico (máximo quinientas [500] palabras)<br>
o	Justificación (máximo quinientas [500] palabras).<br>
o	Metodología y actividades de investigación (máximo quinientas [500] palabras). <br>
o	Consideraciones éticas (manejo de la información, autorización de los participantes, posibles impactos del estudio propuesto, etc.) (máximo doscientas cincuenta [250] palabras).<br>
o	Borrador de la propuesta de divulgación del resultado de la investigación. (máximo quinientas [500] palabras).<br>
o	Equipo de investigación <br>
o	Bibliografía<br>
o	Documentos que demuestren el avance de la investigación propuesta (indagaciones preliminares, revisiones bibliográficas, investigaciones y publicaciones del proponente relacionadas con el tema, etc.). Para los proyectos que opten en la modalidad de investigación es obligatorio entregar un abstracto de la investigación (máximo setecientas [700] palabras).<br>

o	Para persona natural, hoja de vida del proponente que indique las actividades que ha desarrollado en el campo investigativo pertinente para la propuesta presentada. (máximo quinientas [500] palabras). Para grupos constituidos, hojas de vida de cada uno de sus integrantes (máximo doscientas cincuenta [250] palabras por persona).<br>

        <br> Máximo 100 MB',
    'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
    'options' => null,
    'required' => true,
    'order' => 41,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 41,
    'field_id' => 114,
]);

/* ======================================================================================================== */

Field::create([
    'form_id' => 13,
    'label' => 'Documento anexo que sera enviado a los jurados',
    'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
    'type' => 'file',
    'name' => 'document_to_juries42',
    'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Título de la investigación (se sugiere un título corto y descriptivo)<br>
o	Problema de investigación (máximo quinientas [500] palabras) objetivos generales y específicos (máximo cien [100] palabras).<br>
o	Antecedentes (máximo quinientas [500] palabras). <br>
o	Marco teórico (máximo quinientas [500] palabras)<br>
o	Justificación (máximo quinientas [500] palabras).<br>
o	Metodología y actividades de investigación (máximo quinientas [500] palabras). <br>
o	Consideraciones éticas (manejo de la información, autorización de los participantes, posibles impactos del estudio propuesto, etc.) (máximo doscientas cincuenta [250] palabras).<br>
o	Resultado esperado (impacto y proyección) (máximo quinientas [500] palabras).<br>
o	Plan de socialización de los resultados de la investigación. <br>
o	Bibliografía<br>
o	Documentos que demuestren el avance de la investigación propuesta (indagaciones preliminares, revisiones bibliográficas, investigaciones y publicaciones del proponente relacionadas con el tema, etc.).<br>
o	Para persona natural, hoja de vida del proponente que indique las actividades que ha desarrollado en el campo investigativo pertinente para la propuesta presentada. (máximo quinientas [500] palabras). Para grupos constituidos, hojas de vida de cada uno de sus integrantes (máximo doscientas cincuenta [250] palabras por persona).<br>

        <br> Máximo 100 MB',
    'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
    'options' => null,
    'required' => true,
    'order' => 42,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 42,
    'field_id' => 115,
]);

/* ======================================================================================================== */

Field::create([
    'form_id' => 13,
    'label' => 'Documento anexo que sera enviado a los jurados',
    'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
    'type' => 'file',
    'name' => 'document_to_juries43',
    'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):<br>

o	Título de la investigación (se sugiere un título corto y descriptivo)<br>
o	Problema de investigación (máximo quinientas [500] palabras) objetivos generales y específicos (máximo cien [100] palabras).<br>
o	Antecedentes (máximo quinientas [500] palabras). <br>
o	Marco teórico (máximo quinientas [500] palabras)<br>
o	Justificación (máximo quinientas [500] palabras).<br>
o	Metodología y actividades de investigación (máximo quinientas [500] palabras). <br>
o	Consideraciones éticas (manejo de la información, autorización de los participantes, posibles impactos del estudio propuesto, etc.) (máximo doscientas cincuenta [250] palabras).<br>
o	Resultado esperado (impacto y proyección) (máximo quinientas [500] palabras).<br>
o	Plan de socialización de los resultados de la investigación. <br>
o	Bibliografía<br>
o	Documentos que demuestren el avance de la investigación propuesta (indagaciones preliminares, revisiones bibliográficas, investigaciones y publicaciones del proponente relacionadas con el tema, etc.).<br>
o	Para persona natural, hoja de vida del proponente que indique las actividades que ha desarrollado en el campo investigativo pertinente para la propuesta presentada. (máximo quinientas [500] palabras). Para grupos constituidos, hojas de vida de cada uno de sus integrantes (máximo doscientas cincuenta [250] palabras por persona).<br>

        <br> Máximo 100 MB',
    'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
    'options' => null,
    'required' => true,
    'order' => 43,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 43,
    'field_id' => 116,
]);

/* ======================================================================================================== */

Field::create([
    'form_id' => 13,
    'label' => 'Documento anexo que sera enviado a los jurados',
    'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
    'type' => 'file',
    'name' => 'document_to_juries44',
    'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden):

o	Antecedentes y contextualización.<br>
o	Justificación o pertinencia. 	 <br>
o	Objetos generales y específicos.	<br>
o	Metodología de creación de producto. 	<br>
o	Estrategia de divulgación para que el producto digital sea de conocimiento público, tales como talleres, charlas, conferencias, exposiciones o publicaciones. Se debe contemplar como mínimo una (1) presentación en el Centro Cultural de Cali. Si se va a hacer una exposición, proponer una sala alterna a la del Centro Cultural de Cali, en caso de que haya una actividad programada en este espacio. 	<br>
o	Indicadores del proyecto (forma de medir el impacto del producto en la comunidad).<br>
o	Estado del proyecto (indicar si el proyecto se inicia en el momento de recibir el estímulo o si se encuentra en algún punto específico de la investigación).  <br>
o	Bibliografía. <br>
o	Certificado de otros aportes (en caso de cofinanciación).  <br>
o	Gestión de derechos de uso del material, en caso de ser necesario, y de conformidad con la normatividad legal vigente en el país. <br>
o	Si el proyecto es de descripción o catalogación, tener en cuenta el tipo de registros y campos a incluir, así como el formato (MARC21, Dublin Core, RDA). <br>
o	Si es una digitalización, deberá cumplir las siguientes características mínimas: si la captura es con cámara fotográfica debe tener formato .JPG (súper fina) y como derivado .PDF (con la combinación de todas las imágenes), con la máxima resolución con la que cuente la cámara. Si la captura es con escáner deben tener formato .TIFF, y como derivado .JPG y .PDF (con la combinación de todas las imágenes) y la resolución debe estar en rangos de 300 a 600 dpi. Si el documento contiene texto, el archivo .PDF debe tener OCR26 (80% o 90%). <br>
o	En caso de que la propuesta incluya la intervención de los documentos con procesos técnicos específicos (por ejemplo, catalogación bibliográfica, descripción documental, índices analíticos, inventarios, conservación y restauración de documentos, conservación preventiva de espacios y almacenamiento técnico de documentos) anexar la cotización de la empresa o persona que pueda adelantar la labor. <br>
o	Tener en cuenta que el producto deberá contar con la más amplia licencia de Creative Commons para la divulgación de sus contenidos.  <br>
o	Tener en cuenta que el proyecto debe incluir toda la información de plataformas y software sobre los cuales se desarrollará el producto y especificar si son de código abierto o licenciado.  <br>
o	Material bibliográfico y documental que ilustre el proyecto (pueden ser fotografías, las cuales deben venir debidamente identificadas).  <br>
o	Para persona natural, hoja de vida del participante. Para los grupos constituidos, se deben adjuntar las hojas de vida de cada uno de sus integrantes. Para personas jurídicas, hoja de vida de la entidad. <br>

        <br> Máximo 100 MB',
    'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
    'options' => null,
    'required' => true,
    'order' => 44,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 44,
    'field_id' => 117,
]);

/* ======================================================================================================== */

Field::create([
    'form_id' => 13,
    'label' => 'Documento anexo que sera enviado a los jurados',
    'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
    'type' => 'file',
    'name' => 'document_to_juries45',
    'description' => '●	Un documento en PDF que contenga la descripción general del proyecto (en este mismo orden):<br>
○	Título del proyecto.<br>
○	Categoría a la que se postula. <br>
○	Sector al que pertenece. <br>
○	Descripción general de la propuesta de programación, en la que se especifique los requerimientos técnicos o logísticos (si aplica) y el equipo que necesita para desarrollarla, extensión máxima de quinientas (500) palabras.<br>
○	Aportes al campo de la producción de espectáculos públicos de las artes escénicas.<br>
○	Debe presentar el equipo de trabajo encargado del desarrollo del proyecto, sus hojas de vida y respectivos soportes.  <br>
○	Anexar certificación de aforo del evento por parte del escenario donde se realizó el espectáculo o por parte de la boletera que vendió las boletas. Con su respectivo Código PULEP de cada evento. <br>
○	Cronograma de actividades para la realización del producto. <br>
○	Presupuesto general desglosado para el desarrollo. Este presupuesto debe incluir la propuesta de financiación del proyecto por parte del proponente u otros aliados.<br>
○	Pertinencia de la estrategia de sostenibilidad. <br>
○	Estrategia y plan de comercialización del producto. <br>

        <br> Máximo 100 MB',
    'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
    'options' => null,
    'required' => true,
    'order' => 45,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 45,
    'field_id' => 118,
]);

/* ======================================================================================================== */

Field::create([
    'form_id' => 13,
    'label' => 'Documento anexo que sera enviado a los jurados',
    'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
    'type' => 'file',
    'name' => 'document_to_juries46',
    'description' => '●	Un documento en PDF que contenga la descripción general del proyecto (en este mismo orden):<br>
○	Título del proyecto.<br>
○	Categoría a la que se postula. <br>
○	Sector al que pertenece. <br>
○	Descripción general de la propuesta de programación, en la que se especifique los requerimientos técnicos o logísticos (si aplica) y el equipo que necesita para desarrollarla, extensión máxima de quinientas (500) palabras.<br>
○	Aportes al campo de la producción de espectáculos públicos de las artes escénicas.<br>
○	Debe presentar el equipo de trabajo encargado del desarrollo del proyecto, sus hojas de vida y respectivos soportes.  <br>
○	Anexar certificación de aforo del evento por parte del escenario donde se realizó el espectáculo o por parte de la boletera que vendió las boletas. Con su respectivo Código PULEP de cada evento. <br>
○	Cronograma de actividades para la realización del producto. <br>
○	Presupuesto general desglosado para el desarrollo. Este presupuesto debe incluir la propuesta de financiación del proyecto por parte del proponente u otros aliados.<br>
○	Pertinencia de la estrategia de sostenibilidad. <br>
○	Estrategia y plan de comercialización del producto. <br>

        <br> Máximo 100 MB',
    'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
    'options' => null,
    'required' => true,
    'order' => 46,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 46,
    'field_id' => 119,
]);

/* ======================================================================================================== */

Field::create([
    'form_id' => 13,
    'label' => 'Documento anexo que sera enviado a los jurados',
    'slug' => 'documento-en-pdf-que-contiene-proyecto-para-jurados',
    'type' => 'file',
    'name' => 'document_to_juries47',
    'description' => '•	Descripción general del proyecto en un documento PDF que incluya (en este mismo orden): <br>
o	Título del programa de formación propuesto.<br>
o	Objetivo general del programa propuesto máximo cien [100] palabras.<br>
o	Antecedentes del programa propuesto máximo quinientas [500] palabras.<br>
o	Descripción clara y detallada del currículo (contenidos del programa de formación propuesto), metodología de enseñanza/aprendizaje (número de sesiones, temáticas, espacios, recursos pedagógicos, tipo de interacción entre orientadores y beneficiarios, etc.), e  indicadores para medir el avance de los participantes (sistema de acompañamiento, seguimiento de avances, etc.).<br>
o	Población beneficiaria: perfil de ingreso y egreso, rangos de edad, nivel de escolaridad, etc. Las propuestas deberán tener un número mínimo de veinte (20) beneficiarios (distintos a los miembros de la organización proponente), cada uno de los cuales debe recibir al menos cuarenta y ocho (48) horas de formación.<br>
o	Descripción del proceso de convocatoria para la selección de los beneficiarios. <br>
o	Descripción general de la población beneficiaria. <br>
o	Justificación de la importancia del programa de formación para la población beneficiaria.<br>
o	Listado de personas que participarán en el desarrollo del programa: coordinador, orientadores, personal de apoyo, etc. (este listado es distinto al de los beneficiarios).<br>
o	Listado de instituciones adicionales que apoyarán el programa propuesto (si aplica).<br>
o	Descripción de jornada de clausura.<br>
o	Cronograma general de ejecución del estímulo donde se incluya jornada de clausura.<br>
o	Presupuesto. Se deben especificar los rubros que se financiarán con el estímulo y los que asumirán las otras entidades que financien el proyecto (si aplica).<br>
o	Carta de instituciones adicionales que apoyarán el programa, certificando su apoyo y precisando el tipo de apoyo que prestará (si aplica). <br>
o	Documentos que soporten la trayectoria del programa de formación propuesto (ediciones anteriores, actividades asociadas, etc.) En cabeza de la organización proponente.<br>
o	Hoja de vida de la persona jurídica proponente (máximo doscientas cincuenta [250] palabras) y hojas de vida de las personas que participarán en el desarrollo del programa (máximo doscientas cincuenta [250] palabras por persona). Para grupos constituidos, hojas de vida de cada uno/a de sus integrantes (máximo doscientas cincuenta [250] palabras).<br>
o	Descripción de la propuesta de práctica laboral en los eventos o espectáculos en los que participa el ganador. Donde describa los apoyos económicos que entregara al estudiante para realizar el proceso. Deberá vincular como mínimo a la ARL al estudiante que realicé dicha práctica. <br>

        <br> Máximo 100 MB',
    'placeholder' => 'Documento en PDF que contiene proyecto para jurados',
    'options' => null,
    'required' => true,
    'order' => 47,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 47,
    'field_id' => 120,
]);


Field::create([
    'form_id' => 13,
    'label' => 'Acreditación de experiencia en la linea de participación.',
    'slug' => 'acreditacion-de-experiencia-en-la-linea-de-participacion.',
    'type' => 'file',
    'name' => 'experience_document_acreditation',
    'description' => 'NOTA: Deberá Diligenciar el "Anexo 07 - Soporte trayectoria" - para presentar la suma de evidencias y crear un solo documento en formato PDF. Las evidencias aquí presentadas, darán cuenta de la idoneidad por la categoría en la cual participará, la suma de todas las evidencias no podrá exceder las 100 MB <a href="https://www.cali.gov.co/cultura/loader.php?lServicio=Tools2&lTipo=descargas&lFuncion=descargar&idFile=45192" target="_blank">Descargar Anexo 07 - Soporte trayectoria</a>',
    'placeholder' => 'Acreditación de experiencia en la linea de participación.',
    'options' => null,
    'required' => true,
    'order' => 121,
]);

Field::create([
    'form_id' => 13,
    'label' => 'Cronograma',
    'slug' => 'cronograma',
    'type' => 'file',
    'name' => 'schedule',
    'description' => 'Estos documentos serán enviados a los jurados para evaluar la factibilidad de la propuesta. máximo 100 MB - <a href="https://www.cali.gov.co/cultura/loader.php?lServicio=Tools2&lTipo=descargas&lFuncion=descargar&idFile=45190" target="_blank">Descargar Anexo 05 - Cronograma de la propuesta</a>',
    'placeholder' => 'Cronograma y presupuesto de la propuesta',
    'options' => null,
    'required' => true,
    'order' => 122,
]);

Field::create([
    'form_id' => 13,
    'label' => 'Presupuesto de la propuesta',
    'slug' => 'Presupuesto-de-la-propuesta',
    'type' => 'file',
    'name' => 'budget',
    'description' => 'Estos documentos serán enviados a los jurados para evaluar la factibilidad de la propuesta. máximo 100 MB - <a href="https://www.cali.gov.co/cultura/loader.php?lServicio=Tools2&lTipo=descargas&lFuncion=descargar&idFile=45191" target="_blank">Descargar Anexo 06 - Presupuesto de la propuesta</a>',
    'placeholder' => 'Cronograma y presupuesto de la propuesta',
    'options' => null,
    'required' => true,
    'order' => 123,
]);


DB::table('incentive_field')->insert([
    'incentive_id' => 2,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 2,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 3,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 3,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 3,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 4,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 4,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 4,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 5,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 5,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 6,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 6,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 7,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 7,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 7,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 8,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 8,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 8,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 9,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 9,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 9,
    'field_id' => 123,
]);


DB::table('incentive_field')->insert([
    'incentive_id' => 10,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 11,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 11,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 12,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 12,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 12,
    'field_id' => 123,
]);
DB::table('incentive_field')->insert([
    'incentive_id' => 13,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 13,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 13,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 14,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 15,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 17,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 17,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 17,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 18,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 18,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 18,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 19,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 19,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 19,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 20,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 20,
    'field_id' => 122,
]);


DB::table('incentive_field')->insert([
    'incentive_id' => 21,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 21,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 21,
    'field_id' => 123,
]);



DB::table('incentive_field')->insert([
    'incentive_id' => 22,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 23,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 23,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 23,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 24,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 24,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 24,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 25,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 25,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 25,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 26,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 26,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 27,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 27,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 28,
    'field_id' => 121,
]);


DB::table('incentive_field')->insert([
    'incentive_id' => 28,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 29,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 29,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 29,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 30,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 31,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 31,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 31,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 32,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 32,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 32,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 33,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 33,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 33,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 34,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 34,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 35,
    'field_id' => 123,
]);


DB::table('incentive_field')->insert([
    'incentive_id' => 36,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 36,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 37,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 37,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 37,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 38,
    'field_id' => 121,
]);


DB::table('incentive_field')->insert([
    'incentive_id' => 38,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 39,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 39,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 40,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 40,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 40,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 41,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 41,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 41,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 42,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 42,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 42,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 43,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 43,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 43,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 44,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 44,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 44,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 45,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 45,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 45,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 46,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 46,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 46,
    'field_id' => 123,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 47,
    'field_id' => 121,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 47,
    'field_id' => 122,
]);

DB::table('incentive_field')->insert([
    'incentive_id' => 47,
    'field_id' => 123,
]);






        DB::table('form_user_type')->insert([
          'form_id' => 13,
          'user_type_id' => 1,
        ]);

        DB::table('form_user_type')->insert([
          'form_id' => 13,
          'user_type_id' => 2,
        ]);

        DB::table('form_user_type')->insert([
          'form_id' => 13,
          'user_type_id' => 3,
        ]);







    }
}
