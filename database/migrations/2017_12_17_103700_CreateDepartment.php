<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartment extends Migration
{
    const TABLE_NAME = "Department";
    const COL_ID = "department_id";
    const COL_NAME = "name";
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
            $table->string(self::COL_NAME, 50);
            $table->foreign(self::COL_STATION_ID)->references(CreatePoliceStation::COL_ID)->on(CreatePoliceStation::TABLE_NAME);
        });

        DB::table(self::TABLE_NAME)->insert([
            "name" => "Drug crimes",
            "policeStation_id" => "1"
        ]);
        DB::table(self::TABLE_NAME)->insert([
            "name" => "Street crime",
            "policeStation_id" => "1"
        ]);
        DB::table(self::TABLE_NAME)->insert([
            "name" => "Organized crime",
            "policeStation_id" => "1"
        ]);
        DB::table(self::TABLE_NAME)->insert([
            "name" => "Political crime",
            "policeStation_id" => "1"
        ]);
        DB::table(self::TABLE_NAME)->insert([
            "name" => "Victimless crime",
            "policeStation_id" => "1"
        ]);

        DB::table(self::TABLE_NAME)->insert([
            "name" => "Drug crimes",
            "policeStation_id" => "2"
        ]);
        DB::table(self::TABLE_NAME)->insert([
            "name" => "Street crime",
            "policeStation_id" => "2"
        ]);
        DB::table(self::TABLE_NAME)->insert([
            "name" => "Organized crime",
            "policeStation_id" => "2"
        ]);
        DB::table(self::TABLE_NAME)->insert([
            "name" => "Political crime",
            "policeStation_id" => "2"
        ]);
        DB::table(self::TABLE_NAME)->insert([
            "name" => "Victimless crime",
            "policeStation_id" => "2"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists(self::TABLE_NAME);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
