<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            //$table->uuid('id')->primary();
            $table->string('name');
            $table->string('description');
            $table->string('unit');
            $table->double('price');
            $table->double('sale_price');
            $table->integer('product_quantity');
            $table->string('image_product')->nullable();
            $table->boolean('status');
            $table->string('meta_title');
            $table->string('meta_description');
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
