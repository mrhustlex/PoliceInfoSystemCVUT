<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWitness extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    const TABLE_NAME = "witness";
    const COL_ID = "witnessId";

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
