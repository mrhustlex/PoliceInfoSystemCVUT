<?php

use App\Model\CaseModel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePOILinkToCaseTable extends Migration
{
    const TABLE_NAME = 'poi_link_to_case';
    const COL_ID = "id";
    const COL_CASE_ID = "case_id";
    const COL_POI_ID = "poi_id";

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function($table) {
        $table->increments(self::COL_ID);
        $table->integer(self::COL_POI_ID)->unsigned();
        $table->integer(self::COL_CASE_ID)->unsigned();
        $table->foreign(self::COL_POI_ID)->references( "personOfInterestId")->on( "personOfInterest" );
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists(self::TABLE_NAME);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
