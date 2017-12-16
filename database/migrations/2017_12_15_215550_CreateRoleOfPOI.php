<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;


class CreateRoleOfPOI extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    const TABLE_NAME = "roleOfPOI";
    const COL_ROLEPOIID = "rolePOIid";
    const COL_POIID = "POIid";

    public function up()
    {
        Schema::create(self::TABLE_NAME, function(Blueprint $table)
        {
            $table->increments(self::COL_ROLEPOIID);
            $table->integer(self::COL_POIID)->unsigned();
            $table->foreign(self::COL_POIID)->references(CreatePersonOfInterestTable::COL_ID)->on(CreatePersonOfInterestTable::TABLE_NAME);
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
        Schema::dropIfExists(self::TABLE_NAME);
    }
}
