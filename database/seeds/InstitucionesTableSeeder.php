<?php

use ATS\Model\Institucion;
use Illuminate\Database\Seeder;

class InstitucionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Institucion::class)->create([
            'name'=> 'Institución Educativa Las Mujeres',
            'siglas'=> 'INELMU',
            'path'=>null
        ]);
    }
}
