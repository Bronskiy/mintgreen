<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateCommonDataTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('commondata',function(Blueprint $table){
            $table->increments("id");
            $table->string("common_logo")->nullable();
            $table->string("common_email")->nullable();
            $table->string("common_phone")->nullable();
            $table->string("common_address")->nullable();
            $table->string("common_linked_in")->nullable();
            $table->string("common_twitter")->nullable();
            $table->string("common_facebook")->nullable();
            $table->string("common_instagram")->nullable();
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
        Schema::drop('commondata');
    }

}
