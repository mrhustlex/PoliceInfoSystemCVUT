<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoliceAgent extends Migration
{
    const TABLE_NAME = "policeAgent";
    const COL_ID = "policeAgent_id";
    const COL_USERNAME = "username";
    const COL_PASSWORD = "password";
    const COL_DEPID = "department_id";
    const COL_ROLPOLID = "rolePolice_id";
    const COL_POLSTAID = "policeStation_id";


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function(Blueprint $table)
        {
            $table->integer(self::COL_ID)->unsigned();
            $table->foreign(self::COL_ID)->references("person_id")->on("Person");

            $table->string(self::COL_USERNAME,20)->unique();
            $table->string(self::COL_PASSWORD,20);
           
            $table->integer(self::COL_POLSTAID)->unsigned();
            $table->foreign(self::COL_POLSTAID)->references("policeStation_id")->on("policeStation");

            $table->integer(self::COL_DEPID)->unsigned();
            $table->foreign(self::COL_DEPID)->references("department_id")->on("department");

            $table->integer(self::COL_ROLPOLID)->nullable()->unsigned();
        });

        DB::table(self::TABLE_NAME)->insert([
            "policeAgent_id" => 1,
            "username" => "Never",
            "password" => "foobar",
            "department_id" => 1,
            "rolePolice_id" => NULL,
            "policeStation_id" => 1
        ]);

        DB::table(self::TABLE_NAME)->insert([
            "policeAgent_id" => 2,
            "username" => "Gonna",
            "password" => "foobar",
            "department_id" => 2,
            "rolePolice_id" => NULL,
            "policeStation_id" => 1
        ]);

        DB::table(self::TABLE_NAME)->insert([
            "policeAgent_id" => 3,
            "username" => "Give",
            "password" => "foobar",
            "department_id" => 3,
            "rolePolice_id" => NULL,
            "policeStation_id" => 1
        ]);

        DB::table(self::TABLE_NAME)->insert([
            "policeAgent_id" => 4,
            "username" => "YouUP",
            "password" => "foobar",
            "department_id" => 4,
            "rolePolice_id" => NULL,
            "policeStation_id" => 1
        ]);

        DB::table(self::TABLE_NAME)->insert([
            "policeAgent_id" => 5,
            "username" => "n3VER",
            "password" => "foobar",
            "department_id" => 5,
            "rolePolice_id" => NULL,
            "policeStation_id" => 1
        ]);

        DB::table(self::TABLE_NAME)->insert([
            "policeAgent_id" => 6,
            "username" => "g0NNA",
            "password" => "foobar",
            "department_id" => 6,
            "rolePolice_id" => NULL,
            "policeStation_id" => 2
        ]);

        DB::table(self::TABLE_NAME)->insert([
            "policeAgent_id" => 7,
            "username" => "letYou",
            "password" => "foobar",
            "department_id" => 7,
            "rolePolice_id" => NULL,
            "policeStation_id" => 2
        ]);

        DB::table(self::TABLE_NAME)->insert([
            "policeAgent_id" => 8,
            "username" => "downNever",
            "password" => "foobar",
            "department_id" => 8,
            "rolePolice_id" => NULL,
            "policeStation_id" => 2
        ]);

        DB::table(self::TABLE_NAME)->insert([
            "policeAgent_id" => 9,
            "username" => "gonnaRun",
            "password" => "foobar",
            "department_id" => 9,
            "rolePolice_id" => NULL,
            "policeStation_id" => 2
        ]);

        DB::table(self::TABLE_NAME)->insert([
            "policeAgent_id" => 10,
            "username" => "around",
            "password" => "foobar",
            "department_id" => 10,
            "rolePolice_id" => NULL,
            "policeStation_id" => 2
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

        /*
        Schema::table(self::TABLE_NAME, function($table) {
            $table->dropForeign(self::COL_DEPID);
            $table->dropForeign(self::COL_ROLPOLID);
            $table->dropForeign(self::COL_POLSTAID);
        });
        */
    }

}