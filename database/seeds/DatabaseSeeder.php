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
        DB::table('docentes')->delete();
        DB::table('users')->delete();
        $this->call(UsersTableSeeder::class);
        DB::table('departamentos')->delete();
        $this->call(DepartamentosTableSeeder::class);
        DB::table('municipios')->delete();
        $this->call(MunicipiosTableSeeder::class);
        DB::table('asignaturas')->delete();
        DB::table('areas')->delete();
        $this->call(AreasTableSeeder::class);
//        DB::table('institucions')->delete();
//        $this->call(InstitucionesTableSeeder::class);
        DB::table('jornadas')->delete();
        $this->call(JornadasTableSeeder::class);
        DB::table('grupos')->delete();
        DB::table('grados')->delete();
        $this->call(GradosTableSeeder::class);
        DB::table('periodos')->delete();
        DB::table('anios')->delete();
        $this->call(AnioAndPeriodoSeeder::class);
//        DB::table('estudiantes')->delete();
//        $this->call(EstudianteSeeder::class);
        $this->call(BouncerSeeder::class);
    }
}
