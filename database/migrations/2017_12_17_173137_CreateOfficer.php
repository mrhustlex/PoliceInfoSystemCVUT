<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficer extends Migration
{
    const TABLE_NAME = "officer";
    const COL_ID = "officer_id";


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

            $table->foreign(self::COL_ID)->references(CreateRolePolice::COL_ID)->on(CreateRolePolice::TABLE_NAME);

            $table->softDeletes();
        });
        DB::table(self::TABLE_NAME)->insert([
            "officer_id" => 9
        ]);
        DB::table(self::TABLE_NAME)->insert([
            "officer_id" => 10
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
