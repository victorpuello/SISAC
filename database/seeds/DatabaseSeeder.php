<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('institucions')->delete();
        $this->call(InstitucionsTableSeeder::class);
        DB::table('users')->delete();
        $this->call(UsersTableSeeder::class);
        DB::table('asignaturas')->delete();
        $this->call(AsignaturasTableSeeder::class);
        DB::table('estudiantes')->delete();
        $this->call(PeriodosTableSeeder::class);
        DB::table('departamentos')->delete();
        $this->call(DepartamentosTableSeeder::class);
        DB::table('municipios')->delete();
        $this->call(MunicipiosTableSeeder::class);
    }
}
