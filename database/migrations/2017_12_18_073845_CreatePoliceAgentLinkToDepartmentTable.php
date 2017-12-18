<?php

use App\model\DepartmentModel;
use App\model\PoliceAgentModel;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoliceAgentLinkToDepartmentTable extends Migration
{
    const TABLE_NAME = "policeLinkToDepartment";
    const COL_ID = "policeLinkToDepartment_id";
    const COL_POLICE_ID = "policeAgent_id";
    const COL_DPT_ID = "department_id";

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function($table) {
            $table->increments(self::COL_ID);
            $table->integer(self::COL_POLICE_ID)->unsigned();
            $table->integer(self::COL_DPT_ID)->unsigned();

            $table->foreign(self::COL_POLICE_ID)->references( "policeAgent_id")->on( "policeAgent" );
            $table->foreign(self::COL_DPT_ID)->references("department_id")->on("department");
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
