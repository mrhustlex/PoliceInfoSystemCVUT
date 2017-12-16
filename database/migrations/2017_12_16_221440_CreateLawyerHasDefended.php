<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateLawyerHasDefended extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    const TABLE_NAME = "lawyerHasDefended";
    const COL_CRIMID = "criminalId";
    const COL_LAWYERID = "lawyerId";

    public function up()
    {
        Schema::create(self::TABLE_NAME, function(Blueprint $table)
        {
            $table->integer(self::COL_CRIMID)->unsigned();
            $table->integer(self::COL_LAWYERID)->unsigned();

            $table->foreign(self::COL_CRIMID)->references('criminalId')->on('criminal');
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
        Schema::dropIfExists(self::TABLE_NAME);
    }
}
