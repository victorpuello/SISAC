<?php

use ATS\Model\{Area,Asignatura};
use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $area = Area::create([
            'name'=> 'Ciencias naturales',
            'porcentaje'=> 11.1,
        ]);
        Asignatura::create([
            'name' => 'Biologia',
            'short_name' => 'BIO',
            'porcentaje' => 33,
            'nivel' => 'basica',
            'area_id' => $area->id
        ]);
        Asignatura::create([
            'name' => 'Quimica',
            'short_name' => 'QUI',
            'porcentaje' => 33,
            'nivel' => 'media',
            'area_id' => $area->id
        ]);
        Asignatura::create([
            'name' => 'Medio Ambiente',
            'short_name' => 'MAB',
            'porcentaje' => 33,
            'nivel' => 'media',
            'area_id' => $area->id
        ]);
        $area2= Area::create([
            'name'=> 'Ciencias sociales',
            'porcentaje'=> 11.1,
        ]);
        Asignatura::create([
            'name' => 'Democracia',
            'short_name' => 'DEM',
            'porcentaje' => 33,
            'nivel' => 'media',
            'area_id' => $area2->id
        ]);Asignatura::create([
            'name' => 'Ciencias Politicas',
            'short_name' => 'CP',
            'porcentaje' => 33,
            'nivel' => 'media',
            'area_id' => $area2->id
        ]);
        Asignatura::create([
            'name' => 'Filosofia',
            'short_name' => 'FILO',
            'porcentaje' => 33,
            'nivel' => 'media',
            'area_id' => $area2->id
        ]);
        Asignatura::create([
            'name' => 'Historia',
            'short_name' => 'HIST',
            'porcentaje' => 33,
            'nivel' => 'media',
            'area_id' => $area2->id
        ]);
        Asignatura::create([
            'name' => 'Geografia',
            'short_name' => 'GEO',
            'porcentaje' => 33,
            'nivel' => 'media',
            'area_id' => $area2->id
        ]);
        $area3 = Area::create([
            'name'=> ' Educación artística',
            'porcentaje'=> 11.1,
        ]);
        Asignatura::create([
            'name' => 'Artistica',
            'short_name' => 'ART',
            'porcentaje' => 33,
            'nivel' => 'media',
            'area_id' => $area3->id
        ]);

        factory(Area::class)->create([
            'name'=> 'Educación ética y valores',
            'porcentaje'=> 11.1,
        ]);factory(Area::class)->create([
            'name'=> 'Educación física',
            'porcentaje'=> 11.1,
        ]);factory(Area::class)->create([
            'name'=> ' Educación religiosa',
            'porcentaje'=> 11.1,
        ]);factory(Area::class)->create([
            'name'=> 'Humanidades',
            'porcentaje'=> 11.1,
        ]);factory(Area::class)->create([
            'name'=> 'Matemáticas',
            'porcentaje'=> 11.1,
        ]);factory(Area::class)->create([
            'name'=> 'Tecnología e informática',
            'porcentaje'=> 11.1,
        ]);
    }
}
