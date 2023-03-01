<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nombres' => 'super',
            'apellidos' => 'admin',
            'email' => 'superadmin@email.com',
            'password' => Hash::make('password'),
            'role_id' => 1,            
        ]);

        DB::table('users')->insert([
            'nombres' => 'admin',
            'apellidos' => 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('password'),
            'role_id' => 2,            
        ]);
    }
}
