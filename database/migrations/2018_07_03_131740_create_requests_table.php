<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateRequestsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('requests',function(Blueprint $table){
            $table->increments("id");
            $table->string("requests_first_name")->nullable();
            $table->string("requests_last_name")->nullable();
            $table->string("requests_email")->nullable();
            $table->string("requests_phone")->nullable();
            $table->string("requests_country")->nullable();
            $table->string("requests_address_line_1")->nullable();
            $table->string("requests_address_line_2")->nullable();
            $table->string("requests_city")->nullable();
            $table->string("requests_province")->nullable();
            $table->string("requests_postal")->nullable();
            $table->integer("product_id")->references("id")->on("product")->nullable();
            $table->text("requests_comment")->nullable();
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
        Schema::drop('requests');
    }

}