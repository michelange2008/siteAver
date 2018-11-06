<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBsa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bsa', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('troupeau_id')->unsigned();
            $table->foreign('troupeau_id')
                    ->references('id')
                    ->on('troupeaux');
            $table->date('date_bsa');
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
