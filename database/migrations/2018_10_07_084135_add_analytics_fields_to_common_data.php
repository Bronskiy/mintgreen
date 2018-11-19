<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAnalyticsFieldsToCommonData extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('commondata', function($table) {
      $table->text("common_google_analytics")->nullable();
      $table->text("common_google_tag_head")->nullable();
      $table->text("common_google_tag_bottom")->nullable();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::table('commondata', function($table) {
      $table->dropColumn('common_google_analytics');
      $table->dropColumn('common_google_tag_head');
      $table->dropColumn('common_google_tag_bottom');
    });
  }
}
