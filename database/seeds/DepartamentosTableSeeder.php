<?php

use ATS\Model\Departamento;
use Illuminate\Database\Seeder;


class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Departamento::class)->create(['name' => 'Amazonas']);
        factory(Departamento::class)->create(['name' => 'Antioquia']);
        factory(Departamento::class)->create(['name' => 'Arauca']);
        factory(Departamento::class)->create(['name' => 'Atlántico']);
        factory(Departamento::class)->create(['name' => 'Bolívar']);
        factory(Departamento::class)->create(['name' => 'Boyacá']);
        factory(Departamento::class)->create(['name' => 'Caldas']);
        factory(Departamento::class)->create(['name' => 'Caquetá']);
        factory(Departamento::class)->create(['name' => 'Casanare']);
        factory(Departamento::class)->create(['name' => 'Cauca']);
        factory(Departamento::class)->create(['name' => 'Cesar']);
        factory(Departamento::class)->create(['name' => 'Chocó']);
        factory(Departamento::class)->create(['name' => 'Cundinamarca']);
        factory(Departamento::class)->create(['name' => 'Córdoba']);
        factory(Departamento::class)->create(['name' => 'Guainía']);
        factory(Departamento::class)->create(['name' => 'Guaviare']);
        factory(Departamento::class)->create(['name' => 'Huila']);
        factory(Departamento::class)->create(['name' => 'La guajira']);
        factory(Departamento::class)->create(['name' => 'Magdalena']);
        factory(Departamento::class)->create(['name' => 'Meta']);
        factory(Departamento::class)->create(['name' => 'Nariño']);
        factory(Departamento::class)->create(['name' => 'Norte de santander']);
        factory(Departamento::class)->create(['name' => 'Putumayo']);
        factory(Departamento::class)->create(['name' => 'Quindio']);
        factory(Departamento::class)->create(['name' => 'Risaralda']);
        factory(Departamento::class)->create(['name' => 'San Andrés y Providencia']);
        factory(Departamento::class)->create(['name' => 'Santander']);
        factory(Departamento::class)->create(['name' => 'Sucre']);
        factory(Departamento::class)->create(['name' => 'Tolima']);
        factory(Departamento::class)->create(['name' => 'Valle del cauca']);
        factory(Departamento::class)->create(['name' => 'Vaupés']);
        factory(Departamento::class)->create(['name' => 'Vichada']);
    }
}
