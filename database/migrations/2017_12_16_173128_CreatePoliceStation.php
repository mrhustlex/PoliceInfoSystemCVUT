<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoliceStation extends Migration
{
    const TABLE_NAME = "PoliceStation";
    const COL_ID = "policeStation_id";
    const COL_NAME = "name";
    const COL_ADDRESS = "address";
    

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
			$table->string(self::COL_NAME,50);
			$table->string(self::COL_ADDRESS, 50);
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
