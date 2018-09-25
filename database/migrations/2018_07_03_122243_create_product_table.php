<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateProductTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('product',function(Blueprint $table){
            $table->increments("id");
            $table->string("product_title");
            $table->string("product_url");
            $table->string("product_image")->nullable();
            $table->string("product_circle_image")->nullable();
            $table->text("product_specs")->nullable();
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
        Schema::drop('product');
    }

}
