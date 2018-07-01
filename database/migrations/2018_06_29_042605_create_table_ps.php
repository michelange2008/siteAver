<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ps', function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->string('nom')->index();
            $table->string('fichier');
            $table->integer('especes_id');
            $table->foreign('especes_id')
                    ->references('id')
                    ->on('especes');
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
        //
    }
}
