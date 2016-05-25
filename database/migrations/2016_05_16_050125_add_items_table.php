<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('cod');
            $table->string('name');
            $table->text('description');
            $table->integer('ram');
            $table->string('model');
            $table->string('trademark');
            $table->float('price');
            $table->integer('capacity');
            $table->string('title');
            $table->string('author');
            $table->integer('p_date');
            $table->string('language');
            $table->string('genre');
            $table->boolean('damaged')->default(false);
            $table->unsignedInteger('item_type_id')->nullable();
            $table->foreign('item_type_id')->references('id')->on('item_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('items');
    }
}