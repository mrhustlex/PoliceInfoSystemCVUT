<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvidence extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    const TABLE_NAME = "evidence";
    const COL_NAME = "nameOfTheEvidence";
    const COL_DESC = "descriptionOfTheEvidence";
    const COL_ID = "evidenceId";

    public function up()
    {
        Schema::create(self::TABLE_NAME, function(Blueprint $table)
        {
            $table->increments(self::COL_ID);
            $table->string(self::COL_NAME);
            $table->text(self::COL_DESC);

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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists(self::TABLE_NAME);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
