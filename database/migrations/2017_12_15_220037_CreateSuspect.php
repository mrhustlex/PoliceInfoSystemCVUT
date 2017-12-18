<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;



class CreateSuspect extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    const TABLE_NAME = "suspect";
    const COL_ID = "suspectId";

    public function up()
    {
        Schema::create(self::TABLE_NAME, function(Blueprint $table)
        {
            $table->integer(self::COL_ID)->unsigned();

            $table->foreign(self::COL_ID)->references('rolePOIid')->on('roleOfPOI');

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
