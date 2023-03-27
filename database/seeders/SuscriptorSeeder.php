<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuscriptorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suscriptores')->insert([
            'email' => 'suscriptor1@email.com',
            'fecha' => '2022/12/10'
        ]);
        DB::table('suscriptores')->insert([
            'email' => 'suscriptor2@email.com',
            'fecha' => '2022/12/10'
        ]);
        DB::table('suscriptores')->insert([
            'email' => 'suscriptor3@email.com',
            'fecha' => '2022/12/10'
        ]);
        DB::table('suscriptores')->insert([
            'email' => 'suscriptor4@email.com',
            'fecha' => '2022/12/10'
        ]);
        DB::table('suscriptores')->insert([
            'email' => 'suscriptor5@email.com',
            'fecha' => '2022/12/10'
        ]);
        DB::table('suscriptores')->insert([
            'email' => 'suscriptor6@email.com',
            'fecha' => '2022/12/10'
        ]);
    }
}
