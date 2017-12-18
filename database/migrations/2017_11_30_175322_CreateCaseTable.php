<?php

use App\Model\CaseModel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(CaseModel::TABLE_NAME, function(Blueprint $table)
        {
            $table->increments(CaseModel::COL_ID);
            $table->integer(CaseModel::COL_DEP_ID);
            $table->string(CaseModel::COL_NAME, 50);
            $table->string(CaseModel::COL_TYPE, 20);
            $table->string(CaseModel::COL_DES);
            $table->boolean(CaseModel::COL_CLOSED)->default(0);
            $table->boolean(CaseModel::COL_SOLVED)->default(0);
            $table->timestamp(CaseModel::COL_CRIME_DATE)->nullable();
            $table->timestamp(CaseModel::COL_O_DAY)->default(DB::raw('CURRENT_TIMESTAMP'));;

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
        Schema::dropIfExists(CaseModel::TABLE_NAME);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
