<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadOfDepartment extends Migration
{
    const TABLE_NAME = "headOfDepartment";
    const COL_ID = "headOfDepartment_id";


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function(Blueprint $table)
        {
            $table->integer(self::COL_ID)->unsigned();

            $table->foreign(self::COL_ID)->references(CreateRolePolice::COL_ID)->on(CreateRolePolice::TABLE_NAME);

            $table->softDeletes();
        });
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        DB::table(self::TABLE_NAME)->insert([
            "headOfDepartment_id" => 3
        ]);
        DB::table(self::TABLE_NAME)->insert([
            "headOfDepartment_id" => 4
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

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
