<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFevTroupeauxN extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('fev_troupeaux_n', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id');
          $table->integer('especes_id');
          $table->integer('races_id');
          $table->integer('uiv');
          $table->rememberToken();
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
