<?php

use Illuminate\Database\Seeder;
use Ngsoft\Salon;

class SalonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 12 ; $i++) {
        	for ($j=1; $j < 4; $j++) {
        		factory(Salon::class)->create([
	                'name' => strval($j),
	                'grade' => strval($i),
            	]);
        	}
        }
    }
}
