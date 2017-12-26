<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonTable extends Migration
{

    const TABLE_NAME = "Person";
    const COL_ID = "person_id";
    const COL_SURNAME = "surname";
    const COL_NAME = "name";
    const COL_ADD = "address";
    const COL_DOB = "date_of_birth";
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
            $table->string(self::COL_SURNAME, 50);
            $table->string(self::COL_NAME, 50);
            $table->string(self::COL_ADD, 50)->nullable();
            $table->timestamp(self::COL_DOB)->nullable();
        });

        DB::table(self::TABLE_NAME)->insert([
            "surname" => "Does",
            "name" => "John",
            "address" => "Praha 1"
        ]);

        DB::table(self::TABLE_NAME)->insert([
            "surname" => "Mary",
            "name" => "Jane",
            "address" => "Praha 2"
        ]);

        DB::table(self::TABLE_NAME)->insert([
            "surname" => "Chan",
            "name" => "Jacky",
            "address" => "Praha 3"
        ]);

        DB::table(self::TABLE_NAME)->insert([
            "surname" => "Poppins",
            "name" => "Mary",
            "address" => "Praha 4"
        ]);

        DB::table(self::TABLE_NAME)->insert([
            "surname" => "Bond",
            "name" => "James",
            "address" => "Praha 007"
        ]);

        DB::table(self::TABLE_NAME)->insert([
            "surname" => "Potter",
            "name" => "Adri",
            "address" => "Strahov blok 8"
        ]);

        DB::table(self::TABLE_NAME)->insert([
            "surname" => "Durand",
            "name" => "Jessica",
            "address" => "Praha 7"
        ]);

        DB::table(self::TABLE_NAME)->insert([
            "surname" => "Claus",
            "name" => "Santa",
            "address" => "North Pole"
        ]);

        DB::table(self::TABLE_NAME)->insert([
            "surname" => "Habile",
            "name" => "Bill",
            "address" => "Rio"
        ]);

        DB::table(self::TABLE_NAME)->insert([
            "surname" => "Habile",
            "name" => "Bill",
            "address" => "Rio"
        ]);

        DB::table(self::TABLE_NAME)->insert([
            "surname" => "Bonisseur",
            "name" => "Hubert",
            "address" => "Paris"
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
