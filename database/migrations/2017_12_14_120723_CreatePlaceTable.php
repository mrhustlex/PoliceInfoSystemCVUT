<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceTable extends Migration
{

    const TABLE_NAME = "case";
    const COL_ID = "CaseID";
    const COL_DEP_ID = "DepartmentID";
    const COL_NAME = "Name";
    const COL_TYPE = "Type";
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
