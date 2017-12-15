<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceTable extends Migration
{

    const TABLE_NAME = "Place";
    const COL_ID = "place_id";
    const COL_NAME= "name";
    const COL_ADDRESS= "address";
    const COL_DES= "description";

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
            $table->string(self::COL_NAME, 50);
            $table->string(self::COL_ADDRESS, 50);
            $table->string(self::COL_DES);
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
