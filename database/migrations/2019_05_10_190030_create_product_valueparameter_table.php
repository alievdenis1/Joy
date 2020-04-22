<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductValueparameterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_valueparameter', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('valueparameter_id')->unsigned()->default(1);        
            $table->foreign('valueparameter_id')->references('id')->on('valueparameters')->onDelete('cascade');
            $table->bigInteger('product_id')->unsigned()->default(1);        
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');            
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
        Schema::dropIfExists('product_valueparameter');
    }
}
