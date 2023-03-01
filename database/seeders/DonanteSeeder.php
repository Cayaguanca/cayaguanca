<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('donantes')->insert([
            'nombre' => 'Donante 1'
        ]);

        DB::table('donantes')->insert([
            'nombre' => 'Donante 2'
        ]);

        DB::table('donantes')->insert([
            'nombre' => 'Donante 3'
        ]);

        DB::table('donantes')->insert([
            'nombre' => 'Donante 4'
        ]);
    }
}
