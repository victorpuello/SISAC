<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitucionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('institucions')->insert([
            'name' => 'Institución Educativa Las Mujeres',
            'siglas' => 'INELMU',
            'dane' => '1232143455',
            'address' => 'Corregimiento Las Mujere',
            'phone' => '34342345',
            'email' => 'inelmu@inlemu.co',
            'rector' => 'Jorge Cabrera',
            'idrector' => '23434343',
            'resolucion' => '12356',
            'slogan' => 'Loren Ipsun our douur '
        ]);
    }
}
