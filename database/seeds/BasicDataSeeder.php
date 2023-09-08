<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use App\Area;
use App\Incentive_type;
use App\Line_action;
use App\Status_type;
use App\User_type;

class BasicDataSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        // Crear áreas
        Area::create(['name' => 'Artes Plásticas y Visuales', 'description' => 'Fotografía, Pintura, Escultura, Arte industrial, Grabado, Artes Gráficas, Ilustración.']);
        Area::create(['name' => 'Artes Tradicionales Y Artesanías', 'description' => 'Gastronomía, Artesanía, Narración Oral.']);
        Area::create(['name' => 'Audiovisuales', 'description' => 'Cine y video, Radio, Televisión, Multimedia, Videojuegos.']);
        Area::create(['name' => 'Artes Escénicas', 'description' => 'Circo sin animales, Danza, Teatro y Música.']);
        Area::create(['name' => 'Artes Literarias y Editoriales', 'description' => 'Libros, Publicaciones periódicas, otros productos editoriales, Fomento a lectura.']);
        Area::create(['name' => 'Patrimonio: Material en Inmaterial', 'description' => 'Patrimionio Material: Patrimonio inmueble (comprende PEMP,  Bienales BicNales, Centros Históricos y patrimonio arqueológico). Patrimonio Mueble (comprende los acervos documentales, las colecciones de artes plásticas y visuales públicas y privadas), las Bibliotecas, los Archivos, y los Museos. Patrimonio inmaterial: Manifestaciones tradicionales de las Fiestas populares y patrias, cocina tradicional local, jardinería doméstica, tradiciones artesanales de grupos especiales de población, artes populares de carácter urbano, habla y tradición oral asociada a la construcción de la memoria de la ciudad.']);
        Area::create(['name' => 'Cadena de valor sector artístico cultural y creativo', 'description' => 'Fortalecimiento y promoción de la actividad Artística y cultural.']);
        Area::create(['name' => 'Espectáculos públicos', 'description' => 'Productores permanentes y ocasionales registrados en el PULEP, proveedores de servicios relacionados con la producción artística, escénica, técnica y operativa.']);


        // Crear tipos de incentivos
        Incentive_type::create(['name' => 'Beca', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod ea laudantium dignissimos hic consectetur libero.']);
        Incentive_type::create(['name' => 'Premio', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod ea laudantium dignissimos hic consectetur libero.']);


        // Crear líneas de acción
        Line_action::create(['name' => 'Investigación o publicación', 'description' => 'Incentiva procesos de visibilización, documentación y generación de conocimiento acerca de, expresiones, saberes y prácticas del quehacer cultural y artístico']);
        Line_action::create(['name' => 'Creación', 'description' => 'Acciones individuales o colectivas a través de las cuales se incentiva la inspiración, la innovación y realización de procesos culturales y artísticos']);
        Line_action::create(['name' => 'Circulación', 'description' => 'Generación de acciones para la difusión de producciones y conocimientos, al tiempo que se generen espacios de intercambio, distribución y apropiación, que permiten la promoción y visibilización de las expresiones artísticas y culturales de la ciudad.']);
        Line_action::create(['name' => 'Formación', 'description' => 'Acciones individuales o colectivas a través de las cuales se incentiva la inspiración, la innovación y realización de procesos culturales y artísticos.']);
        Line_action::create(['name' => 'Protección y salvaguardia', 'Description' => 'Acciones individuales o colectivas a través de las cuales se incentiva la inspiración, la innovación y realización de procesos culturales y artísticos.']);
        Line_action::create(['name' => 'Gestión Cultural', 'description' => 'Acciones individuales o colectivas a través de las cuales se incentiva la inspiración, la innovación y realización de procesos culturales y artísticos.']);
        Line_action::create(['name' => 'Fortalecimiento', 'description' => 'Acciones individuales o colectivas a través de las cuales se incentiva la inspiración, la innovación y realización de procesos culturales y artísticos.']);
        Line_action::create(['name' => 'Producción', 'description' => 'Fomentar, estimular y apoyar los procesos que favorezcan la realización de experiencias, saberes y prácticas que visibilizan el quehacer cultural y artística.']);


        // Crear tipos de estados
        Status_type::create(['name' => 'Iniciado', 'description' => 'Iniciado', 'color' => 'started']);
        Status_type::create(['name' => 'Postulado', 'description' => 'Postulado', 'color' => 'postulate']);
        Status_type::create(['name' => 'Debe subsanar documentos administrativos', 'description' => 'Debe subsanar documentos administrativos', 'color' => 'pending']);
        Status_type::create(['name' => 'Documentos Subsanados', 'description' => 'Documentos Subsanados', 'color' => 'postulate']);
        Status_type::create(['name' => 'Rechazado', 'description' => 'La propuesta no cumple con los requisitos de la convocatoria.', 'color' => 'rejected']);
        Status_type::create(['name' => 'En estudio', 'description' => 'Cumple con los requisitos y pasa a evaluación de jurados. ','color' => 'sended']);
        Status_type::create(['name' => 'Participación finalizada', 'description' => '','color' => 'finished']);
        Status_type::create(['name' => 'Candidato a ganador', 'description' => '','color' => 'winc']);
        Status_type::create(['name' => 'Candidato a suplente', 'description' => '','color' => 'supl']);
        Status_type::create(['name' => 'Ganador', 'description' => '','color' => 'winner']);


        // Crear tipos de usuarios
        User_type::create([
            'name' => 'Persona Natural',
            'slug' => 'persona-natural',
            'description' => 'Ciudadanos colombianos y/o extranjeros mayores de dieciocho (18) años, residentes y/o domiciliados con al menos dos (2) años de antigüedad en Santiago de Cali.'
        ]);
        User_type::create([
            'name' => 'Persona Jurídica',
            'slug' => 'persona-juridica',
            'description' => 'Acciones individuales o colectivas a través de las cuales se incentiva la inspiración, la innovación y realización de procesos culturales y artísticos.'
        ]);
        User_type::create([
            'name' => 'Grupos constituidos',
            'slug' => 'grupos-constituidos',
            'description' => 'Alianzas temporales de mínimo dos (2) personas naturales que deciden unirse para presentar y ejecutar un proyecto, de acuerdo con las bases específicas de cada una de las convocatorias. Esta alianza temporal no tendrá ningún efecto jurídico o de asociación más allá de los efectos en la convocatoria. Así mismo, mínimo el 50% de los integrantes deberá ser residentes y/o estar domiciliados en Santiago de Cali. Al tiempo que uno de ellos deberá acreditarse como el representante del grupo para fines prácticos de comunicación y representación de su grupo.'
        ]);
    }
}
