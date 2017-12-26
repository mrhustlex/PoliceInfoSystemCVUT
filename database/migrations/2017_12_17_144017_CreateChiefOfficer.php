<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiefOfficer extends Migration
{
    const TABLE_NAME = "chiefOfficer";
    const COL_ID = "chiefOfficer_id";


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
            "chiefOfficer_id" => 1
        ]);
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

