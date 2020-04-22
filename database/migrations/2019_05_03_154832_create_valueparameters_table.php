<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValueparametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valueparameters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('parameter_id')->unsigned()->default(1);        
            $table->foreign('parameter_id')->references('id')->on('parameters');
            $table->string('name');
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
        Schema::dropIfExists('valueparameters');
    }
}
