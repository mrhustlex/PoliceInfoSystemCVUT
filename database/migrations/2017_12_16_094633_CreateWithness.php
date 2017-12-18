<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWithness extends Migration
{
    const TABLE_NAME = "witness";
    const COL_ID = "witnessId";

    public function up()
    {
        Schema::create(self::TABLE_NAME, function(Blueprint $table)
        {
            $table->integer(self::COL_ID)->unsigned();
            $table->foreign(self::COL_ID)->references(CreateRoleOfPOI::COL_ROLEPOIID)->on(CreateRoleOfPOI::TABLE_NAME);
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
