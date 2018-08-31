<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateTeamMembersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('teammembers',function(Blueprint $table){
            $table->increments("id");
            $table->string("team_member_name");
            $table->string("team_member_position")->nullable();
            $table->string("team_member_linkedin")->nullable();
            $table->string("team_member_email")->nullable();
            $table->string("team_member_quote")->nullable();
            $table->string("team_member_hobby")->nullable();
            $table->string("team_member_photo")->nullable();
            $table->text("team_member_description")->nullable();
            $table->integer("teamcategory_id")->references("id")->on("teamcategory");
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
        Schema::drop('teammembers');
    }

}
