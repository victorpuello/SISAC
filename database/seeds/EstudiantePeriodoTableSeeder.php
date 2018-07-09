<?php

use Illuminate\Database\Seeder;
use Ngsoft\Estudiante;

class EstudiantePeriodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cont = Estudiante::all()->count();
        for ($i=1; $i <= $cont ; $i++) {
            $estudiante = Estudiante::find($i);
                \DB::table('estudiante_periodo')->insert([
                    'estudiante_id' => $estudiante->id,
                    'periodo_id' => rand(1,2),
                    'inasistencias' => rand(0,5)
                    ]);
        }
    }
}
