<?php

use Illuminate\Database\Seeder;
use Ngsoft\Estudiante;

class EstudiantesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Estudiante::class,315)->create();
    }
}
