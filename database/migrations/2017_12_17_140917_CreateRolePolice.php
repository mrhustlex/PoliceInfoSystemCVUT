<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolePolice extends Migration
{
    const TABLE_NAME = "rolePolice";
    const COL_ID = "rolePolice_id";
    const COL_POLID = "policeAgent_id";


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
            $table->integer(self::COL_POLID)->unsigned();
            $table->foreign(self::COL_POLID)->references("policeAgent_id")->on("policeAgent"); 
        });

        Schema::table('policeAgent', function($table) {
            $table->foreign(CreatePoliceAgent::COL_ROLPOLID)->references(self::COL_ID)->on(self::TABLE_NAME);
        });
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
