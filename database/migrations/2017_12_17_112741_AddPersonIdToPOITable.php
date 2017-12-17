<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class AddPersonIdToPOITable extends Migration
{
    const TABLE_NAME = "personOfInterest" ;
    const COL_PPL_ID = "person_id";
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(self::TABLE_NAME, function($table) {
            $table->integer(self::COL_PPL_ID)->unsigned();
            $table->foreign(self::COL_PPL_ID)->references("person_id")->on("Person");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(self::TABLE_NAME, function($table) {
            $table->dropForeign(self::COL_PPL_ID);
        });
    }
}
