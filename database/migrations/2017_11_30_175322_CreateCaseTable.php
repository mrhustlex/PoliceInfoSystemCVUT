<?php

use App\CaseModel;
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
            $table->string(CaseModel::COL_DEP_ID);
            $table->string(CaseModel::COL_NAME);
            $table->string(CaseModel::COL_TYPE);
            $table->string(CaseModel::COL_DES);
            $table->string(CaseModel::COL_CLOSED)->default(0);
            $table->string(CaseModel::COL_SOLVED)->default(0);
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
        Schema::dropIfExists(CaseModel::TABLE_NAME);

    }
}
