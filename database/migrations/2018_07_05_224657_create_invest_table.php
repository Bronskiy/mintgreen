<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateInvestTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('invest',function(Blueprint $table){
            $table->increments("id");
            $table->string("invest_title");
            $table->string("invest_header_image")->nullable();
            $table->text("invest_body")->nullable();
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
        Schema::drop('invest');
    }

}
