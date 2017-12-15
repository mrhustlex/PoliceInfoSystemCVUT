<?php

use App\CaseModel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseTookPlaceInTable extends Migration
{
    const TABLE_NAME = "CaseTookPlaceIn";
    const COL_ID = "id";
    const COL_PLACE_ID = "place_id";
    const COL_CASE_ID = "case_id";
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
            $table->integer(self::COL_PLACE_ID)->unsigned();
            $table->integer(self::COL_CASE_ID)->unsigned();
            $table->foreign(self::COL_PLACE_ID)->references(CreatePlaceTable::COL_ID)->on(CreatePlaceTable::TABLE_NAME);
            $table->foreign(self::COL_CASE_ID)->references(CaseModel::COL_ID)->on(CaseModel::TABLE_NAME);
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
