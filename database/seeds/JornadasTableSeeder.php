<?php

use ATS\Model\Jornada;
use Illuminate\Database\Seeder;

class JornadasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Jornada::class)->create([
            'name' => 'Mañana',
        ]);
        factory(Jornada::class)->create([
            'name' => 'Tarde',
        ]);
    }
}
