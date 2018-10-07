<?php

use ATS\Model\Area;
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
        factory(Area::class)->create([
            'name'=> 'Ciencias naturales',
            'porcentaje'=> 11.1,
        ]);
        factory(Area::class)->create([
            'name'=> 'Ciencias sociales',
            'porcentaje'=> 11.1,
        ]);factory(Area::class)->create([
            'name'=> ' Educación artística',
            'porcentaje'=> 11.1,
        ]);factory(Area::class)->create([
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
