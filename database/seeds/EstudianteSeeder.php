<?php

use ATS\Model\Estudiante;
use Illuminate\Database\Seeder;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Estudiante::class,1035)->create();
    }
}
