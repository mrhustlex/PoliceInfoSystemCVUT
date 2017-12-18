<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateLawyerDefendsSuspect extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    const TABLE_NAME = "lawyerDefendsSuspect";
    const COL_SUSPID = "suspectId";
    const COL_LAWYERID = "lawyerId";

    public function up()
    {
        Schema::create(self::TABLE_NAME, function(Blueprint $table)
        {
            $table->integer(self::COL_SUSPID)->unsigned();
            $table->integer(self::COL_LAWYERID)->unsigned();

            $table->foreign(self::COL_SUSPID)->references('suspectId')->on('suspect');
            $table->foreign(self::COL_LAWYERID)->references('lawyerId')->on('lawyer');

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
