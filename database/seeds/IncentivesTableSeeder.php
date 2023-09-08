<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


use App\Area;
use App\Incentive_type;
use App\Line_action;
use App\Status_type;
use App\User_type;
use App\User;
use App\Incentive;

class IncentivesTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        // Incentive::create([
        //     'call_id' => 1,
        //     'type_id' => 1,
        //     'name' => 'Premio cali, unidos de corazón por el arte y la cultura',
        //     'slug' => '001',
        //     'code' => '001',
        //     'line_id' => 6,
        //     'quantity' => 200,
        //     'value' => '$600.000',
        //     'area_id' => 7,
        //     'method' => 'Digital',
        //     'contact' => 'convocatoriaestímulos@cali.gov.co',
        //     'description' => '',
        //     'start_at' => '2020-05-08',
        //     'finish_at' => '2020-05-25',
        //     'execution_start' => '2020-06-08',
        //     'execution_finish' => '2020-07-31',
        // ]);

        DB::table('incentive_user_type')->insert([
            'incentive_id' => 1,
            'user_type_id' => 1
        ]);

        // Incentive::create([
        //     'call_id' => 1,
        //     'type_id' => 1,
        //     'name' => 'Estímulo para la circulación de contenidos de gestión y economía cutural',
        //     'slug' => '002',
        //     'code' => '002',
        //     'start_at' => '2020-05-08',
        //     'finish_at' => '2020-05-24',
        //     'line_id' => 7,
        //     'quantity' => 24,
        //     'value' => '$5.000.000',
        //     'area_id' => 7,
        //     'execution_start' => '2020-06-08',
        //     'execution_finish' => '2020-11-30',
        //     'method' => 'Digital',
        //     'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //     'description' => '',
        // ]);

        DB::table('incentive_user_type')->insert([
            'incentive_id' => 2,
            'user_type_id' => 1
        ]);

        DB::table('incentive_user_type')->insert([
            'incentive_id' => 2,
            'user_type_id' => 2
        ]);

        DB::table('incentive_user_type')->insert([
            'incentive_id' => 2,
            'user_type_id' => 3
        ]);

        // Incentive::create([
        //     'call_id' => 1,
        //     'type_id' => 1,
        //     'name' => 'Estímulo para el fortalecimiento a organizaciones culturales',
        //     'slug' => '003',
        //     'code' => '003',
        //     'line_id' => 7,
        //     'quantity' => 5,
        //     'value' => '$14.000.000',
        //     'area_id' => 7,
        //     'method' => 'Digital',
        //     'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //     'description' => '',
        //     'start_at' => '2020-05-08',
        //     'finish_at' => '2020-05-24',
        //     'execution_start' => '2020-06-18',
        //     'execution_finish' => '2020-07-31',
        // ]);


        DB::table('incentive_user_type')->insert([
            'incentive_id' => 3,
            'user_type_id' => 2
        ]);

        DB::table('incentive_user_type')->insert([
            'incentive_id' => 3,
            'user_type_id' => 3
        ]);

        // Incentive::create([
        //     'call_id' => 1,
        //     'type_id' => 1,
        //     'name' => 'Estímulo para la realización de narrativas culturales para la inclusión cultural de la población con discapacidad',
        //     'slug' => '004',
        //     'code' => '004',
        //     'start_at' => '2020-05-08',
        //     'finish_at' => '2020-05-29',
        //     'line_id' => 2,
        //     'quantity' => 3,
        //     'value' => '$8.000.000',
        //     'area_id' => 7,
        //     'execution_start' => '2020-06-18',
        //     'execution_finish' => '2020-07-31',
        //     'method' => 'Digital',
        //     'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //     'description' => '',
        // ]);

        DB::table('incentive_user_type')->insert([
            'incentive_id' => 4,
            'user_type_id' => 1
        ]);

        DB::table('incentive_user_type')->insert([
            'incentive_id' => 4,
            'user_type_id' => 2
        ]);

        DB::table('incentive_user_type')->insert([
            'incentive_id' => 4,
            'user_type_id' => 3
        ]);


        //ÁREA: ARTES PLÁSTICAS Y VISUALES
        // Incentive::create([
        //     'call_id' => 1,
        //     'type_id' => 1,
        //     'name' => 'Estímulo para la creación y circulación de contenidos de dibujo a mano y/o digital en diferentes técnicas',
        //     'slug' => '005',
        //     'code' => '005',
        //     'start_at' => '2020-05-08',
        //     'finish_at' => '2020-05-24',
        //     'line_id' => 2,
        //     'quantity' => 20,
        //     'value' => '$2.500.000',
        //     'area_id' => 1,
        //     'execution_start' => '2020-06-08',
        //     'execution_finish' => '2020-07-31',
        //     'method' => 'Digital',
        //     'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //     'description' => '',
        // ]);

        DB::table('incentive_user_type')->insert([
            'incentive_id' => 5,
            'user_type_id' => 1
        ]);

        // Incentive::create([
        //     'call_id' => 1,
        //     'type_id' => 1,
        //     'name' => 'Estímulo para la circulación de contenidos fotográficos',
        //     'slug' => '006',
        //     'code' => '006',
        //     'start_at' => '2020-05-08',
        //     'finish_at' => '2020-05-24',
        //     'line_id' => 3,
        //     'quantity' => 10,
        //     'value' => '$2.500.000',
        //     'area_id' => 1,
        //     'execution_start' => '2020-06-08',
        //     'execution_finish' => '2020-07-31',
        //     'method' => 'Digital',
        //     'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //     'description' => '',
        // ]);

        DB::table('incentive_user_type')->insert([
            'incentive_id' => 6,
            'user_type_id' => 1
        ]);

        // Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo para el diseño y desarrollo del laboratorio de artes, ciencia y tecnología – laboratorio de ciudad, territorio conjunto – tender el puente',
        //   'slug' => '007',
        //   'code' => '007',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-07-10',
        //   'line_id' => 4,
        //   'quantity' => 2,
        //   'value' => '$5.000.000 - $6.000.000',
        //   'area_id' => 1,
        //   'execution_start' => '2020-09-01',
        //   'execution_finish' => '2020-11-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        // ]);

        DB::table('incentive_user_type')->insert([
            'incentive_id' => 7,
            'user_type_id' => 1
        ]);

        DB::table('incentive_user_type')->insert([
            'incentive_id' => 7,
            'user_type_id' => 3
        ]);

        // Incentive::create([
        //     'call_id' => 1,
        //     'type_id' => 1,
        //     'name' => 'Estímulo para la creación en gráfica urbana',
        //     'slug' => '008',
        //     'code' => '008',
        //     'start_at' => '2020-05-08',
        //     'finish_at' => '2020-07-10',
        //     'line_id' => 4,
        //     'quantity' => 5,
        //     'value' => '$6.000.000',
        //     'area_id' => 1,
        //     'execution_start' => '2020-09-01',
        //     'execution_finish' => '2020-11-30',
        //     'method' => 'Digital',
        //     'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //     'description' => '',
        // ]);

        DB::table('incentive_user_type')->insert([
            'incentive_id' => 8,
            'user_type_id' => 1
        ]);

        DB::table('incentive_user_type')->insert([
            'incentive_id' => 8,
            'user_type_id' => 3
        ]);

        // Incentive::create([
        //     'call_id' => 1,
        //     'type_id' => 1,
        //     'name' => 'Estímulo para la circulación de obra plástica y/o visual en el centro cultural de cali',
        //     'slug' => '009',
        //     'code' => '009',
        //     'start_at' => '2020-05-08',
        //     'finish_at' => '2020-07-10',
        //     'line_id' => 3,
        //     'quantity' => 2,
        //     'value' => '$6.000.000',
        //     'area_id' => 1,
        //     'execution_start' => '2020-09-01',
        //     'execution_finish' => '2020-11-30',
        //     'method' => 'Digital',
        //     'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //     'description' => '',
        // ]);

        DB::table('incentive_user_type')->insert([
            'incentive_id' => 9,
            'user_type_id' => 1
        ]);

        DB::table('incentive_user_type')->insert([
            'incentive_id' => 9,
            'user_type_id' => 3
        ]);

        // Incentive::create([
        //     'call_id' => 1,
        //     'type_id' => 1,
        //     'name' => 'Premio reconocimiento de la gestión cultural comunitaria en artes plásticas y visuales',
        //     'slug' => '010',
        //     'code' => '010',
        //     'start_at' => '2020-05-08',
        //     'finish_at' => '2020-05-24',
        //     'line_id' => 6,
        //     'quantity' => 1,
        //     'value' => '$10.000.000',
        //     'area_id' => 1,
        //     'execution_start' => '2020-06-01',
        //     'execution_finish' => '2020-07-31',
        //     'method' => 'Digital',
        //     'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //     'description' => '',
        // ]);

        DB::table('incentive_user_type')->insert([
            'incentive_id' => 10,
            'user_type_id' => 1
        ]);

        DB::table('incentive_user_type')->insert([
            'incentive_id' => 10,
            'user_type_id' => 3
        ]);


        //ÁREA: ARTES TRADICIONALES Y ARTESANÍAS
        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo para creación y circulación de contenidos en técnicas y expresiones de las artes tradicionales y artesanías',
        //   'slug' => '011',
        //   'code' => '011',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-05-24',
        //   'line_id' => 4,
        //   'quantity' => 10,
        //   'value' => '$2.500.000',
        //   'area_id' => 2,
        //   'execution_start' => '2020-06-08',
        //   'execution_finish' => '2020-07-31',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        // ]);
        DB::table('incentive_user_type')->insert([
      'incentive_id' => 11,
      'user_type_id' => 1
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo para creación y desarrollo de estrategia de promoción de producto artesanal',
        //   'slug' => '012',
        //   'code' => '012',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-05-24',
        //   'line_id' => 2,
        //   'quantity' => 4,
        //   'value' => '$4.500.000',
        //   'area_id' => 2,
        //   'execution_start' => '2020-06-25',
        //   'execution_finish' => '2020-11-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);
        DB::table('incentive_user_type')->insert([
      'incentive_id' => 12,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo para el fortalecimiento de la productiva artesanal',
        //   'slug' => '013',
        //   'code' => '013',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-07-10',
        //   'line_id' => 7,
        //   'quantity' => 2,
        //   'value' => '$9.000.000',
        //   'area_id' => 2,
        //   'execution_start' => '2020-08-06',
        //   'execution_finish' => '2020-11-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);
        DB::table('incentive_user_type')->insert([
      'incentive_id' => 13,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Premio anual de reconocimiento a la trayectoria maestro(a) artesano(a)',
        //   'slug' => '014',
        //   'code' => '014',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-05-24',
        //   'line_id' => 6,
        //   'quantity' => 3,
        //   'value' => '$10.000.000',
        //   'area_id' => 2,
        //   'execution_start' => '2020-06-01',
        //   'execution_finish' => '2020-07-31',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);
        DB::table('incentive_user_type')->insert([
      'incentive_id' => 14,
      'user_type_id' => 1
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Premio anual de reconocimiento a la trayectoria portador de cocina tradicional y/o sus derivados',
        //   'slug' => '015',
        //   'code' => '015',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-05-24',
        //   'line_id' => 6,
        //   'quantity' => 2,
        //   'value' => '$10.000.000',
        //   'area_id' => 2,
        //   'execution_start' => '2020-06-01',
        //   'execution_finish' => '2020-07-31',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);
        DB::table('incentive_user_type')->insert([
      'incentive_id' => 15,
      'user_type_id' => 1
    ]);

        //ÁREA: AUDIOVISUALES

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo para la creación y circulación de contenidos en técnicas y expresiones de las artes tradicionales y artesanías',
        //   'slug' => '016',
        //   'code' => '016',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-05-24',
        //   'line_id' => 2,
        //   'quantity' => 10,
        //   'value' => '$2.500.000',
        //   'area_id' => 3,
        //   'execution_start' => '2020-06-08',
        //   'execution_finish' => '2020-07-31',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);
        DB::table('incentive_user_type')->insert([
      'incentive_id' => 16,
      'user_type_id' => 1
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo para creación de serie radiofónica en procesos de difusión virtuales y comunitarias',
        //   'slug' => '017',
        //   'code' => '017',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-05-29',
        //   'line_id' => 2,
        //   'quantity' => 5,
        //   'value' => '$10.000.000',
        //   'area_id' => 3,
        //   'execution_start' => '2020-06-25',
        //   'execution_finish' => '2020-11-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);
        DB::table('incentive_user_type')->insert([
      'incentive_id' => 17,
      'user_type_id' => 2
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 17,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo para la realización de narrativas sonoras',
        //   'slug' => '018',
        //   'code' => '018',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-05-29',
        //   'line_id' => 2,
        //   'quantity' => 4,
        //   'value' => '$10.000.000',
        //   'area_id' => 3,
        //   'execution_start' => '2020-06-25',
        //   'execution_finish' => '2020-11-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);
        DB::table('incentive_user_type')->insert([
      'incentive_id' => 18,
      'user_type_id' => 2
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 18,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo para desarrollo de proyectos de muestra audiovisual, ficción, documental o animación para: largometrajes, series, proyectos multiplataforma con énfasis audiovisual',
        //   'slug' => '019',
        //   'code' => '019',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-05-29',
        //   'line_id' => 2,
        //   'quantity' => 5,
        //   'value' => '$15.000.000',
        //   'area_id' => 3,
        //   'execution_start' => '2020-06-01',
        //   'execution_finish' => '2020-07-31',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);
        DB::table('incentive_user_type')->insert([
      'incentive_id' => 19,
      'user_type_id' => 1
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 19,
      'user_type_id' => 2
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 19,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo para la escritura guión de largometraje',
        //   'slug' => '020',
        //   'code' => '020',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-07-03',
        //   'line_id' => 1,
        //   'quantity' => 5,
        //   'value' => '$10.000.000',
        //   'area_id' => 3,
        //   'execution_start' => '2020-06-25',
        //   'execution_finish' => '2020-11-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);
        DB::table('incentive_user_type')->insert([
      'incentive_id' => 20,
      'user_type_id' => 1
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo para la curaduría audiovisual Cali se mueve cine sin límites cine foro Andrés Caicedo',
        //   'slug' => '021',
        //   'code' => '021',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-07-03',
        //   'line_id' => 1,
        //   'quantity' => 1,
        //   'value' => '$10.000.000',
        //   'area_id' => 3,
        //   'execution_start' => '2020-06-25',
        //   'execution_finish' => '2020-11-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);
        DB::table('incentive_user_type')->insert([
      'incentive_id' => 21,
      'user_type_id' => 1
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 21,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Premio reconocimiento de la gestión cultural comunitaria en audiovisual',
        //   'slug' => '022',
        //   'code' => '022',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-05-24',
        //   'line_id' => 6,
        //   'quantity' => 5,
        //   'value' => '$10.000.000',
        //   'area_id' => 3,
        //   'execution_start' => '2020-06-01',
        //   'execution_finish' => '2020-07-31',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);
        DB::table('incentive_user_type')->insert([
      'incentive_id' => 22,
      'user_type_id' => 1
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 22,
      'user_type_id' => 3
    ]);


        //ÁREA: ARTES ESCÉNICAS: CIRCO, DANZA, MÚSICA Y TEATRO
        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo para la producción y presentación de obra en pequeño formato en artes escénicas con contenido audiovisual máximo 7 minutos',
        //   'slug' => '023',
        //   'code' => '023',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-05-29',
        //   'line_id' => 7,
        //   'quantity' => 45,
        //   'value' => '$10.000.000',
        //   'area_id' => 4,
        //   'execution_start' => '2020-06-15',
        //   'execution_finish' => '2020-11-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);
        DB::table('incentive_user_type')->insert([
      'incentive_id' => 23,
      'user_type_id' => 1
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 23,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulos para la escritura de proyectos creativos de las artes escénicas.',
        //   'slug' => '024',
        //   'code' => '024',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-05-25',
        //   'line_id' => 7,
        //   'quantity' => 40,
        //   'value' => '$8.000.000',
        //   'area_id' => 4,
        //   'execution_start' => '2020-06-08',
        //   'execution_finish' => '2020-08-28',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 24,
      'user_type_id' => 3
    ]);


        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo para el desarrollo de procesos de formación en artes escenicas desde la virtualidad',
        //   'slug' => '025',
        //   'code' => '025',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-05-25',
        //   'line_id' => 4,
        //   'quantity' => 60,
        //   'value' => '$5.000.000',
        //   'area_id' => 4,
        //   'execution_start' => '2020-06-08',
        //   'execution_finish' => '2020-08-28',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);
        DB::table('incentive_user_type')->insert([
      'incentive_id' => 25,
      'user_type_id' => 1
    ]);

        DB::table('incentive_user_type')->insert([
  'incentive_id' => 25,
  'user_type_id' => 2
]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 25,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo para la circulación de contenidos de las artes escénicas.',
        //   'slug' => '026',
        //   'code' => '026',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-05-25',
        //   'line_id' => 3,
        //   'quantity' => 40,
        //   'value' => '$2.500.000',
        //   'area_id' => 4,
        //   'execution_start' => '2020-06-08',
        //   'execution_finish' => '2020-08-28',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);
        DB::table('incentive_user_type')->insert([
      'incentive_id' => 26,
      'user_type_id' => 1
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 26,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo para la circulación de música académica',
        //   'slug' => '027',
        //   'code' => '027',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-05-25',
        //   'line_id' => 3,
        //   'quantity' => 2,
        //   'value' => '$8.000.000',
        //   'area_id' => 4,
        //   'execution_start' => '2020-06-08',
        //   'execution_finish' => '2020-08-28',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);
        DB::table('incentive_user_type')->insert([
      'incentive_id' => 27,
      'user_type_id' => 2
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 27,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo de circulación danza folclórica',
        //   'slug' => '028',
        //   'code' => '028',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-05-25',
        //   'line_id' => 3,
        //   'quantity' =>2,
        //   'value' => '$8.000.000',
        //   'area_id' => 4,
        //   'execution_start' => '2020-06-08',
        //   'execution_finish' => '2020-08-28',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);
        DB::table('incentive_user_type')->insert([
      'incentive_id' => 28,
      'user_type_id' => 2
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 28,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo de investigación al desarrollo de la dramaturgia',
        //   'slug' => '029',
        //   'code' => '029',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-07-03',
        //   'line_id' => 1,
        //   'quantity' => 2,
        //   'value' => '$8.000.000',
        //   'area_id' => 4,
        //   'execution_start' => '2020-07-30',
        //   'execution_finish' => '2020-11-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);
        DB::table('incentive_user_type')->insert([
      'incentive_id' => 29,
      'user_type_id' => 1
    ]);


        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Premio reconocimiento de la gestión cultural comunitaria en artes escénicas',
        //   'slug' => '030',
        //   'code' => '030',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-05-24',
        //   'line_id' => 6,
        //   'quantity' => 20,
        //   'value' => '$10.000.000',
        //   'area_id' => 4,
        //   'execution_start' => '2020-06-01',
        //   'execution_finish' => '2020-07-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);
        DB::table('incentive_user_type')->insert([
      'incentive_id' => 30,
      'user_type_id' => 1
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 30,
      'user_type_id' => 3
    ]);


        //ÁREA: ARTES LITERARIAS Y EDITORIALES

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo para la publicación de obra literaria',
        //   'slug' => '031',
        //   'code' => '031',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-07-03',
        //   'line_id' => 3,
        //   'quantity' => 8,
        //   'value' => '$8.000.000',
        //   'area_id' => 5,
        //   'execution_start' => '2020-07-30',
        //   'execution_finish' => '2020-11-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);
        DB::table('incentive_user_type')->insert([
      'incentive_id' => 31,
      'user_type_id' => 1
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 31,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo para la publicación de obra literaria ebook',
        //   'slug' => '032',
        //   'code' => '032',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-07-03',
        //   'line_id' => 3,
        //   'quantity' => 3,
        //   'value' => '$8.000.000',
        //   'area_id' => 5,
        //   'execution_start' => '2020-07-30',
        //   'execution_finish' => '2020-11-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);
        DB::table('incentive_user_type')->insert([
      'incentive_id' => 32,
      'user_type_id' => 1
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 32,
      'user_type_id' => 2
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 32,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo para publicaciones artísticas, publicaciones de cómic, publicaciones o novela gráfica',
        //   'slug' => '033',
        //   'code' => '033',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-07-03',
        //   'line_id' => 3,
        //   'quantity' => 4,
        //   'value' => '$8.000.000',
        //   'area_id' => 5,
        //   'execution_start' => '2020-07-30',
        //   'execution_finish' => '2020-11-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);
        DB::table('incentive_user_type')->insert([
      'incentive_id' => 33,
      'user_type_id' => 1
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 33,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo para el fomento a la lectura virtual grupos de lectura',
        //   'slug' => '034',
        //   'code' => '034',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-05-24',
        //   'line_id' => 7,
        //   'quantity' => 9,
        //   'value' => '$2.000.000',
        //   'area_id' => 5,
        //   'execution_start' => '2020-06-01',
        //   'execution_finish' => '2020-07-31',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 34,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Premio reconocimiento de la gestión cultural comunitaria fomento de lectura',
        //   'slug' => '035',
        //   'code' => '035',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-05-24',
        //   'line_id' => 6,
        //   'quantity' => 5,
        //   'value' => '$10.000.000',
        //   'area_id' => 5,
        //   'execution_start' => '2020-06-18',
        //   'execution_finish' => '2020-07-31',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);
        DB::table('incentive_user_type')->insert([
      'incentive_id' => 35,
      'user_type_id' => 1
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 35,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Premio para el fomento a cubes de lectura',
        //   'slug' => '036',
        //   'code' => '036',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-05-24',
        //   'line_id' => 6,
        //   'quantity' => 5,
        //   'value' => '$2.000.000',
        //   'area_id' => 5,
        //   'execution_start' => '2020-06-01',
        //   'execution_finish' => '2020-07-31',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 36,
      'user_type_id' => 3
    ]);


        //AREA: PATRIMONIO MATERIAL E IMATERIAL

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo para el uso creativo del patrimonio documental del municipio de Santiago de Cali',
        //   'slug' => '037',
        //   'code' => '037',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-07-03',
        //   'line_id' => 2,
        //   'quantity' => 1,
        //   'value' => '$9.000.000',
        //   'area_id' => 6,
        //   'execution_start' => '2020-07-30',
        //   'execution_finish' => '2020-11-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 37,
      'user_type_id' => 1
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 37,
      'user_type_id' => 2
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 37,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo de apoyo para eventos de savaguardia de manifestaciones culturales de la ciudad con mínimo una (1) versión realizada',
        //   'slug' => '038',
        //   'code' => '038',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-07-10',
        //   'line_id' => 5,
        //   'quantity' => 4,
        //   'value' => '$9.000.000',
        //   'area_id' => 6,
        //   'execution_start' => '2020-08-06',
        //   'execution_finish' => '2020-11-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 38,
      'user_type_id' => 2
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 38,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo de apoyo para eventos de salvaguarda de las prácticas culturales ancestrales de comunidades étnicas de la ciudad, con mínimo una (1) versión realizada (indígenas, comunidad Narp, y Rom)',
        //   'slug' => '039',
        //   'code' => '039',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-07-03',
        //   'line_id' => 5,
        //   'quantity' => 5,
        //   'value' => '$9.000.000',
        //   'area_id' => 6,
        //   'execution_start' => '2020-08-06',
        //   'execution_finish' => '2020-11-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 39,
      'user_type_id' => 2
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 39,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo de investigación y publicación del patrimonio material de ciudad',
        //   'slug' => '040',
        //   'code' => '040',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-07-03',
        //   'line_id' => 1,
        //   'quantity' => 2,
        //   'value' => '$9.000.000',
        //   'area_id' => 6,
        //   'execution_start' => '2020-07-30',
        //   'execution_finish' => '2020-11-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 40,
      'user_type_id' => 1
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 40,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo de investigación y publicación del patrimonio inmaterial de ciudad',
        //   'slug' => '041',
        //   'code' => '041',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-07-03',
        //   'line_id' => 1,
        //   'quantity' => 2,
        //   'value' => '$9.000.000',
        //   'area_id' => 6,
        //   'execution_start' => '2020-07-30',
        //   'execution_finish' => '2020-11-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 41,
      'user_type_id' => 1
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 41,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo para la investigación sobre prácticas artísticas y culturales',
        //   'slug' => '042',
        //   'code' => '042',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-07-03',
        //   'line_id' => 1,
        //   'quantity' => 5,
        //   'value' => '$9.000.000',
        //   'area_id' => 6,
        //   'execution_start' => '2020-07-30',
        //   'execution_finish' => '2020-11-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 37,
      'user_type_id' => 1
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 37,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo de investigación publicación memorias e historia de la ciudad: historias urbanas – configuración de barrios – representaciones de los sujetos en el espacio público',
        //   'slug' => '043',
        //   'code' => '043',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-07-03',
        //   'line_id' => 2,
        //   'quantity' => 5,
        //   'value' => '$9.000.000',
        //   'area_id' => 6,
        //   'execution_start' => '2020-08-06',
        //   'execution_finish' => '2020-11-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 43,
      'user_type_id' => 1
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 43,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo de investigación en humanidades digitales y patrimonio documental',
        //   'slug' => '044',
        //   'code' => '044',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-07-03',
        //   'line_id' => 1,
        //   'quantity' => 1,
        //   'value' => '$20.000.000',
        //   'area_id' => 6,
        //   'execution_start' => '2020-07-30',
        //   'execution_finish' => '2020-11-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 44,
      'user_type_id' => 1
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 44,
      'user_type_id' => 2
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 44,
      'user_type_id' => 3
    ]);


        //AREA: ESPECTÁCULOS PÚBLICOS

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo para fortalecimiento de productores permanentes de las artes escénicas.',
        //   'slug' => '045',
        //   'code' => '045',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-05-15',
        //   'line_id' => 7,
        //   'quantity' => 8,
        //   'value' => '1-$65.000.000, 2-$40.000.000, 4-$25.000.000',
        //   'area_id' => 8,
        //   'execution_start' => '2020-06-16',
        //   'execution_finish' => '2020-11-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 45,
      'user_type_id' => 1
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 45,
      'user_type_id' => 2
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 45,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo para fortalecimiento de productores ocasionales de las artes escénicas.',
        //   'slug' => '046',
        //   'code' => '046',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-05-15',
        //   'line_id' => 7,
        //   'quantity' => 23,
        //   'value' => '3-$65.000.000, 5-$25.000.000, 15-$15.000.000',
        //   'area_id' => 8,
        //   'execution_start' => '2020-06-15',
        //   'execution_finish' => '2020-11-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 46,
      'user_type_id' => 1
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 46,
      'user_type_id' => 2
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 46,
      'user_type_id' => 3
    ]);

        //     Incentive::create([
        //   'call_id' => 1,
        //   'type_id' => 1,
        //   'name' => 'Estímulo apoyo para el fortalecimiento de los actores que integran la cadena de espectáculos públicos.',
        //   'slug' => '047',
        //   'code' => '047',
        //   'start_at' => '2020-05-08',
        //   'finish_at' => '2020-05-15',
        //   'line_id' => 7,
        //   'quantity' => 6,
        //   'value' => '$15.000.000',
        //   'area_id' => 8,
        //   'execution_start' => '2020-06-15',
        //   'execution_finish' => '2020-11-30',
        //   'method' => 'Digital',
        //   'contact' => 'convocatoriaestímulos@cali.gov.co',
        //
        //
        //
        //
        //
        //   'description' => '',
        //
        //
        // ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 47,
      'user_type_id' => 2
    ]);

        DB::table('incentive_user_type')->insert([
      'incentive_id' => 47,
      'user_type_id' => 3
    ]);
    }
}
