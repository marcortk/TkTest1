<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->insert([
            'name' => "Luis Perez",
            'email' => "luis@gmail.com",
            'address' => "Av. La marina 1212",
            'user_type_id' => 1,

        ]);
		DB::table('users')->insert([
            'name' => "Miguel Guanira",
            'email' => "miguel@gmail.com",
            'address' => "Av. La marina 1213",
            'user_type_id' => 1,

        ]);
		DB::table('users')->insert([
            'name' => "Fernando Alva",
            'email' => "fernando@gmail.com",
            'address' => "Av. La marina 1214",
            'user_type_id' => 2,

        ]);
		DB::table('users')->insert([
            'name' => "Jorge Solis",
            'email' => "jorge@gmail.com",
            'address' => "Av. La marina 1215",
            'user_type_id' => 2,

        ]);
    }
}
