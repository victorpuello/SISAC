<?php

use Illuminate\Database\Seeder;
use Ngsoft\Docente;

class AsignacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(\Ngsoft\Asignacion::class,60)->create();

    }
}
