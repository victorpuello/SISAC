<?php

use Illuminate\Database\Seeder;
use Ngsoft\Asignatura;

class AsignaturasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $asignaturas = array(
            1 => 'Matematicas',
            2 => 'Español',
            3 => 'Geografia',
            4 => 'Etica',
            5 => 'Religión',
            6 => 'Ed. Fisica',
            7 => 'Tecnologia e Informatica',
            8 => 'Fisica',
            9 => 'Quimica',
            10 => 'Ingles',
            11 => 'Historia',
            12 => 'Ciencias Politicas',
            13 => 'Economia'
        );

        for ($i=1; $i < count($asignaturas)+1 ; $i++) {
            factory(Asignatura::class)->create(['name' => $asignaturas[$i]]);
        }
    }
}
