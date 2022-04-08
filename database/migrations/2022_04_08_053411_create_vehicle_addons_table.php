<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_addons', function (Blueprint $table) {
            $table->id();

            // @todo - Create a many to many relationship between vehicle and addons
            
            // $table->bigInteger('product_id')->nullable();
            // $table->foreign('product_id')->references('id')->on('products');

            $table->bigInteger('manufacturer_id')->nullable();
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');

            $table->bigInteger('vehicle_model_id')->nullable();
            $table->foreign('vehicle_model_id')->references('id')->on('vehicle_models');

            $table->string('name'); //varchar 255

            $table->longText('description');// text

            $table->string('image')->nullable();// varchar 255

            $table->boolean('is_active')->default(true);// tinyint 2 - 0 or 1

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_addons');
    }
};
