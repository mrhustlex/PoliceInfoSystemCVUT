<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateLawyerRepresentsVictim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    const TABLE_NAME = "lawyerRepresentsVictim";
    const COL_VICTID = "victimId";
    const COL_LAWYERID = "lawyerId";

    public function up()
    {
        Schema::create(self::TABLE_NAME, function(Blueprint $table)
        {
            $table->integer(self::COL_VICTID)->unsigned();
            $table->integer(self::COL_LAWYERID)->unsigned();

            $table->foreign(self::COL_VICTID)->references('victimId')->on('victim');
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
