<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateSpecializationTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('specialization',function(Blueprint $table){
            $table->increments("id");
            $table->string("specialization_icon")->nullable();
            $table->string("specialization_title");
            $table->text("specialization_description")->nullable();
            $table->string("specialization_order")->nullable();
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
        Schema::drop('specialization');
    }

}