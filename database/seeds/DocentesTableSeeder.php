<?php

use Illuminate\Database\Seeder;
use Ngsoft\Docente;
use Ngsoft\User;

class DocentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $docentes = User::where('type','=','docente')->get();
        foreach ($docentes as $docente){
            factory(Docente::class)->create([
                'user_id' => $docente->id
            ]);
        }
    }
}
