<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonTable extends Migration
{

    const TABLE_NAME = "Person";
    const COL_ID = "person_id";
    const COL_SURNAME = "surname";
    const COL_NAME = "name";
    const COL_ADD = "address";
    const COL_DOB = "date_of_birth";
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function(Blueprint $table)
        {
            $table->increments(self::COL_ID);
            $table->string(self::COL_SURNAME, 50);
            $table->string(self::COL_NAME, 50);
            $table->string(self::COL_ADD, 50);
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
