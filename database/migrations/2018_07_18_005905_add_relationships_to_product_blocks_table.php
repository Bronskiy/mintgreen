<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToProductBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('productblocks', function(Blueprint $table) {
          if (!Schema::hasColumn('productblocks', 'belongs_to_field_id')) {
              $table->integer('belongs_to_field_id')->unsigned()->nullable();
              $table->foreign('belongs_to_field_id')->references('id')->on('product')->onDelete('cascade');
              }

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('productblocks', function(Blueprint $table) {

      });
    }
}
