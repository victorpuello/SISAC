<?php

use ATS\Model\{Grado,Grupo};
use Illuminate\Database\Seeder;

class GradosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nombres = ['0' => 'Pre-Escolar', '1' => 'Primero', '2' => 'Segundo', '3' => 'Tercero', '4' => 'Cuarto', '5' => 'Quinto', '6' => 'Sexto', '7' => 'Septimo', '8' => 'Octavo', '9' => 'Noveno', '10' => 'Decimo', '11' => 'Once'];
        for ($i =0; $i < count($nombres); $i++){
            $nivel ='';
            if ($i < 1){
                $nivel='preescolar';
            }elseif ($i > 0 && $i <= 5){
                $nivel='primaria';
            }elseif ($i > 5 && $i <= 9){
                $nivel='secundaria';
            }elseif($i > 9 && $i <= 11){
                $nivel='media';
            }

            $grado = Grado::create([
                'name'=> $nombres[$i],
                'numero'=>$i,
                'nivel'=> $nivel
            ]);
//            for ($j = 1; $j < 4; $j++){
//                Grupo::create([
//                    'name' => $j,
//                    'grado_id' => $grado->id,
//                    'modelo' => 'tradicional',
//                    'jornada_id' => 1
//                ]);
//            }
        }
    }
}