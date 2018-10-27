<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAnalyses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analyses', function(Blueprint $table){
          $table->increments('id');
          $table->integer('id_troupeau')->unsigned();
          $table->foreign('id_troupeau')
                ->references('id')
                ->on('troupeaux');
          $table->string('type_analyse');
          $table->string('id_analyse');
          $table->date('date_analyse');
          $table->string('lien');
          $table->boolean('status');
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
        Schema::dropIfExists('analyses');
    }
}
