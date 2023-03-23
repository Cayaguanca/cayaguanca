<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('municipios')->insert([
            'nombre_municipio' => 'Municipio 1',
            'codigo_postal' => '12345',
            'fecha_afiliacion' => '2000/01/01',
            'descripcion_municipio' => 'Descripción 1'
        ]);
        DB::table('municipios')->insert([
            'nombre_municipio' => 'Municipio 2',
            'codigo_postal' => '12346',
            'fecha_afiliacion' => '2000/01/01',
            'descripcion_municipio' => 'Descripción 2'
        ]);
        DB::table('municipios')->insert([
            'nombre_municipio' => 'Municipio 3',
            'codigo_postal' => '12347',
            'fecha_afiliacion' => '2000/01/01',
            'descripcion_municipio' => 'Descripción 3'
        ]);
        DB::table('municipios')->insert([
            'nombre_municipio' => 'Municipio 4',
            'codigo_postal' => '12348',
            'fecha_afiliacion' => '2000/01/01',
            'descripcion_municipio' => 'Descripción 4'
        ]);
    }
}
