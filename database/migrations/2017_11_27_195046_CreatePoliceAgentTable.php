<?php

use App\PoliceAgentModel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoliceAgentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create(PoliceAgentModel::TABLE_NAME, function(Blueprint $table)
        {
            $table->increments(PoliceAgentModel::COL_ID);
            $table->string(PoliceAgentModel::COL_NAME);
            $table->string(PoliceAgentModel::COL_POS);
            $table->string(PoliceAgentModel::COL_NUM_CASE)->default(0);
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
        Schema::dropIfExists(PoliceAgentModel::TABLE_NAME);
    }
}
