<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('imgPath');           
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->decimal('price')->default(1);
            $table->integer('number')->default(1);
            $table->bigInteger('user_id')->unsigned();        
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('city_id')->unsigned()->default(1);        
            $table->foreign('city_id')->references('id')->on('cities');
            $table->bigInteger('gender_id')->unsigned()->default(1);        
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->integer('minage')->default(1);
            $table->integer('maxage')->default(100);
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
        Schema::dropIfExists('products');
    }
}
