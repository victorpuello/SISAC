<?php

use ATS\Model\Nota;
use Illuminate\Database\Seeder;
//use Bouncer;
class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bouncer::allow('admin')->everything();
        Bouncer::allow('docente')->to('create',Nota::class);
        Bouncer::allow('docente')->to('create',Nota::class);
    }
}
