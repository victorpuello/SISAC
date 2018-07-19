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
        DB::table('docentes')->delete();
        $this->call(DocentesTableSeeder::class);
        DB::table('salons')->delete();
        $this->call(SalonsTableSeeder::class);
        DB::table('docente_salon')->delete();
        $this->call(DocenteSalonTableSeeder::class);
        DB::table('asignaturas')->delete();
        $this->call(AsignaturasTableSeeder::class);
        DB::table('asignatura_docente')->delete();
        $this->call(AsignaturaDocenteTableSeeder::class);
        DB::table('estudiantes')->delete();
        $this->call(EstudiantesTableSeeder::class);
        DB::table('acudientes')->delete();
        $this->call(AcudientesTableSeeder::class);
        DB::table('periodos')->delete();
        $this->call(PeriodosTableSeeder::class);
        DB::table('logros')->delete();
        $this->call(LogrosTableSeeder::class);
        DB::table('estudiante_periodo')->delete();
        $this->call(EstudiantePeriodoTableSeeder::class);
        DB::table('departamentos')->delete();
        $this->call(DepartamentosTableSeeder::class);
        DB::table('municipios')->delete();
        $this->call(MunicipiosTableSeeder::class);

    }
}
