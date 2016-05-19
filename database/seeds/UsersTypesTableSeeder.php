<?php

use Illuminate\Database\Seeder;

class UsersTypesTableSeeder extends Seeder
{
    public function run()
    {
		DB::table('user_types')->insert(['name' => "Trabajador"]);

		DB::table('user_types')->insert(['name' => "Administrador"]);
    }
}
