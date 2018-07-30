<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateProductBlocksTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('productblocks',function(Blueprint $table){
            $table->increments("id");
            $table->string("product_block_class")->nullable();
            $table->string("product_block_title")->nullable();
            $table->text("product_block_text")->nullable();
            $table->string("product_block_image")->nullable();
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
        Schema::drop('productblocks');
    }

}