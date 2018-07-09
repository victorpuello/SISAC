<?php

use Illuminate\Database\Seeder;
use Ngsoft\Docente;

class AsignaturaDocenteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cont = Docente::all()->count();
        for ($i=1; $i <= $cont ; $i++) {
            $docente = Docente::find($i);
            for ($j=0; $j <= 2 ; $j++) {
                $docente->asignaturas()->attach(rand(1,13));
            }
        }
    }
}
