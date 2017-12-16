<?php

use App\Model\CaseModel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnPoiIdToCaseTable extends Migration
{

    const COL_POI_ID = 'person_of_interest_id';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(CaseModel::TABLE_NAME, function($table) {
            $table->integer(self::COL_POI_ID)->unsigned();
            $table->foreign(self::COL_POI_ID)->references("personOfInterestId")->on("personOfInterest");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(CaseModel::TABLE_NAME, function($table) {
            $table->dropForeign(self::COL_POI_ID);
        });
    }
}
