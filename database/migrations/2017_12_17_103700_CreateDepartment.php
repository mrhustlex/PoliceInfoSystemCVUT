<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartment extends Migration
{
    const TABLE_NAME = "Department";
    const COL_ID = "department_id";
    const COL_STATION_ID = "policeStation_id";
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function(Blueprint $table)
        {
            $table->increments(self::COL_ID);
            $table->integer(self::COL_STATION_ID)->unsigned();
            $table->foreign(self::COL_STATION_ID)->references(CreatePoliceStation::COL_ID)->on(CreatePoliceStation::TABLE_NAME);
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
