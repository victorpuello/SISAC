<?php

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
        factory(\ATS\Jornada::class)->create([
            'name' => 'Mañana',
        ]);
        factory(\ATS\Jornada::class)->create([
            'name' => 'Tarde',
        ]);
    }
}
