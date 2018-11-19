<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateSocialLinksTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('sociallinks',function(Blueprint $table){
            $table->increments("id");
            $table->string("social_links_title");
            $table->string("social_links_icon");
            $table->string("social_links_link");
            $table->string("social_links_order");
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
        Schema::drop('sociallinks');
    }

}