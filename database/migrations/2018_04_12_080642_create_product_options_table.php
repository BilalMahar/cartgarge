<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_options', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('option_id');
            $table->foreign('option_id')->references('id')->on('options');
            $table->string('value',250);
            $table->timestamps();
        });

        Schema::create('product_variant_options', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_variants_id');
            $table->foreign('product_variants_id')->references('id')->on('product_variants');
            $table->unsignedInteger('product_options_id');
            $table->foreign('product_options_id')->references('id')->on('product_options');
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
        Schema::dropIfExists('product_options');
        Schema::dropIfExists('product_variant_option');
    }
}
