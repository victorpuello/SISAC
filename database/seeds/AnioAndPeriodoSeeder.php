<?php

use ATS\Model\Periodo;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AnioAndPeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 2018; $i <= 2018; $i++){
            if ($i < 2018){
                $anio = \ATS\Model\Anio::create([
                    'name' => $i,
                    'start' => $i.'-01-29',
                    'end' => $i.'-12-14',
                    'activo' => 0
                ]);
                $this->createPeriodos($anio);
            }else{
                $anio = \ATS\Model\Anio::create([
                    'name' => 2018,
                    'start' => '2018-01-29',
                    'end' => '2018-12-14',
                    'activo' => 1
                ]);
                $this->createPeriodos($anio);
            }
        }
    }

    private function createPeriodos ($anio)
    {
        $fecha = Carbon::createSafe($anio->name,1,29);
        $nombres = ['1' => 'Primer', '2' => 'Segundo', '3' => 'Tercer', '4' => 'Cuarto', '5' => 'Final'];
        for ($i=1; $i<=4; $i++){
            if ($i === 1){
                Periodo::create([
                    'name' => $nombres[$i].' periodo',
                    'datestart'=> $anio->start,
                    'dateend' => $fecha->addMonth(3),
                    'cierre' => $fecha->addDays(10),
                    'estado' => 'inactivo',
                    'anio_id' => $anio->id,
                ]);
               //$fecha = $fecha->addMonth(3);
            }else{
                $periodo = Periodo::create([
                    'name' => $nombres[$i].' periodo',
                    'datestart'=> $fecha,
                    'dateend' => $fecha->addMonth(3),
                    'cierre' => $fecha->addDays(10),
                    'estado' => 'inactivo',
                    'anio_id' => $anio->id,
                ]);
                if ($i === 4){
                    Periodo::create([
                        'name' => $nombres[$i+1].' periodo',
                        'datestart'=> $anio->start,
                        'dateend' => $anio->end,
                        'cierre' => $anio->end,
                        'estado' => 'inactivo',
                        'anio_id' => $anio->id,
                    ]);
                }
                //$fecha = $fecha->addMonth(3);
            }
        }
    }
}
