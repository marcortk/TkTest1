<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItemTypesTable extends Migration
{
    public function up()
    {
        Schema::create('item_types', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('item_types');
    }
}