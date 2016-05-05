<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cod');

            //Otros
            $table->string('name');
            $table->text('description');

            //Laptops
            $table->integer('ram');
            $table->string('model');
            $table->string('trademark');
            $table->float('price');
            $table->integer('capacity');

            //Libros
            $table->string('title');
            $table->string('author');
            $table->integer('p_date');
            $table->integer('language');
            $table->string('genre');


            $table->unsignedInteger('item_type_id')->nullable();

            $table->foreign('item_type_id')->references('id')->on('item_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('items');
    }
}
