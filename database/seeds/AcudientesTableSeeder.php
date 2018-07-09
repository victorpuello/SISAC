<?php

use Illuminate\Database\Seeder;
use Ngsoft\Acudiente;

class AcudientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Acudiente::class, 180)->create();
    }
}
