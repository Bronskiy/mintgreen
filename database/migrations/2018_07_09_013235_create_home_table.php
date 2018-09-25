<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateHomeTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('home',function(Blueprint $table){
            $table->increments("id");
            $table->string("home_header_image")->nullable();
            $table->string("home_image_block_1")->nullable();
            $table->text("home_text_block_1")->nullable();
            $table->string("home_image_block_2")->nullable();
            $table->text("home_text_block_2")->nullable();
            $table->string("home_image_block_3")->nullable();
            $table->text("home_text_block_3")->nullable();
            $table->string("home_image_block_4")->nullable();
            $table->text("home_text_block_4")->nullable();
            $table->string("home_image_block_5")->nullable();
            $table->text("home_text_block_5")->nullable();
            $table->string("seo_title")->nullable();
            $table->string("seo_keywords")->nullable();
            $table->text("seo_description")->nullable();
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
        Schema::drop('home');
    }

}
