<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {

            //new ecriture

            $table->foreignId('category_id')
                  ->constrained()
                  ->onDelete('cascade');
            
            //old ecriture
            /*
            $table->foreign('post_id')
                  ->references('id')
                  ->on('posts')
                  ->onDelete('cascade');
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_category_id_foreign');
        });
    }
}
