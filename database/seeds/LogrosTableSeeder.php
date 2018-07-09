<?php

use Illuminate\Database\Seeder;

class LogrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Ngsoft\Logro::class,78)->create();
    }
}
