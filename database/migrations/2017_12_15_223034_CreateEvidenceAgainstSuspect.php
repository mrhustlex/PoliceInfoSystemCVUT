<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;



class CreateEvidenceAgainstSuspect extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    const TABLE_NAME = "evidenceAgainstSuspect";
    const COL_SUSPID = "suspectId";
    const COL_EVIDID = "evidenceId";

    public function up()
    {
        Schema::create(self::TABLE_NAME, function(Blueprint $table)
        {
            $table->integer(self::COL_SUSPID)->unsigned();
            $table->integer(self::COL_EVIDID)->unsigned();

            $table->foreign(self::COL_SUSPID)->references('criminalId')->on('criminal');
            $table->foreign(self::COL_EVIDID)->references('evidenceId')->on('evidence');

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
        Schema::dropIfExists(self::TABLE_NAME);
    }
}
