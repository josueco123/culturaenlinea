<?php

use Illuminate\Database\Seeder;

use App\Call;

class CallsTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        Call::create([
          'name' => 'Convocatoria unidos por la vida 2020',
          'slug' => 'convocatoria-unidos-por-la-vida-2020',
          'description' => 'La convocatoria contempla la participación de proyectos artísticos y culturales en diferentes áreas',
          'start_at' => '2020-05-08',
          'finish_at' => '2020-12-31'
      ]);
    }
}
