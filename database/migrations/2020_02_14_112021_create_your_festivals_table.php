<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYourFestivalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('your_festivals', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idFestival');
            $table->timestamps();
            $table->foreign('idUser')
                ->references('id')->on('users')
                ->onDelete('restrict');
            $table->foreign('idFestival')
                ->references('id')->on('festivals')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('your_festivals');
    }
}
