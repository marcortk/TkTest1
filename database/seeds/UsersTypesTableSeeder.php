<?php

use Illuminate\Database\Seeder;

class UsersTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('user_types')->insert([
            'name' => "Trabajador",

        ]);
		DB::table('user_types')->insert([
            'name' => "Administrador",

        ]);
    }
}
