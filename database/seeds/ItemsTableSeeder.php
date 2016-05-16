<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */ 
    public function run()

    {
		DB::table('items')->insert([
			'cod' => "ART001",
            'title' => "La ciudad y los perros",
            'author' => "Cesar Acuña",
            'p_date' => 1999,
            'item_type_id' => 1,
            'language' => "Castellano",
            'genre' => "Terror"

        ]);
		DB::table('items')->insert([
			'cod' => "ART002",
            'name' => "asdsadsaf",
            'description' => "afdsaf asf sadf dsf",
            'item_type_id' => 3,


        ]);
		DB::table('items')->insert([
			'cod' => "ART003",
            'title' => "It",
            'author' => "Cesar Acuña",
            'p_date' => 1998,
            'item_type_id' => 1,
            'language' => "English",
            'genre' => "Terror"

        ]);
		DB::table('items')->insert([
			'cod' => "ART004",
			'ram' => 6,
            'model' => "Satellite 4000",
            'trademark' => "Toshiba",
            'price' => 2000,
            'item_type_id' => 2,            
            'capacity' => 500

        ]);
    }
}
 