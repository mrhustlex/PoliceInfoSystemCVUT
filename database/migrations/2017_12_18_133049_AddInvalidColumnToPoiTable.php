<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInvalidColumnToPoiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    const TABLE_NAME = "personOfInterest" ;
    const COL_INV = "invalid";
    public function up()
    {
        Schema::table(self::TABLE_NAME, function(Blueprint $table) {
            $table->boolean(self::COL_INV)->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(self::TABLE_NAME, function (Blueprint $table) {
            $table->dropColumn(self::COL_INV);
        });
    }
}
