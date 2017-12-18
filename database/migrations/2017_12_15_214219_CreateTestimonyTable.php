<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;



class CreateTestimonyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    const TABLE_NAME ="testimony";
    const COL_ID = "testimonyId";
    const COL_DATE = "date";
    const COL_TYPE = "type";
    const COL_STATEMENT = "statement";
    const COL_POIID = "poiId";



    public function up()
    {
        Schema::create(self::TABLE_NAME, function(Blueprint $table)
        {
            $table->increments(self::COL_ID);
            $table->string(self::COL_DATE);
            $table->string(self::COL_TYPE);
            $table->text(self::COL_STATEMENT);

            $table->integer(self::COL_POIID)->unsigned();

            $table->foreign(self::COL_POIID)->references(CreatePersonOfInterest::COL_ID)->on(CreatePersonOfInterest::TABLE_NAME);

            $table->softDeletes();
        });
/*
        Schema::table(self::TABLE_NAME, function(Blueprint $table)
        {
            $table->foreign(self::COL_POIID)->references(CreatePersonOfInterest::COL_ID)->on(CreatePersonOfInterest::TABLE_NAME);
        });*/
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
