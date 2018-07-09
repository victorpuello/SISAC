<?php

use Illuminate\Database\Seeder;

class PeriodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Ngsoft\Periodo::class)->create([
            'name' => 'Primer periodo',
            'datestart' => '2018-01-29',
            'dateend' => '2018-03-29'
        ]);
        factory(\Ngsoft\Periodo::class)->create([
            'name' => 'Segundo periodo',
            'datestart' => '2018-03-30',
            'dateend' => '2018-06-30'
        ]);
    }
}
