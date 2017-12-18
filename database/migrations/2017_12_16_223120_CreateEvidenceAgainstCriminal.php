<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateEvidenceAgainstCriminal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    const TABLE_NAME = "evidenceAgainstCriminal";
    const COL_CRIMID = "criminalId";
    const COL_EVIDID = "evidenceId";

    public function up()
    {
        Schema::create(self::TABLE_NAME, function(Blueprint $table)
        {
            $table->integer(self::COL_CRIMID)->unsigned();
            $table->integer(self::COL_EVIDID)->unsigned();

            $table->foreign(self::COL_CRIMID)->references('criminalId')->on('criminal');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists(self::TABLE_NAME);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
